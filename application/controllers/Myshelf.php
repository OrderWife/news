<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myshelf extends CI_Controller {

	private $basePath = NULL; //get form db.
	private $root = NULL;

	public function __construct()
	{
				parent::__construct();
				$this->load->model('Filemanage_Model');
				$this->load->library('session');
				$this->load->helper('download');

				$this->basePath = '../news/fm_root/root_1';
				$this->root = $this->basePath;

	}


	public function index()
	{
    $this->home();
	}

  public function home()
  {
    $data = array(
			'page' 			=> 'shelf',
			'files' 		=> json_encode(scandir($this->basePath)),
			// 'picePath'	=> explode('/',$this->basePath),
			'basePath'	=> $this->basePath,
			'upPath'			=> 'f',
		 );
    $this->load->view('backendhome',$data);
  }

	public function folder($path,$taketpath)
  {
		try {
			if (!isset($taketpath)) {
				redirect('myshelf/');
			}
			$this->basePath = base64_decode($path) .'/'. $taketpath;
			// $this->basePath = str_replace('-','/',);
			$this->basePath = $this->checkSpace($this->basePath);
	    $data = array(
				'page' 				=> 'shelf',
				'files' 			=> json_encode(@scandir($this->basePath)),
				// 'picePath'	=> explode('/',$this->basePath),
				'basePath'		=> $this->basePath,
				'upPath'			=> str_replace('=','',base64_encode(dirname($this->basePath))),
				// 'upPath'			=> str_replace('=','',base64_encode(realpath($this->basePath))),
			 );
	    $this->load->view('backendhome',$data);
		} catch (Exception $e) {
			redirect('myshelf/');
		}


  }

	public function up($path)
  {
		try {
			$this->basePath = base64_decode($path);
			// $this->basePath = str_replace('-','/',);
			$this->basePath = $this->checkSpace($this->basePath);
			// echo 'real : '.realpath($this->basePath);
			// echo "path : ". realpath($this->root);
			$str = realpath($this->root);
			switch (realpath($this->basePath)) {
				case realpath($this->root):
				case dirname(realpath($this->root)):
				case dirname(dirname(realpath($this->root))):
				case dirname(dirname(dirname(realpath($this->root)))):
					redirect('myshelf');
					break;
			}
	    $data = array(
				'page' 				=> 'shelf',
				'files' 			=> json_encode(scandir($this->basePath)),
				// 'picePath'	=> explode('/',$this->basePath),
				'basePath'		=> $this->basePath,
				'upPath'			=> str_replace('=','',base64_encode(dirname($this->basePath))),
				// 'upPath'			=> str_replace('=','',base64_encode(realpath($this->basePath))),
			 );
	    $this->load->view('backendhome',$data);
		} catch (Exception $e) {
			redirect('myshelf');
		}


  }


	public function createFolder($basePath)
	{
		$path = $this->input->post('folderName');
		$path = base64_decode($basePath) .'/'. $path;
		if (file_exists($path) && is_dir($path)) {
				echo '<script type="text/javascript">
				  					alert("ไม่สามารถสร้างไฟล์เดอร์ได้ เนื่องจากชื่อซ้ำกัน.");
									</script>';
				return redirect('myshelf/','refresh');
		}
		if(mkdir($path)){
			redirect('myshelf/'.$basePath);
		}
	}

	public function upload()
	{
		// echo !isset($_FILES['file']);
		// $basePath = base64_decode($basePath);
		// echo "Upload : ".realpath($basePath);
		// $this->upload_file(realpath($basePath));
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'jpg|jpeg|png|gif|pdf|zip';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['max_size']             = 10000000;
		$config['encrypt_name']         = true;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('file'))
		{
						$error = array('error' => $this->upload->display_errors());
						echo "error" . json_encode($error);
						return null;
		}
		else
		{
						$data = array('upload_data' => $this->upload->data()); //store data of img
						echo '<br> json data of file'.json_encode($data);
						return $data['upload_data']['file_name'];
		}

	}

	public function copyFile()
	{
		echo "copyFile";
		# code...
	}

	public function moveFile()
	{
		echo "moveFile";
	}

	public function deleteFile()
	{
		echo "DeleteFile success!";
		# code...
	}

	public function download($path,$item)
	{
		// echo "Download : ". base64_decode($path).'/'.$item;
		$file = base64_decode($path).'/'.$item;
		force_download(realpath($file),NULL);
		// redirect('myshelf/');
	}

	private function dirToArray($dir) {

   $result = array();

   $cdir = scandir($dir);
   foreach ($cdir as $key => $value)
   {
      if (!in_array($value,array(".","..")))
      {
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
         {
            $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value);
         }
         else
         {
            $result[] = $value;
         }
      }
   }

   return $result;
}

private function checkSpace($spell)
{
	return urldecode($spell);
	// return str_replace('%20',' ',$spell);
}

private function upload_file($path)
	{
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png|gif|pdf|zip';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			//$config['max_size']             = 10000000;
			$config['encrypt_name']         = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('file'))
			{
							$error = array('error' => $this->upload->display_errors());
							echo "error" . json_encode($error);
							return null;
			}
			else
			{
							$data = array('upload_data' => $this->upload->data()); //store data of img
							echo '<br> json data of file'.json_encode($data);
							return $data['upload_data']['file_name'];
			}

	}


}
