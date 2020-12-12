<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan', 'mu');

        //Do your magic here
    }

    public function index()
    {
        $d['datakaryawan']   = $this->mu->get_data();
        $d['datajabatan']   = $this->mu->get_jabatan();
        $tempelate = array(
            'mn_karyawan' => 'active',
            'judul' => 'Data karyawan',
            'konten' => $this->load->view('admin/V_karyawan', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function add()
    {
        $this->mu->save();
        $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
        redirect('C_karyawan');
    }

    public function edit()
    {
        $this->mu->update();
        $this->session->set_flashdata('msg', success('Data berhasil diupdate.'));
        redirect('C_karyawan');
    }

    public function delete()
    {
        $id = $this->input->post('kode');
        if (!$this->mu->delete($id)) {
            $this->session->set_flashdata('msg', danger('Data gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Data berhasil dihapus.'));
        }
        redirect('C_karyawan');
    }
}
        
    /* End of file  C_karyawan.php */
