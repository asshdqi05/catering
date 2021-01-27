<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_data_pesanan_masuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('C_login');
        }
        $this->load->model('M_pesanan', 'mp');
    }

    public function pesanan_pesta()
    {
        $d['data_pesanan_pesta']   = $this->mp->get_data_pesta();
        $tempelate = array(
            'mn_open' => 'menu-open',
            'mn_pesanan' => 'active',
            'mn_pesanan_pesta' => 'active',
            'judul' => 'Data Pesanan Pesta',
            'konten' => $this->load->view('admin/V_pesanan_pesta', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function pesanan_harian()
    {
        $d['data_pesanan_harian']   = $this->mp->get_data_harian();
        $tempelate = array(
            'mn_open' => 'menu-open',
            'mn_pesanan' => 'active',
            'mn_pesanan_harian' => 'active',
            'judul' => 'Data Pesanan Harian',
            'konten' => $this->load->view('admin/V_pesanan_harian', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function detail_pesanan_pesta($id)
    {
        $d['data_pesanan_pesta']   = $this->mp->get_data_pesta_by_id($id);
        $d['detail_pesanan_pesta']   = $this->mp->get_detail_pesta_by_id($id);
        $tempelate = array(
            'mn_open' => 'menu-open',
            'mn_pesanan' => 'active',
            'mn_pesanan_pesta' => 'active',
            'judul' => 'Detail Pesanan Pesta',
            'konten' => $this->load->view('admin/V_detail_pesanan_pesta', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function detail_pesanan_harian($id)
    {
        $d['data_pesanan_harian']   = $this->mp->get_data_harian_by_id($id);
        $d['detail_pesanan_harian']   = $this->mp->get_detail_harian_by_id($id);
        $tempelate = array(
            'mn_open' => 'menu-open',
            'mn_pesanan' => 'active',
            'mn_pesanan_harian' => 'active',
            'judul' => 'Detail Pesanan Harian',
            'konten' => $this->load->view('admin/V_detail_pesanan_harian', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function konfirmasi_pemesanan_pesta()
    {
        $id = $this->input->post('id');
        $this->mp->konfirmasi_pesanan_pesta($id);
        $this->session->set_flashdata('msg', success('Pesanan Pesta berhasil dikonfirmasi.'));
        redirect('C_data_pesanan_masuk/pesanan_pesta');
    }

    public function konfirmasi_pemesanan_harian()
    {
        $id = $this->input->post('id');
        $this->mp->konfirmasi_pesanan_harian($id);
        $this->session->set_flashdata('msg', success('Pesanan Harian berhasil dikonfirmasi.'));
        redirect('C_data_pesanan_masuk/pesanan_harian');
    }

    public function pembayaran_pesta()
    {
        $id = $this->input->post('kode');
        $this->db->set('status_pesanan', 5);
        $this->db->where('id_pesanan_pesta', $id);
        $this->db->update('pesanan_pesta');

        $this->session->set_flashdata('msg', success('Pembayaran Pesanan Pesta berhasil Disimpan.'));
        redirect('C_data_pesanan_masuk/pesanan_pesta');
    }

    public function pembayaran_harian()
    {
        $id = $this->input->post('kode');
        $this->db->set('status_pesanan', 5);
        $this->db->where('id_pesanan_harian', $id);
        $this->db->update('pesanan_harian');

        $this->session->set_flashdata('msg', success('Pembayaran Pesanan Harian berhasil Disimpan.'));
        redirect('C_data_pesanan_masuk/pesanan_harian');
    }
}
        
    /* End of file  C_karyawan.php */
