<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jaksa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Satker_model');
        $this->load->model('Jaksa_model');
    }
    public function index()
    {
        $data['jaksa'] = $this->Jaksa_model->getAllJaksa();
        $this->load->view('template/atas');
        $this->load->view('jaksa/index', $data);
        $this->load->view('template/bawah');
    }

    public function add()
    {
        $data['satker'] = $this->Satker_model->getAllSatker();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('jaksa/tambah', $data);
            $this->load->view('template/bawah');
        } else {
            $upload_image = $_FILES['file']['name'];
            if ($upload_image != '') {
                $config['file_name'] = $upload_image;
                $config['upload_path']        = './assets/berkas';
                $config['allowed_types']    = 'jpg|jpeg|png';
                $config['max_size']    = '500';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('file', $new_image);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('jaksa');
                }
            }
            $this->Jaksa_model->tambah();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('jaksa');
        }
    }

    public function update($id)
    {
        $data['user'] = $this->Jaksa_model->getJaksaById($id);
        $data['satker'] = $this->Satker_model->getAllSatker();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/atas');
            $this->load->view('jaksa/edit', $data);
            $this->load->view('template/bawah');
        } else {
            
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['file']['name'];

            if ($upload_image) {
                $config['upload_path']        = './assets/berkas';
                $config['allowed_types']    = 'jpg|jpeg|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('file', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }$this->Jaksa_model->edit();
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
