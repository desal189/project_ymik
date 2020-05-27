<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Master_model');
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('home_view');
		$this->load->view('templates/footer');
	}


	// Data Tahunan
	public function dataTahunan()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('master/dataTahunan_view');
		$this->load->view('templates/footer');
	}


	// Siswa
	public function siswa()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('master/siswa_view');
		$this->load->view('templates/footer');
	}

	public function importSiswa()
	{
		// Import Library
		include APPPATH . 'third_party/excel_reader2/excel_reader2.php';

		// upload file xls
		$target = basename($_FILES['fileSiswa']['name']);
		move_uploaded_file($_FILES['fileSiswa']['tmp_name'], $target);

		// beri permision  agar file xls dapat di baca
		chmod($_FILES['fileSiswa']['name'], 0777);

		// mengambil isi file xls
		$data = new Spreadsheet_Excel_Reader($_FILES['fileSiswa']['name'], false);
		// menghitung jumlah baris data yang ada
		$jumlah_baris = $data->rowcount($sheet_index = 0);

		// jumlah default data yang berhasil di import
		$berhasil = 0;
		for ($i = 2; $i <= $jumlah_baris; $i++) {

			// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
			$nis     = $data->val($i, 1);
			$nama     = $data->val($i, 2);
			$kelas   = $data->val($i, 3);
			$wali  = $data->val($i, 4);
			$alamat  = $data->val($i, 4);

			if ($nis != "" && $nama != "" && $kelas != "" && $wali != "" && $alamat != "") {
				// input data ke database (table data_pegawai)
				$this->Mpesan_model->getData($nis, $nama, $kelas, $wali, $alamat);
				$berhasil++;
			}
		}

		// hapus kembali file .xls yang di upload tadi
		unlink($_FILES['filepegawai']['name']);
	}
}
