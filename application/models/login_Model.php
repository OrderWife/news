<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_Model extends CI_Model {

  function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function Checkuser($uname, $pass)
  {
    $data_where = array('USERNAME' => $uname, 'PASSWORD' => $pass);
    $query = $this->db->get_where('HR_PERSON', $data_where);
    return $query->result();
  }

  }
