const base_url = 'http://localhost/project_ymik/';

let btnAddTahunAjaran = document.getElementById('btnAddTahunAjaran');
let btnAddTahunAjaranYN = true;
const tahunAjaranAction = document.getElementById('tahunAjaranAction');

btnAddTahunAjaran.addEventListener('click', function () {
	let txtTahunAjaran = document.getElementById('txtTahunAjaran');
	let btnSaveTahunAjaran = document.getElementById('btnSaveTahunAjaran');

	if (btnAddTahunAjaranYN) {
		btnAddTahunAjaran.innerHTML = "<i class='fa fa-minus' aria-hidden='true'></i> Cancel";
		txtTahunAjaran.innerHTML = "<input type='text' class='form-control' placeholder='Tahun Ajaran' id='tahun_ajaran' name='tahun_ajaran'>";
		btnSaveTahunAjaran.innerHTML = "<input type='submit' class='form-control' >";
		btnAddTahunAjaranYN = false;
	} else {
		btnAddTahunAjaran.innerHTML = "<i class='fa fa-plus' aria-hidden='true'></i> Tahun Ajaran";
		txtTahunAjaran.innerHTML = "";
		btnSaveTahunAjaran.innerHTML = "";
		btnAddTahunAjaranYN = true;
	}
});


$(function () {

	$('.edit-tahunAjaran').on('click', function () {
		const idTahunAjaran = $(this).data('idtahunajaran');
		const tahunAjaran = $(this).data('tahunajaran');
		$('#edit_tahunAjar').val(tahunAjaran);
		$('#ta_id').val(idTahunAjaran);
	});

	$('.add-kelas').on('click', function () {
		$('#kelasModalLabel').html('Tambah Kelas Baru');
		$('.modal-footer button[type=submit]').html('Tambah Kelas')
		$('.form-kelas').attr('action', 'http://localhost/project_ymik/master/tambahKelas');
		$('#id_tahun_ajaran').val('default');
		$('#tingkatan').val('default');
		$('#nama_kelas').val('');
		$('#kelas_id').val('');
	});

	$('.edit-kelas').on('click', function () {
		$('#kelasModalLabel').html('Ubah Kelas');
		$('.modal-footer button[type=submit]').html('Ubah Kelas');
		$('.form-kelas').attr('action', 'http://localhost/project_ymik/master/editKelas');
		const kelasId = $(this).data('kelasid');
		$.ajax({
			url: 'http://localhost/project_ymik/master/getkelas',
			data: { id: kelasId },
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_tahun_ajaran').val(data.id_tahun_ajaran);
				$('#tingkatan').val(data.tingkat);
				$('#nama_kelas').val(data.nama_kelas);
				$('#kelas_id').val(data.id);
			}
		});
	});
});