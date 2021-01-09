<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Pemesanan Perperiode</title>
</head>

<body onload="window.print();">
    <div align="center">
        <table style="border-collapse: collapse; width: 96%" border="1">
            <tr>
                <td align="center">
                    <table style="border-collapse: collapse; width: 90%;" border="0">
                        <tr>
                            <td>
                                <img src="<?php echo base_url('assets/') ?>dist/img/dflogo.jpg" style="width: 130 ; height: 80;">
                            </td>
                            <td style="text-align: center;">
                                <span style="font-size: 27pt; font-weight: bold; color: black;">DF Catering</span><br>
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Pemesanan Perperiode</span><br>
                                <span style="font-size: 12pt; font-weight: bold; font-style: italic;">
                                </span>
                                <hr>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%; font-weight: bold;" border="0">
                        <tr>
                            <th colspan="7" style="text-align:left;">Tanggal Awal: <?php echo $tgla; ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" style="text-align:left;">Tanggal Akhir: <?php echo $tglb; ?>
                            </th>
                        </tr>
                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%;" border="1">
                        <thead>
                            <tr>
                                <th colspan="5">
                                    <b>
                                        <h2>Data Pemesanan Pesta</h2>
                                    </b>
                                </th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>ID Pemesanan</th>
                                <th>Tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Status Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_pesta->result_array() as $d) {
                                if ($d['status_pesanan'] == 1) {
                                    $status = "Upload Bukti";
                                } else if ($d['status_pesanan'] == 2) {
                                    $status = "Menunggu Konfirmasi";
                                } else if ($d['status_pesanan'] == 3) {
                                    $status = "Dikonfirmasi";
                                } else {
                                    $status = "Batal";
                                }
                                $no++;
                            ?>
                                <tr>
                                    <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                    <td><?php echo $d['id_pesanan_pesta'] ?></td>
                                    <td><?php echo $d['tanggal'] ?></td>
                                    <td><?php echo $d['nama_pelanggan'] ?></td>
                                    <td><?php echo $status ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <table style="border-collapse: collapse; width: 90%;" border="1">
                        <thead>
                            <tr>
                                <th colspan="5">
                                    <b>
                                        <h2>Data Pemesanan Harian</h2>
                                    </b>
                                </th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>ID Pemesanan</th>
                                <th>Tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Status Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_harian->result_array() as $d) {
                                if ($d['status_pesanan'] == 1) {
                                    $status = "Upload Bukti";
                                } else if ($d['status_pesanan'] == 2) {
                                    $status = "Menunggu Konfirmasi";
                                } else if ($d['status_pesanan'] == 3) {
                                    $status = "Dikonfirmasi";
                                } else {
                                    $status = "Batal";
                                }
                                $no++;
                            ?>
                                <tr>
                                    <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                    <td><?php echo $d['id_pesanan_harian'] ?></td>
                                    <td><?php echo $d['tanggal'] ?></td>
                                    <td><?php echo $d['nama_pelanggan'] ?></td>
                                    <td><?php echo $status ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">
                        <table style="border-collapse: collapse; width: 90%;" border="0">
                            <tr>
                                <td width="70%"></td>
                                <td width="26%">Padang,
                                    <?php echo date('d-m-Y'); ?>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <strong><?php echo $this->session->userdata('user'); ?></strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>