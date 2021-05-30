<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Bulan/Tahun</th>
            <th>Gaji Pokok</th>
            <th>Transport</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Cetak Slip</th>
        </tr>

        <?php foreach ($potongan as $p) {
            $alpha = $p['jumlah_potongan'];
        }  ?>

        <?php foreach ($gaji as $g) : ?>
            <?php $potongan = $g['alpha'] * $alpha ?>
            <tr>
                <td><?= $g['bulan']; ?></td>
                <td><?= number_format($g['gaji_pokok'], 0, ',', '.'); ?></td>
                <td><?= number_format($g['transport'], 0, ',', '.'); ?></td>
                <td><?= number_format($g['uang_makan'], 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($potongan, 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($g['gaji_pokok'] + $g['transport'] + $g['uang_makan'] - $potongan, 0, ',', '.'); ?></td>
                <td>
                    <center>
                        <a href="<?= base_url('karyawan/data_gaji/cetak_slip/' . $g['id']); ?>" class="btn btn-primary"><i class="fas fa-print"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
<!-- /.container-fluid -->