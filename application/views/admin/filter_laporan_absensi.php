<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mx-auto" style="width: 35%;">
        <div class="card-header text-white text-center bg-primary">
            Filter Laporan Gaji Karyawan
        </div>
        <form action="<?= base_url('admin/laporan_absensi/cetak_laporan_absensi'); ?>">
            <div class="card-body">
                <div class="form-group row">
                    <label for="" class="inputPassword col-sm-3">Bulan</label>
                    <div class="col-sm-9">
                        <select name="bulan" id="" class="form-control ">
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
                </div>
                <div class="form-group row">
                    <label for="" class="inputPassword col-sm-3">Tahun</label>
                    <div class="col-sm-9">
                        <select name="tahun" id="" class="form-control ">
                            <option value="">--Pilih Tahun--</option>

                            <?php $tahun = date('Y');

                            for ($i = 2020; $i < $tahun + 5; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i;; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" style="width: 100%;"><i class="fas fa-print"></i> Cetak Laporan Gaji</button>
            </div>
    </div>

</div>
</form>
<!-- /.container-fluid -->