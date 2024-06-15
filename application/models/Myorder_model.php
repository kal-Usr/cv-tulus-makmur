<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Myorder_model extends MY_Model 
{

    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            'id_order'       => '',
            'account_name'   => '',
            'account_number' => '',
            'nominal'        => '',
            'note'           => '',
            'image'          => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
        [
            'field' => 'account_name',
            'label' => 'Nama Pemilik',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'account_number',
            'label' => 'No. Rekening',
            'rules' => 'trim|required|max_length[50]'
        ],
        [
            'field' => 'nominal',
            'label' => 'Nominal',
            'rules' => 'trim|required|numeric'
        ],
        [
            'field' => 'image',
            'label' => 'Bukti Transfer',
            'rules' => 'callback_image_required'
        ],
    ];

    return $validationRules;
 }

    public function uploadImage($fieldName, $fileName)
    {
        $config = [
            'upload_path'       => './assets/images/confirm',
            'file_name'         => $fileName,
            'allowed_types'     =>  'jpg|gif|png|jpeg|JPG|PNG|jfif|webp',
            'max_size'          => 1024,
            'max_width'         => 0,
            'max_height'        => 0,
            'overwrite'         => true,
            'file_ext_tolower'  => true
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }
    public function delete_expired_orders() {
        $expired_time = date('Y-m-d H:i:s', strtotime('-5 minutes'));

        $this->db->where('status', 'waiting');
        $this->db->where('date <', $expired_time);
        $this->db->delete('orders');
    }

}

/* End of file Myorder_model.php */
