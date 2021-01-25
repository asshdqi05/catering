<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Konfirmasi pesta</h2>
        </div>
        <div class="form-row">
            <div class="col-lg-12 col-md-12 form-group">
                <table id="example2" border="2" class="table table-bordered table-striped" style="color:white">
                    <thead>
                        <tr>
                            <th>Pesanan Tanggal</th>
                            <th>Total Bayar</th>
                            <th>DP</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $idpel = $this->session->id;
                        $query = $this->db->query("SELECT * from pesanan_pesta where id_pesanan_pelanggan='$idpel'");

                        foreach ($query->result_array() as $row) {
                        ?>
                            <tr>
                                <td><?= $row['tanggal'] ?></td>
                                <td>Rp. <?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                                <td>Rp. <?= number_format($row['jumlah_bayar'] / 2, 0, ',', '.') ?></td>
                                <?php
                                if ($row['status_pesanan'] == '1') {
                                    $stts = "Harap Kirim Bukti Pembayaran";
                                } else 
                                if ($row['status_pesanan'] == '2') {
                                    $stts = "Di Proses Admin";
                                } else 
                                if ($row['status_pesanan'] == '3') {
                                    $stts = "Di Konfirmasi Admin";
                                } else {
                                    $stts = "Batal";
                                }
                                ?>

                                <td><?= $stts ?><?php if ($row['status_pesanan'] == '1') {
                                                ?>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle='modal' data-target="#konf<?= $row['id_pesanan_pesta'] ?>"><i class="icofont-check-alt"></i></button>
                                <?php } ?>

                                </td>
                                <td>
                                    <?php
                                    if ($row['status_pesanan'] == '1') {

                                    ?>
                                        <a class="btn btn-danger btn-sm" href="<?= base_url('Konfirmasi/btl/' . $row['id_pesanan_pesta']) ?>"><i class="icofont-close-squared-alt"></i></a>
                                    <?php
                                    }

                                    ?>

                                    <a class="btn btn-info btn-sm" data-toggle='modal' data-target="#dt<?= $row['id_pesanan_pesta'] ?>"><i class="icofont-eye"></i></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
$idpel = $this->session->id;
$query2 = $this->db->query("SELECT * from pesanan_pesta where id_pesanan_pelanggan='$idpel'");

foreach ($query2->result_array() as $row2) {

?>

    <div class="modal fade" id="konf<?= $row2['id_pesanan_pesta'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:black">Upload Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Konfirmasi/knf2/' . $row2['id_pesanan_pesta']) ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <table style="color: black;">
                            <tr>
                                <th>Foto : </th>
                                <td><input type="file" class="form-control" name="fotobukti"></td>
                            </tr>
                        </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="dt<?= $row2['id_pesanan_pesta'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:black">Pesanan (<?= $row2['id_pesanan_pesta'] ?>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table" style="color : black;">
                        <tr>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th></th>


                        </tr>
                        <?php
                        $qc = $this->db->query("SELECT * FROM detail_pesanan_pesta join menu_makanan on id_dt_menu=id_menu where id_dt_pesanan_pesta='$row[id_pesanan_pesta]'");
                        foreach ($qc->result_array() as $r) {
                        ?>
                            <tr>
                                <td><?= $r['nama_menu']  ?> </td>
                                <td><?= $r['dt_jumlah']  ?> </td>
                                <td>Rp. <?= number_format($r['harga'], 0, ',', '.')  ?> </td>
                                <?php $totharga = $r['harga'] * $r['dt_jumlah'] ?>
                                <td>Rp. <?= number_format($totharga, 0, ',', '.') ?> </td>
                                <td><img width="70px" height="70px" class="rounded-circle" src="<?= base_url('foto/foto_menu/' . $r['foto_makanan']) ?>"></td>
                            </tr>

                        <?php
                            @$totkes += $totharga;
                        } ?>
                        <tr>
                            <th colspan="3">Total Keseluruhan :</th>
                            <th colspan="2">Rp. <?= number_format(@$totkes, 0, ',', '.') ?></th>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>
<?php } ?>