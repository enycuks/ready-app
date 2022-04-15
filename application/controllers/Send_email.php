<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send_email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jaksa_model');
    }

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'enycuks@gmail.com',  // Email gmail
            'smtp_pass'   => 'HiuPutih241',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        $fendi = $this->Jaksa_model->getAllJaksa();

        $sql = $this->db->query("SELECT id, nama_tersangka, DATEDIFF(tgl, CURDATE()) AS Umur 
        FROM data_pelapor WHERE (CURDATE()-(tgl)) = 4");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {
            echo "ada";
            foreach ($fendi as $u) {
                $awal  = $u['nama_tersangka'];
                echo $awal;
            }
        } else {
            echo "Tidak ada";
        }

        $sql = $this->db->query("SELECT id, nama_tersangka, status, DATEDIFF(tgl, CURDATE()) AS Umur 
        FROM data_pelapor WHERE (CURDATE()-(tgl)) = 8");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {
            // echo "ada";
            foreach ($sql->result_array() as $u) {
                $selisih = $u['status'];
                // echo $selisih;
                if ($selisih == "y") {
                    $awal  = $u['nama_tersangka'];
                    echo $awal;
                }
            }
        } else {
            echo "Tidak ada";
        }


        // Email dan nama pengirim
        $this->email->from('enycuks@gmail.com', 'Mas Fendi');

        // Email penerima
        // $this->email->to(implode(', ', $recipients)); // Ganti dengan email tujuan

        // // Subject email
        // $this->email->subject('Website Mas Effendi | Muhammad Nur Effendi');

        // // Isi email
        // $this->email->message("Mohon Periksa Aplikasi Ada SPDP Baru");

        // Tampilkan pesan sukses atau error
        // if ($this->email->send()) {
        //     $this->session->set_flashdata('flash_email', 'Telah Terkirim');
        //     redirect('spdp');
        // } else {
        //     echo 'Error! email tidak dapat dikirim.';
        // }
    }
}
