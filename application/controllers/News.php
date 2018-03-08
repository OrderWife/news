<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

  public function __construct()
	{
				parent::__construct();
				$this->load->model('News_Model');
        $this->load->helper('download');
		}

	public function index()
	{
		$this->news();
	}

  public function news()
  {
    $data = array('query' => $this->News_Model->selectNews(NULL,6), );
    $this->load->view('newsmanage/newsfeed',$data);
  }

  public function newspage($newsNO) //newspage
  {
    $this->load->view('newsmanage/newspage',
                    array(
                        'newsDetail' => json_encode($this->News_Model->selectNews($newsNO)),
                        'filename'   => json_encode($this->News_Model->getFile($newsNO)),
                        'Objnews'   => json_encode($this->News_Model->selectNews(NULL,6)),
                        'dateThai' => $this->dateThai(),
                       ));
    // $this->load->view('newsmanage/newspage');
  }

  public function newslist()
  {
    $data = array('jsonnewslist' => $this->News_Model->selectNews(NULL,6), );
    $this->load->view('newsmanage/newstable',$data);
  }

  public function download($item,$realname)
	{

		$file ='./upload/'.$item;
    // echo realpath($file);
		force_download($realname,file_get_contents(realpath($file)),NULL);
		// redirect('myshelf/');
	}

  public function dateThai()
  {
    $day = date('D');
    $month = date('m');
    $year = date('Y')+543;
    switch ($day)
    {
      case 'Sun': $day='อาทิตย์';break;
      case 'Sat': $day='เสาร์';break;
      case 'Fri': $day='ศุกร์';break;
      case 'Thu': $day='พฤหัสบดี';break;
      case 'Wed': $day='พุธ';break;
      case 'Tue': $day='อังคาร';break;
      case 'Mon': $day='จันทร์';break;
    }
    switch ($month)
      {
        case 01 : $month="มกราคม"; break;
        case 02 : $month="กุมภาพันธ์"; break;
        case 03 : $month="มีนาคม"; break;
        case 04 : $month="เมษายน"; break;
        case 05 : $month="พฤษภาคม"; break;
        case 06 : $month="มิถุนายน"; break;
        case 07 : $month="กรกฎาคม"; break;
        case 08 : $month="สิงหาคม"; break;
        case 09 : $month="กันยายน"; break;
        case 10 : $month="ตุลาคม"; break;
        case 11 : $month="พฤศจิกายน"; break;
        case 12 : $month="ธันวาคม"; break;
      }
    // echo date("l d, F  Y").'<br>';
    return 'วัน'. $day. ' ที่ '.date('d').' , '. $month.' , พ.ศ. ' .$year;
  }


}
