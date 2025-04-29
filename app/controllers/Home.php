<?php
class Home extends Controller 
{
	public function __construct()
	{
	    $this->pageModel = $this->model('Page'); 
        $this->adminModel = $this->model('Admins');
	}


	public function index() 
	{
	    $this->view('home/index');
	}

    public function about() 
	{
	    $this->view('home/about');
	}
	
    public function contact() 
	{
	    $this->view('home/contact');
	}

    public function privacy_policy() 
	{
	    $this->view('home/privacy_policy');
	}

    public function tnc() 
	{
	    $this->view('home/tnc');
	}
}