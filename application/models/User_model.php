<?php

class User_model extends CI_model
{
    public function getJaksaById($id)
    {
        $this->db->select('*');
        $this->db->from('data_pelapor');
        $this->db->order_by('tgl', 'DESC');
        $this->db->where('data_pelapor.jpu', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSpdpById($id)
    {
        $this->db->select('pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS psl, pelapor.tgl AS tgl, pelapor.s1_tgl AS s1_tgl, pelapor.s1 AS sts, pelapor.penyidik AS penyidik, pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp,pelapor.koor AS koor, pelapor.berkas AS berkas,j.nama AS jp_nama, ksi.nama AS ks_nama, asp.nama AS asp_nama, pyd.nama AS pyd_nama, k.nama AS k_nama');
        $this->db->from('data_pelapor AS pelapor');

        $this->db->join('instansi AS pyd', 'pyd.id_instansi = pelapor.penyidik');
        $this->db->join('user AS j', 'j.id_user = pelapor.jpu');
        $this->db->join('user AS ksi', 'ksi.id_user = pelapor.kasi');
        $this->db->join('user AS asp', 'asp.id_user = pelapor.aspidum');
        $this->db->join('user AS k', 'k.id_user = pelapor.koor');
        $this->db->where('pelapor.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getSpdpByIdn($id)
    {
        $this->db->select('pelapor.id AS id, pelapor.nama_tersangka AS tsk, pelapor.pasal AS psl, pelapor.tgl AS tgl, pelapor.s1_tgl AS s1_tgl, pelapor.s1 AS sts, pelapor.penyidik AS penyidik, pelapor.jpu AS jpu, pelapor.kasi AS ks, pelapor.aspidum AS asp,pelapor.koor AS koor, pelapor.berkas AS berkas,pelapor.jexposes AS jexposes,j.nama AS jp_nama, ksi.nama AS ks_nama, asp.nama AS asp_nama, pyd.nama AS pyd_nama, k.nama AS k_nama, e.tempat AS tempat, e.waktu AS waktu');
        $this->db->from('data_pelapor AS pelapor');

        $this->db->join('instansi AS pyd', 'pyd.id_instansi = pelapor.penyidik');
        $this->db->join('user AS j', 'j.id_user = pelapor.jpu');
        $this->db->join('user AS ksi', 'ksi.id_user = pelapor.kasi');
        $this->db->join('user AS asp', 'asp.id_user = pelapor.aspidum');
        $this->db->join('user AS k', 'k.id_user = pelapor.koor');
        $this->db->join('exposes AS e', 'e.id_exposes = pelapor.jexposes');
        $this->db->where('pelapor.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAllJaksa()
    {
        return $this->db->get('data_pelapor')->result_array();
    }

    public function ps1()
    {
        $data = [
            "s1" => $this->input->post('status', true)
        ];
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('data_pelapor', $data);
    }

    public function sp17()
    {
        $data = [
            "p17" => $this->input->post('p17', true)
        ];
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('data_pelapor', $data);
    }

    public function tb1()
    {
        $data = [
            "berkas" => $this->input->post('bks', true)
        ];
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('data_pelapor', $data);
    }

    public function uexposes()
    {
        $data = [
            "jexposes" => $this->input->post('id', true),
        ];
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('data_pelapor', $data);
    }

    public function texposes()
    {
        $data = [
            "id_exposes" => $this->input->post('id', true),
            "tempat" => $this->input->post('tempat', true),
            "waktu" => $this->input->post('waktu', true)
        ];
        $this->db->insert('exposes', $data);
    }

    public function statuse($id)
    {
        $this->db->where('id', $id);
        $data = [
            "berkas" => "4"
        ];
        $this->db->update('data_pelapor', $data);
    }
    public function getPenyidik()
    {
        $this->db->select('*');
        $this->db->from('instansi');
        $query = $this->db->get();
        return $query->result_array();
    }
}
