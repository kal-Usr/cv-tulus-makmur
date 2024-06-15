<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaskeluar extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kaskeluar_model');
        // $this->load->library('pagination');

		$role = $this->session->userdata('role');
		if ($role != 'admin' && $role != 'pemilik') {
			redirect(base_url('/'));
			return;
		}
    }


  public function index($page = 1)
    {
        // Dapatkan total jumlah baris data
        $totalRows = $this->Kaskeluar_model->count();

        // Buat pagination
        $baseUrl = site_url('kaskeluar/index');
        $uriSegment = 3; // Menyesuaikan segment URL untuk pagination
        $pagination = $this->Kaskeluar_model->makePagination($baseUrl, $uriSegment, $totalRows);

        // Ambil data dengan pagination
        $data['kaskeluar'] = $this->Kaskeluar_model->paginate($page);
        $data['pagination'] = $pagination;
        $data['page'] = 'pages/kaskeluar/index';
        $data['title'] = 'Kas Keluar';

        // Load view
        $this->load->view('layouts/app', $data);
    }

    public function search($page = 1)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('kaskeluar'));
        }

        $keyword = $this->session->userdata('keyword');
        $totalRows = $this->Kaskeluar_model->like('keterangan', $keyword)->count();
        $baseUrl = site_url('kaskeluar/search');
        $uriSegment = 3;
        $pagination = $this->Kaskeluar_model->makePagination($baseUrl, $uriSegment, $totalRows);

        $data['kaskeluar'] = $this->Kaskeluar_model->like('keterangan', $keyword)->paginate($page);
        $data['pagination'] = $pagination;
        $data['page'] = 'pages/kaskeluar/index';
        $data['title'] = 'Kas Keluar';

        $this->load->view('layouts/app', $data);
    }
    

public function create()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('uangkeluar', 'Uang keluar', 'required|numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() === FALSE)
        {	
            		$data['page']	= 'pages/kaskeluar/form';

$this->load->view('layouts/app', [
    'view' => 'pages/kaskeluar/form',
    'page' => $data['page']
]);        }
        else
        {
            $data = array(
                'keterangan' => $this->input->post('keterangan'),
                'uangkeluar' => $this->input->post('uangkeluar'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->Kaskeluar_model->insert($data);
            // Set success flash message
        $this->session->set_flashdata('success', 'Data kas masuk berhasil ditambahkan.');
            redirect('kaskeluar');
        }
    }

    public function edit($id)
    {
        // Mengganti pemanggilan metode update dengan updateById
        $data['input'] = $this->Kaskeluar_model->getById($id);
        if (!$data['input']) show_404();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('uangkeluar', 'Uang keluar', 'required|numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['page'] = 'pages/kaskeluar/form';
            $this->load->view('layouts/app', [
                'view' => 'pages/kaskeluar/form',
                'page' => $data['page'],
                'input' => $data['input']
            ]);         
        }
        else
        {
            $data_update = array(
                'keterangan' => $this->input->post('keterangan'),
                'uangkeluar' => $this->input->post('uangkeluar'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->Kaskeluar_model->updateById($id, $data_update);
             // Set success flash message
        $this->session->set_flashdata('success', 'Data kas masuk berhasil diubah.');
            redirect('kaskeluar');
        }
    }


    public function delete($id)
    {
        // Mengganti pemanggilan metode delete dengan deleteById
        $this->Kaskeluar_model->deleteById($id);
        // Set success flash message
    $this->session->set_flashdata('success', 'Data kas masuk berhasil dihapus.');
        redirect('kaskeluar');
    }

    
    public function laporan()
    {
        $data['title']		= 'Kas keluar';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');
    
        if ($this->form_validation->run() == FALSE)
        {
            $data['page'] = 'pages/kaskeluar/laporan';
            $this->load->view('layouts/app', [
                'title' => $data['title'],
                'view' => 'pages/kaskeluar/laporan',
                'page' => $data['page']
            ]);
        }
        else
        {
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_selesai = $this->input->post('tanggal_selesai');
            $data['laporan_kaskeluar'] = $this->Kaskeluar_model->get_laporan($tanggal_mulai, $tanggal_selesai);
            $data['page'] = 'pages/kaskeluar/laporan';
            $this->load->view('layouts/app', [
                'view' => 'pages/kaskeluar/laporan',
                'page' => $data['page'],
                'laporan_kaskeluar' => $data['laporan_kaskeluar']
            ]);
        }
    }
    
    public function laporan_ajax()
    {
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai = $this->input->post('tanggal_selesai');
    
        $data = $this->Kaskeluar_model->get_laporan_ajax($tanggal_mulai, $tanggal_selesai);
    
        $result = array();
        $no = 1;
        foreach ($data as $row) {
            $result[] = array(
                'no' => $no++,
                'keterangan' => $row->keterangan,
                'uangkeluar' => $row->uangkeluar,
                'tanggal' => $row->tanggal
            );
        }
    
        echo json_encode($result); // Mengembalikan data langsung tanpa kunci 'data'
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('kaskeluar'));
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
        $data['laporan_kaskeluar'] = $this->Kaskeluar_model->get_laporan($tanggal_mulai, $tanggal_selesai);
    
        // Load view print.php dengan data laporan
        $this->load->view('pages/kaskeluar/print', $data);
    }

}
