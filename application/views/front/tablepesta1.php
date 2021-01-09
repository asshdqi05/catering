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
    $qq = $this->db->query("SELECT * FROM tmp_pesan_pesta join menu_makanan on tmp_id_menu=id_menu where tmp_id_pelanggan = '$idpel' ");
    foreach ($qq->result_array() as $row) { ?>
        <tr>
            <td><?= $row['nama_menu'] ?></td>
            <td><?= $row['tmp_jumlah'] ?></td>
            <td><?= number_format($row['harga'], 0, ',', '.') ?></td>
            <?php $totharga = $row['tmp_jumlah'] * $row['harga']  ?>
            <td><?= number_format($totharga, 0, ',', '.') ?></td>

            <td><button type="button" class="btn btn-danger btn-sm" id="<?= $row['id_tmp_pesta'] ?>" name="hapus2" value="<?= $row['id_tmp_pesta'] ?>">x</button></td>
        </tr>
        <script>
            $('#<?= $row['id_tmp_pesta'] ?>').click(function() {
                // var base_url = '<?= base_url() ?>';
                var id = $("#<?= $row['id_tmp_pesta'] ?>").val();
                $.ajax({
                    url: "deletetmp2",
                    type: 'POST',
                    data: "hapus2=" + id,
                    dataType: 'html',
                    success: function(responsed) {
                        $('#datasementara2').html(responsed);
                        $("#namamenu2").load("combo");
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