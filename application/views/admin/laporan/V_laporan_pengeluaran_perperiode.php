<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Pengeluaran Perperiode</title>
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
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Pengeluaran Perperiode</span><br>
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
                                <th>No</th>
                                <th>ID Pengeluaran</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $total = 0;
                            foreach ($data->result_array() as $d) {
                                $total = $total + $d['jumlah'];
                                $no++;
                            ?>
                                <tr>
                                    <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                    <td><?php echo $d['id_pengeluaran'] ?></td>
                                    <td><?php echo $d['tanggal'] ?></td>
                                    <td><?php echo $d['keterangan'] ?></td>
                                    <td><?php echo $d['jumlah'] ?></td>
                                </tr>
                            <?php } ?>
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