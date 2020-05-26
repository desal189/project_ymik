let btnAddTahunAjaran = document.getElementById('btnAddTahunAjaran');
let btnAddTahunAjaranYN = true;

btnAddTahunAjaran.addEventListener('click', function () {
	let txtTahunAjaran = document.getElementById('txtTahunAjaran');
	let btnSaveTahunAjaran = document.getElementById('btnSaveTahunAjaran');

	if (btnAddTahunAjaranYN) {
		btnAddTahunAjaran.innerHTML = "<i class='fa fa-minus' aria-hidden='true'></i> Cancel";
		txtTahunAjaran.innerHTML = "<input type='text' class='form-control' placeholder='Tahun Ajaran'>";
		btnSaveTahunAjaran.innerHTML = "<input type='submit' class='form-control' >";
		btnAddTahunAjaranYN = false;
	} else {
		btnAddTahunAjaran.innerHTML = "<i class='fa fa-plus' aria-hidden='true'></i> Tahun Ajaran";
		txtTahunAjaran.innerHTML = "";
		btnSaveTahunAjaran.innerHTML = "";
		btnAddTahunAjaranYN = true;
	}
});

