<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spdp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Spdp_model');
    }
    public function index()
    {
        $data['spdp'] = $this->Spdp_model->getAllSpdp();
        $this->load->view('template/atas');
        $this->load->view('spdp/index', $data);
        $this->load->view('template/bawah');
    }

    public function add()
    {
        $data['penyidik'] = $this->Spdp_model->getPenyidik();
        $data['jpu'] = $this->Spdp_model->getJPU();
        $data['kasi'] = $this->Spdp_model->getKASI();
        $data['aspidum'] = $this->Spdp_model->getASPIDUM();
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('spdp/tambah', $data);
            $this->load->view('template/bawah');
        } else {
            $this->Spdp_model->tambah();
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

            // Email penerima
            $this->email->to('siemail.mne@gmail.com'); // Ganti dengan email tujuan

            // // Lampiran email, isi dengan url/path file
            // $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

            // Subject email
            $this->email->subject('Website Mas Effendi | Muhammad Nur Effendi');

            // Isi email
            $this->email->message("Mohon Periksa Aplikasi Ada SPDP Baru");

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                echo 'Sukses! email berhasil dikirim.';
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('spdp');
        }
    }

    public function update($id)
    {
        $data['spdp'] = $this->Spdp_model->getSpdpById($id);
        $data['penyidik'] = $this->Spdp_model->getPenyidik();
        $data['jpu'] = $this->Spdp_model->getJPU();
        $data['kasi'] = $this->Spdp_model->getKASI();
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('spdp/edit', $data);
            $this->load->view('template/bawah');
        } else {
            $this->Spdp_model->edit();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('spdp');
        }
    }

    public function delete($id)
    {
        $this->Spdp_model->hapus($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('spdp');
    }
}
