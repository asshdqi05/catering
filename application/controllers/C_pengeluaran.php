<?php

class C_pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('C_login');
        }

        $this->load->model('M_pengeluaran', 'mp');
        $this->load->library(array('form_validation', 'session'));
    }

    public function index()
    {
        $d['datapengeluaran']   = $this->mp->get_data();
        $tempelate = array(
            'mn_pengeluaran' => 'active',
            'judul' => 'Data Pengeluaran',
            'konten' => $this->load->view('admin/V_pengeluaran', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function add()
    {
        $this->mp->save();
        $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
        redirect('C_pengeluaran');
    }

    public function edit()
    {
        $this->mp->update();
        $this->session->set_flashdata('msg', success('Data berhasil diupdate.'));
        redirect('C_pengeluaran');
    }

    public function delete()
    {
        $id = $this->input->post('kode');
        if (!$this->mp->delete($id)) {
            $this->session->set_flashdata('msg', danger('Data gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Data berhasil dihapus.'));
        }
        redirect('C_pengeluaran');
    }
}
