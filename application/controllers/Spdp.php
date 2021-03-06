<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spdp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Spdp_model');
        if (!$this->session->userdata('authenticated')) // Jika tidak ada
            redirect('user'); // Redirect ke halaman login
    }
    public function index()
    {
        $data['spdp'] = $this->Spdp_model->getAllSpdp();
        $this->load->view('template/atas');
        $this->load->view('spdp/index', $data);
        $this->load->view('template/bawah');
    }

    public function cek()
    {
        $this->load->view('email_template');
    }

    public function cek1()
    {
        $this->load->view('template_email');
    }

    public function add()
    {
        $data['penyidik'] = $this->Spdp_model->getPenyidik();
        $data['jpu'] = $this->Spdp_model->getJPU();
        $data['kasi'] = $this->Spdp_model->getKASI();
        $data['aspidum'] = $this->Spdp_model->getASPIDUM();
        $data['koor'] = $this->Spdp_model->getKoor();
        $data['waka'] = $this->Spdp_model->getWAKA();
        $this->form_validation->set_rules('penyidik', 'Penyidik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('spdp/tambah', $data);
            $this->load->view('template/bawah');
        } else {
            $this->Spdp_model->tambah();
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
        $data['aspidum'] = $this->Spdp_model->getASPIDUM();
        $data['koor'] = $this->Spdp_model->getKoor();
        $data['waka'] = $this->Spdp_model->getWAKA();
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
