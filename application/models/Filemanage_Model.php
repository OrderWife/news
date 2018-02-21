<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanage_Model extends CI_Model {

  function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function getShelf($pid)
  {
    $query = $this->db->get_where('TBL_FM',array('PID' => $pid, ));

    foreach ($query->result() as $row) {
      return $row->PATH_NAME;
    }
  }


  }
