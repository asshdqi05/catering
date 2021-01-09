<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pelanggan', 'mu');

        //Do your magic here
    }

    function harian()
    {
        if ($this->session->email == "") {
?>
            <script>
                alert("Silahkan Login Dahulu");
                document.location.href = '<?= base_url() ?>';
            </script>
        <?php
        } else {
            $this->template->load('front/base', 'front/konfharian');
        }
    }

    function knf()
    {
        $config['upload_path']          = './foto/foto_bukti/';  // folder upload 
        $config['allowed_types']        = 'jpg|jpeg|png'; // jenis file
        $config['max_size']             = 0;
        $config['overwrite']            = FALSE;
        $config['max_filename']         = '255';
        $config['encrypt_name']         = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('fotobukti')) {

            $file = $this->upload->data();
            $textfile = $file['file_name'];
        } else {
            $textfile = "";
        }
        if (!$this->upload->do_upload('fotobukti')) {
        ?>
            <script>
                alert("Anda Belum Upload");
                document.location.href = "<?= base_url('Konfirmasi/harian') ?>";
            </script>
        <?php
        } else {
            $this->mu->simpandata($textfile);
        ?>
            <script>
                alert("Data Berhasil Di Simpan");
                document.location.href = "<?= base_url('Konfirmasi/harian') ?>";
            </script>
        <?php

        }
    }

    function btl()
    {
        $id = $this->uri->segment(3);
        $this->db->query("UPDATE pesanan_harian set status_pesanan='4' where id_pesanan_harian='$id'");
        ?>
        <script>
            alert("Data Berhasil Di Batalkan");
            document.location.href = "<?= base_url('Konfirmasi/harian') ?>";
        </script>
        <?php
    }


    //========================================================================================================================


    function pesta()
    {
        if ($this->session->email == "") {
        ?>
            <script>
                alert("Silahkan Login Dahulu");
                document.location.href = '<?= base_url() ?>';
            </script>
        <?php
        } else {
            $this->template->load('front/base', 'front/konfpesta');
        }
    }

    function knf2()
    {
        $config['upload_path']          = './foto/foto_bukti/';  // folder upload 
        $config['allowed_types']        = 'jpg|jpeg|png'; // jenis file
        $config['max_size']             = 0;
        $config['overwrite']            = FALSE;
        $config['max_filename']         = '255';
        $config['encrypt_name']         = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('fotobukti')) {

            $file = $this->upload->data();
            $textfile = $file['file_name'];
        } else {
            $textfile = "";
        }
        if (!$this->upload->do_upload('fotobukti')) {
        ?>
            <script>
                alert("Anda Belum Upload");
                document.location.href = "<?= base_url('Konfirmasi/pesta') ?>";
            </script>
        <?php
        } else {
            $this->mu->simpandata2($textfile);
        ?>
            <script>
                alert("Data Berhasil Di Simpan");
                document.location.href = "<?= base_url('Konfirmasi/pesta') ?>";
            </script>
        <?php

        }
    }


    function btl2()
    {
        $id = $this->uri->segment(3);
        $this->db->query("UPDATE pesanan_pesta set status_pesanan='4' where id_pesanan_pesta='$id'");
        ?>
        <script>
            alert("Data Berhasil Di Batalkan");
            document.location.href = "<?= base_url('Konfirmasi/pesta') ?>";
        </script>
<?php
    }
}
