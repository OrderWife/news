<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Model extends CI_Model {

  function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function selectNews()
  {
    $query = $this->db->get('TBL_NEWS');
    return $query->result();
  }

  public function insertnews($data)
  {

  }

  }
