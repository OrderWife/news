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
		$config['upload_path']   = './upload/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['encrypt_name']  = true;

		$this->load->library('upload', $config);
		if ( !$this->upload->do_upload('imgUp') && !empty($this->input->post('imgUp'))) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('blank', $error);
			return;
		}
		 if(!empty($_FILES['fileUp']['name'])) {
					$filesCount = count($_FILES['fileUp']['name']);
					for($i = 0; $i < $filesCount; $i++){
							 $_FILES['fileUp']['name'] = $_FILES['fileUp']['name'][$i];
							 $_FILES['fileUp']['type'] = $_FILES['fileUp']['type'][$i];
							 $_FILES['fileUp']['tmp_name'] = $_FILES['fileUp']['tmp_name'][$i];
							 $_FILES['fileUp']['error'] = $_FILES['fileUp']['error'][$i];
							 $_FILES['fileUp']['size'] = $_FILES['fileUp']['size'][$i];

							 $uploadPath = './upload/file/';
							 $config['upload_path'] = $uploadPath;
							 $config['allowed_types'] = '';
							 $config['encrypt_name']  = true;

							 $this->load->library('upload', $config);
							 $this->upload->initialize($config);
							 if($this->upload->do_upload('fileUp')){
									 $fileData = $this->upload->data();
									 $uploadData[$i]['file_name'] = $fileData['file_name'];
									 $uploadData[$i]['created'] = date("Y-m-d H:i:s");
									 $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
							 }else{
								 	$error = array('error' => $this->upload->display_errors());
					 				$this->load->view('blank', $error);
							 }
					 }


		}

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

	public function upfile()
	{
		$this->load->view('welcome_message');
		if(!empty($_FILES['fileUp']['name'])){
            $filesCount = count($_FILES['fileUp']['name']);
						echo $filesCount;
					}else {
						echo "0";
					}

	}


}
