<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanage_Model extends CI_Model {

  function __construct() {
        parent::__construct();
        $this->load->database();
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
    $this->db->delete('TBL_FM_FILE', array('FILE_NAME' => $filename));
    return $this->db->affected_rows(); //if success return 1 else return 0;
  }

  public function getFilename($value)
  {
    $query = $this->db->get_where('TBL_FM_FILE',array('FILE_NAME' => $value, ),1);
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
    $query = $this->db->get_where('TBL_FM_FILE',array('FILE_NAME_ORIG' => $value, ),1);
    foreach ($query->result() as $row) {
      if (isset($row->FILE_NAME)) {
        return $row->FILE_NAME_ORIG;
      }else{
        return false;
      }
    }
  }

  public function getnameOrig($value)
  {
    $query = $this->db->get_where('TBL_FM_FILE',array('FILE_NAME' => $value, ),1);
    foreach ($query->result() as $row) {
      if (isset($row->FILE_NAME)) {
        return array($row->FILE_NAME_ORIG , $row->UPLOAD_DATE, $row->DESCRIBE, $row->PID);
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

  }
