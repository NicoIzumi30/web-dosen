<?php
include 'header.php';
if (isset($_POST['save'])) {
    $insert = $mata_kuliah->simpan_mata_kuliah(
        kode: $_POST['kode'],
        nama: $_POST['nama'],
        diskusi: $_POST['diskusi'],
        praktikum: $_POST['praktikum'],
        responsi: $_POST['responsi'],
        uts: $_POST['uts'],
        uas: $_POST['uas'],
    );
    echo '<script>' . $insert . '</script>';
}
if (isset($_POST['update'])) {
    $update = $mata_kuliah->ubah_mata_kuliah(
        $_POST['id'],
        kode: $_POST['kode'],
        nama: $_POST['nama'],
        diskusi: $_POST['diskusi'],
        praktikum: $_POST['praktikum'],
        responsi: $_POST['responsi'],
        uts: $_POST['uts'],
        uas: $_POST['uas'],
    );
    echo '<script>' . $update . '</script>';
}
if (isset($_GET['hapus'])) {
    $delete = $mata_kuliah->hapus_mata_kuliah($_GET['hapus'], );
    echo '<script>' . $delete . '</script>';
}
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Title and Top Buttons Start -->
                <div class="page-title-container">
                    <div class="row">
                        <!-- Title Start -->
                        <div class="col-12 col-md-7">
                            <h1 class="mb-0 pb-0 display-4" id="title">Mata Kuliah</h1>
                            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Mata Kuliah</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Title End -->

                        <!-- Top Buttons Start -->
                        <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                            <!-- Add New Button Start -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#tambah">Tambah Mata Kuliah</button>
                            <!-- Modal -->
                            <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelDefault">Tambah Mata Kuliah
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <!-- <i data-cs-icon="close"></i> -->
                                            </button>
                                        </div>
                                        <form action="mata_kuliah.php" method="post">
                                            <div class="modal-body">
                                                <div class="mb-3 position-relative form-group">
                                                    <label class="form-label">Kode Mata Kuliah</label>
                                                    <input type="text" class="form-control" name="kode" />
                                                </div>
                                                <div class="mb-3 position-relative form-group">
                                                    <label class="form-label">Nama Mata Kuliah</label>
                                                    <input type="text" class="form-control" name="nama" />
                                                </div>
                                                <h4>Point Penilaian (%)</h4>
                                                <hr>
                                                <div class="row d-flex justify-content-center text-center">
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">Diskusi</label>
                                                            <input type="number" min="0" max="100" class="form-control"
                                                                name="diskusi" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">Praktikum</label>
                                                            <input type="number" min="0" max="100" class="form-control"
                                                                name="praktikum" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">Responsi</label>
                                                            <input type="number" min="0" max="100" class="form-control"
                                                                name="responsi" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">UTS</label>
                                                            <input type="number" min="0" max="100" class="form-control"
                                                                name="uts" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">UAS</label>
                                                            <input type="number" min="0" max="100" class="form-control"
                                                                name="uas" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="save" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Add New Button End -->

                        </div>
                        <!-- Top Buttons End -->
                    </div>
                </div>
                <!-- Title and Top Buttons End -->

                <!-- Content Start -->
                <div class="data-table-rows slim">
                    <!-- Controls Start -->
                    <div class="row">
                        <!-- Search Start -->
                        <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                            <div
                                class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                                <input class="form-control datatable-search" placeholder="Search"
                                    data-datatable="#datatableRows" />
                                <span class="search-magnifier-icon">
                                    <i data-cs-icon="search"></i>
                                </span>
                                <span class="search-delete-icon d-none">
                                    <i data-cs-icon="close"></i>
                                </span>
                            </div>
                        </div>
                        <!-- Search End -->

                        <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                            <div class="d-inline-block">
                                <!-- Print Button Start -->

                                <!-- Length Start -->
                                <div class="dropdown-as-select d-inline-block datatable-length"
                                    data-datatable="#datatableRows" data-childSelector="span">
                                    <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                                        <span class="btn btn-foreground-alternate dropdown-toggle"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0"
                                            title="Item Count">
                                            10 Items
                                        </span>
                                    </button>
                                    <div class="dropdown-menu shadow dropdown-menu-end">
                                        <a class="dropdown-item" href="#">5 Items</a>
                                        <a class="dropdown-item active" href="#">10 Items</a>
                                        <a class="dropdown-item" href="#">20 Items</a>
                                    </div>
                                </div>
                                <!-- Length End -->
                            </div>
                        </div>
                    </div>
                    <!-- Controls End -->

                    <!-- Table Start -->
                    <div class="data-table-responsive-wrapper">
                        <table id="datatableRows" class="data-table nowrap hover">
                            <thead>
                                <tr>
                                    <th class="text-muted text-small text-uppercase">No</th>
                                    <th class="text-muted text-small text-uppercase">Kode</th>
                                    <th class="text-muted text-small text-uppercase">Nama</th>
                                    <th class="text-muted text-small text-uppercase">Diskusi</th>
                                    <th class="text-muted text-small text-uppercase">Praktikum</th>
                                    <th class="text-muted text-small text-uppercase">Responsi</th>
                                    <th class="text-muted text-small text-uppercase">UTS</th>
                                    <th class="text-muted text-small text-uppercase">UAS</th>
                                    <th>Action</th>
                                    <!-- <th class="empty">&nbsp;</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $list_matkul = $mata_kuliah->tampil_mata_kuliah();
                                foreach ($list_matkul as $data):
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['kode_mata_kuliah'] ?></td>
                                        <td><?= $data['nama_mata_kuliah'] ?></td>
                                        <td><?= $data['diskusi'] ?></td>
                                        <td><?= $data['praktikum'] ?></td>
                                        <td><?= $data['responsi'] ?></td>
                                        <td><?= $data['uts'] ?></td>
                                        <td><?= $data['uas'] ?></td>
                                        <td>
                                            <a href="mata_kuliah.php?hapus=<?= $data['id'] ?>"
                                                class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit<?= $data['id'] ?>">Edit</a>
                                        </td>
                                        <!-- <td></td> -->
                                    </tr>
                                    <div class="modal fade" id="edit<?= $data['id'] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabelDefault">Ubah Mata Kuliah
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <!-- <i data-cs-icon="close"></i> -->
                                                    </button>
                                                </div>
                                                <form action="mata_kuliah.php" method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">Kode Mata Kuliah</label>
                                                            <input type="text" class="form-control"
                                                                value="<?= $data['kode_mata_kuliah'] ?>" name="kode" />
                                                        </div>
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">Nama Mata Kuliah</label>
                                                            <input type="text" class="form-control"
                                                                value="<?= $data['nama_mata_kuliah'] ?>" name="nama" />
                                                        </div>
                                                        <h4>Point Penilaian (%)</h4>
                                                        <hr>
                                                        <div class="row d-flex justify-content-center text-center">
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">Diskusi</label>
                                                                    <input type="number" min="0"
                                                                        value="<?= $data['diskusi'] ?>" max="100"
                                                                        class="form-control" name="diskusi" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">Praktikum</label>
                                                                    <input type="number" min="0"
                                                                        value="<?= $data['praktikum'] ?>" max="100"
                                                                        class="form-control" name="praktikum" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">Responsi</label>
                                                                    <input type="number" min="0"
                                                                        value="<?= $data['responsi'] ?>" max="100"
                                                                        class="form-control" name="responsi" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">UTS</label>
                                                                    <input type="number" min="0" value="<?= $data['uts'] ?>"
                                                                        max="100" class="form-control" name="uts" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">UAS</label>
                                                                    <input type="number" min="0" value="<?= $data['uas'] ?>"
                                                                        max="100" class="form-control" name="uas" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="update" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table End -->
                </div>
                <!-- Content End -->

            </div>
        </div>
    </div>
</main>
<?php
include 'footer.php';
?>