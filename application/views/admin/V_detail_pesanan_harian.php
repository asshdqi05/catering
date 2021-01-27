<div class="col-md-12">
    <?php $d = $data_pesanan_harian->row_array();

    if ($d['status_pesanan'] == 1) {
        $status = "Upload Bukti";
    } else if ($d['status_pesanan'] == 2) {
        $status = "Menunggu Konfirmasi";
    } else if ($d['status_pesanan'] == 3) {
        $status = "Dikonfirmasi - Belum Lunas";
    } else if ($d['status_pesanan'] == 5) {
        $status = "Lunas";
    } else if ($d['status_pesanan'] == 4) {
        $status = "Batal";
    }
    ?>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_data_pesanan_masuk/pesanan_harian') ?>" class="btn btn-warning btn-flat">
                <span class="fa fa-arrow-circle-left"></span>
                Kembali
            </a>
        </div>

        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div id="div1">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            <i class=""><img src="<?php echo base_url('assets/') ?>dist/img/dflogo.jpg" width="50" height="50" alt=""></i> DF Catring
                        </h1>
                        <small class="float-right"><?php echo $d['tanggal'] ?></small>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row">
                    <div class="col-sm-2">
                        <div class="col-sm">
                            <p>ID Pesanan </p>
                            <p>Nama Pelanggan </p>
                            <p>Status Sewa </p>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="col-sm">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="col-sm">
                            <strong>
                                <p><?php echo $d['id_pesanan_harian'] ?></p>
                                <p><?php echo $d['nama_pelanggan'] ?></p>
                                <p><?php echo $status ?></p>
                            </strong>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="50" align="center">NO</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>QTY(Porsi)</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1;
                                $total = 0;
                                foreach ($detail_pesanan_harian->result_array() as $dt) {
                                    $subtotal = $dt['harga'] * $dt['dt_jumlah'];
                                    $total = $total + $subtotal; ?>
                                    <tr>
                                        <td align="center"><?php echo $nomor ?></td>
                                        <td><?php echo $dt['nama_menu'] ?></td>
                                        <td><?php echo "Rp " . number_format($dt['harga']) ?></td>
                                        <td><?php echo $dt['dt_jumlah'] ?></td>
                                        <td><?php echo "Rp " . number_format($subtotal) ?></td>
                                    </tr>

                                <?php $nomor++;
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">TOTAL</th>
                                    <th colspan="1"><?php echo "Rp " . number_format($total) ?>
                                        <input type="hidden" id="totalbayar" name="totalbayar" value="<?php echo $total ?>" />
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-2">
                        <div class="col-sm">
                            <p>Sudah Dibayar </p>
                            <p>Sisa Belum Bayar </p>
                            <p>Status</p>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="col-sm">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                    </div>
                    <?php
                    if ($d['status_pesanan'] == 1) {
                        $sudah_bayar = 0;
                        $sisa_bayar = $total;
                        $status_bayar = "Belum Bayar";
                    } else if ($d['status_pesanan'] == 2) {
                        $sudah_bayar = $total / 2;
                        $sisa_bayar = $total / 2;
                        $status_bayar = "Belum Lunas";
                    } else if ($d['status_pesanan'] == 3) {
                        $sudah_bayar = $total / 2;
                        $sisa_bayar = $total / 2;
                        $status_bayar = "Belum Lunas";
                    } else if ($d['status_pesanan'] == 4) {
                        $sudah_bayar = 0;
                        $sisa_bayar = 0;
                        $status_bayar = "Dibatalkan";
                    } else if ($d['status_pesanan'] == 5) {
                        $sudah_bayar = $total;
                        $sisa_bayar = 0;
                        $status_bayar = "Lunas";
                    }
                    ?>
                    <div class="col-sm">
                        <div class="col-sm">
                            <p><?= "Rp " . number_format($sudah_bayar) ?></p>
                            <p><?= "Rp " . number_format($sisa_bayar) ?></p>
                            <strong>
                                <h2>
                                    <p><?= $status_bayar ?></p>
                                </h2>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label>Bukti Pembayaran</label>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <img src="<?php echo base_url('foto/foto_bukti/') . $d['bukti_bayar']; ?>" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <form class="horizontal" method="POST" action="<?= site_url('C_data_pesanan_masuk/konfirmasi_pemesanan_harian') ?>">
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo $d['id_pesanan_harian'] ?>">
                </div>
                <div class="row no-print">
                    <div class="col-sm-10">
                        <button onclick="printContent('div1')" class="btn btn-primary float-right"><i class="fa fa-print"></i>Cetak Kwitansi</button>
                    </div>
                    <div class="col-sm">
                        <button type="submit" class="btn btn-info float-right" <?php if ($d['status_pesanan'] == 3 || $d['status_pesanan'] == 4 || $d['status_pesanan'] == 1 || $d['status_pesanan'] == 5) { ?> disabled <?php   } ?>><i class="fa fa-check-square-o"></i>Konfirmasi Pesanan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>