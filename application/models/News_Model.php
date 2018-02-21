<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Model extends CI_Model {

  function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function selectNews()
  {
    $query = $this->db->get('VIEW_NEWS');
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
    $this->autoAddCate($data['N_CATEGORY']);

    foreach ($query->result() as $row)
      {
        return $row->LAST_NUMBER;
      }



  }

  private function autoAddCate($category)
  {
    $queryCate = $this->db->get_where('TBL_N_CATEGORY', array('CATEGORY' => $category, ));
    echo 'DB'.$queryCate->num_rows();
    if ($queryCate->num_rows()<1) {
      echo "<br>Add Cate!";
      $this->db->insert('TBL_N_CATEGORY',array('CATEGORY' => $category));
    }
  }

  // public function insertfile($data)//$data is array of column in table 'TBL_FILENEWS'.
  // {
  //   if($this->db->insert('TBL_FILENEWS', $data))
  //   {
  //     return true;
  //   }else{
  //     return false;
  //   }
  // }

  public function delfile($filename)//$idfile is array( 'N_FILE' => $filename).
  {
    $query = $this->db->get_where('TBL_FILENEWS',$filename);
      foreach ($query->result() as $row) {
          @unlink ( './upload/'.$row->N_FILE ) or die ('No such file or directory');
        }
        if($this->db->delete('TBL_FILENEWS', $filename)){
          //return 'success';
        }else{
          //return 'error';
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
      $query = $this->db->query("SELECT N_IMG FROM TBL_NEWS WHERE NEWS_ID = ".$news_ID);
      foreach ($query->result() as $row)
        {
          if(isset($row->N_IMG) && $row->N_IMG != null)
            unlink ( './upload/'.$row->N_IMG ) or die ('No such file or directory img');
        }
    // $this->db->where('NEWS_ID', $news_ID);
    // $this->db->update('TBL_NEWS', $data);
    //$this->db->set('PID', $data['PID']);

    $this->db->set('N_TITLE', $data['N_TITLE']);
    $this->db->set('N_CATEGORY', $data['N_CATEGORY']);
    $this->db->set('N_TAG', $data['N_TAG']);
    if(isset($data['N_IMG'])){
      $this->db->set('N_IMG', $data['N_IMG']);
    }
    $this->db->set('N_CONTENT', $data['N_CONTENT']);
    if(isset($data['N_END_DATE'])){
      $this->db->set('N_END_DATE',"to_date('".$data['N_END_DATE']."','dd/mm/yyyy')",false);
    }
    $this->db->where('NEWS_ID', $news_ID);
    $this->db->update('TBL_NEWS');
    $this->autoAddCate($data['N_CATEGORY']);
  }

  public function selectNewsEdit($news_ID)// $news_ID => array('NEWS_ID' => news_id). not test.
  {
    //Query News join file.
    $news = $this->db->query("SELECT PID, N_TITLE, N_CATEGORY, N_IMG, N_TAG, N_CONTENT, TO_CHAR(N_START_DATE,'YYYY-MM-DD') as START_DATE,TO_CHAR(N_END_DATE,'YYYY-MM-DD') as END_DATE, 'N_LAST_EDIT', 'N_TAG'
      FROM TBL_NEWS WHERE NEWS_ID =". $news_ID['NEWS_ID']);
    $files = $this->db->get_where('TBL_FILENEWS',$news_ID);
    $query = array(
      'NEWS'    => $news->result(),
      'FILES'   => $files->result(),
    );
    return $query;
  }

  public function getCate()
  {
    $query = $this->db->get('TBL_N_CATEGORY');
    return $query->result();
  }

}
