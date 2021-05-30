<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <a class="btn btn-primary mb-3" href="<?= base_url('admin/potongan_gaji/tambah'); ?>"> <i class="fas fa-plus"> Tambah Data </i></a>


    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Jenis Potongan</th>
            <th class="text-center">Jumlah Potongan</th>
            <th class="text-center">Active</th>
        </tr>
        <?php $no = 1;
        foreach ($potongan as $pt) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pt['jenis_potongan']; ?></td>
                <td><?= $pt['jumlah_potongan']; ?></td>
                <td>
                    <center>
                        <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Yakin dihapus!')" class="btn btn-danger" href="<?= base_url('admin/potongan_gaji/hapus/' . $pt['id']); ?>"><i class="fas fa-trash"> </i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<!-- /.container-fluid -->