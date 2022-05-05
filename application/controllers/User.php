<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Spdp_model');
    }
    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $email = $this->input->post('email'); // Ambil isi dari inputan username pada form login
        $password = $this->input->post('password'); // Ambil isi dari inputan password pada form login dan encrypt dengan md5

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
            $this->session->set_flashdata('message', 'Email tidak ditemukan'); // Buat session flashdata
            redirect('user'); // Redirect ke halaman login
        } else {
            if ($password == $user['password']) { // Jika password yang diinput sama dengan password yang didatabase
                $data = array(
                    'authenticated' => true, // Buat session authenticated dengan value true
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'file' => $user['file'],
                    'role' => $user['role'],
                    'email' => $user['email']
                );
                $this->session->set_userdata($data); // Buat session sesuai $session
                if ($data['role'] == 4) {
                    redirect('user/waka'); // Redirect ke halaman welcome
                } elseif ($data['role'] == 7) {
                    redirect('user/jpu');
                } else {
                    redirect('spdp');
                }
            } else {
                $this->session->set_flashdata('message', 'Email & Password Tidak Sesuai'); // Buat session flashdata
                redirect('user'); // Redirect ke halaman login
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy(); // Hapus semua session
        redirect('user'); // Redirect ke halaman login
    }

    public function jpu()
    {
        $id = $this->session->userdata('id_user');
        $data['spdp'] = $this->User_model->getJaksaById($id);
        $this->load->view('template/atas');
        $this->load->view('user/v_jpu', $data);
        $this->load->view('template/bawah');
    }

    public function waka()
    {
        $id = $this->session->userdata('id_user');
        $data['spdp'] = $this->User_model->getWakaById($id);
        $this->load->view('template/atas');
        $this->load->view('user/v_wakajati', $data);
        $this->load->view('template/bawah');
    }



    public function p1($id)
    {
        $data['spdp'] = $this->User_model->getSpdpById($id);
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_jpus1', $data);
            $this->load->view('template/bawah');
        } else {
            $this->User_model->ps1();
            $this->Spdp_model->s1tgl($id);
            // Konfigurasi email
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'priority' => '1',
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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu FROM data_pelapor AS pelapor INNER JOIN user AS j ON j.id_user = pelapor.jpu INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum INNER JOIN user AS k ON k.id_user = pelapor.koor INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik WHERE pelapor.id = '$id'");
            $data = $sql->row_array();

            $isi = $data['jp_email'] . ", " . $data['ks_email'] . ", " . $data['asp_email'] . ", " . $data['k_email'];
            // echo $isi;

            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('SPDP Baru');

            $data = array(
                'judul' => 'Perkara Ini Sudah Tahap 1 Dengan Rincian :',
                'penyidik' => $data['nama_penyidik'],
                'tsk' => $data['tsk'],
                'pasal' => $data['pasal'],
                'jpu' => $data['nama_jpu']
            );

            $body = $this->load->view('template_email.php', $data, TRUE);
            $this->email->message($body);

            //Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->Spdp_model->s1tgl($id);
                $this->session->set_flashdata('flash', 'DiProses');
                redirect('user/jpu');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }

    public function p17($id)
    {
        $data['spdp'] = $this->User_model->getSpdpById($id);
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_jpus17', $data);
            $this->load->view('template/bawah');
        } else {
            $this->User_model->sp17();
            // Konfigurasi email
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'priority' => '1',
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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu FROM data_pelapor AS pelapor 
            INNER JOIN user AS j ON j.id_user = pelapor.jpu 
            INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
            INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
            INNER JOIN user AS k ON k.id_user = pelapor.koor 
            INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik 
            WHERE pelapor.id = '$id'");
            $row = $sql->row_array();

            $isi = $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];
            // echo $isi;

            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('SPDP Status');

            $data = array(
                'judul' => 'Terbikan P-17 Dengan Rincian :',
                'penyidik' => $data['nama_penyidik'],
                'tsk' => $data['tsk'],
                'pasal' => $data['pasal'],
                'jpu' => $data['nama_jpu']
            );

            $body = $this->load->view('template_email.php', $data, TRUE);
            $this->email->message($body);

            // $isi1 = "Terbikan P-17 Dengan Rincian : 
            //         " . "<br>" .
            //     "Penyidik : "
            //     . $row['nama_penyidik'] . "
            //         " . "<br>" .
            //     "Nama Tersangka : "
            //     . $row['tsk'] . ".
            //         " . "<br>" .
            //     "Pasal : " . $row['pasal'] . " .
            //         " . "<br>" .
            //     "Status P17 : " . $row['p17'] . "
            //         " . "<br>" .
            //     " Nama JPU : " . $row['nama_jpu'] . "";

            // // Isi email
            // $this->email->message($isi1);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->session->set_flashdata('flash', 'DiProses');
                redirect('user/jpu');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }

    public function b1($id)
    {
        $data['spdp'] = $this->User_model->getSpdpById($id);
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_jpb1', $data);
            $this->load->view('template/bawah');
        } else {
            $bks = $this->input->post('bks');
            $this->User_model->tb1();
            // Konfigurasi email
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'priority' => '1',
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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu FROM data_pelapor AS pelapor 
            INNER JOIN user AS j ON j.id_user = pelapor.jpu 
            INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
            INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
            INNER JOIN user AS k ON k.id_user = pelapor.koor 
            INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik 
            WHERE pelapor.id = '$id'");
            $row = $sql->row_array();
            $wka = 'joem.borneo.wakajati@gmail.com';
            $isi = $wka . "," . $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];

            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('SPDP Status');

            // $isi1 = "Status Berkas : 
            //         " . "<br>" .
            //     "Penyidik : "
            //     . $row['nama_penyidik'] . "
            //         " . "<br>" .
            //     "Nama Tersangka : "
            //     . $row['tsk'] . ".
            //     " . "<br>" .
            //     "Status Berkas : "
            //     . $bks . ".
            //         " . "<br>" .
            //     "Pasal : " . $row['pasal'] . " .
            //         " . "<br>" .
            //     " Nama JPU : " . $row['nama_jpu'] . "";

            // // Isi email
            // $this->email->message($isi1);

            $data = array(
                'judul' => 'Status Berkas :',
                'penyidik' => $row['nama_penyidik'],
                'tsk' => $row['tsk'],
                'pasal' => $row['pasal'],
                'berkas' => $bks,
                'jpu' => $row['nama_jpu']
            );

            $body = $this->load->view('template_email.php', $data, TRUE);
            $this->email->message($body);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->session->set_flashdata('flash', 'DiProses');
                redirect('user/jpu');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }

    public function bexposes($id)
    {
        $data['spdp'] = $this->User_model->getSpdpById($id);
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_jpexposes', $data);
            $this->load->view('template/bawah');
        } else {
            $t4 = $this->input->post('tempat');
            $time = $this->input->post('waktu');
            $this->User_model->uexposes();
            $this->User_model->texposes();

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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu, ex.waktu 
            FROM data_pelapor AS pelapor 
            INNER JOIN user AS j ON j.id_user = pelapor.jpu 
            INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
            INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
            INNER JOIN user AS k ON k.id_user = pelapor.koor 
            INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik 
            INNER JOIN exposes AS ex ON ex.id_exposes = pelapor.jexposes 
            WHERE pelapor.id = '$id'");
            $row = $sql->row_array();
            $wka = 'joem.borneo.wakajati@gmail.com';
            $isi = $wka . "," . $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];
            $waktu = $row['waktu'];
            $tgl = date_create($waktu);
            $indo = date_format($tgl, 'd/m/Y H:i');
            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('Exposes');

            // $isi1 = "Exposes akan dilakukan di " . $t4 . "Pada" . $indo . "  : 
            //         " . "<br>" .
            //     "Penyidik : "
            //     . $row['nama_penyidik'] . "
            //         " . "<br>" .
            //     "Nama Tersangka : "
            //     . $row['tsk'] . ".
            //     " . "<br>" .
            //     "Pasal : " . $row['pasal'] . " .
            //         " . "<br>" .
            //     " Nama JPU : " . $row['nama_jpu'] . "";

            // // Isi email
            // $this->email->message($isi1);

            $data = array(
                'judul' => 'Pelaksanaan Exposes :',
                't4' => $t4,
                'indo' => $indo,
                'penyidik' => $row['nama_penyidik'],
                'tsk' => $row['tsk'],
                'pasal' => $row['pasal'],
                'jpu' => $row['nama_jpu']
            );
            $body = $this->load->view('template_email.php', $data, TRUE);
            $this->email->message($body);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->session->set_flashdata('flash', 'Pemberitahuan Exposes Sudah Terkirim');
                redirect('user/jpu');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }

    public function wexposes($id)
    {
        $data['spdp'] = $this->User_model->getSpdpById($id);
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_wexposes', $data);
            $this->load->view('template/bawah');
        } else {
            $t4 = $this->input->post('tempat');

            $this->User_model->uexposes();
            $this->User_model->texposes();

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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu, ex.waktu
            
            FROM data_pelapor AS pelapor 
            INNER JOIN user AS j ON j.id_user = pelapor.jpu 
            INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
            INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
            INNER JOIN user AS k ON k.id_user = pelapor.koor 
            INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik 
            INNER JOIN exposes AS ex ON ex.id_exposes = pelapor.jexposes 
            WHERE pelapor.id = '$id'");
            $row = $sql->row_array();
            $wka = 'joem.borneo.wakajati@gmail.com';
            $isi = $wka . "," . $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];

            $waktu = $row['waktu'];
            $tgl = date_create($waktu);
            $indo = date_format($tgl, 'd/m/Y H:i');

            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('Exposes');

            // $isi1 = "Exposes akan dilakukan di " . $t4 . "Pada" . $indo . "  : 
            //         " . "<br>" .
            //     "Penyidik : "
            //     . $row['nama_penyidik'] . "
            //         " . "<br>" .
            //     "Nama Tersangka : "
            //     . $row['tsk'] . "
            //     " . "<br>" .
            //     "Pasal : " . $row['pasal'] . " .
            //         " . "<br>" .
            //     " Nama JPU : " . $row['nama_jpu'] . "";

            // // Isi email
            // $this->email->message($isi1);

            $data = array(
                'judul' => 'Pelaksanaan Exposes :',
                't4' => $t4,
                'indo' => $indo,
                'penyidik' => $row['nama_penyidik'],
                'tsk' => $row['tsk'],
                'pasal' => $row['pasal'],
                'jpu' => $row['nama_jpu']
            );
            $body = $this->load->view('template_email.php', $data, TRUE);
            $this->email->message($body);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->session->set_flashdata('flash', 'Pemberitahuan Exposes Sudah Terkirim');
                redirect('user/waka');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }


    public function hexposes($id)
    {
        $data['spdp'] = $this->User_model->getSpdpByIdh($id);
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_jphasile', $data);
            $this->load->view('template/bawah');
        } else {
            $this->User_model->hasile($id);
            $hasil = $this->input->post('hasil_exposes');

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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu FROM data_pelapor AS pelapor 
            INNER JOIN user AS j ON j.id_user = pelapor.jpu 
            INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
            INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
            INNER JOIN user AS k ON k.id_user = pelapor.koor 
            INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik 
            WHERE pelapor.id = '$id'");
            $row = $sql->row_array();
            $wka = 'joem.borneo.wakajati@gmail.com';
            $isi = $wka . "," . $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];

            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('Hasil Exposes');

            // $isi1 = "Hasil Exposes Adalah " . "$hasil" . " 
            //         " . "<br>" .
            //     "Penyidik : "
            //     . $row['nama_penyidik'] . "
            //         " . "<br>" .
            //     "Nama Tersangka : "
            //     . $row['tsk'] . ".
            //     " . "<br>" .
            //     "Pasal : " . $row['pasal'] . " .
            //         " . "<br>" .
            //     " Nama JPU : " . $row['nama_jpu'] . "";

            // // Isi email
            // $this->email->message($isi1);

            $data = array(
                'judul' => 'Hasil Exposes Adalah :',
                'hasil' => $hasil,
                'penyidik' => $row['nama_penyidik'],
                'tsk' => $row['tsk'],
                'pasal' => $row['pasal'],
                'jpu' => $row['nama_jpu']
            );
            $body = $this->load->view('template_email.php', $data, TRUE);
            $this->email->message($body);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->session->set_flashdata('flash', 'Pemberitahuan Exposes Sudah Terkirim');
                redirect('user/jpu');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }

    public function p18($id)
    {
        $data['spdp'] = $this->User_model->getSpdpByIdh($id);
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_jp18', $data);
            $this->load->view('template/bawah');
        } else {

            $hasil = $this->input->post('p18');

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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17, pelapor.petunjuk AS petunjuk,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu 
            FROM data_pelapor AS pelapor 
            INNER JOIN user AS j ON j.id_user = pelapor.jpu 
            INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
            INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
            INNER JOIN user AS k ON k.id_user = pelapor.koor 
            INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik 
            WHERE pelapor.id = '$id'");
            $row = $sql->row_array();
            $wka = 'joem.borneo.wakajati@gmail.com';
            $isi = $wka . "," . $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];

            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('P-18');

            $isi1 = "Petunjuk " . "$hasil" . " Dikirim Ke Penyidik 
                    " . "<br>" .
                "Penyidik : "
                . $row['nama_penyidik'] . "
                    " . "<br>" .
                "Nama Tersangka : "
                . $row['tsk'] . ".
                " . "<br>" .
                "Pasal : " . $row['pasal'] . " .
                    " . "<br>" .
                " Nama JPU : " . $row['nama_jpu'] . "";

            // Isi email
            $this->email->message($isi1);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->User_model->sp18($id);
                $this->session->set_flashdata('flash', 'Pemberitahuan Exposes Sudah Terkirim');
                redirect('user/jpu');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }

    public function p21($id)
    {
        $data['spdp'] = $this->User_model->getSpdpById($id);
        $data['kejari'] = $this->Spdp_model->getKejari();
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_jp21', $data);
            $this->load->view('template/bawah');
        } else {
            $this->User_model->t2($id);


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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.tgl_t2 AS tgl_t2,pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17, pelapor.petunjuk AS petunjuk,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu,
            pelapor.kejari, sj.satker
                        FROM data_pelapor AS pelapor 
                        INNER JOIN user AS j ON j.id_user = pelapor.jpu 
                        INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
                        INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
                        INNER JOIN user AS k ON k.id_user = pelapor.koor 
                        INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik 
                        INNER JOIN satker_jaksa AS sj ON sj.id_satker = pelapor.kejari
            WHERE pelapor.id = '$id'");
            $row = $sql->row_array();

            $waktu = $row['tgl_t2'];
            $tgl = date_create($waktu);
            $indo = date_format($tgl, 'd/m/Y H:i');
            $wka = 'joem.borneo.wakajati@gmail.com';
            $isi = $wka . "," . $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];

            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('P-21');

            $isi1 = "Tahap 2 Akan Dilakukan Di " . $row['satker'] . "  Pada " . $indo . " 
                    " . "<br>" .
                "Penyidik : "
                . $row['nama_penyidik'] . "
                    " . "<br>" .
                "Nama Tersangka : "
                . $row['tsk'] . ".
                " . "<br>" .
                "Pasal : " . $row['pasal'] . " .
                    " . "<br>" .
                " Nama JPU : " . $row['nama_jpu'] . "";

            // Isi email
            $this->email->message($isi1);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {

                $this->session->set_flashdata('flash', 'Pemberitahuan Exposes Sudah Terkirim');
                redirect('user/jpu');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }

    public function t2($id)
    {
        $data['spdp'] = $this->User_model->getSpdpById($id);
        $data['kejari'] = $this->Spdp_model->getKejari();
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_jt2', $data);
            $this->load->view('template/bawah');
        } else {

            $hasil = $this->input->post('t2');

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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17, pelapor.petunjuk AS petunjuk,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu 
            FROM data_pelapor AS pelapor 
            INNER JOIN user AS j ON j.id_user = pelapor.jpu 
            INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
            INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
            INNER JOIN user AS k ON k.id_user = pelapor.koor 
            INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik 
            WHERE pelapor.id = '$id'");
            $row = $sql->row_array();
            $wka = 'joem.borneo.wakajati@gmail.com';
            $isi = $wka . "," . $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];

            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('Status Tahap 2');

            $isi1 = "Tahap 2 " . "$hasil" . " Dilakukan " . " 
                    " . "<br>" .
                "Penyidik : "
                . $row['nama_penyidik'] . "
                    " . "<br>" .
                "Nama Tersangka : "
                . $row['tsk'] . ".
                " . "<br>" .
                "Pasal : " . $row['pasal'] . " .
                    " . "<br>" .
                " Nama JPU : " . $row['nama_jpu'] . "";

            // Isi email
            $this->email->message($isi1);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->User_model->st2($id);
                $this->session->set_flashdata('flash', 'Pemberitahuan Exposes Sudah Terkirim');
                redirect('user/jpu');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }

    public function w1($id)
    {
        $data['spdp'] = $this->User_model->getSpdpById($id);
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('user/v_pe', $data);
            $this->load->view('template/bawah');
        } else {
            $bks = $this->input->post('bks');
            $this->User_model->tb11();
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

            $sql = $this->db->query("SELECT pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS pasal ,pelapor.s1 AS sts, pelapor.penyidik as penyidik,pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp, pelapor.koor AS koor, pelapor.p17 AS p17,j.email AS jp_email, ksi.email AS ks_email, asp.email AS asp_email , k.email AS k_email , p.nama AS nama_penyidik, j.nama as nama_jpu FROM data_pelapor AS pelapor 
            INNER JOIN user AS j ON j.id_user = pelapor.jpu 
            INNER JOIN user AS ksi ON ksi.id_user = pelapor.kasi 
            INNER JOIN user AS asp ON asp.id_user = pelapor.aspidum 
            INNER JOIN user AS k ON k.id_user = pelapor.koor 
            INNER JOIN instansi AS p ON p.id_instansi = pelapor.penyidik 
            WHERE pelapor.id = '$id'");
            $row = $sql->row_array();
            $wka = 'joem.borneo.wakajati@gmail.com';
            $isi = $wka . "," . $row['jp_email'] . ", " . $row['ks_email'] . ", " . $row['asp_email'] . ", " . $row['k_email'];

            // Email penerima
            $this->email->to($isi); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('SPDP Status');

            // $isi1 = "Status Berkas : 
            //         " . "<br>" .
            //     "Penyidik : "
            //     . $row['nama_penyidik'] . "
            //         " . "<br>" .
            //     "Nama Tersangka : "
            //     . $row['tsk'] . ".
            //     " . "<br>" .
            //     "Status Berkas : "
            //     . $bks . ".
            //         " . "<br>" .
            //     "Pasal : " . $row['pasal'] . " .
            //         " . "<br>" .
            //     " Nama JPU : " . $row['nama_jpu'] . "";

            // // Isi email
            // $this->email->message($isi1);

            $data = array(
                'judul' => 'Pelaksanaan Exposes :',
                'berkas' => $bks,
                'penyidik' => $row['nama_penyidik'],
                'tsk' => $row['tsk'],
                'pasal' => $row['pasal'],
                'jpu' => $row['nama_jpu']
            );
            $body = $this->load->view('template_email.php', $data, TRUE);
            $this->email->message($body);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->session->set_flashdata('flash', 'DiProses');
                redirect('user/waka');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }
}
