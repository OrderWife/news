<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenclass {

  protected $CI;

  public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
        }

        public function checkauthen()
        {
          if($this->CI->session->userdata('id'))
            {

            }else{
              redirect('login/');
              exit;
            }
        }
}
?>
