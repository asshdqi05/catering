<!-- ======= Book A Table Section ======= -->

<section id="book-a-table" class="book-a-table">


    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pesan pesta</h2>

        </div>

        <form action="<?= base_url('C_home_front/simpanpesta') ?>" method="post" id="formv">

            <div class="form-row">


                <div class="col-lg-4 col-md-6 form-group">
                    <select name="namamenu2" id="namamenu2" class="form-control">
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
                    </select>

                </div>
                <div class="col-lg-3 col-md-6 form-group">
                    <input type="text" name="jumlah" class="form-control" placeholder="Porsi">

                </div>
                <div class="col-lg-1 col-md-6 form-group">
                    <button type="button" class="btn btn-info" id="tambah2">+</button>
                    <button type="button" class="btn btn-info" id="shows2" style="display: none;"></button>
                </div>

            </div>
            <div class="form-row">
                <div class="col-lg-12 col-md-6 form-group">
                    <div id="datasementara2">

                    </div>
                </div>
            </div>
            <div class=" form-row">
                <div class="col-lg-4 col-md-6 form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" name="tanggal2" id="datepicker2" class="form-control" placeholder="Tanggal" required>
                    </div>
                </div>




                <div class="col-lg-4 col-md-6 form-group">
                    <?php
                    $this->db->select('RIGHT(id_pesanan_pesta,10) as kode', FALSE);
                    $this->db->order_by('id_pesanan_pesta', 'DESC');
                    $this->db->limit(1);
                    $query = $this->db->get('pesanan_pesta');
                    if ($query->num_rows() <> 0) {
                        $dt = $query->row();
                        $kode = intval($dt->kode) + 1;
                    } else {
                        $kode = 1;
                    }
                    $kodemax  = str_pad($kode, 10, "0", STR_PAD_LEFT);
                    $kodejadi = "T-" . $kodemax;

                    ?>
                    <input type="hidden" class="form-control" name="id_detail" value="<?= $kodejadi ?>" readonly>

                </div>

            </div>
            <div class="text-center">
                <button class="btn btn-block btn-warning" type="submit" name="process">Process</button>

            </div>
        </form>


    </div>


</section>