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
                                $status = "Dikonfirmasi";
                            } else {
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