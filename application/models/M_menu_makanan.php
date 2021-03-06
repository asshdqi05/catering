<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_menu_makanan extends CI_Model
{
    private $_table = "menu_makanan";

    public function kode()
    {
        $this->db->select('RIGHT(id_menu,3) as kode', FALSE);
        $this->db->order_by('id_menu', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('menu_makanan');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodejadi = "MN-" . $kodemax;
        return $kodejadi;
    }


    public function getAll()
    {
        return $this->db->get($this->_table);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }


    public function save($new_foto)
    {
        $kode = $this->kode();
        $post = $this->input->post();
        $id_menu = $kode;
        $hari = $post["hari"];
        $nama_menu = $post["nama_menu"];
        $harga = $post["harga"];
        return $this->db->query("INSERT INTO menu_makanan VALUES('$id_menu','$hari','$nama_menu','$harga','$new_foto')");
    }

    public function update($new_foto)
    {
        $post = $this->input->post();
        $id_menu = $post["kode"];
        $hari = $post["hari"];
        $nama_menu = $post["nama_menu"];
        $harga = $post["harga"];
        return $this->db->query("UPDATE menu_makanan SET hari='$hari',nama_menu='$nama_menu',harga='$harga', foto_makanan='$new_foto' where id_menu='$id_menu'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_menu" => $id));
    }
}
