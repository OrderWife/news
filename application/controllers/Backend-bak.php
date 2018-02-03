<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {
	protected $lastNewsId;
	public function __construct()
	{
				parent::__construct();
				$this->load->model('News_Model');
				$this->load->library('session');

		}


	public function index()
	{
		redirect('backend\news');

	}

	public function news()
		{
			$data = array (
							'query' => $this->News_Model->selectNews()
			);

			$this->load->view('backendview\include\include_v');
			$this->load->view('backendview\include\include_table',$data);
			$this->load->view('backendview\include\scriptdatatable');
			$this->load->view('backendview\backendhome');
		}

	public function createnews()
		{
				$imgname = 'null';
				if(!$_FILES['imgUp']['size'] == 0 && $_FILES['imgUp']['error'] == 0){
					//echo "<br>imgUp have file.<br>";
					$imgname  = $this->upload_img();//$_FILES['imgUp']
				}else {
					//echo "<br>imgUp empty.<br>";
				}

				$dataofnews = array(
					'PID'           => 1,//$this->session->userdata('pid'),
					'N_TITLE'       => $this->input->post('title'),
					'N_CATEGORY'    => $this->input->post('category'),
					'N_TAG'    			=> $this->input->post('tagNews'),
					'N_IMG'         => $imgname,
					'N_CONTENT'     => $this->input->post('content'),
					'N_START_DATE'  => $this->functodateOra($this->input->post('startdate')),
					'N_END_DATE'    => $this->functodateOra($this->input->post('enddate')),
				);

				$idnews = $this->News_Model->insertnews($dataofnews);
				$this->lastNewsId = $idnews-1;

				if(!$_FILES['fileUp']['size'][0] == 0 ){
					//echo "<br>fileUp have file.<br>";
					$this->upload_files($_FILES['fileUp']);
				}else{
					//echo "<br>fileUp empty.<br>";
				}
				//echo json_encode($dataofnews);

				redirect('./backend/');
		}
	private function functodateOra($date)
		{
			if($date){
				$ed = strtotime($date);
				$returndate = date('d-m-Y',$ed);
			}else{
				$returndate = null;
			}
			return $returndate;
		}
	private function upload_files($formfiles){

		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'pdf|zip|rar';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		//$config['max_size']             = 10000000;
		$config['encrypt_name']         = true;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$files = $formfiles;
		$cpt = count($_FILES['fileUp']['name']);
		for($i=0; $i<$cpt; $i++)
		{
				$_FILES['fileUp']['name']= $files['name'][$i];
				$_FILES['fileUp']['type']= $files['type'][$i];
				$_FILES['fileUp']['tmp_name']= $files['tmp_name'][$i];
				$_FILES['fileUp']['error']= $files['error'][$i];
				$_FILES['fileUp']['size']= $files['size'][$i];


					if ( ! $this->upload->do_upload('fileUp'))
					{
									$error = array('error' => $this->upload->display_errors());
									echo '<br> json error'.json_encode($error);
									echo json_encode($_FILES['fileUp']);

					}
					else
					{
									$data = array('upload_data' => $this->upload->data()); //store data of file
									$file = array(
										'NEWS_ID' => $this->lastNewsId,
										'N_FILE' => $data['upload_data']['file_name'],
										'N_ORIGNAME' => $data['upload_data']['orig_name'],
										);
									$this->db->insert('TBL_FILENEWS', $file);

					}

			}

	}
	private function upload_img()//$imgfile
		{

				$config['upload_path']          = './upload/';
				$config['allowed_types']        = 'jpg|jpeg|png|gif';
				$config['max_size']             = 0;
				$config['max_width']            = 0;
				$config['max_height']           = 0;
				//$config['max_size']             = 10000000;
				$config['encrypt_name']         = true;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('imgUp')) //default 'imgUp'
				{
								$error = array('error' => $this->upload->display_errors());
								echo "error" . json_encode($error);
								return 'null';
				}
				else
				{
								$data = array('upload_data' => $this->upload->data()); //store data of img
								echo '<br> json data of img'.json_encode($data);
								return $data['upload_data']['file_name'];
				}

		}

	public function deleteNews($idnews){
		$data = array( 'NEWS_ID' => $idnews);
		$this->News_Model->delNews($data);
		redirect('backend\news');
	}
	public function delfileimg($filename){
			@unlink('./upload/'.$filename) or die ('No such file or directory') ;
	}


	public function edit($id)
	{
		$id = array('NEWS_ID' => $id);
		$json = $this->News_Model->selectNewsEdit($id);
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function FuncRandom($range)
		{
			echo "start gen!!";
			$myfile = fopen("wordgen50k.txt", "w") or die("Unable to open file!");
			for ($i=0; $i < $range ; $i++) {
					$th_word = array('ก', 'ข' ,'ค' ,'ฅ' ,'ฆ' ,'ง' ,'จ' ,'ฉ' ,'ช' ,'ซ', 'ฌ', 'ญ' ,'ฐ' ,'ฑ' ,'ฒ' ,
													 'ณ', 'ด', 'ต', 'ถ' ,'ท' ,'ธ', 'น' ,'บ', 'ป','ผ' ,'ฝ' ,'พ', 'ฟ' ,'ภ', 'ม' ,'ย', 'ร', 'ล' ,'ว',
													 'ศ', 'ษ' ,'ส' ,'ห' ,'ฬ' ,'อ' ,'ฮ');
					$num = array(1,2,3,4,5,6,7,8,9,0);
					$word = array();
					for ($j=0; $j < 4; $j++) {
						if ($j < 2) {
							shuffle($th_word);
							$word[$j] = $th_word[rand(0,sizeof($th_word)-1)];
						}else{
							shuffle($num);
							$word[$j] = $num[rand(0,sizeof($num)-1)];
						}
					}
					shuffle($word);
					$word = implode($word);
					$word = $word."\n";
					fwrite($myfile, $word);
				}
			fclose($myfile);
			echo "finish";
			}
}
