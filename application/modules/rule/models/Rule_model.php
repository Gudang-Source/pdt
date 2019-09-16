<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->join('uke_2', 'uke_2.uke_2_id = rules.uke_2_id', 'left');
        $this->db->join('type_letter', 'type_letter.type_id = rules.type_id', 'left');
        return $this->db->get_where('rules', $arr, $limit, $offset);
    }

    function get_rule($arr = null, $limit = null, $offset = null, $params = array())
    {
        if (isset($params['about'])) $this->db->like('rule_about', $params['about']);
        if (isset($params['no'])) $this->db->like('rule_no', $params['no']);

        $this->db->join('type_letter', 'type_letter.type_id = rules.type_id', 'left');
        $this->db->join('uke_2', 'uke_2.uke_2_id = rules.uke_2_id', 'left');
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
