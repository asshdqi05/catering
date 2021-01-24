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
        $kode = $this->mu->kode();
        $insert = array(
            'id_pelanggan' => $kode,
            'nama_pelanggan' => $this->input->post('namapelanggan'),
            'alamat' => $this->input->post('alamat'),
            'nohp' => $this->input->post('nohp'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'status' => '1'
        );
        $this->db->insert('pelanggan', $insert);
        $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
        redirect('C_pelanggan');
    }

    public function edit()
    {
        $this->db->set('nama_pelanggan', $this->input->post('nama'));
        $this->db->set('alamat', $this->input->post('alamat'));
        $this->db->set('nohp', $this->input->post('nohp'));
        $this->db->set('email', $this->input->post('email'));
        $this->db->set('password', $this->input->post('password'));
        $this->db->where('id_pelanggan', $this->input->post('kode'));
        $this->db->update('pelanggan');

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
