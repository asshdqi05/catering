<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_paket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_paket', 'mu');

        //Do your magic here
    }

    public function index()
    {
        $d['datapaket']   = $this->mu->get_data();

        $tempelate = array(
            'mn_paket' => 'active',
            'judul' => 'Data paket',
            'konten' => $this->load->view('admin/V_paket', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function add()
    {
        $this->mu->save();
        $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
        redirect('C_paket');
    }

    public function edit()
    {
        $this->mu->update();
        $this->session->set_flashdata('msg', success('Data berhasil diupdate.'));
        redirect('C_paket');
    }

    public function delete()
    {
        $id = $this->input->post('kode');
        if (!$this->mu->delete($id)) {
            $this->session->set_flashdata('msg', danger('Data gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Data berhasil dihapus.'));
        }
        redirect('C_paket');
    }
}
        
    /* End of file  C_paket.php */
