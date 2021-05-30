<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>

    <a class="btn btn-primary mb-3" href="<?= base_url('admin/data_karyawan/tambah'); ?>"> <i class="fas fa-plus"> Tambah Data </i></a>

    <?= $this->session->flashdata('pesan'); ?>
    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center"> NIK</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Photo</th>
            <th class="text-center">Hak_akses</th>
            <th class="text-center">Active</th>
        </tr>
        <?php $no = 1;
        foreach ($karyawan as $kyn) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $kyn['nama']; ?></td>
                <td><?= $kyn['nik']; ?></td>
                <td><?= $kyn['jenis_kelamin']; ?></td>
                <td><?= $kyn['jabatan']; ?></td>
                <td><?= $kyn['tanggal_masuk']; ?></td>
                <td><?= $kyn['status']; ?></td>
                <td><?= $kyn['photo']; ?></td>
                <?php if ($kyn['hak_akses'] == '1') { ?>
                    <td>Admin</td>
                <?php } else { ?>
                    <td>Karyawan</td>
                <?php } ?>

                <td>
                    <center>
                        <a class="btn btn-primary" href="<?= base_url('admin/data_karyawan/ubah/' . $kyn['id']); ?>"><i class="fas fa-edit"> </i></a>
                        <a onclick="return confirm('Yakin dihapus!')" class="btn btn-danger" href="<?= base_url('admin/data_karyawan/hapus/' . $kyn['id']); ?>"><i class="fas fa-trash"> </i></a>


                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>