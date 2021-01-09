<table class="table" style="color : white;">
    <tr>
        <th>Nama Menu</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total Harga</th>
        <th>Action</th>

    </tr>
    <?php
    $idpel = $this->session->id;
    $qq = $this->db->query("SELECT * FROM tmp_pesan_harian join menu_makanan on tmp_id_menu=id_menu where tmp_id_pelanggan = '$idpel' and hari='$hari'");
    foreach ($qq->result_array() as $row) { ?>
        <tr>
            <td><?= $row['nama_menu'] ?></td>
            <td><?= $row['tmp_jumlah'] ?></td>
            <td><?= number_format($row['harga'], 0, ',', '.') ?></td>
            <?php $totharga = $row['tmp_jumlah'] * $row['harga']  ?>
            <td><?= number_format($totharga, 0, ',', '.') ?></td>
            <td><button type="button" class="btn btn-danger btn-sm" id="<?= $row['id_tmp_harian'] ?>" name="hapus2" value="<?= $row['id_tmp_harian'] ?>">x</button></td>
        </tr>
        <script>
            $('#<?= $row['id_tmp_harian'] ?>').click(function() {
                // var base_url = '<?= base_url() ?>';
                var id = $("#<?= $row['id_tmp_harian'] ?>").val();
                var hari = $("#hr").val();
                $.ajax({
                    url: "deletetmp",
                    type: 'POST',
                    data: {
                        hapus2: id,
                        hari: hari
                    },
                    dataType: 'html',
                    success: function(responsed) {
                        $('#datasementara').html(responsed);

                    },
                })
            });
        </script>
    <?php
        @$totkes += $totharga;
    } ?>
    <tr>
        <th colspan="3">Total Keseluruhan :</th>
        <td colspan="2"><?= number_format(@$totkes, 0, ',', '.')  ?></td>
        <input type="hidden" value="<?= @$totkes ?>" name="totalkes">
    </tr>
</table>