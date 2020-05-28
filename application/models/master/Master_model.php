<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    // Insert Data Siswa
    public function insertDataSiswa($nis, $nama, $kelas, $wali, $alamat)
    {
        $query = "INSERT into data_pegawai values('$nis','$nama','$kelas','$wali','$alamat')";
        $this->db->query($query);
    }
}
