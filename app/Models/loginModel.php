<?php

namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{
    public function cek_login($username, $password)
    {
        return $this->db->table('users')->where(array('username' => $username, 'password' => $password))
            ->get()->getRowArray();
    }
    
    public function cek_status($status)
    {
        return $this->db->table('users')->where(array('status' => $status))
        ->get()->getRowArray();
    }
}
