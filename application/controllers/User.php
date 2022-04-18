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
            $this->session->set_flashdata('flash', 'DiProses');
            redirect('user/jpu');
        }
    }
}
