<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_menu_pesta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_menu_pesta', 'mu');
        $this->load->library('upload');

        //Do your magic here
    }

    public function index()
    {
        $d['datamenu']   = $this->mu->getAll();

        $tempelate = array(
            'mn_menu_pesta' => 'active',
            'judul' => 'Data menu',
            'konten' => $this->load->view('admin/V_menu_pesta', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function add()
    {
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['upload_path']          =  './foto/foto_menu/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 2048;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $new_foto = $this->upload->data('file_name');
                $this->mu->save($new_foto);
                $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
                redirect('C_menu_pesta');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function edit()
    {

        $upload_image = $_FILES['foto'];

        $id = $this->input->post("kode");
        $data = $this->db->get_where('menu_pesta', ['id_menu_pesta' => $id])->row_array();
        $old_foto = $this->input->post("old_foto");

        if ($upload_image) {
            $config['upload_path']          =  './foto/foto_menu/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 2048;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                unlink(FCPATH . 'foto/foto_menu/' . $old_foto);
                $new_foto = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
                $new_foto = $this->input->post("old_foto");;
            }
        }
        $this->mu->update($new_foto);
        $this->session->set_flashdata('msg', success('Data berhasil Diupdate.'));
        redirect('C_menu_pesta');
    }

    public function delete()
    {
        $id = $this->input->post('kode');
        $hfoto = $this->input->post("foto");
        if (!$this->mu->delete($id)) {
            $this->session->set_flashdata('msg', danger('Data gagal dihapus.'));
        } else {
            unlink(FCPATH . 'foto/foto_menu/' . $hfoto);
            $this->session->set_flashdata('msg', info('Data berhasil dihapus.'));
        }
        redirect('C_menu_pesta');
    }
}
        
    /* End of file  C_menu.php */
