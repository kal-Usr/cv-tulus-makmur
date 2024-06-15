<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model 
{

    public $table = 'orders';

    public function get_laporan($tanggal_mulai, $tanggal_selesai)
    {
        $this->db->where('date >=', $tanggal_mulai);
        $this->db->where('date <=', $tanggal_selesai);
        return $this->db->get($this->table)->result();
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('kasmasuk'));
    }

}

/* End of file Order_model.php */
