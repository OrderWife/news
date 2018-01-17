<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function index()
	{
    //echo base_url();
    $this->load->view('backendview\include\include_v');
		$this->load->view('backendview\include\include_table');
		$this->load->view('backendview\backendhome');
	}
}
