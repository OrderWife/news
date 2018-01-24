<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('uploadform', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './upload/files/';
                $config['allowed_types']        = 'pdf|zip|rar';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                $config['max_size']             = 0;
                $config['encrypt_name']         = true;

                $this->load->library('upload', $config);

                $files = $_FILES;
                $cpt = count($_FILES['userfile']['name']);
                for($i=0; $i<$cpt; $i++)
                {
                    $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                    $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                    $_FILES['userfile']['size']= $files['userfile']['size'][$i];


                    if ( ! $this->upload->do_upload('userfile'))
                    {
                            $error = array('error' => $this->upload->display_errors());

                            $this->load->view('uploadform', $error);
                    }
                    else
                    {
                            $data = array('upload_data' => $this->upload->data());
                            $this->load->view('successupload', $data);

                    }
                  }



        }
}
?>
