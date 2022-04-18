<?php

class Jaksa_model extends CI_model
{
    public function tambah()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true)
        ];

        $this->db->insert('jaksa', $data);
    }

    public function edit()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true)
        ];

        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('jaksa', $data);
    }

    public function getJaksaById($id)
    {
        $this->db->select('*');
        $this->db->from('jaksa');
        $this->db->where('jaksa.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAllJaksa()
    {
        return $this->db->get('data_pelapor')->result_array();
    }


    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jaksa');
    }
}
