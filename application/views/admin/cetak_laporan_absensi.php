<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
    </style>
</head>

<body>
    <center>
        <h1>PT.MAJU BERSAMA</h1>
        <h2>Laporan Kehadiran Karyawan</h2>
    </center>
    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }
    ?>
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
    </table>

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jabatan</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Alpha</th>
        </tr>

        <?php $no = 1;
        foreach ($laporan_kehadiran as $lk) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $lk['nama']; ?></td>
                <td><?= $lk['nik']; ?></td>
                <td><?= $lk['nama_jabatan']; ?></td>
                <td><?= $lk['hadir']; ?></td>
                <td><?= $lk['sakit']; ?></td>
                <td><?= $lk['alpha']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>