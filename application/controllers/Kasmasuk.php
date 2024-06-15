<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasmasuk extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kasmasuk_model');
        // $this->load->library('pagination');

		$role = $this->session->userdata('role');
		if ($role != 'admin' && $role != 'pemilik' ) {
			redirect(base_url('/'));
			return;
		}
    }

  public function index($page = 1)
    {
        // Dapatkan total jumlah baris data
        $totalRows = $this->Kasmasuk_model->count();

        // Buat pagination
        $baseUrl = site_url('kasmasuk/index');
        $uriSegment = 3; // Menyesuaikan segment URL untuk pagination
        $pagination = $this->Kasmasuk_model->makePagination($baseUrl, $uriSegment, $totalRows);

        // Ambil data dengan pagination
        $data['kasmasuk'] = $this->Kasmasuk_model->paginate($page);
        $data['pagination'] = $pagination;
        $data['page'] = 'pages/kasmasuk/index';
        $data['title'] = 'Kas Masuk';

        // Load view
        $this->load->view('layouts/app', $data);
    }

    public function search($page = 1)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('kasmasuk'));
        }

        $keyword = $this->session->userdata('keyword');
        $totalRows = $this->Kasmasuk_model->like('keterangan', $keyword)->count();
        $baseUrl = site_url('kasmasuk/search');
        $uriSegment = 3;
        $pagination = $this->Kasmasuk_model->makePagination($baseUrl, $uriSegment, $totalRows);

        $data['kasmasuk'] = $this->Kasmasuk_model->like('keterangan', $keyword)->paginate($page);
        $data['pagination'] = $pagination;
        $data['page'] = 'pages/kasmasuk/index';
        $data['title'] = 'Kas Masuk';

        $this->load->view('layouts/app', $data);
    }
    

public function create()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('uangmasuk', 'Uang Masuk', 'required|numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() === FALSE)
        {	
            		$data['page']	= 'pages/kasmasuk/form';

$this->load->view('layouts/app', [
    'view' => 'pages/kasmasuk/form',
    'page' => $data['page']
]);        }
        else
        {
            $data = array(
                'keterangan' => $this->input->post('keterangan'),
                'uangmasuk' => $this->input->post('uangmasuk'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->Kasmasuk_model->insert($data);
            // Set success flash message
        $this->session->set_flashdata('success', 'Data kas masuk berhasil ditambahkan.');
            redirect('kasmasuk');
        }
    }

    public function edit($id)
    {
        // Mengganti pemanggilan metode update dengan updateById
        $data['input'] = $this->Kasmasuk_model->getById($id);
        if (!$data['input']) show_404();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('uangmasuk', 'Uang Masuk', 'required|numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['page'] = 'pages/kasmasuk/form';
            $this->load->view('layouts/app', [
                'view' => 'pages/kasmasuk/form',
                'page' => $data['page'],
                'input' => $data['input']
            ]);         
        }
        else
        {
            $data_update = array(
                'keterangan' => $this->input->post('keterangan'),
                'uangmasuk' => $this->input->post('uangmasuk'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->Kasmasuk_model->updateById($id, $data_update);
             // Set success flash message
        $this->session->set_flashdata('success', 'Data kas masuk berhasil diubah.');
            redirect('kasmasuk');
        }
    }


    public function delete($id)
    {
        // Mengganti pemanggilan metode delete dengan deleteById
        $this->Kasmasuk_model->deleteById($id);
         // Set success flash message
    $this->session->set_flashdata('success', 'Data kas masuk berhasil dihapus.');
        redirect('kasmasuk');
    }

    
    public function laporan()
    {
        $data['title']		= 'Kas Masuk';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');
    
        if ($this->form_validation->run() == FALSE)
        {
            $data['page'] = 'pages/kasmasuk/laporan';
            $this->load->view('layouts/app', [
                'title' => $data['title'],
                'view' => 'pages/kasmasuk/laporan',
                'page' => $data['page']
            ]);
        }
        else
        {
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_selesai = $this->input->post('tanggal_selesai');
            $data['laporan_kasmasuk'] = $this->Kasmasuk_model->get_laporan($tanggal_mulai, $tanggal_selesai);
            $data['page'] = 'pages/kasmasuk/laporan';
            $this->load->view('layouts/app', [
                'view' => 'pages/kasmasuk/laporan',
                'page' => $data['page'],
                'laporan_kasmasuk' => $data['laporan_kasmasuk']
            ]);
        }
    }
    
    public function laporan_ajax()
    {
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai = $this->input->post('tanggal_selesai');
    
        $data = $this->Kasmasuk_model->get_laporan_ajax($tanggal_mulai, $tanggal_selesai);
    
        $result = array();
        $no = 1;
        foreach ($data as $row) {
            $result[] = array(
                'no' => $no++,
                'keterangan' => $row->keterangan,
                'uangmasuk' => $row->uangmasuk,
                'tanggal' => $row->tanggal
            );
        }
    
        echo json_encode($result); // Mengembalikan data langsung tanpa kunci 'data'
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('kasmasuk'));
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
        $data['laporan_kasmasuk'] = $this->Kasmasuk_model->get_laporan($tanggal_mulai, $tanggal_selesai);
    
        // Load view print.php dengan data laporan
        $this->load->view('pages/kasmasuk/print', $data);
    }

}
