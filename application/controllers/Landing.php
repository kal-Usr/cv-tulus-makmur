<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller 
{

	public function index()
	{
		$data['page']	= 'pages/landing/index';
		
		$this->view($data);
	}

}

/* End of file Home.php */
