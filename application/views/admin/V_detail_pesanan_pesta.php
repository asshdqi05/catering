<div class="col-md-12">
    <?php $d = $data_pesanan_pesta->row_array();

    if ($d['status_pesanan'] == 1) {
        $status = "Upload Bukti";
    } else if ($d['status_pesanan'] == 2) {
        $status = "Menunggu Konfirmasi";
    } else if ($d['status_pesanan'] == 3) {
        $status = "Dikonfirmasi";
    } else {
        $status = "Batal";
    }
    ?>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_data_pesanan_masuk/pesanan_pesta') ?>" class="btn btn-warning btn-flat">
                <span class="fa fa-arrow-circle-left"></span>
                Kembali
            </a>
        </div>

        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
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
                            <p><?php echo $d['id_pesanan_pesta'] ?></p>
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
                            foreach ($detail_pesanan_pesta->result_array() as $dt) {
                                $subtotal = $dt['harga_makanan'] * $dt['dt_jumlah'];
                                $total = $total + $subtotal; ?>
                                <tr>
                                    <td align="center"><?php echo $nomor ?></td>
                                    <td><?php echo $dt['nm_makanan'] ?></td>
                                    <td><?php echo $dt['harga_makanan'] ?></td>
                                    <td><?php echo $dt['dt_jumlah'] ?></td>
                                    <td><?php echo $subtotal ?></td>
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
                <label>Bukti Pembayaran</label>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <img src="<?php echo base_url('foto/bukti_pembayaran/') . $d['bukti_bayar']; ?>" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <form class="horizontal" method="POST" action="<?= site_url('C_data_pesanan_masuk/konfirmasi_pemesanan_pesta') ?>">
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo $d['id_pesanan_pesta'] ?>">
                </div>
                <div class="row no-print">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-info float-right" <?php if ($d['status_pesanan'] == 3 || $d['status_pesanan'] == 4) { ?> disabled <?php   } ?>><i class="fa fa-check-square-o"></i>Konfirmasi Pesanan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>