<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AuthModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function indexLogin()
    {
        if (session()->get('email') != NULL) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('/mydashboard');
        }
        return view('auth/login');
    }

    public function indexRegister()
    {
        if (session()->get('email') != NULL) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('/mydashboard');
        }
        return view('auth/register');
    }

    public function register()
    {
        // Validasi input
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[6]',
            'password2' => 'required|matches[password]'
        ];

        // Jika validasi gagal, kembali ke halaman register dengan pesan error
        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to('/register')->withInput();
        }

        // Menggunakan htmlspecialchars untuk mencegah XSS
        $data = [
            'name' => htmlspecialchars($this->request->getVar('name'), ENT_QUOTES, 'UTF-8'),
            'email' => htmlspecialchars($this->request->getVar('email'), ENT_QUOTES, 'UTF-8'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT) // Menggunakan password hashing untuk keamanan
        ];

        $model = new UserModel();
        $model->insert($data);
        session()->setFlashdata('success', 'Registration Successful, Please Login!');
        return redirect()->to('/login');
    }

    public function login()
    {
        // Validasi input
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        // Jika validasi gagal, kembali ke halaman login dengan pesan error
        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to('/login')->withInput();
        }

        $model = new AuthModel();
        // Menggunakan htmlspecialchars untuk mencegah XSS
        $email = htmlspecialchars($this->request->getVar('email'), ENT_QUOTES, 'UTF-8');
        $password = $this->request->getVar('password');

        $row = $model->get_data_login($email);
        // Jika email tidak ditemukan atau password salah, kembali ke halaman login dengan pesan error
        if ($row === NULL || !password_verify($password, $row['password'])) {
            session()->setFlashdata('pesan', 'Login Failed');
            return redirect()->to('/login');
        }

        // Jika login berhasil, set data session
        $data = [
            'log' => TRUE,
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email']
        ];
        session()->set($data);
        session()->setFlashdata('success', 'Login Successful');
        return redirect()->to('/mydashboard');
    }

    public function logout()
    {
        // Menghancurkan session untuk mengamankan logout
        session()->destroy();
        session()->setFlashdata('success', 'Logout Successful');
        return redirect()->to('/');
    }
}
