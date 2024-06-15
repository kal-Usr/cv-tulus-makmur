<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends MY_Model
{
    // protected $perPage = 5;

    public function getDefaultValues()
    {
        return [
            'id_category'   => '',
            'slug'          => '',
            'title'         => '',
            'description'   => '',
            'price'         => '',
            'stock'         => '',
            'is_available'  => 1,
            'image'         => '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'  => 'id_category',
                'label'  => 'Kategori',
                'rules'  => 'required'
            ],
            [
                'field'  => 'slug',
                'label'  => 'Slug',
                'rules'  => 'trim|required|callback_unique_slug'
            ],
            [
                'field'  => 'title',
                'label'  => 'Nama Produk',
                'rules'  => 'trim|required'
            ],
            [
                'field'  => 'description',
                'label'  => 'Deskripsi',
                'rules'  => 'trim|required'
            ],
            [
                'field'  => 'price',
                'label'  => 'Harga',
                'rules'  => 'trim|required|numeric'
            ],
            [
                'field'  => 'is_available',
                'label'  => 'Ketersediaan',
                'rules'  => 'required'
            ],

        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config = [
            'upload_path'       => './assets/images/product',
            'file_name'         => $fileName,
            'allowed_types'     =>  'jpg|gif|png|jpeg|JPG|PNG|jfif|webp',   
            'max_size'          => 3000,
            'max_width'         => 0,     
            'max_height'        => 0,
            'overwrite'         => true,
            'file_ext_tolower'  => true
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($fieldName))
        {
            return $this->upload->data();
        }else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function deleteImage($fileName) 
    {
        if (file_exists("./assets/images/product/$fileName")) {
            unlink("./assets/images/product/$fileName");
        }
    }
      // Metode untuk mengambil laporan penjualan berdasarkan tanggal
      public function get_laporan($tanggal_mulai, $tanggal_selesai)
      {
          $this->db->where('tanggal >=', $tanggal_mulai);
          $this->db->where('tanggal <=', $tanggal_selesai);
          $query = $this->db->get('penjualan');
          return $query->result_array();
      }
}
        

/* End of file Product_model.php */
