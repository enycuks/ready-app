<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send_email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Spdp_model');
    }

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
        //H+5
        $sql = $this->db->query("SELECT data_pelapor.id, data_pelapor.nama_tersangka, 
        data_pelapor.s1, data_pelapor.jpu,
        user.id_user, user.nama,user.email,

        DATEDIFF(tgl, CURDATE())
        FROM data_pelapor 

        INNER JOIN user
        ON data_pelapor.jpu = user.id_user

        WHERE DATEDIFF(tgl, CURDATE())=5");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {
            foreach ($sql->result_array() as $u) {
                $selisih = $u['s1'];
                if ($selisih == "n") {
                    echo "ada selisih 5 hari";
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
                    $this->email->from('enycuks@gmail.com', 'Koordinator SPDP');

                    // Email penerima
                    $this->email->to($u['email']); // Ganti dengan email tujuan

                    // Subject email
                    $this->email->subject('Mohon Tindak Lanjut SPDP');

                    $isi = "Mohon Periksa Aplikasi Ada SPDP Baru Atas Nama " .  $u['nama_tersangka'];

                    // Isi email
                    $this->email->message($isi);

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        echo 'Berhasil! email terkirim.';
                    } else {
                        echo 'Error! email tidak dapat dikirim.';
                    }
                }
            }
        } else {
            echo "Tidak ada selisih 5 hari";
        }

        //H+10
        $sql = $this->db->query("SELECT data_pelapor.id, data_pelapor.nama_tersangka, 
        data_pelapor.s1, data_pelapor.jpu,
        user.id_user, user.nama,user.email,

        DATEDIFF(tgl, CURDATE())
        FROM data_pelapor 

        INNER JOIN user
        ON data_pelapor.jpu = user.id_user

        WHERE DATEDIFF(tgl, CURDATE())=10");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['s1'];
                if ($selisih == "n") {
                    echo "ada selisih 10 hari";
                    // // Konfigurasi email
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
                    $this->email->from('enycuks@gmail.com', 'Koordinator SPDP');

                    // Email penerima
                    $this->email->to($u['email']); // Ganti dengan email tujuan

                    // Subject email
                    $this->email->subject('Mohon Tindak Lanjut SPDP');

                    $isi = "Mohon Periksa Aplikasi Ada SPDP Baru Atas Nama " .  $u['nama_tersangka'];

                    // Isi email
                    $this->email->message($isi);

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        echo 'Berhasil! email terkirim.';
                    } else {
                        echo 'Error! email tidak dapat dikirim.';
                    }
                }
            }
        } else {
            echo "Tidak ada selisih 10 hari";
        }

        //H+15
        $sql = $this->db->query("SELECT data_pelapor.id, data_pelapor.nama_tersangka, 
        data_pelapor.s1, data_pelapor.jpu,
        user.id_user, user.nama,user.email,

        DATEDIFF(tgl, CURDATE())
        FROM data_pelapor 

        INNER JOIN user
        ON data_pelapor.jpu = user.id_user

        WHERE DATEDIFF(tgl, CURDATE())=15");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['s1'];
                if ($selisih == "n") {
                    echo "ada selisih 15 hari";
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
                    $this->email->from('enycuks@gmail.com', 'Koordinator SPDP');

                    // Email penerima
                    $this->email->to($u['email']); // Ganti dengan email tujuan

                    // Subject email
                    $this->email->subject('Mohon Tindak Lanjut SPDP');

                    $isi = "Mohon Periksa Aplikasi Ada SPDP Baru Atas Nama " .  $u['nama_tersangka'];

                    // Isi email
                    $this->email->message($isi);

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        echo 'Berhasil! email terkirim.';
                    } else {
                        echo 'Error! email tidak dapat dikirim.';
                    }
                }
            }
        } else {
            echo "Tidak ada selisih 15 hari";
        }

        //H+20
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.tgl AS tgl, pelapor.nama_tersangka AS tsk, pelapor.s1 AS s1, pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email,

        DATEDIFF(tgl, CURDATE())
        FROM data_pelapor AS pelapor

        INNER JOIN user AS j ON j.id_user = pelapor.jpu 
        INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
        INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
        INNER JOIN user AS k ON k.id_user = pelapor.koor

        WHERE DATEDIFF(tgl, CURDATE())=20");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['s1'];
                if ($selisih == "n") {
                    echo "ada selisih 20 hari";
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
                    $this->email->from('enycuks@gmail.com', 'Koordinator SPDP');

                    // Email penerima
                    $isi = $u['jp_email'] . ", " . $u['ks_email'] . ", " . $u['asp_email'] . ", " . $u['k_email'];
                    // echo $isi;
                    $this->email->to($isi); // Ganti dengan email tujuan

                    // Subject email
                    $this->email->subject('Mohon Tindak Lanjut SPDP');

                    $isi = "Mohon Periksa Aplikasi Ada SPDP Baru Atas Nama " .  $u['tsk'];

                    // Isi email
                    $this->email->message($isi);

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        echo 'Berhasil! email terkirim.';
                    } else {
                        echo 'Error! email tidak dapat dikirim.';
                    }
                }
            }
        } else {
            echo "Tidak ada selisih 20 hari";
        }
        //H+25
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.tgl AS tgl, pelapor.nama_tersangka AS tsk, pelapor.s1 AS s1, pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email,

           DATEDIFF(tgl, CURDATE())
           FROM data_pelapor AS pelapor
   
           INNER JOIN user AS j ON j.id_user = pelapor.jpu 
           INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
           INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
           INNER JOIN user AS k ON k.id_user = pelapor.koor
   
           WHERE DATEDIFF(tgl, CURDATE())=25");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['s1'];
                if ($selisih == "n") {
                    echo "ada selisih 25 hari";
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
                    $this->email->from('enycuks@gmail.com', 'Koordinator SPDP');

                    // Email penerima
                    $isi = $u['jp_email'] . ", " . $u['ks_email'] . ", " . $u['asp_email'] . ", " . $u['k_email'];
                    // echo $isi;
                    $this->email->to($isi); // Ganti dengan email tujuan

                    // Subject email
                    $this->email->subject('Mohon Tindak Lanjut SPDP');

                    $isi = "Mohon Periksa Aplikasi Ada SPDP Baru Atas Nama " .  $u['tsk'];

                    // Isi email
                    $this->email->message($isi);

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        echo 'Berhasil! email terkirim.';
                    } else {
                        echo 'Error! email tidak dapat dikirim.';
                    }
                }
            }
        } else {
            echo "Tidak ada selisih 25 hari";
        }
    }


    public function awal($id)
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
        $this->email->from('enycuks@gmail.com', 'Koordinator SPDP');

        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.s1 AS sts, pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor WHERE pelapor.id = '$id'");
        $row = $sql->row_array();

        $isi = $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];
        // echo $isi;

        // Email penerima
        $this->email->to($isi); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('SPDP Baru');

        // Isi email
        $this->email->message("Ada SPDP Baru, Agar Segera Dicek Pada Dashboard sippakk.com");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $this->Spdp_model->tgl($id);
            $this->session->set_flashdata('flash_email', 'Email Berhasil Terkirim');
            redirect('spdp');
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

    public function s1($id)
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
        $this->email->from('enycuks@gmail.com', 'Koordinator SPDP');

        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.s1 AS sts, pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor WHERE pelapor.id = '$id'");
        $row = $sql->row_array();

        $isi = $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];
        // echo $isi;

        // Email penerima
        $this->email->to($isi); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('SPDP Baru');

        $isi = "Perkara Ini Sudah Tahap 1 Dengan Rincian : Penyidik " .  $row['tsk'] . ", nama Tersangka Pasal";

        // Isi email
        $this->email->message($isi);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $this->Spdp_model->tgl($id);
            $this->session->set_flashdata('flash_email', 'Email Berhasil Terkirim');
            redirect('spdp');
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }
}
