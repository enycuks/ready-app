<?php

class Spdp_model extends CI_model
{
    public function getPenyidik()
    {
        $this->db->select('*');
        $this->db->from('instansi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJPU()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.role', '7');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKejari()
    {
        $this->db->select('*');
        $this->db->from('satker_jaksa');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getASPIDUM()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.role', '4');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKASI()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.role', '6');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKoor()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.role', '5');
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
            "koor" => $this->input->post('koor', true),
            "s1" => "n"
        ];

        $this->db->insert('data_pelapor', $data);
    }

    public function getAllSpdp()
    {
        // return $this->db->get('data_pelapor')->result_array();
        $this->db->select('*');
        $this->db->from('data_pelapor');
        $this->db->join('user', 'data_pelapor.jpu = user.id_user');
        // $this->db->join('table3', 'table1.id = table3.id');
        $query = $this->db->get();
        return $query->result_array();
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
            "aspidum" => $this->input->post('aspidum', true)
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

    public function tgl($id)
    {
        $this->db->where('id', $id);
        $now = date('Y-m-d');
        $data = [
            "tgl" => $now
        ];
        $this->db->update('data_pelapor', $data);
    }

    public function s1tgl($id)
    {
        $this->db->where('id', $id);
        $now = date('Y-m-d');
        $data = [
            "s1_tgl" => $now
        ];
        $this->db->update('data_pelapor', $data);
    }
}
