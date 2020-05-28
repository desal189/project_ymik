<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Master / Siswa </li>
            </ol>

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Import Data Siswa</div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('master/importSiswa') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="frmFile">Import Data Siswa Baru</label>
                            <input type="file" class="form-control-file" id="frmFile" name="fileSiswa">
                            <br>
                            <button class="btn btn-success" type="submit">Import</button>
                        </div>
                    </form>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                </div>
            </div>


            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </main>