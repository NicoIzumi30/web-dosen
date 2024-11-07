<?php
include 'header.php';
$count_matkul = $mata_kuliah->count();
$count_mahasiswa = $mahasiswa->count();
$count_penilaian = $penilaian->count();
?>
<main>
  <div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
      <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-sm-6">
          <h1 class="mb-0 pb-0 display-4" id="title">Dashboard</h1>
          <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
            <ul class="breadcrumb pt-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
          </nav>
        </div>
        <!-- Title End -->

        <!-- Top Buttons End -->
      </div>
    </div>
    <!-- Title and Top Buttons End -->

    <div class="row">
      <div class="col-lg-12 mb-3">
        <div class="card mb-2 h-100">
          <div class="card-body">
            <h1 class="card-title mb-3">Selamat Datang <?= $user['nama']; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-3">
        <!-- Sales & Stocks Charts Start -->
        <div class="mb-5" data-title="Fancy Charts" data-intro="Some charts over here!" data-step="1">
          <div class="card mb-2 h-auto sh-xl-24">
            <div class="card-body text-center">
              <h2>Total Mahasiswa</h4>
              <h2 class="text-danger"><?= $count_mahasiswa; ?></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-3">
        <!-- Sales & Stocks Charts Start -->
        <div class="mb-5" data-title="Fancy Charts" data-intro="Some charts over here!" data-step="1">
          <div class="card mb-2 h-auto sh-xl-24">
            <div class="card-body text-center">
              <h2>Total Mata Kuliah</h4>
              <h2 class="text-danger"><?= $count_matkul; ?></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-3">
        <!-- Sales & Stocks Charts Start -->
        <div class="mb-5" data-title="Fancy Charts" data-intro="Some charts over here!" data-step="1">
          <div class="card mb-2 h-auto sh-xl-24">
            <div class="card-body text-center">
              <h2>Total Penilaian</h4>
              <h2 class="text-danger"><?= $count_penilaian; ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>


<?php
include 'footer.php';
?>