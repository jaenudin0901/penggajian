<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>

    <a class="btn btn-primary mb-3" href="<?= base_url('admin/data_jabatan/tambah'); ?>"> <i class="fas fa-plus"> Tambah Data </i></a>
    <!-- <a class="btn btn-primary mb-3" href="<?= base_url('admin/data_jabatan/tambahData'); ?>"> <i class="fas fa-plus"> Tambah Data </i></a> -->
    <?= $this->session->flashdata('pesan'); ?>
    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tj. Transport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Total</th>
            <th class="text-center">Active</th>
        </tr>
        <?php $no = 1;
        foreach ($jabatan as $jbtn) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $jbtn['nama_jabatan']; ?></td>
                <td>Rp. <?= number_format($jbtn['gaji_pokok'], 0, ',', '.'); ?></td>
                <td>Rp. <?= number_format($jbtn['transport'], 0, ',', '.'); ?></td>
                <td>Rp. <?= number_format($jbtn['uang_makan'], 0, ',', '.'); ?></td>
                <td>Rp. <?= number_format($jbtn['uang_makan'] + $jbtn['transport'] + $jbtn['gaji_pokok'], 0, ',', '.'); ?></td>

                <td>
                    <center>
                        <a class="btn btn-primary" href="<?= base_url('admin/data_jabatan/ubah/' . $jbtn['id']); ?>"><i class="fas fa-edit"> </i></a>
                        <a onclick="return confirm('Yakin dihapus!')" class="btn btn-danger" href="<?= base_url('admin/data_jabatan/hapus/' . $jbtn['id']); ?>"><i class="fas fa-trash"> </i></a>


                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>