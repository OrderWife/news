<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanage_Model extends CI_Model {

  function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function getShelf()
  {
    $data = array(
      'query' => $this->db->get_where('TBL_FM',1), // ' 1 ' is PID
    );
  }


  }
