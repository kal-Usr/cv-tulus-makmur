<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaskeluar_model extends MY_Model {

    protected $table = 'kaskeluar';

    public function __construct()
    {
        parent::__construct();
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ['idkaskeluar' => $id])->row();
    }


    public function insert($data)
    {
        $this->db->insert('kaskeluar', $data);
        return $this->db->insert_id();
    }

    // Mengganti metode update dengan nama lain
    public function updateById($id, $data)
    {
        $this->db->where('idkaskeluar', $id);
        $this->db->update($this->table, $data);
    }

     // Mengganti metode delete dengan nama lain
    public function deleteById($id)
    {
        $this->db->where('idkaskeluar', $id);
        $this->db->delete($this->table);
    }

  
	public function count_all()
{
    return $this->db->count_all('kaskeluar');
}

     public function paginate($page)
    {
        $limit = 5; // Sesuaikan dengan jumlah data yang ingin ditampilkan per halaman
        $offset = ($page - 1) * $limit;
        return $this->db->get($this->table, $limit, $offset)->result();
    }




public function get_laporan($tanggal_mulai, $tanggal_selesai)
{
    $this->db->where('tanggal >=', $tanggal_mulai);
    $this->db->where('tanggal <=', $tanggal_selesai);
    return $this->db->get('kaskeluar')->result();
}


public function get_laporan_ajax($tanggal_mulai, $tanggal_selesai)
{
    $this->db->where('tanggal >=', $tanggal_mulai);
    $this->db->where('tanggal <=', $tanggal_selesai);
    return $this->db->get('kaskeluar')->result();
}



}
