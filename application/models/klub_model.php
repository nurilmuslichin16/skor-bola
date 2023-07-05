<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klub_model extends CI_Model
{
    private $tabel = 'tb_klub';

    function insert($data)
    {
        $this->db->insert($this->tabel, $data);
        return $this->db->insert_id();
    }

    function update($klub, $data)
    {
        $this->db->where('nama_klub', $klub);
        $this->db->update($this->tabel, $data);
    }

    function cekKlub($nama_klub)
    {
        $this->db->from($this->tabel);
        $this->db->where('nama_klub', $nama_klub);
        return $this->db->get();
    }

    function listKlub()
    {
        $this->db->select('nama_klub');
        $this->db->from($this->tabel);
        return $this->db->get();
    }

    function klasemen()
    {
        $this->db->from($this->tabel);
        $this->db->order_by('point', 'DESC');
        return $this->db->get();
    }
}
