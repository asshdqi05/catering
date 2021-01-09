<!-- ======= Book A Table Section ======= -->

<section id="book-a-table" class="book-a-table">


    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pesan Harian</h2>

        </div>

        <form action="<?= base_url('C_home_front/simpanharian') ?>" method="post" id="formv">

            <div class="form-row">
                <div class="col-lg-4 col-md-6 form-group">
                    <select required class="chosen-select form-control" name="hari" id="hr" onchange="pilihhari();">
                        <option value="">-Pilih-</option>
                        <option id="sen" value="Senin">Senin</option>
                        <option id="sel" value="Selasa">Selasa</option>
                        <option id="rab" value="Rabu">Rabu</option>
                        <option id="kam" value="Kamis">Kamis</option>
                        <option id="jum" value="Jumat">Jumat</option>
                        <option id="sab" value="Sabtu">Sabtu</option>
                        <option id="min" value="Minggu">Minggu</option>
                    </select>

                </div>

                <div class="col-lg-4 col-md-6 form-group">
                    <select name="namamenu" id="namamenu" class="form-control">

                    </select>

                </div>
                <div class="col-lg-3 col-md-6 form-group">
                    <input type="text" name="jumlah" class="form-control" placeholder="Porsi">

                </div>
                <div class="col-lg-1 col-md-6 form-group">
                    <button type="button" class="btn btn-info" id="tambah">+</button>
                    <button type="button" class="btn btn-info" id="shows" style="display: none;"></button>
                </div>

            </div>
            <div class="form-row">
                <div class="col-lg-12 col-md-6 form-group">
                    <div id="datasementara">

                    </div>
                </div>
            </div>
            <div class=" form-row">
                <div class="col-lg-4 col-md-6 form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" name="tanggal" id="datepicker" class="form-control" placeholder="Tanggal" required>
                    </div>

                </div>

                <div class="col-lg-4 col-md-6 form-group">
                    <?php
                    $this->db->select('RIGHT(id_pesanan_harian,10) as kode', FALSE);
                    $this->db->order_by('id_pesanan_harian', 'DESC');
                    $this->db->limit(1);
                    $query = $this->db->get('pesanan_harian');
                    if ($query->num_rows() <> 0) {
                        $dt = $query->row();
                        $kode = intval($dt->kode) + 1;
                    } else {
                        $kode = 1;
                    }
                    $kodemax  = str_pad($kode, 10, "0", STR_PAD_LEFT);
                    $kodejadi =  $kodemax;

                    ?>
                    <input type="hidden" class="form-control" name="id_detail" value="<?= $kodejadi ?>">

                </div>

            </div>
            <div class="text-center">
                <button class="btn btn-block btn-warning" type="submit" name="process">Process</button>

            </div>
        </form>


    </div>


</section>