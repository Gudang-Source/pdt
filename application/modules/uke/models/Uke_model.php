<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uke_model extends CI_Model
{

    function get_uke($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('uke_4_id, uke_4_name');
        $this->db->select('uke_4.uke_3_id, uke_3_name');
        $this->db->select('uke_3.uke_2_id, uke_2_name');
        $this->db->join('uke_3', 'uke_3.uke_3_id = uke_4.uke_3_id', 'left');
        $this->db->join('uke_2', 'uke_2.uke_2_id = uke_3.uke_2_id', 'left');
        return $this->db->get_where('uke_3', $arr, $limit, $offset);
    }

    function get_uke_letter($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('uke_3.uke_2_id, uke_2_name');
        $this->db->select('uke_3.uke_3_id, uke_3_name');
        $this->db->join('uke_2', 'uke_2.uke_2_id = uke_3.uke_2_id', 'left');
        return $this->db->get_where('uke_3', $arr, $limit, $offset);
    }

    function get_uke2($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('uke_2', $arr, $limit, $offset);
    }

    function get_uke3($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('uke_3', $arr, $limit, $offset);
    } 

    function get_uke4($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('uke_4', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('uke_2', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('uke_2', $data, $cond);
    }

    function insert_uke_3($data)
    {
        return $this->db->insert('uke_3', $data);
    }

    function update_uke_3($data, $cond)
    {
        return $this->db->update('uke_3', $data, $cond);
    }

    function insert_uke_4($data)
    {
        return $this->db->insert('uke_4', $data);
    }

    function update_uke_4($data, $cond)
    {
        return $this->db->update('uke_4', $data, $cond);
    }
}

/* End of file Uke_model.php */
