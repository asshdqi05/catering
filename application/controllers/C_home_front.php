<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_home_front extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pelanggan', 'mu');

        //Do your magic here
    }

    public function index()
    {
        if (isset($_POST['reg'])) {
            $nama = strip_tags($this->input->post('name'));
            $telpon = strip_tags($this->input->post('phone'));
            $email = strip_tags($this->input->post('email'));
            $alamat = strip_tags($this->input->post('alamat'));
            $password = strip_tags($this->input->post('password'));

            $email2 = base64_encode($this->input->post('email'));

            $cek = $this->db->query("SELECT * FROM pelanggan where email='" . $this->db->escape_str($email) . "'");
            $row = $cek->row_array();
            $total = $cek->num_rows();

            if ($total > 0) {
?>
                <script>
                    alert("Maaf Email Sudah Terdaftar");
                </script>
            <?php
                $this->load->view('front/home_front');
            } else {

                $tglaktif = date("d-m-Y H:i:s");
                $subject      = 'Konfirmasi Email ...';
                $message      = "<html><body>Halooo! <b> " . $row['nama_pelanggan'] . "</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mendaftar Ke Website Kami
					
					<br> Email Login : <b style='color:red'>$email</b>
					<br> Silahkan Konfirmasi : <a target='_blank' href='" . base_url() . "C_home_front/konfirmasi/" . $email2 . "'>Disini</a> <br>
					Admin,  </body></html> \n";


                $config = array(
                    'useragent' => 'CodeIgniter',
                    'protocol'  => 'smtp',
                    'mailpath'  => '/usr/sbin/sendmail',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'm.teguh444@gmail.com',
                    'smtp_pass' => 'biostara55mh..',
                    'smtp_keepalive' => TRUE,
                    'smtp_crypto' => 'SSL',
                    'wordwrap'  => TRUE,
                    'wrapchars' => 80,
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'validate'  => TRUE,
                    'crlf'      => "\r\n",
                    'newline'   => "\r\n"
                );


                //load library email dan konfigurasinya
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");

                //Kirim email
                //email dan nama pengirim 

                $this->email->from("m.teguh444@gmail.com", "DF Catering");
                //email penerima 

                $this->email->to($email);

                //subject email
                $this->email->subject($subject);

                //isi email
                $this->email->message($message);

                $this->email->send();

                $this->mu->saveregister($nama, $email, $telpon, $alamat, $password);

            ?>
                <script>
                    alert("Silahkan Cek Email Untuk Konfirmasi");
                </script>
            <?php
                $this->load->view('front/home_front');
            }
        } else 
         if (isset($_POST['log'])) {
            $email = strip_tags($this->input->post('email'));
            $password = strip_tags($this->input->post('password'));
            $cek = $this->db->query("SELECT * FROM pelanggan where email='" . $this->db->escape_str($email) . "' AND password='" . $this->db->escape_str($password) . "' AND status='1'");
            $row = $cek->row_array();
            $total = $cek->num_rows();
            if ($total > 0) {

                $this->session->set_userdata(array('email' => $row['email'], 'level' => 'konsumen'));
            ?>
                <script>
                    alert("Anda Berhasil Login");
                </script>
            <?php
                $this->load->view('front/home_front');
            } else {

            ?>
                <script>
                    alert("Anda Gagal Login Atau User Belum Aktif");
                </script>
        <?php
                $this->load->view('front/home_front');
            }
        } else {

            $this->load->view('front/home_front');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('C_home_front');
    }

    function konfirmasi()
    {
        $email = base64_decode($this->uri->segment(3));
        $this->mu->knf($email);
        ?>
        <script>
            alert("Email Berhasil di Daftarkan");
            document.location.href = '<?= base_url() ?>';
        </script>
<?php


    }
}
        
    /* End of file  C_home_front.php */
