<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
    </style>
</head>

<body>
    <center>
        <h1>PT. MAJU BERSAMA</h1>
        <h2>Daftar Gaji</h2>
    </center>

    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan = date('M');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    } ?>

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?= $bulan; ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= $tahun; ?></td>
        </tr>
    </table><br>
    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Karyawan</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Transport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Potongan </th>
            <th class="text-center">Total gaji</th>
        </tr>

        <?php foreach ($potongan as $p) {
            $alpha = $p['jumlah_potongan'];
        }  ?>

        <?php $no = 1;
        foreach ($gaji as $g) : ?>
            <?php $potongan = $g['alpha'] * $alpha ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $g['nik']; ?></td>
                <td><?= $g['nama']; ?></td>
                <td><?= $g['jenis_kelamin']; ?></td>
                <td><?= $g['nama_jabatan']; ?></td>

                <td>Rp.<?= number_format($g['gaji_pokok'], 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($g['transport'], 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($g['uang_makan'], 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($potongan, 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($g['gaji_pokok'] + $g['transport'] + $g['uang_makan'] - $potongan, 0, ',', '.'); ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Jakarata, <?= date("d M Y"); ?> <br>Finance</p>
                <br><br><br>
                <p>___________________</p>
            </td>
        </tr>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>