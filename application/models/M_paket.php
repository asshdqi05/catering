<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_paket extends CI_Model
{
    private $_table = "paket";

    public function kode()
    {
        $this->db->select('RIGHT(id_paket,3) as kode', FALSE);
        $this->db->order_by('id_paket', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('paket');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodejadi = "KP-" . $kodemax;
        return $kodejadi;
    }

    function get_data()
    {
        return $this->db->query("SELECT * FROM paket");
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }


    public function save()
    {
        $kode = $this->kode();
        $post = $this->input->post();
        $id_paket = $kode;
        $nama_paket = $post["nama"];
        $harga = $post["harga"];

        return $this->db->query("INSERT INTO paket VALUES('$id_paket','$nama_paket','$harga')");
    }

    public function update()
    {
        $post = $this->input->post();
        $id_paket = $post["kode"];
        $nama_paket = $post["nama"];
        $harga = $post["harga"];

        return $this->db->query("UPDATE paket SET nama_paket='$nama_paket',harga_paket='$harga' where id_paket='$id_paket'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_paket" => $id));
    }
}
