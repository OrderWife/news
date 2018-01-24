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
    //$this->db->insert('TBL_NEWS', $data);
    $this->db->set('PID', $data['PID']);
    $this->db->set('N_TITLE', $data['N_TITLE']);
    $this->db->set('N_CATEGORY', $data['N_CATEGORY']);
    $this->db->set('N_IMG', $data['N_IMG']);
    $this->db->set('N_CONTENT', $data['N_CONTENT']);
    $this->db->set('N_START_DATE',"to_date('".$data['N_START_DATE']."','dd/mm/yyyy')",false);
    if(isset($data['N_END_DATE'])){
      $this->db->set('N_END_DATE',"to_date('".$data['N_END_DATE']."','dd/mm/yyyy')",false);
    }
    $this->db->insert('TBL_NEWS');
    $query = $this->db->query("SELECT last_number FROM user_sequences WHERE sequence_name = 'ID_NEWS'");

    foreach ($query->result() as $row)
      {
        return $row->LAST_NUMBER;
      }
  }

  public function insertfile($data)
  {
    $this->db->insert('TBL_FILENEWS', $data);
  }

}
