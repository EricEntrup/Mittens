<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UIElementsController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
        $data['page_name'] ="ui-elements/color";
        $this->load->view('index',$data);
    }
    function uiTypography()
	{
        $data['page_name'] ="ui-elements/typography";
        $this->load->view('index',$data);
    }
    function uiAlert()
	{
        $data['page_name'] ="ui-elements/alert";
        $this->load->view('index',$data);
    }
    function uiBadge()
	{
        $data['page_name'] ="ui-elements/badge";
        $this->load->view('index',$data);
    }
    function uiBreadcrumb()
	{
        $data['page_name'] ="ui-elements/breadcrumb";
        $this->load->view('index',$data);
    }
    function uiButton()
	{
        $data['page_name'] ="ui-elements/button";
        $this->load->view('index',$data);
    }
    function uiCard()
	{
        $data['page_name'] ="ui-elements/card";
        $this->load->view('index',$data);
    }
    function uiCarousel()
	{
        $data['page_name'] ="ui-elements/carousel";
        $this->load->view('index',$data);
    }
    function uiVideo()
	{
        $data['page_name'] ="ui-elements/video";
        $this->load->view('index',$data);
    }
    function uiGrid()
	{
        $data['page_name'] ="ui-elements/grid";
        $this->load->view('index',$data);
    }
    function uiImages()
	{
        $data['page_name'] ="ui-elements/image";
        $this->load->view('index',$data);
    }
    function uiListGroup()
	{
        $data['page_name'] ="ui-elements/listgroup";
        $this->load->view('index',$data);
    }
    function uiMedia()
	{
        $data['page_name'] ="ui-elements/media";
        $this->load->view('index',$data);
    }
    function uiModal()
	{
        $data['page_name'] ="ui-elements/modal";
        $this->load->view('index',$data);
    }
    function uiNotification()
	{
        $data['page_name'] ="ui-elements/notification";
        $this->load->view('index',$data);
    }
    function uiPagination()
	{
        $data['page_name'] ="ui-elements/pagination";
        $this->load->view('index',$data);
    }
    function uiPopover()
	{
        $data['page_name'] ="ui-elements/popover";
        $this->load->view('index',$data);
    }
    function uiProgressBar()
	{
        $data['page_name'] ="ui-elements/progressbar";
        $this->load->view('index',$data);
    }
    function uiTabs()
	{
        $data['page_name'] ="ui-elements/tabs";
        $this->load->view('index',$data);
    }
    function uiTooltip()
	{
        $data['page_name'] ="ui-elements/tooltip";
        $this->load->view('index',$data);
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */