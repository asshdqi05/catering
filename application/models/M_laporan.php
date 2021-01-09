<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function get_karyawan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan=karyawan.jabatan');
        return $this->db->get();
    }

    public function get_pemesanan_pesta_perperiode($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('pesanan_pesta');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan_pesta.id_pesanan_pelanggan');
        $this->db->where('tanggal >=', $tanggal_awal);
        $this->db->where('tanggal <=', $tanggal_akhir);
        return $this->db->get();
    }

    public function get_pemesanan_harian_perperiode($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('pesanan_harian');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan_harian.id_pesanan_pelanggan');
        $this->db->where('tanggal >=', $tanggal_awal);
        $this->db->where('tanggal <=', $tanggal_akhir);
        return $this->db->get();
    }

    public function get_pendapatan_pesta_perperiode($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('pesanan_pesta');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan_pesta.id_pesanan_pelanggan');
        $this->db->where('tanggal >=', $tanggal_awal);
        $this->db->where('tanggal <=', $tanggal_akhir);
        $this->db->where('status_pesanan', 3);
        return $this->db->get();
    }

    public function get_pendapatan_harian_perperiode($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('pesanan_harian');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan_harian.id_pesanan_pelanggan');
        $this->db->where('tanggal >=', $tanggal_awal);
        $this->db->where('tanggal <=', $tanggal_akhir);
        $this->db->where('status_pesanan', 3);
        return $this->db->get();
    }

    public function get_pengeluaran_perperiode($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->where('tanggal >=', $tanggal_awal);
        $this->db->where('tanggal <=', $tanggal_akhir);
        return $this->db->get();
    }
}
