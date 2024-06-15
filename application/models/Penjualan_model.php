<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends MY_Model
{
    protected $table = 'penjualan';
   protected $primaryKey = 'idpenjualan'; // Ganti 'id' dengan nama primary key yang benar


    public function __construct()
    {
        parent::__construct();
    }

    public function get_laporan($tanggal_mulai, $tanggal_selesai)
    {
        $this->db->where('tanggal >=', $tanggal_mulai);
        $this->db->where('tanggal <=', $tanggal_selesai);
        return $this->db->get($this->table)->result();
    }
    public function getById($id)
{
    return $this->db->get_where($this->table, [$this->primaryKey => $id])->row();
}
public function insert($data)
{
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
}
public function updateById($id, $data)
{
    $this->db->where($this->primaryKey, $id);
    $this->db->update($this->table, $data);
}
public function deleteById($id)
{
    $this->db->where($this->primaryKey, $id);
    $this->db->delete($this->table);
}
public function paginate($page)
{
    $limit = 5; // Sesuaikan dengan jumlah data yang ingin ditampilkan per halaman
    $offset = ($page - 1) * $limit;
    return $this->db->get($this->table, $limit, $offset)->result();
}
public function count_all()
{
    return $this->db->count_all($this->table);
}
}
?>
