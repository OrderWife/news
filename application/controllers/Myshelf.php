<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myshelf extends CI_Controller {

	private $basePath = NULL;
	private $root = NULL;

	public function __construct()
	{
				parent::__construct();
				$this->authenclass->checkauthen();
				$this->load->model('Filemanage_Model');
				$this->load->helper('download');

				$this->basePath = '../news/fm_root/' . $this->Filemanage_Model->getShelf($this->session->userdata('gid'));
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
			// 'files' 		=> json_encode(@scandir($this->basePath)),
			'files' 		  => $this->fileandsize($this->basePath),
			'filesOrig'		=> json_encode($this->getOrigName(@scandir($this->basePath))),
			// 'picePath'	=> explode('/',$this->basePath),
			'basePath'	=> $this->basePath,
			'upPath'		=> 'f',
			'id'				=> $this->session->userdata('id'),
			'user' 			=> $this->session->userdata('user'),
			'gid' 			=> $this->session->userdata('gid'),
			'gname' 			=> $this->session->userdata('gname'),
		 );
    $this->load->view('backendhome',$data);
  }

	public function folder($path,$taketpath)
  {
		try {
			if (!isset($taketpath)) {
				redirect('myshelf/');
			}
			$this->basePath = base64_decode($path).'/'. $taketpath;
			// $this->basePath = str_replace('-','/',);
			$this->basePath = $this->checkSpace($this->basePath);
	    $data = array(
				'page' 				=> 'shelf',
				// 'files' 			=> json_encode(@scandir($this->basePath."/")),
				'files' 		  => $this->fileandsize($this->basePath),
				'filesOrig'		=> json_encode($this->getOrigName(@scandir($this->basePath."/"))),
				// 'picePath'	=> explode('/',$this->basePath),
				'basePath'		=> $this->basePath."/",
				'upPath'			=> str_replace('=','',base64_encode(dirname($this->basePath))),
				// 'upPath'			=> str_replace('=','',base64_encode(realpath($this->basePath))),
				'id'				=> $this->session->userdata('id'),
				'user' 			=> $this->session->userdata('user'),
				'gid' 			=> $this->session->userdata('gid'),
				'gname' 			=> $this->session->userdata('gname'),
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
				// 'files' 			=> json_encode(@scandir($this->basePath."/")),
				'files' 		  => $this->fileandsize($this->basePath),
				'filesOrig'		=> json_encode($this->getOrigName(@scandir($this->basePath."/"))),
				// 'picePath'	=> explode('/',$this->basePath),
				'basePath'		=> $this->basePath,
				'upPath'			=> str_replace('=','',base64_encode(dirname($this->basePath))),
				// 'upPath'			=> str_replace('=','',base64_encode(realpath($this->basePath))),
				'id'				=> $this->session->userdata('id'),
				'user' 			=> $this->session->userdata('user'),
				'gid' 			=> $this->session->userdata('gid'),
				'gname' 			=> $this->session->userdata('gname'),
			 );
	    $this->load->view('backendhome',$data);
		} catch (Exception $e) {
			redirect('myshelf');
		}


  }



	function getOrigName($data)
	{
		$OrigName = array();
		foreach ($data as $value => $item) {
			if($this->getOrigFileName($item)){
				$OrigName[$value] = $this->getOrigFileName($item);
			}else{
				$OrigName[$value] = NULL;
			}

		}
		return $OrigName;
	}


	public function createFolder($basePath)
	{
		$foldername = $this->input->post('folderName');
		$realName = $this->createUniqueId();
		$path = base64_decode($basePath) .'/'. $realName;
		if (file_exists($path) && is_dir($path) && !$this->idExistsOrig($foldername)) {
				echo '<script type="text/javascript">
				  					alert("ไม่สามารถสร้างไฟล์เดอร์ได้ เนื่องจากชื่อซ้ำกัน.");
									</script>';
				return redirect('myshelf/','refresh');
		}
		if(mkdir($path)){
			$data = array(
						 'FILE_NAME' 					=> $realName,
						 'FILE_NAME_ORIG' 		=> $foldername,
						 'PATH' 							=> realpath(base64_decode($basePath)),
						 'PID' 								=> $this->session->userdata('id'),
						 'EMPLOYEE_GROUPID' 	=> $this->session->userdata('gid'),
						 'DESCRIBE' 					=> $this->input->post('describe'),
										);
			$this->Filemanage_Model->createFile($data);
			// echo realpath($path).'<br>';
			// echo realpath($this->root);
			// echo (realpath($path) == realpath($this->root));
			if (realpath($path) === realpath($this->root)) {
				// echo "True";
				redirect('myshelf/');
			}else{
				// echo "False";
				redirect('myshelf/up/'.$basePath);
			}

		}
	}

	public function upload($basePath)
	{

		$basePath = base64_decode($basePath);
		$path = realpath($basePath);
		if (substr($path, strlen($path) - 1, 1) != '/') {
        $path .= '/';
    }
		// echo 'Upload :'.$path;
		if($this->upload_file($path)){
			echo "Success";
			redirect('myshelf/folder/'.realpath('=','',base64_encode($basePath)));
		}else{
			echo '<script type="text/javascript">
									alert("ไม่อัพโหลดไฟล์ได้ ขนาดไฟล์ของท่านอาจใหญ่เกินไปหรือชื่อไฟล์ของท่านซ้ำในระบบ.");
								</script>';
			 return redirect('myshelf/','refresh');
		}

	}

	public function rename()
	{
		 $newName = $this->input->post('newName');
		 $refName = $this->input->post('refName');
		 $describe = $this->input->post('describe');
		 if (isset($describe) && !empty($describe)) {
			 $data = array(
				 'FILE_NAME_ORIG' => $newName ,
				 'DESCRIBE' => $describe ,
			  );
		 }else {
			 $data = array(
 				'FILE_NAME_ORIG' => $newName ,
 			 );
		 }

		 if($this->Filemanage_Model->rename($data,$refName)){
			 echo "success";
		 }else{
			 echo "error";
		 }

		 redirect('myshelf/');

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

	public function deleteFile($path, $taket)
	{
		if (!isset($path, $taket)) {
			return;
		}
		$dirPath = (base64_decode($path));
	 	$up = realpath($dirPath);
	 	$dirPath = realpath(base64_decode($path).'/'.$taket);
		$this->deleteDir($dirPath,$up);
		redirect('myshelf/');
		// echo "<br>DeleteFile success!";

	}

	public static function deleteDir($dirPath,$up) {
		$CI =& get_instance();
		$CI->load->model('Filemanage_Model');
    if (!is_dir($dirPath)) {
			if ($CI->Filemanage_Model->deleteFile(str_replace(str_split("\/"),'',str_replace($up,'',$dirPath)))) {
				 @unlink($dirPath);
			}
			// echo str_replace(str_split("\/"),'',str_replace($up,'',$dirPath));
			return;
        // throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file,$dirPath);
        } else {
					// echo "file : ".str_replace(str_split("\/"),'',str_replace($dirPath,'',$file))."<br>";
						if ($CI->Filemanage_Model->deleteFile(str_replace(str_split("\/"),'',str_replace($dirPath,'',$file)))) {
							@unlink($file);
						}
        }

    }
		// echo 'FOLDER : '.str_replace(str_split("\/"),'',str_replace($up,'',$dirPath)).'<br>';
    if ($CI->Filemanage_Model->deleteFile(str_replace(str_split("\/"),'',str_replace($up,'',$dirPath)))) {
			@rmdir($dirPath);
		}
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
		if (substr($path, strlen($path) - 1, 1) != '/') {
        $path .= '/';
    }
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png|gif|pdf|zip';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$config['max_size']             = 8000000;
			$config['encrypt_name']         = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('file'))
			{
							$error = array('error' => $this->upload->display_errors());
							// echo "error" . json_encode($error);
							return false;
			}
			else
			{
							$data = array('upload_data' => $this->upload->data()); //store data of img
							// echo '<br> json data of file'.json_encode($data);
							$data = array(
										 'FILE_NAME' 					=> $data['upload_data']['file_name'],
										 'FILE_NAME_ORIG' 		=> $data['upload_data']['orig_name'],
										 'PATH' 							=> $data['upload_data']['file_path'],
										 'PID' 								=> $this->session->userdata('id'),
										 'EMPLOYEE_GROUPID' 	=> $this->session->userdata('gid'),
										 'DESCRIBE' 					=> $this->input->post('describe'),
														);
							$this->Filemanage_Model->createFile($data);
							return true;
			}

	}

	function getRandomWord($len = 32) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'));
    shuffle($word);
    return substr(implode($word), 0, $len);
	}

public function createUniqueId() {

    while (1) {
       $word = $this->getRandomWord();
       if (!$this->idExists($word)) { // idExists returns true if the id is already used
				 		 // echo $word;
					 return $word;
	    }
	}
}

	function idExists($word)
	{
			return $this->Filemanage_Model->getFilename($word);
	}

	function idExistsOrig($word)
	{
		return $this->Filemanage_Model->getFilenameOrig($word);
	}

	function getOrigFileName($name)
	{
		return $this->Filemanage_Model->getnameOrig($name);
	}

	// public function testJson()
	// {
	// 	$json = array(
	// 			array(
	// 				'fn' => 'aaa.txt',
	// 				'fz' => 2,
	// 			),
	// 			array(
	// 				'fn' => 'ggg.png',
	// 				'fz' => 7,
	// 			),
	// 		);
	//
	// 		header('Content-Type: application/json');
	// 		echo json_encode($json);
	// }

	function fileandsize($path)//$path
	{
		// $path = base64_decode($path);
		$fn = @scandir(realpath($path));
		$file = array();
		foreach ($fn as $key => $value) {
			// echo "Key : ".$key ." => ".$value;
			if ($value != "." && $value != ".." && !is_dir($value)) {
				$file[$key] = array("fn"=>$value, "fz"=>filesize(realpath($path)."\\".$value),);
			}else{
				$file[$key] = array("fn"=>$value, "fz"=>'-',);
			}
		}
		return json_encode($file);
	}





}
