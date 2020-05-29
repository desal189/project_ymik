<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Master</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Master / Data Tahunan </li>
            </ol>

            <div class="row">
                <div class="col-xl-12">
                    <?= $this->session->flashdata('pesan') ?>
                    <?= form_error('tahun_ajaran', '<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>') ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Tab Menu -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab1" role="tab" data-toggle="tab">Tahun Ajaran</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab2" role="tab" data-toggle="tab">Kelas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab3" role="tab" data-toggle="tab">Jalur PMDK</a>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content"><br>

                                <!-- Tahun Ajaran -->
                                <div role="tabpanel" class="tab-pane active" id="tab1">

                                    <form action="<?= base_url('master/tambahTahunAjaran') ?>" method="POST" autocomplete="off">
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-success btn-sm" id="btnAddTahunAjaran">
                                                    <i class='fa fa-plus' aria-hidden='true'></i> Tahun Ajaran
                                                    Baru </button>
                                            </div>
                                            <div class="col-md-3" id="txtTahunAjaran"></div>
                                            <div class="col-md-2" id="btnSaveTahunAjaran"></div>
                                        </div>
                                    </form>

                                    <br>

                                    <table class="table table-bordered" id="tahunAjaran" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th width="70%">Tahun Ajaran</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($tahun_ajar as $ta) : ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $ta['tahun_ajaran'] ?></td>
                                                    <td id="tahunAjaranAction" class="text-center ">
                                                        <button type="button" class="btn btn-warning btn-sm   edit-tahunAjaran" style="color:#fff" data-toggle="modal" data-target="#editTaModal" data-idtahunajaran="<?= $ta['id_tahun'] ?>" data-tahunajaran="<?= $ta['tahun_ajaran'] ?>">Edit</button>
                                                        <a href="<?= base_url('master/hapusTahunAjar/') . $ta['id_tahun'] ?>"> <button type="button" class="btn btn-danger btn-sm" style="color:#fff" onclick="return confirm('Apakah Anda Yakin Ingin  menghapus data ini ?')">Hapus</button></a>
                                                    </td>
                                                </tr>
                                                <?php $i++ ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab2">

                                    <button class="btn btn-primary mb-3 float-right add-kelas" data-toggle="modal" data-target="#kelasModal"><i class="fas fa-plus"></i> Tambah Kelas</button>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataSiswa" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun Ajar</th>
                                                    <th>Tingkatan</th>
                                                    <th>Nama</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($kelas as $k) : ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $k['tahun_ajaran'] ?></td>
                                                        <td><?= $k['tingkat_kelas'] ?></td>
                                                        <td><?= $k['nama_kelas'] ?></td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-warning btn-sm edit-kelas" style="color:#fff" data-toggle="modal" data-target="#kelasModal" data-kelasId="<?= $k['id_kelas'] ?>">Edit</button>
                                                            <a href="<?= base_url('master/hapusKelas/') . $k['id_kelas'] ?>"> <button type="button" class="btn btn-danger btn-sm" style="color:#fff" onclick="return confirm('Apakah Anda Yakin Ingin  menghapus data ini ?')">Hapus</button></a>
                                                        </td>
                                                        </td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab3">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>

                        </div>
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

    <!-- Modal Tahun Ajaran -->
    <div class="modal fade" id="editTaModal" tabindex="-1" role="dialog" aria-labelledby="editTaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTaModalLabel">Edit Tahun Ajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('master/editTahunAjar') ?>" method="POST" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="ta_id" name="ta_id">
                            <input type="text" class="form-control" id="edit_tahunAjar" name="edit_tahunAjar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah tahun Ajaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Kelas-->
    <div class="modal fade " id="kelasModal" tabindex="-1" role="dialog" aria-labelledby="kelasModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kelasModalLabel">Tambah Kelas Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('master/tambahKelas') ?>" method="POST" class="form-kelas" autocomplete="off">
                    <input type="hidden" name="kelas_id" id="kelas_id">
                    <div class="modal-body kelas-body">
                        <div class="form-group">
                            <select id="id_tahun_ajaran" name="id_tahun_ajaran" class="custom-select">
                                <option value="default" selected>Pilih Tahun Ajaran</option>
                                <?php foreach ($tahun_ajar as $ta) : ?>
                                    <option value="<?= $ta['id_tahun'] ?>"><?= $ta['tahun_ajaran'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="tingkatan" name="tingkatan" class="custom-select">
                                <option value="default" selected>Pilih Tingkatan Kelas</option>
                                <option value="12">12</option>
                                <option value="11">11</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Tuliskan Nama Kelas">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Kelas Baru</button>
                    </div>
                </form>
            </div>
        </div>
    </div>