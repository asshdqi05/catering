<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('C_login');
        }
        $this->load->model('M_pelanggan', 'mu');


        //Do your magic here
    }

    public function index()
    {
        $d['datapelanggan']   = $this->mu->get_data();
        $tempelate = array(
            'mn_pelanggan' => 'active',
            'judul' => 'Data pelanggan',
            'konten' => $this->load->view('admin/V_pelanggan', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function add()
    {
        $this->mu->save();
        $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
        redirect('C_pelanggan');
    }

    public function edit()
    {
        $this->mu->update();
        $this->session->set_flashdata('msg', success('Data berhasil diupdate.'));
        redirect('C_pelanggan');
    }

    public function delete()
    {
        $id = $this->input->post('kode');
        if (!$this->mu->delete($id)) {
            $this->session->set_flashdata('msg', danger('Data gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Data berhasil dihapus.'));
        }
        redirect('C_pelanggan');
    }
}
        
    /* End of file  C_pelanggan.php */
