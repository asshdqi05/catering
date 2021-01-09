<div class="container">
    <div class="row">
        <div class="card col-sm-12">
            <div class="card-header">
                <h3 class="card-title">Laporan DF Catering</h3>
            </div>
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('C_laporan/cetak_karyawan') ?>" target="_blank">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header" style="background-color: #ffc107">
                                                <div class="card-title">Laporan Data Karyawan</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('C_laporan/cetak_pemesanan_perperiode') ?>" target="_blank">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header" style="background-color: #ffc107">
                                                <div class="card-title">Laporan Pemesanan Perperiode</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" name="tanggal_awal" id="datepicker" class="form-control" placeholder="Pilih Tanggal Awal" value="<?= set_value('tgl_awal') ?>">
                                                </div>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" name="tanggal_akhir" id="datepicker2" class="form-control" placeholder="Pilih Tanggal Akhir" value="<?= set_value('tgl_akhir') ?>">
                                                </div>
                                                <br>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('C_laporan/cetak_pendapatan_perperiode') ?>" target="_blank">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header" style="background-color: #ffc107">
                                                <div class="card-title">Laporan Pendapatan Perperiode</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" name="tanggal_awal" id="datepicker3" class="form-control" placeholder="Pilih Tanggal Awal" value="<?= set_value('tgl_awal') ?>">
                                                </div>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" name="tanggal_akhir" id="datepicker4" class="form-control" placeholder="Pilih Tanggal Akhir" value="<?= set_value('tgl_akhir') ?>">
                                                </div>
                                                <br>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('C_laporan/cetak_pengeluaran_perperiode') ?>" target="_blank">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header" style="background-color: #ffc107">
                                                <div class="card-title">Laporan Pengeluaran Perperiode</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" name="tanggal_awal" id="datepicker5" class="form-control" placeholder="Pilih Tanggal Awal" value="<?= set_value('tgl_awal') ?>">
                                                </div>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" name="tanggal_akhir" id="datepicker6" class="form-control" placeholder="Pilih Tanggal Akhir" value="<?= set_value('tgl_akhir') ?>">
                                                </div>
                                                <br>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>