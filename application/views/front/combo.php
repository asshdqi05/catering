<option value="">== PILIH ==</option>

<?php
$que = $this->db->query("SELECT * FROM menu_makanan where id_menu NOT IN (SELECT tmp_id_menu FROM tmp_pesan_pesta) order by nama_menu asc");

$n = $que->num_rows();

if ($n > 0) {

    foreach ($que->result_array() as $row) { ?>
        <option value="<?php echo $row["id_menu"] ?>"><?php echo $row["nama_menu"] ?></option>
    <?php }
} else { ?>
    <option value=""></option>
<?php } ?>