<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myshelf extends CI_Controller {

	public function index()
	{
    redirect('Myshelf/home');
	}

  public function home()
  {
    $page = array('page' => 'shelf', );
    $this->load->view('backendhome',$page);
  }
}
