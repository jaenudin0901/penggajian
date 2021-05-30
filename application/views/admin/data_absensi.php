<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Absensi Karyawan
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2 ml-3">
                    <label for="staticEmail2">Bulan</label>
                    <select name="bulan" id="" class="form-control ml-3">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Febuari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>

                <div class="form-group mb-2 ml-3">
                    <label for="staticEmail2">Tahun</label>
                    <select name="tahun" id="" class="form-control ml-3">
                        <option value="">--Pilih Tahun--</option>

                        <?php $tahun = date('Y');

                        for ($i = 2020; $i < $tahun + 5; $i++) { ?>
                            <option value="<?= $i; ?>"><?= $i;; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-auto ml-auto">
                    <button type="submit" class="btn btn-primary mb-2"> <i class="fas fa-eye"></i> Tampilkan Data</button>
                    <a href="<?= base_url('admin/data_absensi/tambah_absensi') ?>" class="btn btn-success ml-2 mb-2"><i class="fas fa-plus"></i>Input Kehadiran</a>
                </div>
            </form>
        </div>
    </div>

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

    <div class="alert alert-info">Menampilkan Data Kehadiran Karyawan Bulan: <span class="font-weight-bold"><?= $bulan; ?></span> Tahun : <span class="font-weight-bold"></span><?= $tahun; ?></div>

    <?php
    $jml_data = count($absensi);

    if ($jml_data > 0) { ?>

        <table class="table table-bordered table-striped mt-2">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Bulan</th>
                <th class="text-center">Nik</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis Kelamiin</th>
                <th class="text-center">Nama Jabatan</th>
                <th class="text-center">Hadir</th>
                <th class="text-center">Sakit</th>
                <th class="text-center">Alpha</th>
                <th class="text-center">Active</th>
            </tr>
            <?php $no = 1;
            foreach ($absensi as $hadir) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hadir['bulan']; ?></td>
                    <td><?= $hadir['nik']; ?></td>
                    <td><?= $hadir['nama']; ?></td>
                    <td><?= $hadir['jenis_kelamin']; ?></td>
                    <td><?= $hadir['nama_jabatan']; ?></td>
                    <td><?= $hadir['hadir']; ?></td>
                    <td><?= $hadir['sakit']; ?></td>
                    <td><?= $hadir['alpha']; ?></td>


                    <td>
                        <center>
                            <a class="btn btn-primary" href="<?= base_url('admin/data_jabatan/ubah/' . $hadir['id']); ?>"><i class="fas fa-edit"> </i></a>
                            <a onclick="return confirm('Yakin dihapus!')" class="btn btn-danger" href="<?= base_url('admin/data_jabatan/hapus/' . $hadir['id']); ?>"><i class="fas fa-trash"> </i></a>


                        </center>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php } else { ?>
        <div class="alert alert-danger">Data Masih Kosong, silahkan input data bulan dan tahun yang anda pilih <span class="font-weight-bold"></div>

    <?php } ?>
</div>
<!-- /.container-fluid -->