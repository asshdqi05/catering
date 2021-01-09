<?php

class C_laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('C_login');
        }
        $this->load->model('M_laporan', 'ml');
    }

    public function index()
    {
        $tempelate = array(
            'mn_laporan' => 'active',
            'judul' => 'Laporan Catering',
            'konten' => $this->load->view('admin/V_laporan', '', true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function cetak_karyawan()
    {
        $data['data'] = $this->ml->get_karyawan();
        $this->load->view('admin/laporan/V_laporan_karyawan', $data);
    }

    public function cetak_pemesanan_perperiode()
    {
        $tgl_awal = $this->input->post('tanggal_awal', true);
        $tgl_akhir = $this->input->post('tanggal_akhir', true);
        $tanggal_awal    = date("Y-m-d", strtotime($tgl_awal));
        $tanggal_akhir    = date("Y-m-d", strtotime($tgl_akhir));
        $data['tgla'] = $tgl_awal;
        $data['tglb'] = $tgl_akhir;
        $data['data_pesta'] = $this->ml->get_pemesanan_pesta_perperiode($tanggal_awal, $tanggal_akhir);
        $data['data_harian'] = $this->ml->get_pemesanan_harian_perperiode($tanggal_awal, $tanggal_akhir);
        $this->load->view('admin/laporan/V_laporan_pemesanan_perperiode', $data);
    }

    public function cetak_pendapatan_perperiode()
    {
        $tgl_awal = $this->input->post('tanggal_awal', true);
        $tgl_akhir = $this->input->post('tanggal_akhir', true);
        $tanggal_awal    = date("Y-m-d", strtotime($tgl_awal));
        $tanggal_akhir    = date("Y-m-d", strtotime($tgl_akhir));
        $data['tgla'] = $tgl_awal;
        $data['tglb'] = $tgl_akhir;
        $data['data_pesta'] = $this->ml->get_pemesanan_pesta_perperiode($tanggal_awal, $tanggal_akhir);
        $data['data_harian'] = $this->ml->get_pemesanan_harian_perperiode($tanggal_awal, $tanggal_akhir);
        $this->load->view('admin/laporan/V_laporan_pendapatan_perperiode', $data);
    }

    public function cetak_pengeluaran_perperiode()
    {
        $tgl_awal = $this->input->post('tanggal_awal', true);
        $tgl_akhir = $this->input->post('tanggal_akhir', true);
        $tanggal_awal    = date("Y-m-d", strtotime($tgl_awal));
        $tanggal_akhir    = date("Y-m-d", strtotime($tgl_akhir));
        $data['tgla'] = $tgl_awal;
        $data['tglb'] = $tgl_akhir;
        $data['data'] = $this->ml->get_pengeluaran_perperiode($tanggal_awal, $tanggal_akhir);
        $this->load->view('admin/laporan/V_laporan_pengeluaran_perperiode', $data);
    }
}
