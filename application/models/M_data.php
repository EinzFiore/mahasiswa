<?php
class M_data extends CI_Model
{
    function getData()
    {
        return $this->db->get('data_mahasiswa');
    }
	
function add_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

}
