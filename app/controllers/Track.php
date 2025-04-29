<?php
class Track extends Controller 
{
	public function __construct()
	{
	    $this->pageModel = $this->model('Page'); 
        $this->adminModel = $this->model('Admins');
	}

	public function index($id=NULL)
    {
        $get_order = $this->pageModel->get_order($id);
        
        $data = [
                    'order' => $get_order,
                ];
if($get_order){
       $this->view('track/index',$data); 
}else {
    echo "Invalid Request";
}
    } 

    





}