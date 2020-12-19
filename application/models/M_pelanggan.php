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
}
