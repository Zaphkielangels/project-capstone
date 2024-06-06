<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'user';

    public function get_data_login($email)
    {
        // Menggunakan prepared statements untuk mencegah SQL Injection
        $sql = "SELECT * FROM user WHERE email = ?";
        $query = $this->db->query($sql, [$email]);
        return $query->getRowArray();
    }
}
