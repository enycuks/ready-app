<?php

class Spdp_model extends CI_model
{
    public function getPenyidik()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.role', '6');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJPU()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.role', '3');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKASI()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.role', '4');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah()
    {
        $data = [
            "penyidik" => $this->input->post('penyidik', true),
            "nama_tersangka" => $this->input->post('tersangka', true),
            "pasal" => $this->input->post('pasal', true),
            "jpu" => $this->input->post('jpu', true),
            "kasi" => $this->input->post('kasi', true),
            "aspidum" => $this->input->post('aspidum', true),
            "tgl" => $this->input->post('tgl', true)
        ];

        $this->db->insert('data_pelapor', $data);
    }

    public function getAllSpdp()
    {
        return $this->db->get('data_pelapor')->result_array();
    }

    public function getSpdpById($id)
    {
        $this->db->select('*');
        $this->db->from('data_pelapor');
        $this->db->where('data_pelapor.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edit()
    {
        $data = [
            "penyidik" => $this->input->post('penyidik', true),
            "nama_tersangka" => $this->input->post('tersangka', true),
            "pasal" => $this->input->post('pasal', true),
            "jpu" => $this->input->post('jpu', true),
            "kasi" => $this->input->post('kasi', true),
            "aspidum" => $this->input->post('aspidum', true),
            "tgl" => $this->input->post('tgl', true)
        ];

        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('data_pelapor', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_pelapor');
    }
}
