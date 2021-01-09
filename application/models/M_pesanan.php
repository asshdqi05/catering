<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan extends CI_Model
{

    function get_data_pesta()
    {
        $this->db->select('*');
        $this->db->from('pesanan_pesta');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan_pesta.id_pesanan_pelanggan');
        return $this->db->get();
    }

    function get_data_harian()
    {
        $this->db->select('*');
        $this->db->from('pesanan_harian');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan_harian.id_pesanan_pelanggan');
        return $this->db->get();
    }

    function get_data_pesta_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan_pesta');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan_pesta.id_pesanan_pelanggan');
        $this->db->where('pesanan_pesta.id_pesanan_pesta', $id);
        return $this->db->get();
    }

    function get_data_harian_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan_harian');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan_harian.id_pesanan_pelanggan');
        $this->db->where('pesanan_harian.id_pesanan_harian', $id);
        return $this->db->get();
    }

    function get_detail_pesta_by_id($id)
    {
        $this->db->select('*,nama_menu as nm_makanan, harga as harga_makanan');
        $this->db->from('detail_pesanan_pesta');
        $this->db->join('menu_makanan', 'menu_makanan.id_menu=detail_pesanan_pesta.id_dt_menu');
        $this->db->where('detail_pesanan_pesta.id_dt_pesanan_pesta', $id);
        return $this->db->get();
    }

    function get_detail_harian_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan_harian');
        $this->db->join('menu_makanan', 'menu_makanan.id_menu=detail_pesanan_harian.id_dt_menu');
        $this->db->where('id_dt_pesanan_harian', $id);
        return $this->db->get();
    }

    function konfirmasi_pesanan_pesta($id)
    {
        $this->db->set('status_pesanan', 3);
        $this->db->where('id_pesanan_pesta', $id);
        $this->db->update('pesanan_pesta');
    }

    function konfirmasi_pesanan_harian($id)
    {
        $this->db->set('status_pesanan', 3);
        $this->db->where('id_pesanan_harian', $id);
        $this->db->update('pesanan_harian');
    }
}
