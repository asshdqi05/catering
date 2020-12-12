<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_karyawan extends CI_Model
{
    private $_table = "karyawan";

    public function kode()
    {
        $this->db->select('RIGHT(id_karyawan,3) as kode', FALSE);
        $this->db->order_by('id_karyawan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('karyawan');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodejadi = "KR-" . $kodemax;
        return $kodejadi;
    }

    function get_data()
    {
        return $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.jabatan=jabatan.id_jabatan");
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }

    public function get_jabatan()
    {
        return $this->db->query("SELECT * FROM jabatan");
    }

    public function save()
    {
        $kode = $this->kode();
        $post = $this->input->post();
        $id_karyawan = $kode;
        $nama_karyawan = $post["nama"];
        $nohp = $post["nohp"];
        $alamat = $post["alamat"];
        $jabatan = $post["jabatan"];
        return $this->db->query("INSERT INTO karyawan VALUES('$id_karyawan','$nama_karyawan','$nohp','$alamat','$jabatan')");
    }

    public function update()
    {
        $post = $this->input->post();
        $id_karyawan = $post["kode"];
        $nama_karyawan = $post["nama"];
        $nohp = $post["nohp"];
        $alamat = $post["alamat"];
        $jabatan = $post["jabatan"];
        return $this->db->query("UPDATE karyawan SET nama_karyawan='$nama_karyawan',no_hp='$nohp',alamat='$alamat' ,jabatan='$jabatan' where id_karyawan='$id_karyawan'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_karyawan" => $id));
    }
}
