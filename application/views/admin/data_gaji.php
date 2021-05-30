<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Gaji Karyawan
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
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php } ?>
                    </select>
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
                } ?>

                <div class="col-auto ml-auto">
                    <button type="submit" class="btn btn-primary mb-2"> <i class="fas fa-eye"></i> Tampilkan Data</button>

                    <?php if (count($gaji) > 0) { ?>
                        <a href="<?= base_url('admin/data_gaji/cetak_gaji?bulan=' . $bulan), '&tahun=' . $tahun ?>" class="btn btn-success ml-2 mb-2"><i class="fas fa-plus"></i>Cetak Daftar Gaji</a>

                    <?php } else { ?>
                        <button class="btn btn-success ml-2 mb-2" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-print"></i>Cetak Daftar Gaji</button>
                    <?php } ?>
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
    $jml_data = count($gaji);

    if ($jml_data > 0) { ?>

        <div class="table-responsive">
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
        <?php } else { ?>
            <div class="alert alert-danger">Data Absensi Masih Kosong, silahkan input data bulan dan tahun yang anda pilih <span class="font-weight-bold"></div>

        <?php } ?>
        </div>
</div>
<!-- /.container-fluid -->




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data Gaji Masih Kosong silahkan Input Absensi terlebih dahulu pada bulan dan tahun yang anda pilih.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>