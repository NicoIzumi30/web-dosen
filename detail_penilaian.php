<?php
include 'header.php';
if (isset($_GET['matkul'])) {
    $mata_kuliah_id = $_GET['matkul'];
    $matkul = $mata_kuliah->ambil_mata_kuliah($mata_kuliah_id);
    if (empty($matkul)) {
        echo '<script>window.location.href = "penilaian.php";</script>';
    }
} else {
    echo '<script>window.location.href = "penilaian.php";</script>';
}
if (isset($_POST['save'])) {
    $insert = $penilaian->simpan_penilaian(
        $_POST['mahasiswa_id'],
        $mata_kuliah_id,
        $_POST['diskusi'],
        $_POST['praktikum'],
        $_POST['responsi'],
        $_POST['uts'],
        $_POST['uas'],
    );
    echo '<script>' . $insert . '</script>';
}
if (isset($_POST['update'])) {
    $update = $penilaian->ubah_penilaian(
        $_POST['id'],
        $mata_kuliah_id,
        $_POST['diskusi'],
        $_POST['praktikum'],
        $_POST['responsi'],
        $_POST['uts'],
        $_POST['uas'],
    );
    echo '<script>' . $update . '</script>';
}
if (isset($_GET['hapus'])) {
    $delete = $penilaian->hapus_penilaian($_GET['hapus'], $mata_kuliah_id);
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
                            <h1 class="mb-0 pb-0 display-4" id="title">Penilaian <?= $matkul['nama_mata_kuliah']; ?>
                            </h1>
                            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Penilaian
                                            <?= $matkul['nama_mata_kuliah']; ?></a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Title End -->

                        <!-- Top Buttons Start -->
                        <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                            <!-- Add New Button Start -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#tambah">Tambah Penilaian</button>
                            <!-- Modal -->
                            <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelDefault">Tambah Penilaian
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <!-- <i data-cs-icon="close"></i> -->
                                            </button>
                                        </div>
                                        <form action="detail_penilaian.php?matkul=<?= $mata_kuliah_id ?>" method="post">
                                            <div class="modal-body">
                                                <div class="mb-3 position-relative form-group">
                                                    <label class="form-label">Nama Mahasiswa</label>
                                                    <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                                                        <option value="" disabled selected>-- Pilih Mahasiswa --
                                                        </option>
                                                        <?php
                                                        $list_mahasiswa = $mahasiswa->tampil_mahasiswa();
                                                        foreach ($list_mahasiswa as $data) {
                                                            ?>
                                                            <option value="<?= $data['id']; ?>"><?= $data['nama']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <h4>Penilaian</h4>
                                                <hr>
                                                <div class="row d-flex justify-content-center text-center">
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">Diskusi
                                                                (<?= $matkul['diskusi']; ?>%)</label>
                                                            <input type="number" min="0" max="1400" class="form-control"
                                                                name="diskusi" />
                                                                <small>Max : 1400</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">Praktikum
                                                                <?= $matkul['praktikum']; ?>%)</label>
                                                            <input type="number" min="0" max="1300" class="form-control"
                                                                name="praktikum" />
                                                                <small>Max : 1300</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">Responsi
                                                                <?= $matkul['responsi']; ?>%)</label>
                                                            <input type="number" min="0" max="200" class="form-control"
                                                                name="responsi" />
                                                                <small>Max : 200</small>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">UTS
                                                                <?= $matkul['uts']; ?>%)</label>
                                                            <input type="number" min="0" max="100" class="form-control"
                                                                name="uts" />
                                                                <small>Max : 100</small>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3 position-relative form-group">
                                                            <label class="form-label">UAS
                                                                (<?= $matkul['uas']; ?>%)</label>
                                                            <input type="number" min="0" max="100" class="form-control"
                                                                name="uas" />
                                                                <small>Max : 100</small>
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
                                    <th class="text-muted text-small text-uppercase">NIM</th>
                                    <th class="text-muted text-small text-uppercase">Nama</th>
                                    <th>Total Nilai</th>
                                    <th>Kategori Nilai</th>
                                    <th>Action</th>
                                    <!-- <th class="empty">&nbsp;</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $list_penilaian = $penilaian->tampil_penilaian($mata_kuliah_id);
                                foreach ($list_penilaian as $data):
                                    $diskusi = ($data['diskusi'] / 1400) * 100;
                                    $praktikum = (($data['praktikum'] / 1300) * 100);
                                    $responsi = ($data['responsi'] / 200) * 100;
                                    $uts = $data['uts'];
                                    $uas = $data['uas'];
                                    $nilai_akhir = ($diskusi * 0.14) +
                                        ($praktikum * 0.26) +
                                        ($responsi * 0.15) +
                                        ($uts * 0.20) +
                                        ($uas * 0.25);
                                    $kategori = "";
                                    if ($nilai_akhir >= 81) {
                                        $kategori = "A";
                                    } elseif ($nilai_akhir >= 65) {
                                        $kategori = "B";
                                    } elseif ($nilai_akhir >= 50) {
                                        $kategori = "C";
                                    } else {
                                        $kategori = "D";
                                    }
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['nim'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $nilai_akhir ?></td>
                                        <td><?= $kategori ?></td>
                                        <td>
                                            <a href="detail_penilaian.php?hapus=<?= $data['id'] ?>&matkul=<?= $mata_kuliah_id ?>"
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
                                                    <h5 class="modal-title" id="exampleModalLabelDefault">Ubah Mata
                                                        Penilaian
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <!-- <i data-cs-icon="close"></i> -->
                                                    </button>
                                                </div>
                                                <form action="detail_penilaian.php?matkul=<?= $mata_kuliah_id ?>"
                                                    method="post">
                                                    <div class="modal-body">
                                                        <h4>Penilaian</h4>
                                                        <hr>
                                                        <div class="row d-flex justify-content-center text-center">
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">Diskusi
                                                                        (<?= $matkul['diskusi']; ?>%)</label>
                                                                    <input type="number" min="0"
                                                                        value="<?= $data['diskusi'] ?>" class="form-control"
                                                                        name="diskusi" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">Praktikum
                                                                        (<?= $matkul['praktikum']; ?>%)</label>
                                                                    <input type="number" min="0"
                                                                        value="<?= $data['praktikum'] ?>"
                                                                        class="form-control" name="praktikum" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">Responsi
                                                                        (<?= $matkul['responsi']; ?>%)</label>
                                                                    <input type="number" min="0"
                                                                        value="<?= $data['responsi'] ?>"
                                                                        class="form-control" name="responsi" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">UTS
                                                                        (<?= $matkul['uts']; ?>%)</label>
                                                                    <input type="number" min="0" value="<?= $data['uts'] ?>"
                                                                        class="form-control" name="uts" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative form-group">
                                                                    <label class="form-label">UAS
                                                                        (<?= $matkul['uas']; ?>%)</label>
                                                                    <input type="number" min="0" value="<?= $data['uas'] ?>"
                                                                        class="form-control" name="uas" />
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