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
                    <label>Nama </label>
                    <input type="text" class="form-control" id="name" name="nama">

                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" class="form-control" id="name" name="nik">
                    <small class="form-text text-danger"><?= form_error('nik'); ?></small>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" id="name" name="jenis_kelamin">
                    <small class="form-text text-danger"><?= form_error('jenis_kelamin'); ?></small>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" id="name" name="jabatan">
                    <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                </div>
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" class="form-control" id="name" name="tanggal_masuk">
                    <small class="form-text text-danger"><?= form_error('tanggal_masuk'); ?></small>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" class="form-control" id="name" name="status">
                    <small class="form-text text-danger"><?= form_error('status'); ?></small>
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input type="text" class="form-control" id="name" name="photo">
                    <small class="form-text text-danger"><?= form_error('photo'); ?></small>
                </div>
                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control" id="">
                        <option value="">--Pilih Hak Akses--</option>
                        <option value="1">Admin</option>
                        <option value="2">Karyawan</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('hak_akses'); ?></small>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="name" name="email">
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="name" name="password">
                    <small class="form-text text-danger"><?= form_error('password'); ?></small>
                </div>
                <button type="submit" class="btn btn-success mb-5 ">Submit</button>

            </form>
        </div>
    </div>
</div>