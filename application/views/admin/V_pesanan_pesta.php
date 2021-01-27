<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <?php echo $this->session->flashdata('msg'); ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>ID Pemesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Pesanan</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        $status;
                        foreach ($data_pesanan_pesta->result_array() as $d) {
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
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?php echo $d['id_pesanan_pesta'] ?></td>
                                <td><?php echo $d['nama_pelanggan'] ?></td>
                                <td><?php echo $d['tanggal'] ?></td>
                                <td><?php echo $status ?></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-block btn-info" href="<?= site_url('C_data_pesanan_masuk/detail_pesanan_pesta/' . $d['id_pesanan_pesta']) ?>">
                                        <i class="fa fa-eye" style="color: whitesmoke">Detail</i>
                                    </a>
                                    <?php
                                    if ($d['status_pesanan'] == 3) {
                                    ?>
                                        <a class="btn btn-block btn-success" href="javascript:void(0)" onclick="pembayaran( 
                                        '<?php echo $d['id_pesanan_pesta'] ?>',
                                        '<?php echo $d['jumlah_bayar'] ?>',
                                        '<?php echo $d['jumlah_bayar'] / 2 ?>'
                                    )">
                                            <i class="fa fa-money" style="color: whitesmoke"> Pembayaran</i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function pembayaran(id, jumlah_bayar, sisa_bayar) {
        $('#id').val(id);
        $('#jumlah_bayar').val(jumlah_bayar);
        $('#sisa_bayar').val(sisa_bayar);
        $('#bayar').val(sisa_bayar);
        $('#pembayaran').modal('show');
    }
</script>

<div class="modal fade" id="pembayaran">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pembayaran Catering</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_data_pesanan_masuk/pembayaran_pesta') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Total</label>
                        <input type="hidden" name="kode" id="id" class="form-control">
                        <input type="text" readonly name="jumlah_bayar" id="jumlah_bayar" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Sisa Pembayaran</label>
                        <input type="text" readonly name="sisa_bayar" id="sisa_bayar" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Pembayaran</label>
                        <input type="text" readonly name="bayar" id="bayar" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>