<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>


    <div class="card" style="width:60%">
        <div class="card-body">

            <form action="" method="post">
                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="hidden" class="form-control" id="name" name="id" value="<?= $jabatan['id']; ?> ">
                    <input type=" text" class="form-control" id="name" name="nama_jabatan" value="<?= $jabatan['nama_jabatan']; ?> ">
                    <small class=" form-text text-danger"><?= form_error('nama_jabatan'); ?></small>
                </div>
                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="text" class="form-control" id="name" name="gaji_pokok" value="<?= $jabatan['gaji_pokok']; ?> ">
                    <small class="form-text text-danger"><?= form_error('gaji_pokok'); ?></small>
                </div>
                <div class="form-group">
                    <label>Transport</label>
                    <input type="text" class="form-control" id="name" name="transport" value="<?= $jabatan['transport']; ?> ">
                    <small class="form-text text-danger"><?= form_error('transport'); ?></small>
                </div>
                <div class="form-group">
                    <label>Uang makan</label>
                    <input type="text" class="form-control" id="name" name="uang_makan" value="<?= $jabatan['uang_makan']; ?> ">
                    <small class="form-text text-danger"><?= form_error('uang_makan'); ?></small>
                </div>

                <button type="submit" class="btn btn-success mb-5 ">Ubah Data</button>

            </form>

        </div>
    </div>
</div>