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
    // public function index()
    // {

    //     // $sql = $this->db->query("SELECT data_pelapor.id, data_pelapor.nama_tersangka, 
    //     // data_pelapor.status, data_pelapor.jpu,
    //     // user.id_user, user.nama,user.email,

    //     // DATEDIFF(tgl, CURDATE())
    //     // FROM data_pelapor 

    //     // INNER JOIN user
    //     // ON data_pelapor.jpu = user.id_user

    //     // WHERE (CURDATE()-(tgl)) = 4");
    //     // $cek_nim = $sql->num_rows();
    //     // if ($cek_nim > 0) {
    //     //     // echo "ada selisih 4 hari";
    //     //     $flag = TRUE;
    //     //     foreach ($sql->result_array() as $u) {
    //     //         $selisih = $u['status'];
    //     //         if ($selisih == "n") {
    //     //             // Konfigurasi email
    //     //             $config = [
    //     //                 'mailtype'  => 'html',
    //     //                 'charset'   => 'utf-8',
    //     //                 'protocol'  => 'smtp',
    //     //                 'smtp_host' => 'smtp.gmail.com',
    //     //                 'smtp_user' => 'enycuks@gmail.com',  // Email gmail
    //     //                 'smtp_pass'   => 'HiuPutih241',  // Password gmail
    //     //                 'smtp_crypto' => 'ssl',
    //     //                 'smtp_port'   => 465,
    //     //                 'crlf'    => "\r\n",
    //     //                 'newline' => "\r\n"
    //     //             ];

    //     //             // Load library email dan konfigurasinya
    //     //             $this->load->library('email', $config);

    //     //             // Email dan nama pengirim
    //     //             $this->email->from('enycuks@gmail.com', 'Mas Fendi');

    //     //             // Email penerima
    //     //             $this->email->to($u['email']); // Ganti dengan email tujuan

    //     //             // Subject email
    //     //             $this->email->subject('Website Mas Effendi | Muhammad Nur Effendi');

    //     //             $isi = "Mohon Periksa Aplikasi Ada SPDP Baru Atas Nama " .  $u['nama_tersangka'];

    //     //             // Isi email
    //     //             $this->email->message($isi);

    //     //             // Tampilkan pesan sukses atau error
    //     //             if ($this->email->send()) {
    //     //                 echo 'Berhasil! email terkirim.';
    //     //             } else {
    //     //                 echo 'Error! email tidak dapat dikirim.';
    //     //             }
    //     //         }
    //     //     }
    //     // } else {
    //     //     echo "Tidak ada selisih 4 hari";
    //     // }

    //     // $sql = $this->db->query("SELECT id, nama_tersangka, status, DATEDIFF(tgl, CURDATE()) AS Umur 
    //     // FROM data_pelapor WHERE (CURDATE()-(tgl)) = 8");
    //     // $cek_nim = $sql->num_rows();
    //     // if ($cek_nim > 0) {
    //     //     // echo "ada selisih 8 hari";
    //     //     foreach ($sql->result_array() as $u) {
    //     //         $selisih = $u['status'];
    //     //         if ($selisih == "y") {
    //     //             $awal  = $u['nama_tersangka'];
    //     //             echo $awal;
    //     //         }
    //     //     }
    //     // } else {
    //     //     // echo "Tidak ada selisih 8 hari";
    //     // }

    // }

    public function index($id)
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

        // Email dan nama pengirim
        $this->email->from('enycuks@gmail.com', 'Mas Fendi');

        $sql = $this->db->query("SELECT data_pelapor.id, data_pelapor.nama_tersangka, 
        data_pelapor.status, data_pelapor.jpu, data_pelapor.kasi, data_pelapor.aspidum, user.id_user, user.nama,user.email,  FROM data_pelapor WHERE data_pelapor.id = $id
        INNER JOIN user ON data_pelapor.jpu = user.id_user");
        $row = $sql->row_array();
        var_dump($row);

        // // Email penerima
        // $this->email->to('joem.borneo@gmail.com'); // Ganti dengan email tujuan

        // // Subject email
        // $this->email->subject('Website Mas Effendi | Muhammad Nur Effendi');

        // // Isi email
        // $this->email->message("Mohon Periksa Aplikasi Ada SPDP Baru");

        // // Tampilkan pesan sukses atau error
        // if ($this->email->send()) {
        //     echo 'Sukses! email berhasil dikirim.';
        // } else {
        //     echo 'Error! email tidak dapat dikirim.';
        // }
    }
}
