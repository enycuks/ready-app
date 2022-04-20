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
                    'email' => $user['email']
                );

                $this->session->set_userdata($data); // Buat session sesuai $session
                redirect('user/jpu'); // Redirect ke halaman welcome
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

            $isi = "SPDP Tahap 1 Atas " .  $row['tsk'] . " Sudah Lengkap";

            // Isi email
            $this->email->message($isi);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->Spdp_model->s1tgl($id);
                $this->session->set_flashdata('flash', 'DiProses');
                redirect('user/jpu');
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }
}
