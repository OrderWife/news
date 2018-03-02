<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Model extends CI_Model {

  function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function selectNews($newsNO = NULL,$limit = NULL,$status = 1)
  {
    if (isset($newsNO)) {
      $query = $this->db->get_where('VIEW_NEWS_NEW',array('NEWS_ID' => $newsNO,'N_STATUS' => $status));
    }else{
    $this->db->order_by('N_START_DATE','DESC');
      if (isset($limit)) {
        $query = $this->db->get('VIEW_NEWS_NEW',$limit);
      }else{
        $query = $this->db->get_where('VIEW_NEWS_NEW',array('N_STATUS' => $status));
      }
    }

    $query = $query->result_array();
    foreach ($query as $key => $value) {
     $query[$key]['N_CONTENT'] = file_get_contents($value['N_CONTENT']);
    // echo $value['N_CONTENT']->load();
    }
     // echo var_dump($query);
    return $query;
  }

  public function getFile($newsNO)
  {
    $query = $this->db->get_where('TBL_FILENEWS',array('NEWS_ID' => $newsNO,));
    return $query->result();
  }

  public function insertnews($data)
  {
    try {
      $pagenews = "news_content/news-".$data['newspage'].".txt";
      $mynews = fopen($pagenews, "w") or die("Unable to open file!");
      // if ($myblob) {
        fwrite($mynews, $data['N_CONTENT']);
        fclose($mynews);
      // }
      $this->db->set('PID', $data['PID']);
      $this->db->set('N_TITLE', $data['N_TITLE']);
      $this->db->set('N_CATEGORY', $data['N_CATEGORY']);
      $this->db->set('N_TAG', $data['N_TAG']);
      $this->db->set('N_IMG', $data['N_IMG']);
      // $this->db->set('N_CONTENT', "to_clob('".$data['N_CONTENT']->save()."')",false);
      $this->db->set('N_CONTENT', $pagenews);
      $this->db->set('N_STATUS', $data['N_STATUS']);
      $this->db->set('N_START_DATE',"to_date('".$data['N_START_DATE']."','dd/mm/yyyy')",false);
      if(isset($data['N_END_DATE'])){
        $this->db->set('N_END_DATE',"to_date('".$data['N_END_DATE']."','dd/mm/yyyy')",false);
      }
      if (!$this->db->insert('TBL_NEWS')) {
        @unlink ('./upload/'.$data['N_IMG']);
        @unlink ($pagenews);
        // return $this->db->affected_rows();error
        return $this->db->error();
      }

      $query = $this->db->query("SELECT last_number FROM user_sequences WHERE sequence_name = 'ID_NEWS'");
      $this->autoAddCate($data['N_CATEGORY']);

      foreach ($query->result() as $row)
        {
          return $row->LAST_NUMBER;
        }

    } catch (Exception $e) {
      return $e;
    }
  }

  private function autoAddCate($category)
  {
    $queryCate = $this->db->get_where('TBL_N_CATEGORY', array('CATEGORY' => $category, ));
    // echo 'DB'.$queryCate->num_rows();
    if ($queryCate->num_rows()<1) {
      // echo "<br>Add Cate!";
      $this->db->insert('TBL_N_CATEGORY',array('CATEGORY' => $category));
    }
  }

  public function delfile($filename)//$idfile is array( 'N_FILE' => $filename).
  {
    $query = $this->db->get_where('TBL_FILENEWS',$filename);
      // foreach ($query->result() as $row) {
      //     @unlink ( './upload/'.$row->N_FILE ) or die ('No such file or directory');
      //   }
      // $this->db->delete('TBL_FILENEWS', $filename) V
        if($this->db->update('TBL_FILENEWS', array('N_STATUS' => 0, ), $filename)){
          return 'success';
        }else{
          return 'error';
        }
  }

  public function delNews($idnews)//$idfile is array( 'ID_FILE' => $id_news).
  {
    // $query = $this->db->get_where('TBL_FILENEWS',$idnews);
    //   foreach ($query->result() as $row) {
    //       @unlink ( './upload/'.$row->N_FILE );
    //     }
    // $query = $this->db->get_where('TBL_NEWS',$news_ID);
    //   foreach ($query->result() as $row) {
    //     if (!$row->N_IMG == 'null') {
    //       @unlink ( './upload/'.$row->N_IMG);
    //     }
    //   }
    // if($this->db->delete('TBL_NEWS', $idnews)){
    //   return 'success';
    // }else{
    //   return 'error';
    // }
    if($this->db->update('TBL_NEWS', array('N_STATUS' => 0, ), $idnews)){
      return 'success';
    }else{
      return $this->db->error();
    }
  }

  public function UpdateNews($news_ID, $data)//not test.
  {
      // $query = $this->db->query("SELECT N_IMG FROM TBL_NEWS WHERE NEWS_ID = ".$news_ID);
      // foreach ($query->result() as $row)
      //   {
      //     if(isset($row->N_IMG) && $row->N_IMG != null)
      //       unlink ( './upload/'.$row->N_IMG ) or die ('No such file or directory img');
      //   }
    // $this->db->where('NEWS_ID', $news_ID);
    // $this->db->update('TBL_NEWS', $data);
    //$this->db->set('PID', $data['PID']);
    $query = $this->db->get_where('VIEW_NEWS_NEW',array('NEWS_ID' => $news_ID,));
    $query = $query->result();
    foreach ($query as $key => $value) {
      $pagenews = $value->N_CONTENT;
      continue;
    }


    $this->db->set('N_TITLE', $data['N_TITLE']);
    $this->db->set('N_CATEGORY', $data['N_CATEGORY']);
    $this->db->set('N_TAG', $data['N_TAG']);
    // $this->db->set('N_CONTENT', $data['N_CONTENT']);
    if(isset($data['N_IMG'])){
      $this->db->set('N_IMG', $data['N_IMG']);
    }
    if(isset($data['N_END_DATE'])){
      $this->db->set('N_END_DATE',"to_date('".$data['N_END_DATE']."','dd/mm/yyyy')",false);
    }
    $this->db->where('NEWS_ID', $news_ID);
    $this->db->update('TBL_NEWS');
    $this->autoAddCate($data['N_CATEGORY']);

    // $pagenews = "news_content/news-".$data['newspage'].".txt";
    if (isset($data['N_CONTENT'])) {
      $mynews = fopen($pagenews, "w") or die("Unable to open file!");
      // if ($myblob) {
        fwrite($mynews, $data['N_CONTENT']);
        fclose($mynews);
      // }
    }

  }

  public function selectNewsEdit($news_ID)// $news_ID => array('NEWS_ID' => news_id). not test.
  {
    //Query News join file.
    $news = $this->db->query("SELECT PID, N_TITLE, N_CATEGORY, N_IMG, N_TAG, N_CONTENT, TO_CHAR(N_START_DATE,'YYYY-MM-DD') as START_DATE,TO_CHAR(N_END_DATE,'YYYY-MM-DD') as END_DATE, 'N_LAST_EDIT', 'N_TAG'
      FROM TBL_NEWS WHERE NEWS_ID =". $news_ID['NEWS_ID']);

    $news=$news->result_array();

    foreach ($news as $key => $value) {

     $news[$key]['N_CONTENT'] = file_get_contents($value['N_CONTENT']);
    // echo $value['N_CONTENT']->load();
    }

    $files = $this->db->get_where('TBL_FILENEWS',$news_ID);
    $query = array(
      'NEWS'    => $news,
      'FILES'   => $files->result(),
    );
    return $query;
  }

  public function getCate()
  {
    $query = $this->db->get('TBL_N_CATEGORY');
    return $query->result();
  }

  public function getNewspage($value)
  {
    $query = $this->db->get_where('TBL_NEWS',array('N_CONTENT' => "news_content/news-".$value.".txt", ),1);
    foreach ($query->result() as $row) {
      if (isset($row->FILE_NAME)) {
        return $row->FILE_NAME;
      }else{
        return false;
      }
    }
  }

}
