<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pengeluaran extends CI_Model
{
    private $_table = "pengeluaran";

    public function kode()
    {
        $this->db->select('RIGHT(id_pengeluaran,3) as kode', FALSE);
        $this->db->order_by('id_pengeluaran', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pengeluaran');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodejadi = "UK-" . $kodemax;
        return $kodejadi;
    }

    function get_data()
    {
        return $this->db->query("SELECT * FROM pengeluaran ");
    }



    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }



    public function save()
    {
        $kode = $this->kode();
        $post = $this->input->post();
        $id_pengeluaran = $kode;
        $tanggal = $post["tanggal"];
        $jumlah = $post["jumlah"];
        $keterangan = $post["keterangan"];
        return $this->db->query("INSERT INTO pengeluaran VALUES('$id_pengeluaran','$tanggal','$jumlah','$keterangan')");
    }

    public function update()
    {
        $post = $this->input->post();
        $id_pengeluaran = $post["kode"];
        $tanggal = $post["tanggal"];
        $jumlah = $post["jumlah"];
        $keterangan = $post["keterangan"];
        return $this->db->query("UPDATE pengeluaran SET tanggal='$tanggal', jumlah='$jumlah' ,keterangan='$keterangan' where id_pengeluaran='$id_pengeluaran'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pengeluaran" => $id));
    }
}
