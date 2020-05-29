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
        $this->db->insert('tb_tahun_ajaran', $data);
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
        $this->db->query("UPDATE tb_tahun_ajaran
				        SET tahun_ajaran = '$thnAjar'
                        WHERE id_tahun = $id");

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
        $this->db->query("DELETE FROM tb_tahun_ajaran WHERE id_tahun = $id");

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
        $query = "SELECT A.*, B.tahun_ajaran
                  FROM  tb_kelas A
                  JOIN tb_tahun_ajaran B
                  ON A.id_tahun_ajaran = B.id_tahun";
        return $this->db->query($query)->result_array();
    }

    public function getKelasId($id)
    {
        return $this->db->query("SELECT * FROM tb_kelas WHERE id_kelas = $id")->row_array();
    }

    public function insertKelas($idTahunAjaran, $tingkat, $nama_kelas)
    {
        $data = [
            'id_tahun_ajaran' => htmlspecialchars(filter_var($idTahunAjaran, FILTER_SANITIZE_STRING)),
            'nama_kelas' => strtoupper(htmlspecialchars(filter_var($nama_kelas, FILTER_SANITIZE_STRING))),
            'tingkat_kelas' => htmlspecialchars(filter_var($tingkat, FILTER_SANITIZE_STRING)),
        ];

        $this->db->insert('tb_kelas', $data);

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

        $this->db->query("UPDATE tb_kelas
				        SET id_tahun_ajaran = $idTahunAjaran, 
                            nama_kelas = '$nama_kelas',
                            tingkat_kelas = $tingkat
                        WHERE id_kelas = $id");

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
        $this->db->delete('tb_kelas', ['id_kelas' => $id]);

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


    public function insertSiswa($nis, $nama, $kelas, $wali, $alamat)
    {
        $query = "INSERT INTO tb_siswa (NIS,NamaSiswa,KelasId,WaliSiswa,AlamatSiswa) 
                VALUES ('$nis','$nama','$kelas','$wali','$alamat')";
        $this->db->query($query);
    }
}
