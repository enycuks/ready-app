<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jaksa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jaksa_model');
    }
    public function index()
    {
        $data['jaksa'] = $this->Jaksa_model->getAllJaksa();
        $this->load->view('template/atas');
        $this->load->view('Jaksa/index', $data);
        $this->load->view('template/bawah');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('Jaksa/tambah');
            $this->load->view('template/bawah');
        } else {
            $this->Jaksa_model->tambah();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('jaksa');
        }
    }

    public function update($id)
    {
        $data['jaksa'] = $this->Jaksa_model->getJaksaById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('Jaksa/edit', $data);
            $this->load->view('template/bawah');
        } else {
            $this->Jaksa_model->edit();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Jaksa');
        }
    }

    public function delete($id)
    {
        $this->Jaksa_model->hapus($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Jaksa');
    }
}
