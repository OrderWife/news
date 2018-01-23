<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function __construct()
	{
				parent::__construct();
				$this->load->model('News_Model');
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->view('backendview\include\include_v');

		}


	public function index()
	{
		echo "Index";
		redirect('backend\news');
	}

	public function news()
		{
			$data = array (
							'query' => $this->News_Model->selectNews()
			);

			//$this->load->view('backendview\include\include_v');
			$this->load->view('backendview\include\include_table',$data);
			//$this->load->view('backendview\include\scriptdatatable');
			$this->load->view('backendview\backendhome');
		}

	// public function newsform()
	// {
	// 	$this->load->view('backendview\newsform');
	// }

	public function createnews()
	{


			$data = array(
				'PID'           => $this->session->userdata('pid'),
				'N_TITLE'       => $this->input->post('title'),
				'N_CATEGORY'    => $this->input->post('category'),
				'N_IMG'         => $this->upload->data('file_name'),
				'N_CONTENT'     => $this->input->post('content'),
				'N_START_DATE'  => $this->input->post('startdate'),
				'N_END_DATE'    => $this->input->post('enddate'),
			);
			echo json_encode($data);


	}

	private function upload_files(){

		$config['upload_path']          = './upload/files/';
		$config['allowed_types']        = 'pdf|zip|rar';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['max_size']             = 10000;
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
									$data = array('upload_data' => $this->upload->data()); //store data of file
									$this->load->view('successupload', $data); ////data of file

					}


			}

	}

	private function upload_img()
	{
			$config['upload_path']          = './upload/img/';
			$config['allowed_types']        = 'jpg|jpeg|png|gif';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$config['max_size']             = 10000;
			$config['encrypt_name']         = true;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
							$error = array('error' => $this->upload->display_errors());

							$this->load->view('upload_form', $error);
			}
			else
			{
							$data = array('upload_data' => $this->upload->data()); //store data of img

							$this->load->view('upload_success', $data); //data of img.
			}

	}

}
