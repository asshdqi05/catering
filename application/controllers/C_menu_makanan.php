<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_menu_makanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_menu_makanan', 'mu');
        $this->load->library('upload');

        //Do your magic here
    }

    public function index()
    {
        $d['datamenu']   = $this->mu->getAll();

        $tempelate = array(
            'mn_menu_makanan' => 'active',
            'judul' => 'Data menu',
            'konten' => $this->load->view('admin/V_menu_makanan', $d, true)
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
                redirect('C_menu_makanan');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function edit()
    {

        $upload_image = $_FILES['foto'];

        $id = $this->input->post("kode");
        $data = $this->db->get_where('menu_makanan', ['id_menu' => $id])->row_array();
        $old_foto = $this->input->post("old_foto");

        if ($upload_image) {
            $config['upload_path']          =  './foto/foto_menu/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 2048;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $old = $data['foto_makanan'];
                if ($old != $old_foto) {
                    unlink(FCPATH . 'foto/foto_menu/' . $old);
                }
                $new_foto = $this->upload->data('file_name');
                $this->mu->update($new_foto);
                $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
                redirect('C_menu_makanan');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function delete()
    {
        $id = $this->input->post('kode');
        if (!$this->mu->delete($id)) {
            $this->session->set_flashdata('msg', danger('Data gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Data berhasil dihapus.'));
        }
        redirect('C_menu_makanan');
    }
}
        
    /* End of file  C_menu.php */
