<?php

class Jaksa_model extends CI_model
{
    public function tambah()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "jabatan" => $this->input->post('jabatan', true),
            "satker" => $this->input->post('satker', true),
            "email" => $this->input->post('email', true),
            "no_hp" => $this->input->post('hp', true),
            "password" => $this->input->post('password', true),
            "role" => $this->input->post('role', true)
        ];

        $this->db->insert('user', $data);
    }

    public function edit()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "jabatan" => $this->input->post('jabatan', true),
            "satker" => $this->input->post('satker', true),
            "email" => $this->input->post('email', true),
            "no_hp" => $this->input->post('hp', true),
            "password" => $this->input->post('password', true),
            "role" => $this->input->post('role', true)
        ];

        $id = $this->input->post('id');

        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function getJaksaById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAllJaksa()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('satker_jaksa', 'satker_jaksa.id_satker = user.satker');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function hapus($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}
