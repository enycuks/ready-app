<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instansi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Instansi_model');
    }
    public function index()
    {
        $data['instansi'] = $this->Instansi_model->getAllInstansi();
        $this->load->view('template/atas');
        $this->load->view('instansi/index', $data);
        $this->load->view('template/bawah');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('instansi/tambah');
            $this->load->view('template/bawah');
        } else {
            $this->Instansi_model->tambah();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('instansi');
        }
    }

    public function update($id)
    {
        $data['instansi'] = $this->Instansi_model->getInstansiById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('instansi/edit', $data);
            $this->load->view('template/bawah');
        } else {
            $this->Instansi_model->edit();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('instansi');
        }
    }

    public function delete($id)
    {
        $this->Instansi_model->hapus($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('instansi');
    }
}
