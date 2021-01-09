<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Karyawan</title>
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
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Karyawan</span><br>
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
                    <table style="border-collapse: collapse; width: 90%;" border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>NOHP</th>
                                <th>Alamat</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $d) {

                                $no++;
                            ?>
                                <tr>
                                    <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                    <td><?php echo $d['nama_karyawan'] ?></td>
                                    <td><?php echo $d['no_hp'] ?></td>
                                    <td><?php echo $d['alamat'] ?></td>
                                    <td><?php echo $d['nama_jabatan'] ?></td>
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