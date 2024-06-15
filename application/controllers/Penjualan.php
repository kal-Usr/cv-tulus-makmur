<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');

        $role = $this->session->userdata('role');
        if ($role != 'admin' && $role != 'pemilik') {
            redirect(base_url('/'));
            return;
        }
    }


    public function index($page = 1)
    {
        // Dapatkan total jumlah baris data
        $totalRows = $this->Penjualan_model->count();

        // Buat pagination
        $baseUrl = site_url('penjualan/index');
        $uriSegment = 3; // Menyesuaikan segment URL untuk pagination
        $perPage = 5; // Jumlah data per halaman
        $pagination = $this->Penjualan_model->makePagination($baseUrl, $uriSegment, $totalRows, $perPage);

        // Ambil data dengan pagination
        $data['penjualan'] = $this->Penjualan_model->paginate($page, $perPage);
        $data['pagination'] = $pagination;
        $data['current_page'] = $page;
        $data['per_page'] = $perPage;
        $data['page'] = 'pages/penjualan/index';
        $data['title'] = 'Penjualan';


        // Memuat view
        $this->load->view('layouts/app', [
            'title' => $data['title'],
            'view' => $data['page'],
            'page' => $data['page'],
            'penjualan' => $data['penjualan'],
            'pagination' => $data['pagination'],
            'current_page' => $data['current_page'],
            'per_page' => $data['per_page']
        ]);
    }

    public function create()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');

        $data['page'] = 'pages/penjualan/form'; // Pastikan 'page' selalu didefinisikan

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('layouts/app', [
                'view' => 'pages/penjualan/form',
                'page' => $data['page'],
                'form_action' => base_url('penjualan/create')
            ]);
        }
        else
        {
            $data = array(
                'nama' => $this->input->post('nama'),
                'tanggal' => $this->input->post('tanggal'),
                'detail' => $this->input->post('detail'),
                'total' => $this->input->post('total')
            );
            $this->Penjualan_model->create($data);
            // Set success flash message
        $this->session->set_flashdata('success', 'Data kas masuk berhasil ditambahkan.');
            redirect('penjualan');
        }
    }

    public function edit($id)
    {
        $data['input'] = $this->Penjualan_model->getById($id);
        if (!$data['input']) {
            show_404();
            return;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $data['page'] = 'pages/penjualan/form';
            $this->load->view('layouts/app', [
                'view' => 'pages/penjualan/form',
                'page' => $data['page'],
                'input' => $data['input'],
                'form_action' => base_url('penjualan/edit/' . $id)
            ]);
        } else {
            $data_update = array(
                'nama' => $this->input->post('nama'),
                'tanggal' => $this->input->post('tanggal'),
                'detail' => $this->input->post('detail'),
                'total' => $this->input->post('total')
            );
            $this->Penjualan_model->updateById($id, $data_update);
            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('penjualan');
        }
    }

    public function delete($id)
    {
        if ($this->Penjualan_model->deleteById($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
            redirect('penjualan');
        } else {
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
            redirect('penjualan');
        }
    }

    public function laporan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['page'] = 'pages/penjualan/laporan';

            $this->load->view('layouts/app', [
                'view' => 'pages/penjualan/laporan',
                'page' => $data['page']
            ]);
        }
        else
        {
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_selesai = $this->input->post('tanggal_selesai');
            $data['laporan_penjualan'] = $this->Penjualan_model->get_laporan($tanggal_mulai, $tanggal_selesai);
            $data['page'] = 'pages/penjualan/laporan';

            $this->load->view('layouts/app', [
                'view' => 'pages/penjualan/laporan',
                'page' => $data['page'],
                'laporan_penjualan' => $data['laporan_penjualan']
            ]);
        }
    }
    public function print($tanggal_mulai, $tanggal_selesai)
    {
        // Validasi tanggal
        if (empty($tanggal_mulai) || empty($tanggal_selesai)) {
            show_error('Tanggal mulai dan tanggal selesai diperlukan.', 400);
        }
    
        // Ambil data laporan dari model
        $data['tanggal_mulai'] = $tanggal_mulai;
        $data['tanggal_selesai'] = $tanggal_selesai;
        $data['laporan_penjualan'] = $this->Penjualan_model->get_laporan($tanggal_mulai, $tanggal_selesai);
    
        // Load view print.php dengan data laporan
        $this->load->view('pages/penjualan/print', $data);
    }

}
?>
