<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h2>SLIP GAJI KARYAWAN</h2>
        <hr style="50%; border-width=5px; color:black;">
    </center>


    <?php foreach ($potongan as $p) {
        $potongan = $p['jumlah_potongan'];
    }
    ?>
    <?php
    foreach ($print_slip as $ps) : ?>

        <?php $potongan_gaji = $ps['alpha'] * $potongan; ?>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $ps['nama']; ?></td>
            </tr>
            <tr>
                <td>Nik</td>
                <td>:</td>
                <td><?= $ps['nik']; ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $ps['nama_jabatan']; ?></td>
            </tr>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?= substr($ps['bulan'], 0, 2); ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= substr($ps['bulan'], 2, 4); ?></td>
            </tr>
        </table>

        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Gaji Pokok</td>
                <td>Rp.<?= number_format($ps['gaji_pokok'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Transport</td>
                <td>Rp.<?= number_format($ps['transport'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Uang Makan</td>
                <td>Rp.<?= number_format($ps['uang_makan'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Potongan</td>
                <td>Rp.<?= number_format($potongan_gaji, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th colspan="2" style="text-align: right;">Total Gaji</th>
                <td>Potongan</td>
                <td>Rp.<?= number_format($ps['gaji_pokok'] + $ps['transport'] + $ps['transport'] - $potongan_gaji, 0, ',', '.'); ?></td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td></td>
                <td>
                    <p>Karyawan</p>
                    <br>
                    <br>
                    <p class="font-weight-bold"><?= $ps['nama']; ?></p>
                </td>

                <td width=200px>
                    <p>Jakarta, <?= date("d M Y") ?><br>Finance</p>
                    <br><br>
                    <p>____________________</p>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>

    <script>
        window.print();
    </script>
</body>

</html>