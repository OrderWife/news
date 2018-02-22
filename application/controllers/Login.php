<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct()
  {
        parent::__construct();
        $this->load->model('Login_Model');
        // $this->load->library('session');
  }
	public function index()
	{
    $this->session->sess_destroy();
		$this->load->view('login/ulogin');
	}

  public function checklogin()
  {
    $data = $this->Login_Model->Checkuser($this->input->post('username'), $this->input->post('password') );
    if(empty($data))
    {
      $this->load->view('login/ulogin');
      $this->load->view('login/logerror');
      return;
    }else{
      $ss = array();
      // foreach ($data as $row) {
      //     $ss['id'] = $row->PID;
      //     $ss['user'] = $row->USERNAME;
      //     $ss['gid'] = $row->EMPLOYEE_GROUPID;
      //     $ss['gname'] = $row->GROUPNAME;
      // }
      $ss['id'] = $data['PID'];
      $ss['user'] = $data['USERNAME'];
      $ss['gid'] = $data['EMPLOYEE_GROUPID'];
      $ss['gname'] = $data['GROUPNAME'];
      $this->session->set_userdata($ss);
      // echo $this->session->userdata('id');
      redirect('/backend/');
    }

  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/login/');
  }
}
