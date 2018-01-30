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
    $this->db->set('PID', $data['PID']);
    $this->db->set('N_TITLE', $data['N_TITLE']);
    $this->db->set('N_CATEGORY', $data['N_CATEGORY']);
    $this->db->set('N_TAG', $data['N_TAG']);
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

  public function insertfile($data)//$data is array of column in table 'TBL_FILENEWS'.
  {
    if($this->db->insert('TBL_FILENEWS', $data))
    {
      return true;
    }else{
      return false;
    }
  }

  public function delfile($idfile)//$idfile is array( 'ID_FILE' => $id_file). not test.
  {
    $query = $this->db->get_where('TBL_FILENEWS',$idfile);
      foreach ($query->result() as $row) {
          unlink ( './upload/'.$row->N_FILE );
        }
    if($this->db->delete('TBL_FILENEWS', $idfile)){
      return 'success';
    }else{
      return 'error';
    }
  }

  public function delNews($idnews)//$idfile is array( 'ID_FILE' => $id_news).
  {
    $query = $this->db->get_where('TBL_FILENEWS',$idnews);
      foreach ($query->result() as $row) {
          @unlink ( './upload/'.$row->N_FILE );
        }
    $query = $this->db->get_where('TBL_NEWS',$news_ID);
      foreach ($query->result() as $row) {
        if (!$row->N_IMG == 'null') {
          @unlink ( './upload/'.$row->N_IMG);
        }
      }
    if($this->db->delete('TBL_NEWS', $idnews)){
      return 'success';
    }else{
      return 'error';
    }
  }

  public function UpdateNews($news_ID, $data)//not test.
  {
    $this->db->where('NEWS_ID', $news_ID);
    $this->db->update('TBL_NEWS', $data);
  }

  public function selectNewsEdit($news_ID)// $news_ID => array('NEWS_ID' => news_id). not test.
  {
    //Query News join file.
    //$query = $this->db->query("SELECT * FROM ".'TBL_NEWS'." FULL JOIN ".'TBL_FILENEWS'." ON TBL_FILENEWS.NEWS_ID=TBL_NEWS.NEWS_ID  WHERE TBL_NEWS.NEWS_ID = '".$news_ID['NEWS_ID']."'");
    $news = $this->db->get_where('TBL_NEWS',$news_ID);
    $files = $this->db->get_where('TBL_FILENEWS',$news_ID);
    $query = array(
      'NEWS'    => $news->result(),
      'FILES'   => $files->result(),
    );
    return $query;
  }

}
