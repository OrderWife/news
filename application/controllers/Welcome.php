<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
				parent::__construct();
				$this->load->model('News_Model');
	}

	public function index()
	{
		// $this->load->view('welcome_message');
		$data = array('query' => $this->News_Model->selectNews(NULL,6), );
    $this->load->view('newsmanage/newsfeed',$data);
	}
}
