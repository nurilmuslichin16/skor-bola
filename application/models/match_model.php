<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Match_model extends CI_Model
{
    private $tabel = 'tb_match';

    function insert($data)
    {
        $this->db->insert($this->tabel, $data);
        return $this->db->insert_id();
    }

    function cekMatch($home, $away)
    {
        $this->db->from($this->tabel);
        $this->db->where('klub_home', $home);
        $this->db->where('klub_away', $away);
        return $this->db->get();
    }
}
