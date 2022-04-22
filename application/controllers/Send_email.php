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
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.tgl AS tgl ,pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu ,DATEDIFF(CURDATE(),s1_tgl) FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE DATEDIFF(CURDATE(),s1_tgl)=5");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {
            foreach ($sql->result_array() as $u) {
                $selisih = $u['sts'];
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
                    $this->email->to($u['jp_email']); // Ganti dengan email tujuan

                    // Subject email
                    $this->email->subject('Mohon Tindak Lanjut SPDP');

                    $isi1 = "Apakah Sudah Tahap 1 Dari Perkara Berikut : 
                            " . "<br>" .
                        "Penyidik : "
                        . $u['nama_penyidik'] . "
                            " . "<br>" .
                        "Nama Tersangka : "
                        . $u['tsk'] . ".
                            " . "<br>" .
                        "Pasal : " . $u['pasal'] . " .
                            " . "<br>" .
                        " Nama JPU : " . $u['nama_jpu'] . "";

                    // Isi email
                    $this->email->message($isi1);

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
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.tgl AS tgl ,pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu ,DATEDIFF(CURDATE(),s1_tgl) FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE DATEDIFF(CURDATE(),s1_tgl)=10");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['sts'];
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
                    $this->email->to($u['jp_email']); // Ganti dengan email tujuan

                    // Subject email
                    $this->email->subject('Mohon Tindak Lanjut SPDP');

                    $isi1 = "Apakah Sudah Tahap 1 Dari Perkara Berikut : 
                            " . "<br>" .
                        "Penyidik : "
                        . $u['nama_penyidik'] . "
                            " . "<br>" .
                        "Nama Tersangka : "
                        . $u['tsk'] . ".
                            " . "<br>" .
                        "Pasal : " . $u['pasal'] . " .
                            " . "<br>" .
                        " Nama JPU : " . $u['nama_jpu'] . "";

                    // Isi email
                    $this->email->message($isi1);

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
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.tgl AS tgl ,pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu ,DATEDIFF(CURDATE(),s1_tgl) FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE DATEDIFF(CURDATE(),s1_tgl)=15");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['sts'];
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
                    $this->email->to($u['jp_email']); // Ganti dengan email tujuan

                    // Subject email
                    $this->email->subject('Mohon Tindak Lanjut SPDP');

                    $isi1 = "Apakah Sudah Tahap 1 Dari Perkara Berikut : 
                            " . "<br>" .
                        "Penyidik : "
                        . $u['nama_penyidik'] . "
                            " . "<br>" .
                        "Nama Tersangka : "
                        . $u['tsk'] . ".
                            " . "<br>" .
                        "Pasal : " . $u['pasal'] . " .
                            " . "<br>" .
                        " Nama JPU : " . $u['nama_jpu'] . "";

                    // Isi email
                    $this->email->message($isi1);

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
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.tgl AS tgl ,pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu ,DATEDIFF(CURDATE(),s1_tgl) FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE DATEDIFF(CURDATE(),s1_tgl)=20");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['sts'];
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

                    $isi1 = "Apakah Sudah Tahap 1 Dari Perkara Berikut : 
                            " . "<br>" .
                        "Penyidik : "
                        . $u['nama_penyidik'] . "
                            " . "<br>" .
                        "Nama Tersangka : "
                        . $u['tsk'] . ".
                            " . "<br>" .
                        "Pasal : " . $u['pasal'] . " .
                            " . "<br>" .
                        " Nama JPU : " . $u['nama_jpu'] . "";

                    // Isi email
                    $this->email->message($isi1);

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
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.tgl AS tgl ,pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu ,DATEDIFF(CURDATE(),s1_tgl) FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE DATEDIFF(CURDATE(),s1_tgl)=25");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['sts'];
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

                    $isi1 = "Terbikan P-17 Dengan Rincian : 
                    " . "<br>" .
                        "Penyidik : "
                        . $u['nama_penyidik'] . "
                    " . "<br>" .
                        "Nama Tersangka : "
                        . $u['tsk'] . ".
                    " . "<br>" .
                        "Pasal : " . $u['pasal'] . " .
                    " . "<br>" .
                        " Nama JPU : " . $u['nama_jpu'] . "";

                    // Isi email
                    $this->email->message($isi1);

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
        //H+30
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.tgl AS tgl ,pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu ,DATEDIFF(CURDATE(),s1_tgl) FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE DATEDIFF(CURDATE(),s1_tgl)=30");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['sts'];
                if ($selisih == "n") {
                    echo "ada selisih 30 hari";
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

                    $isi1 = "Terbikan P-17 Dengan Rincian : 
                    " . "<br>" .
                        "Penyidik : "
                        . $u['nama_penyidik'] . "
                    " . "<br>" .
                        "Nama Tersangka : "
                        . $u['tsk'] . ".
                    " . "<br>" .
                        "Pasal : " . $u['pasal'] . " .
                    " . "<br>" .
                        "Status P17 : " . $u['p17'] . "
                    " . "<br>" .
                        " Nama JPU : " . $u['nama_jpu'] . "";

                    // Isi email
                    $this->email->message($isi1);

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        echo 'Berhasil! email terkirim.';
                    } else {
                        echo 'Error! email tidak dapat dikirim.';
                    }
                }
            }
        } else {
            echo "Tidak ada selisih 30 hari";
        }

        //H+31
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.tgl AS tgl ,pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu ,DATEDIFF(CURDATE(),s1_tgl) FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE DATEDIFF(CURDATE(),s1_tgl)=31");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['sts'];
                if ($selisih == "n") {
                    echo "ada selisih 31 hari";
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

                    $isi1 = "Perkara Ini P-17 Dengan Rincian : 
                        " . "<br>" .
                        "Penyidik : "
                        . $u['nama_penyidik'] . "
                        " . "<br>" .
                        "Nama Tersangka : "
                        . $u['tsk'] . ".
                        " . "<br>" .
                        "Pasal : " . $u['pasal'] . " .
                        " . "<br>" .
                        "Status P17 : " . $u['p17'] . "
                        " . "<br>" .
                        " Nama JPU : " . $u['nama_jpu'] . "";

                    // echo $isi1;

                    // Isi email
                    $this->email->message($isi1);

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        $id = $u['id'];
                        $this->db->where('id', $id);
                        $data = [
                            "p17" => 'y'
                        ];
                        $this->db->update('data_pelapor', $data);
                        echo 'Berhasil! email terkirim.';
                    } else {
                        echo 'Error! email tidak dapat dikirim.';
                    }
                }
            }
        } else {
            echo "Tidak ada selisih 31 hari";
        }

        //H+4T2
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.s1_tgl AS s1_tgl , pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal , pelapor.s1 AS sts, pelapor.penyidik as penyidik, pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17, j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu , DATEDIFF(CURDATE(),s1_tgl) FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE DATEDIFF(CURDATE(),s1_tgl)=4 && berkas IS NULL");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['sts'];
                if ($selisih == "y") {
                    echo "ada selisih 4 hari T2";
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

                    $isi1 = "Apakah Berkas Berikut Sudah Lengkap ? : 
                            " . "<br>" .
                        "Penyidik : "
                        . $u['nama_penyidik'] . "
                            " . "<br>" .
                        "Nama Tersangka : "
                        . $u['tsk'] . ".
                            " . "<br>" .
                        "Pasal : " . $u['pasal'] . " .
                            " . "<br>" .
                        " Nama JPU : " . $u['nama_jpu'] . "";

                    // Isi email
                    $this->email->message($isi1);

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        echo 'Berhasil! email terkirim.';
                    } else {
                        echo 'Error! email tidak dapat dikirim.';
                    }
                }
            }
        } else {
            echo "Tidak ada selisih 4 hari T2";
        }

        //H+6T2
        $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.s1_tgl AS s1_tgl , pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal , pelapor.s1 AS sts, pelapor.penyidik as penyidik, pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17, j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu , DATEDIFF(CURDATE(),s1_tgl) FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE DATEDIFF(CURDATE(),s1_tgl)=6 && berkas IS NULL");
        $cek_nim = $sql->num_rows();
        if ($cek_nim > 0) {

            foreach ($sql->result_array() as $u) {
                $selisih = $u['sts'];
                if ($selisih == "y") {
                    echo "ada selisih 4 hari T2";
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

                    $isi1 = "Apakah Berkas Berikut Sudah Lengkap ? : 
                            " . "<br>" .
                        "Penyidik : "
                        . $u['nama_penyidik'] . "
                            " . "<br>" .
                        "Nama Tersangka : "
                        . $u['tsk'] . ".
                            " . "<br>" .
                        "Pasal : " . $u['pasal'] . " .
                            " . "<br>" .
                        " Nama JPU : " . $u['nama_jpu'] . "";

                    // Isi email
                    $this->email->message($isi1);

                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        echo 'Berhasil! email terkirim.';
                    } else {
                        echo 'Error! email tidak dapat dikirim.';
                    }
                }
            }
        } else {
            echo "Tidak ada selisih 6 hari T2";
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
