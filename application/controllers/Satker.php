<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Satker_model');
    }
    public function index()
    {
        $data['satker'] = $this->Satker_model->getAllSatker();
        $this->load->view('template/atas');
        $this->load->view('satker/index', $data);
        $this->load->view('template/bawah');
    }

    public function add()
    {
       $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('satker/tambah');
            $this->load->view('template/bawah');
        } else {
            $this->Satker_model->tambah();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('satker');
        }
    }

    public function update($id)
    {
        $data['satker'] = $this->Satker_model->getSatkerById($id);
        $this->form_validation->set_rules('nama', 'Nama Satker', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('satker/edit', $data);
            $this->load->view('template/bawah');
        } else {
            $this->Satker_model->edit();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('satker');
        }
    }

    public function delete($id)
    {
        $this->Satker_model->hapus($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('satker');
    }
}
