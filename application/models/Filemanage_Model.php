<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanage_Model extends CI_Model {

  function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function getshotGroup($gid)
  {
    $query = $this->db->get_where('HR_EMPLOYEE_GROUPID',array('EMPLOYEE_GROUPID' => $gid, ),1);
    foreach ($query->result() as $row) {
      return $row->GROUPNAME_SHORT;
    }
  }

  public function getOwner($pid)
  {
    $query = $this->db->get_where('HR_PERSON',array('PID' => $pid, ),1);
    foreach ($query->result() as $row) {
      return $row->F_NAME . " " .$row->L_NAME;
    }
  }

  public function getShelf($gid)
  {
    $query = $this->db->get_where('TBL_FM_GROUP_PATH',array('EMPLOYEE_GROUPID' => $gid, ),1);

    foreach ($query->result() as $row) {
      return $row->PATH_NAME;
    }
  }

  public function createFile($data)
  {
    $this->db->insert('TBL_FM_FILE', $data);
  }

  public function deleteFile($filename)
  {
    // $this->db->delete('TBL_FM_FILE', array('FILE_NAME' => $filename));
    // $this->db->update('TBL_NEWS', array('N_STATUS' => 0, ), $idnews)
    $this->db->update('TBL_FM_FILE', array('F_STATUS' => 0, ),array('FILE_NAME' => $filename));
    return $this->db->affected_rows(); //if success return 1 else return 0;
  }

  public function getFilename($value)
  {
    $query = $this->db->get_where('TBL_FM_FILE',array('FILE_NAME' => $value, 'F_STATUS' => 1),1);
    foreach ($query->result() as $row) {
      if (isset($row->FILE_NAME)) {
        return $row->FILE_NAME;
      }else{
        return false;
      }
    }
  }

  public function getFilenameOrig($value)
  {
    $query = $this->db->get_where('TBL_FM_FILE',array('FILE_NAME_ORIG' => $value, 'F_STATUS' => 1),1);
    foreach ($query->result() as $row) {
      if (isset($row->FILE_NAME)) {
        return $row->FILE_NAME_ORIG;
      }else{
        return false;
      }
    }
  }

  public function getFilenameExist($fname,$basepath)
  {
    $query = $this->db->get_where('TBL_FM_FILE',array('FILE_NAME_ORIG' => $fname,'PATH' => $basepath, 'F_STATUS' => 1),1);
    $query = $query->result_array();
    // echo json_encode($query);
      if (empty($query)) {
        // echo "True";
        return true;
      }else{
        // echo "False";
        return false;
      }
      // echo json_encode($query);
  }

  public function getnameOrig($value)
  {
    $query = $this->db->get_where('TBL_FM_FILE',array('FILE_NAME' => $value, 'F_STATUS' => 1),1);
    foreach ($query->result() as $row) {
      if (isset($row->FILE_NAME)) {
        $Owner = $this->getOwner($row->PID);
        $S_Group = $this->getshotGroup($row->EMPLOYEE_GROUPID);
        return array($row->FILE_NAME_ORIG , $row->UPLOAD_DATE, $row->DESCRIBE, $row->PID, $row->F_VISIT, $Owner, $S_Group);
        // return $row->FILE_NAME_ORIG ;
      }else{
        // return false;
        return NULL;
      }
    }
  }

public function rename($data,$refName)
{
  $this->db->update('TBL_FM_FILE', $data, array('FILE_NAME' => $refName));
  return $this->db->affected_rows();
}

public function getUser($user)
{
  $this->db->where('PID != ',$user);
  $query = $this->db->get('HR_PERSON');
  $query = $query->result();
  $userData = array();
  foreach ($query as $key => $user) {
    $userData[$key]['ID'] = $user->PID;
    $userData[$key]['NAME'] = $user->USERNAME;
  }
  return $userData;
}

public function checkShare($pid)
{
  $query = $this->db->query("SELECT * FROM TBL_FM_FILE  WHERE F_STATUS = 1 AND ( F_VISIT LIKE '".$pid."' OR  F_VISIT LIKE '%,".$pid.",%' OR F_VISIT LIKE '".$pid.",%' OR F_VISIT LIKE '%,".$pid."') ORDER BY PATH ASC");
  return $query->result();
}

public function updateFvisit($datavisit,$fRef)
{
  $this->db->update('TBL_FM_FILE', $datavisit, array('FILE_NAME' => $fRef));
}

public function checkcurrenttaket($taket,$pid,$gid)
{
  $query = $this->db->get_where('TBL_FM_FILE',array('FILE_NAME' => $taket, 'F_STATUS' => 0),1);
  $query = $query->result_array();
  // echo var_dump($query);
  // return true;
  if ( !isset($query) ) {
    return false; //Is file will deactive can't use this file.
  }else{
    $query = $this->db->get_where('TBL_FM_FILE',array('FILE_NAME' => $taket, 'F_STATUS' => 1),1);
    $query = $query->result_array();
    $bool = false;

    foreach ($query as $key => $data) {

      if($data['PID'] != $pid) {

        if ($data['F_VISIT'] == 'g'){
          if ($gid == $data['EMPLOYEE_GROUPID']) {
            $bool = true;
          }else{
            $bool = false;
          }
         // return true; //F_VISIT is g in gid == EMPLOYEE_GROUPID.

       }else if($data['F_VISIT'] != 'm'){ //if($data['F_VISIT'] != 'g' && $data['F_VISIT'] != 'm')

          $iduser = explode( ',' , $data['F_VISIT'] );
          // echo "(1 == '1') : ". (1 == '1');
          foreach ($iduser as $key => $inUser) {
            // echo $pid;
            // echo json_encode($iduser);
            // return;

            if($inUser == $pid){
              $bool = true;
              break;
            }else{
              $bool = false;
            }

          }

        }else{

          $bool = false; //this F_VISIT = m and not owner of file.

        }
      }else if($data['PID'] == $pid){

        $bool = true; //Owner of file.
      }
    }//end if...else...

    return $bool;

  }//end if...else...

}//end func.

}
