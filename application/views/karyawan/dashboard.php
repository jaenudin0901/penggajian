<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>

    </div>

    <div class="alert alert-success font-weight-bold mb-4" style="max-width: 65%;">Selamat datang, Anda login sebagai karyawan</div>



    <!-- Content Row -->
    <div class="card mb-3" style="max-width: 65%;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/') . $user['photo']; ?> " class="card-img">
                <!-- <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" -->
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Bergabung Sejak <?= $user['tanggal_masuk']; ?> </small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->