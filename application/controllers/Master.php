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
		$data['tahun_ajar'] = $this->db->get('tb_tahun_ajaran')->result_array();
		$data['kelas'] = $this->master->getKelas();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('master/dataTahunan_view', $data);
		$this->load->view('templates/footer');
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




	public function importSiswa()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$config['upload_path'] = realpath('excel');
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_nya')) {
			//upload gagal
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>PROSES IMPORT GAGAL!</strong> ' . $this->upload->display_errors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			//redirect halaman
			redirect('master/siswa');
		} else {
			$data_upload = $this->upload->data();

			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

			$data = array();

			$numrow = 1;
			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'nis' => $row['A'],
						'nama' => $row['B'],
						'kelas' => $row['C'],
						'wali' => $row['D'],
						'alamat' => $row['E'],
					));
				}
				$numrow++;
			}

			$nrow = 0;
			foreach ($data as $col) {
				//Insert Data ke Database
				$this->master->insertSiswa($data[$nrow]['nis'], $data[$nrow]['nama'], $data[$nrow]['kelas'], $data[$nrow]['wali'], $data[$nrow]['alamat']);

				$nrow++;
			}

			//delete file from server
			unlink(realpath('excel/' . $data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notif', '<div class="alert  alert-success alert-dismissible fade show" role="alert"><strong>PROSES IMPORT BERHASIL!</strong>  Data berhasil diimport! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			//redirect halaman
			// redirect('master/siswa');
		}
	}
}
