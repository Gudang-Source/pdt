<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('rules', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('rules', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('rules', $data, $cond);
    }
}

/* End of file Rule_model.php */
