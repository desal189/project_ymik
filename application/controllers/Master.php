<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master_model', 'master');
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

		$data['tahun_ajar'] = $this->db->get('tahun_ajaran')->result_array();
		$data['kelas'] = $this->master->getKelas();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('master/dataTahunan_view', $data);
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
	public function tambahTahunAjaran()
	{
		$data = htmlspecialchars(filter_var($this->input->post('tahun_ajaran')));
		$this->master->insertTahunAjaran($data);
	}

	public function editTahunAjar()
	{
		if (empty($_POST)) {
			redirect('master');
		}
		$thnAjar = $this->input->post('edit_tahunAjar');
		$id = $this->input->post('ta_id');
		$this->master->editTahunAjaran($thnAjar, $id);
	}

	public function hapusTahunAjar($id)
	{
		$this->master->deleteTahunAjaran($id);
	}

	public function getkelas()
	{
		$id = htmlspecialchars(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
		echo json_encode($this->master->getKelasId($id));
	}

	public function tambahKelas()
	{
		if (empty($_POST)) {
			redirect('master');
		}

		$idTahunAjaran = $this->input->post('id_tahun_ajaran');
		$tingkatan = $this->input->post('tingkatan');
		$nama_kelas = $this->input->post('nama_kelas');

		$this->master->insertKelas($idTahunAjaran, $tingkatan, $nama_kelas);
	}

	public function editKelas()
	{
		if (empty($_POST)) {
			redirect('master');
		}
		$id = $this->input->post('kelas_id');
		$idTahunAjaran = $this->input->post('id_tahun_ajaran');
		$nama_kelas = $this->input->post('nama_kelas');
		$tingkat = $this->input->post('tingkatan');
		$this->master->editkelas($id, $idTahunAjaran, $nama_kelas, $tingkat);
	}

	public function hapusKelas($id)
	{
		$this->master->deleteKelas($id);
	}
}
