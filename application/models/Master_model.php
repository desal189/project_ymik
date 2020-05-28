<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function insertTahunAjaran($thnAjar)
    {

        $data = [
            // sanitasi data
            'tahun_ajaran' => htmlspecialchars(filter_var($thnAjar))
        ];

        // insert data
        $this->db->insert('tahun_ajaran', $data);
        // tampilkan pesan berhasil
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
							Tahun Ajaran baru berhasil ditambahkan !
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>'
        );
        // alihkan kembali ke halaman master/data tahunan
        redirect('master/dataTahunan');
    }

    public function editTahunAjaran($thnAjar, $id)
    {
        $thnAjar = htmlspecialchars(filter_var($thnAjar));
        $id = htmlspecialchars(filter_var($id));
        // Update data
        $this->db->query("UPDATE tahun_ajaran
				        SET tahun_ajaran = '$thnAjar'
                        WHERE id = $id");

        // tampilkan pesan berhasil
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
							Tahun Ajaran baru berhasil diubah !
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>'
        );
        // alihkan kembali ke halaman master/data tahunan
        redirect('master/dataTahunan');
    }


    public function deleteTahunAjaran($id)
    {
        $id = htmlspecialchars(filter_var($id));
        // Update data
        $this->db->query("DELETE FROM tahun_ajaran WHERE id = $id");

        // tampilkan pesan berhasil
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
							Tahun Ajaran baru berhasil di hapus !
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>'
        );
        // alihkan kembali ke halaman master/data tahunan
        redirect('master/dataTahunan');
    }

    public function getKelas()
    {
        $query = "SELECT `kelas`.*, `tahun_ajaran`.`tahun_ajaran`
                  FROM  `kelas` JOIN `tahun_ajaran`
                  ON `kelas`.`id_tahun_ajaran` = `tahun_ajaran`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function getKelasId($id)
    {
        return $this->db->query("SELECT * FROM kelas WHERE id = $id")->row_array();
    }

    public function insertKelas($idTahunAjaran, $tingkat, $nama_kelas)
    {
        $data = [
            'id_tahun_ajaran' => htmlspecialchars(filter_var($idTahunAjaran, FILTER_SANITIZE_STRING)),
            'nama_kelas' => strtoupper(htmlspecialchars(filter_var($nama_kelas, FILTER_SANITIZE_STRING))),
            'tingkat' => htmlspecialchars(filter_var($tingkat, FILTER_SANITIZE_STRING)),
        ];

        $this->db->insert('kelas', $data);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
							Kelas baru berhasil ditambahkan !
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>'
        );
        // alihkan kembali ke halaman master/data tahunan
        redirect('master/dataTahunan');
    }

    public function editkelas($id, $idTahunAjaran, $nama_kelas, $tingkat)
    {
        $id = htmlspecialchars(filter_var($id, FILTER_SANITIZE_STRING));
        $idTahunAjaran = htmlspecialchars(filter_var($idTahunAjaran, FILTER_SANITIZE_STRING));
        $nama_kelas = htmlspecialchars(filter_var($nama_kelas, FILTER_SANITIZE_STRING));
        $tingkat = htmlspecialchars(filter_var($tingkat, FILTER_SANITIZE_STRING));

        $this->db->query("UPDATE kelas
				        SET id_tahun_ajaran = $idTahunAjaran, 
                            nama_kelas = '$nama_kelas',
                            tingkat = $tingkat
                        WHERE id = $id");

        // tampilkan pesan berhasil
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
							Kelas berhasil diubah !
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>'
        );
        // alihkan kembali ke halaman master/data tahunan
        redirect('master/dataTahunan');
    }

    public function deleteKelas($id)
    {
        $id = htmlspecialchars(filter_var($id));
        // Update data
        $this->db->delete('kelas', ['id' => $id]);

        // tampilkan pesan berhasil
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
						    Kelas berhasil di hapus !
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>'
        );
        // alihkan kembali ke halaman master/data tahunan
        redirect('master/dataTahunan');
    }
}
