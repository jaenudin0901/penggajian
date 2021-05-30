<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>


    <div class="card" style="width:60%">
        <div class="card-body">
            <!-- <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?> -->
            <form action="" method="post">
                <div class="form-group">
                    <label>Jenis Potongan</label>
                    <input type="text" class="form-control" id="name" name="jenis_potongan">

                    <small class="form-text text-danger"><?= form_error('jenis_potongan'); ?></small>
                </div>
                <div class="form-group">
                    <label>Jumlah Potongan</label>
                    <input type="text" class="form-control" id="name" name="jumlah_potongan">
                    <small class="form-text text-danger"><?= form_error('jumlah_potongan'); ?></small>
                </div>

                <button type="submit" class="btn btn-success mb-5 ">Submit</button>

            </form>
        </div>
    </div>
</div>