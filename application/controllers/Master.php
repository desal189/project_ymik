<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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








	


}
