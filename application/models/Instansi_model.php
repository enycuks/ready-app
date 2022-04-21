<?php

class Instansi_model extends CI_model
{
    public function tambah()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "no_hp" => $this->input->post('no_hp', true)
        ];

        $this->db->insert('instansi', $data);
    }

    public function edit()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "no_hp" => $this->input->post('no_hp', true)
        ];

        $id = $this->input->post('id');

        $this->db->where('id_instansi', $id);
        $this->db->update('instansi', $data);
    }

    public function getInstansiById($id)
    {
        $this->db->select('*');
        $this->db->from('instansi');
        $this->db->where('instansi.id_instansi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAllInstansi()
    {
        return $this->db->get('instansi')->result_array();
    }


    public function hapus($id)
    {
        $this->db->where('id_instansi', $id);
        $this->db->delete('instansi');
    }
}
