<?php
include 'header.php';

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
                            <h1 class="mb-0 pb-0 display-4" id="title">Penilaian</h1>
                            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Penilaian</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="row mt-3">
                            <?php
                            $list_matkul = $mata_kuliah->tampil_mata_kuliah();
                            foreach ($list_matkul as $data) {
                                ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h2 class="fw-bold text-white"><?= $data['nama_mata_kuliah']; ?></h2>
                                        </div>
                                        <div class="card-body d-flex align-items-center justify-content-center"
                                            style="height: 200px">
                                            <a href="detail_penilaian.php?matkul=<?= $data['id']; ?>" class="btn btn-primary d-flex align-items-center fw-bold"
                                                style="height: 50px">Beri Penilaian</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Title End -->

                    </div>
                </div>
                <!-- Title and Top Buttons End -->

            </div>
        </div>
    </div>
</main>
<?php
include 'footer.php';
?>