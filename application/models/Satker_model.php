<?php

class Satker_model extends CI_model
{
    public function tambah()
    {
        $data = [
            "satker" => $this->input->post('satker', true),
        ];

        $this->db->insert('satker_jaksa', $data);
    }

    public function edit()
    {
        $data = [
            "satker" => $this->input->post('satker', true),
        ];

        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('satker_jaksa', $data);
    }

    public function getSatkerById($id)
    {
        $this->db->select('*');
        $this->db->from('satker_jaksa');
        $this->db->where('satker_jaksa.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAllSatker()
    {
        return $this->db->get('satker_jaksa')->result_array();
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jaksa');
    }
}
