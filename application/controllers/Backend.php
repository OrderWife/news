<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function __construct()
	{
				parent::__construct();
				$this->load->model('News_Model');
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

	public function newsform()
	{
		$this->load->view('backendview\newsform');
	}

	// public function dropupload()
	// 	{
	// 	$ds          = DIRECTORY_SEPARATOR;  //1
  //
	//   $storeFolder = 'uploads';   //2
  //
	//   if (!empty($_FILES)) {
  //
	//       $tempFile = $_FILES['file']['tmp_name'];          //3
  //
	//       $targetPath = dirname( _FILE_ ) . $ds. $storeFolder . $ds;  //4
  //
	//       $targetFile =  $targetPath. $_FILES['file']['name'];  //5
  //
	//       move_uploaded_file($tempFile,$targetFile); //6
  //
	//   }
	// }

}
