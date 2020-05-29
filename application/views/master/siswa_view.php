<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Master / Siswa </li>
            </ol>

            <div class="row">
                <div class="col-xl-12">
                    <?= $this->session->flashdata('notif') ?>
                </div>
            </div>

            <div id="testDes"></div>

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Import Data Siswa</div>
                <div class="card-body">
                    <form id="upload_form" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="file_nya" id="fileku" class="filestyle" data-buttonText=" Cari file" data-iconName="fa fa-folder-open-o">
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary" onclick="uploadFile()"><span class="fa fa-upload"></span> Upload !</button>
                        </div>

                        <div id="progress-import-siswa" class="progress">
                            <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                <span id="status"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </main>