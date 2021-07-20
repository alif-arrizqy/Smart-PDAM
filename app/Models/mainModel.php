<?php

namespace App\Models;

use CodeIgniter\Model;

class mainModel extends Model
{

    // profile -----------------------------------------------------------
    public function myprofile()
    {
        return $this->db->table('users')
            ->where('id_user', session()->get('id_user'))->get();
    }

    public function list_user()
    {
        $query = $this->db->query("SELECT * FROM users WHERE status='2' ORDER BY id_user ASC")->getResultArray();
        return $query;
    }

    public function detail_user($provinces_id, $regency_id, $district_id, $villages_id)
    {
        $query = $this->db->query("SELECT a.*, b.*, c.*, d.*, e.* FROM users AS a INNER JOIN provinces AS b ON a.`provinces_id`=b.`provinces_id` 
        INNER JOIN regencies AS c ON a.regency_id=c.regency_id
        INNER JOIN districts AS d ON a.district_id=d.district_id
        INNER JOIN villages AS e ON a.villages_id=e.villages_id
        WHERE b.provinces_id='$provinces_id' AND c.regency_id='$regency_id' AND d.district_id='$district_id' AND e.villages_id='$villages_id' ORDER BY b.name,c.name,d.name,e.name ASC");
        return $query;
    }

    // Token ------------------------------------------------------------------
    // get kode otomatis
    public function auto_kode()
    {
        $query = $this->db->query("SELECT max(right(kode, 3)) as kd, max(right(id_token, 3)) AS idtok FROM token");
        return $query;
    }

    public function addToken($kirimdata)
    {
        $query = $this->db->table('token')->insert($kirimdata);
        return $query;
    }


    // relay ----------------------------------------------------------------
    public function findKode($kirimdata)
    {
        $query = $this->db->query("SELECT * FROM relay WHERE kode = '$kirimdata'");
        return $query;
    }

    // menambahkan data id user dan id token, pada saat pengisian token di web
    public function addRelay($kirimdata2)
    {
        $query = $this->db->table('relay')->insert($kirimdata2);
        return $query;
    }

    // cari relay aktif untuk dikirimkan ke nodemcu
    public function getRelayAktif($token_id, $user_id, $relay_akt)
    {
        $query = $this->db->query("SELECT * FROM relay 
        WHERE id_token='$token_id' AND id_user='$user_id' AND relay_status='$relay_akt'");
        return $query;
    }

    public function updateRelay($kirimdata)
    {
        $query = $this->db->table('relay')->where('id_token', $kirimdata['id_token'])->update($kirimdata);
        return $query;
    }

    // save data sensor waterflow
    public function add_data_waterflow($kirimdata)
    {
        $query = $this->db->table('data_sensor')->insert($kirimdata);
        return $query;
    }

    // 
    public function total_air($bulan)
    {
        // $query = $this->db->query("SELECT SUM(jumlah) AS total_jumlah FROM token WHERE bulan = '$bulan'");
        // return $query;
    }
}
