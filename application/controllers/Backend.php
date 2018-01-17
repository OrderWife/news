<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function __construct()
	{
				parent::__construct();
				$this->load->model('News_Model');
		}

	public function index()
	{
		$data = array (
            'query' => $this->News_Model->selectNews()
    );
		//echo json_encode($data);
    $this->load->view('backendview\include\include_v',$data);
		$this->load->view('backendview\include\include_table');
		$this->load->view('backendview\backendhome');
	}
}
