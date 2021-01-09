<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    private $_table = "pelanggan";

    public function kode()
    {
        $this->db->select('RIGHT(id_pelanggan,3) as kode', FALSE);
        $this->db->order_by('id_pelanggan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pelanggan');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodejadi = "PL-" . $kodemax;
        return $kodejadi;
    }

    function get_data()
    {
        return $this->db->query("SELECT * FROM pelanggan ");
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }



    public function save($nama, $email, $telpon)
    {
        $kode = $this->kode();
        $post = $this->input->post();
        $id_pelanggan = $kode;
        $nama_pelanggan = $post["namapelanggan"];
        $alamat = $post["alamat"];
        $nohp = $post["nohp"];
        $email = $post["email"];
        return $this->db->query("INSERT INTO pelanggan VALUES('$id_pelanggan','$nama_pelanggan','$alamat','$nohp','$email')");
        return $this->db->query("INSERT INTO pelanggan VALUES('','$nama','','$telpon','$email','','0')");
    }

    public function saveregister($nama, $email, $telpon, $alamat, $password)
    {
        $kode = $this->kode();
        return $this->db->query("INSERT INTO pelanggan VALUES('$kode','$nama','$alamat','$telpon','$email','$password','0')");
    }

    public function update()
    {
        $post = $this->input->post();
        $id_pelanggan = $post["kode"];
        $nama_pelanggan = $post["nama"];
        $alamat = $post["alamat"];
        $nohp = $post["nohp"];
        $email = $post["email"];
        return $this->db->query("UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat' ,nohp='$nohp', email='$email' where id_pelanggan='$id_pelanggan'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pelanggan" => $id));
    }

    function knf($email)
    {
        return $this->db->query("UPDATE pelanggan SET status='1' where email='$email'");
    }

    function m_simpan_tmp()
    {
        $idmenu = $_POST['namamenu'];
        $jumlah = $_POST['jumlah'];
        $idpel = $this->session->id;
        $hari = $_POST['hari'];


        return $this->db->query("INSERT INTO tmp_pesan_harian VALUES ('','$idmenu','$jumlah','$idpel','$hari')");
    }




    function m_simpan_harian()
    {

        $tanggals = $this->input->post('tanggal', TRUE);
        $tanggal = date('Y-m-d', strtotime($tanggals));
        $tot = $_POST['totalkes'];
        $idpel = $this->session->id;
        $hari = $_POST['hari'];
        $idpesanan = $_POST['id_detail'];


        $a = $this->db->query("INSERT INTO pesanan_harian (id_pesanan_harian,id_pesanan_pelanggan,tanggal,jumlah_bayar,status_pesanan) VALUES ('$idpesanan','$idpel','$tanggal','$tot','1')");

        $b = $this->db->query("INSERT INTO detail_pesanan_harian (id_dt_pesanan_harian,id_dt_menu,dt_jumlah,dt_hari)SELECT '$idpesanan',tmp_id_menu,tmp_jumlah,tmp_hari from tmp_pesan_harian where tmp_hari='$hari' and tmp_id_pelanggan='$idpel'and tmp_id_pelanggan='$idpel'");

        $c = $this->db->query("DELETE FROM tmp_pesan_harian where tmp_hari='$hari' and tmp_id_pelanggan='$idpel'");

        return $a;
        return $b;
        return $c;
    }

    //=====================================================================================================================================

    function m_simpan_tmp2()
    {
        $idmenu = $_POST['namamenu2'];
        $jumlah = $_POST['jumlah'];
        $idpel = $this->session->id;



        return $this->db->query("INSERT INTO tmp_pesan_pesta VALUES ('','$idmenu','$jumlah','$idpel')");
    }


    function m_simpan_pesta()
    {

        $tanggals = $this->input->post('tanggal2', TRUE);
        $tanggal = date('Y-m-d', strtotime($tanggals));
        $tot = $_POST['totalkes'];
        $idpel = $this->session->id;

        $idpesanan = $_POST['id_detail'];


        $a = $this->db->query("INSERT INTO pesanan_pesta (id_pesanan_pesta,id_pesanan_pelanggan,tanggal,jumlah_bayar,status_pesanan) VALUES ('$idpesanan','$idpel','$tanggal','$tot','1')");

        $b = $this->db->query("INSERT INTO detail_pesanan_pesta (id_dt_pesanan_pesta,id_dt_menu,dt_jumlah)SELECT '$idpesanan',tmp_id_menu,tmp_jumlah from tmp_pesan_pesta where  tmp_id_pelanggan='$idpel'");

        $c = $this->db->query("DELETE FROM tmp_pesan_pesta where  tmp_id_pelanggan='$idpel'");

        return $a;
        return $b;
        return $c;
    }
    public function simpandata($textfile)
    {
        $id = $this->uri->segment(3);
        return $this->db->query("UPDATE pesanan_harian set bukti_bayar='$textfile', status_pesanan='2' where id_pesanan_harian='$id'");
    }

    public function simpandata2($textfile)
    {
        $id = $this->uri->segment(3);
        return $this->db->query("UPDATE pesanan_pesta set bukti_bayar='$textfile', status_pesanan='2' where id_pesanan_pesta='$id'");
    }
}
