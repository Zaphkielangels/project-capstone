<?php

namespace App\Controllers;

use App\Models\CertificateModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Images\Image; // Import Image class
use DateTime;

class Generate extends BaseController
{
    protected $certificateModel, $encrypter;
    public function __construct()
    {
        $this->certificateModel = new CertificateModel();
        $this->encrypter = \Config\Services::encrypter();
    }

    public function index()
    {
        $certificate = $this->certificateModel->where('user_id', session('id'))->findAll();
        $decrypted_data = [];

        foreach ($certificate as $item) {
            $decrypted_fullname = $this->encrypter->decrypt(base64_decode($item['full_name']));
            $decrypted_events = $this->encrypter->decrypt(base64_decode($item['events']));
            $decrypted_signatory = $this->encrypter->decrypt(base64_decode($item['name_of_signatory']));
            $decrypted_name_certificate = $this->encrypter->decrypt(base64_decode($item['name_certificate']));
            $decrypted_url = $this->encrypter->decrypt(base64_decode($item['certificate_png']));

            // Menambahkan data yang telah di dekripsi ke dalam array
            $decrypted_data[] = [
                'id' => $item['id'],
                'name_certificate' => $decrypted_name_certificate,
                'full_name' => $decrypted_fullname,
                'events' => $decrypted_events,
                'name_of_signatory' => $decrypted_signatory,
                'certificate_png' => $decrypted_url
            ];
        }

        $data = [
            'certificate' => $decrypted_data
        ];

        if (session()->get('email') == NULL) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('/login');
        }

        // Jika sudah login, tampilkan halaman dashboard
        return view('/generateCertificate/dashboard', $data);
    }

    public function detail($id)
    {
        $certificate = $this->certificateModel->getCertificate($id);

        $decrypted_fullname = $this->encrypter->decrypt(base64_decode($certificate['full_name']));
        $decrypted_events = $this->encrypter->decrypt(base64_decode($certificate['events']));
        $decrypted_signatory = $this->encrypter->decrypt(base64_decode($certificate['name_of_signatory']));
        $decrypted_name_certificate = $this->encrypter->decrypt(base64_decode($certificate['name_certificate']));
        $decrypted_url = $this->encrypter->decrypt(base64_decode($certificate['certificate_png']));

        // Menambahkan data yang telah didekripsi ke dalam array
        $decrypted_data = [
            'id' => $certificate['id'],
            'name_certificate' => $decrypted_name_certificate,
            'full_name' => $decrypted_fullname,
            'events' => $decrypted_events,
            'name_of_signatory' => $decrypted_signatory,
            'certificate_png' => $decrypted_url
        ];

        $data = [
            'certificate' => $decrypted_data
        ];

        if (session()->get('email') == NULL) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('/login');
        }

        return view('generateCertificate/detail', $data);
    }

    public function save()
    {
        $fullname = $this->request->getVar('fullname');
        $events = $this->request->getVar('events');
        $signatory = $this->request->getVar('nameofsignatory');
        $name_certificate = url_title($fullname, '-', true) . '_' . url_title($events, '-', true);

        $directory = FCPATH;
        $url = "assets/img/certificate/" . $name_certificate . rand(pow(10, 2), pow(10, 3) - 1) . ".png";
        $output = $directory . $url;

        $encrypt_fullname = base64_encode($this->encrypter->encrypt($fullname));
        $encrypt_events = base64_encode($this->encrypter->encrypt($events));
        $encrypt_signatory = base64_encode($this->encrypter->encrypt($signatory));
        $encrypt_name_certificate = base64_encode($this->encrypter->encrypt($name_certificate));
        $encrypt_url = base64_encode($this->encrypter->encrypt($url));

        $this->certificateModel->save([
            'name_certificate' => $encrypt_name_certificate,
            'full_name' => $encrypt_fullname,
            'events' => $encrypt_events,
            'name_of_signatory' => $encrypt_signatory,
            'certificate_png' => $encrypt_url,
            'user_id' => intval(session('id'))
        ]);

        //memanggil fungsi generate() untuk proses menyisipkan text nama pada sertifikat
        $this->generate(
            $this->request->getVar('fullname'),
            $this->request->getVar('events'),
            $this->request->getVar('nameofsignatory'),
            $output,
            $this->request->getFile('signature')
        );
        session()->setFlashdata('success', 'Successfully Created a Certificate');
        return redirect()->to('/mydashboard');
    }

    public function generate($fullname, $events, $nameofsignatory, $output, $signature)
    {
        //direktori file hasil generate dan template sertifikat 
        $image = FCPATH . "assets/img/template_certificate/1.png";
        $signature = $signature;
        // $signature = FCPATH . "assets/img/template_certificate/TTD.png";

        //fungsi php untuk membuat image baru dari file png
        $createimage = imagecreatefrompng($image);
        $createsignature = imagecreatefrompng($signature);

        //mendapatkan width dan height dari file png (template)
        $image_width = imagesx($createimage);
        $image_height = imagesy($createimage);

        //fungsi untuk set warna text dalam format RGB
        $color = imagecolorallocate($createimage, 0, 0, 0);
        $rotation = 0;
        $drFont = FCPATH . "/assets/fonts/Rubik-Regular.ttf";
        $font_size_name = 70;
        $font_size_events = 40;

        //variabel untuk set nama di sertifikat
        $text_name = $fullname;
        $text_events = $events;
        $text_signatory = $nameofsignatory;
        $text_date = date('d/m/Y');
        $text_serial_number = date('Y') . "/" . rand(32, 999) - date('d') . "/" . rand(1, 999);
        // dd($text_serial_number);

        //fungsi untuk memberikan kotak batas text return nya berupa array
        //TEXT NAME
        $text_box = imagettfbbox($font_size_name, $rotation, $drFont, $text_name);
        $text_width_name = $text_box[2] - $text_box[0];
        $text_height_name = $text_box[1] - $text_box[7];
        //TEXT EVENTS
        $text_box = imagettfbbox($font_size_events, $rotation, $drFont, $text_events);
        $text_width_events = $text_box[2] - $text_box[0];
        $text_height_events = $text_box[1] - $text_box[7];
        //TEXT SIGNATORY
        $text_box = imagettfbbox($font_size_events, $rotation, $drFont, $text_signatory);
        $text_width_signatory = $text_box[2] - $text_box[0];
        $text_height_signatory = $text_box[1] - $text_box[7];
        //PICUTRE SIGNATURE
        $signature_width = imagesx($createsignature);
        $signature_height = imagesy($createsignature);

        //setup posisi x dan y terhadap template
        //TEXT NAME
        $origin_x_name = ($image_width - $text_width_name) / 2;
        $origin_y_name = ($image_height - $text_height_name) / 2 - 20;
        //TEXT EVENTS
        $origin_x_events = ($image_width - $text_width_events) / 2;
        $origin_y_events = ($image_height - $text_height_events) / 2 + 150;
        //TEXT SIGNATORY
        $origin_x_signatory = ($image_width - $text_width_signatory) / 2;
        $origin_y_signatory = $image_height - $text_height_signatory - 210;
        //PICTURE SIGNATOR
        $origin_x_signature = ($image_width - $signature_width) / 2;
        $origin_y_signature = $image_height - $signature_height - 180;
        //TEXT DATE
        $origin_x_date = 40;
        $origin_y_date = 100;
        //TEXT SEIAL NUMBER
        $origin_x_serial_number = 40;
        $origin_y_serial_number = 210;

        //function untuk menempatkan text  di sertifikat 
        //TEXT NAME
        imagettftext($createimage, $font_size_name, $rotation, $origin_x_name, $origin_y_name, $color, $drFont, $text_name);
        //TEXT EVENTS
        imagettftext($createimage, $font_size_events, $rotation, $origin_x_events, $origin_y_events, $color, $drFont, $text_events);
        //TEXT SIGNATORY
        imagettftext($createimage, $font_size_events, $rotation, $origin_x_signatory, $origin_y_signatory, $color, $drFont, $text_signatory);
        //PICTURE SIGNATURE
        imagecopy($createimage, $createsignature, $origin_x_signature, $origin_y_signature, 0, 0, $signature_width, $signature_height);
        //TEXT DATE
        imagettftext($createimage, $font_size_events, $rotation, $origin_x_date, $origin_y_date, $color, $drFont, $text_date);
        //TEXT SERIAL NUMBER
        imagettftext($createimage, $font_size_events, $rotation, $origin_x_serial_number, $origin_y_serial_number, $color, $drFont, $text_serial_number);


        //membuat image sertifikat yang sudah ada text namanya dengan format png dan simpan sesuai dengan value variabel output
        imagepng($createimage, $output, 3);
    }

    public function download_file($id)
    {
        $certificate = $this->certificateModel->getCertificate($id);
        $directory = FCPATH;
        $decrypted_url = $this->encrypter->decrypt(base64_decode($certificate['certificate_png']));
        $path_file = $directory . $decrypted_url;
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . basename($path_file) . "\"");
        readfile($path_file);
        // header("Location: /mydashboard");
        exit();
    }

    public function delete($id)
    {
        $this->certificateModel->delete($id);
        session()->setFlashdata('success', 'Certificate Deleted');
        return redirect()->to('/mydashboard');
    }

    public function viewGenerate()
    {
        if (session()->get('email') == NULL) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('/login');
        }
        return view('generateCertificate/generate_certificate');
    }
}
