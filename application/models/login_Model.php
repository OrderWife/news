<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

  function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function Checkuser($uname, $pass)
  {
    $data = array();
    $data_where = array('USERNAME' => $uname, 'PASSWORD' => $pass);
    $query = $this->db->get_where('HR_PERSON', $data_where);
    $query = $query->result();
    $gid;
    foreach ($query as $row) {
      $data['PID'] = $row->PID;
      $data['USERNAME'] = $row->USERNAME;
      $data['EMPLOYEE_GROUPID'] = $row->EMPLOYEE_GROUPID;
      $data['FNAME'] = $row->F_NAME;
      $data['LNAME'] = $row->L_NAME;
      $gid = $row->EMPLOYEE_GROUPID;
    }
    if (!isset($gid)) {
      return;
    }
    $group = $this->db->get_where('HR_EMPLOYEE_GROUPID', array('EMPLOYEE_GROUPID' =>$gid , ));
    $group = $group->result();
    foreach ($group as $row) {
        $data['GROUPNAME'] = $row->GROUPNAME;
    }
    return $data;
  }

  }
