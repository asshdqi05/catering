<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_home_front extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
        //     $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
        //     redirect('front/C_login');
        // }
    }

    public function index()
    {
        $this->load->view('front/home_front');
    }
}
        
    /* End of file  C_home_front.php */
