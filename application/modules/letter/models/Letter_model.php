<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Letter_model extends CI_Model
{

    function get_last($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('letter_id', 'desc');
        $this->db->select('letter_no, letter_created_at');
        return $this->db->get_where('letters', $arr, $limit, $offset);
    }

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('letter_id', 'desc');
        $this->db->select('letter_id, letter_no, letter_file, letter_fullname, letter_phone, user_fullname, letter_status, letter_approval_date, letter_created_at, letter_updated_at');
        $this->db->select('letters.uke_4_id, uke_4_name');
        $this->db->select('uke_4.uke_3_id, uke_3_name');
        $this->db->select('uke_3.uke_2_id, uke_2_name');
        $this->db->join('uke_4', 'uke_4.uke_4_id = letters.uke_4_id', 'left');
        $this->db->join('uke_3', 'uke_3.uke_3_id = uke_4.uke_3_id', 'left');
        $this->db->join('uke_2', 'uke_2.uke_2_id = uke_3.uke_2_id', 'left');
        return $this->db->get_where('letters', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('letters', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('letters', $data, $cond);
    }
}

/* End of file Letter_model.php */
