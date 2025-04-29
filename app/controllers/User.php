<?php
class User extends Controller 
{
	public function __construct()
	{
		if (isset($_SESSION['foxcart_user'])) 
		{
	    } 
	    else 
	    {
	        redirect('users/login');
	    }  
        if(!isset($_SESSION['temp_created_by']))
        {
            if(isset($_SESSION['user_id']))
            {
                $_SESSION['temp_created_by'] = $_SESSION['user_id'];
            }
            else
            {
                $_SESSION['temp_created_by'] = rand(99,99999);
            }
        }   
	    $this->pageModel = $this->model('Page'); 
        $this->userModel = $this->model('Users');
	}
	public function index() 
	{
	    $data = [];
	    $this->view('user/index');
	}
	
    public function change_pass()
    {
        $this->view('user/change_pass');
    }

    public function change_password()
    {
        if(isset($_POST['opass']))
        {
        $opass = $_POST['opass'];
        $r = $this->pageModel->check_pass($opass);
        if($r == true)
        {
            if(isset($_POST['npass']))
            {
                if(isset($_POST['cpass']))
                {
                  if($_POST['npass'] == $_POST['cpass'])
                  {
                        $this->pageModel->update_password($_POST['npass']);
                        $_SESSION['success'] = "Password Changed successfully..!";
                        redirect('user/change_pass');
                  }
                  else
                  {
                        $_SESSION['success'] = "Conform Password not matching with New Password";
                        redirect('user/change_pass');
                  }
                }
                else
                {
                        $_SESSION['success'] = "Enter Conform Password";
                        redirect('user/change_pass');
                }
            }
            else
            {
                $_SESSION['success'] = "Enter New Password";
                redirect('user/change_pass');
            }
        }
        else
        {
          $_SESSION['success'] = "Enter Matching Password";
          redirect('user/change_pass');
        }

        }
        else
        {
          $_SESSION['success'] = "Enter current Password";
          redirect('user/change_pass');
        }
    }
    public function logout()
    {
       if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }

        session_destroy();

        redirect('pages/index');
    }
    public function all_products()
    {
        $products = $this->userModel->get_all_orders();
        $data = [
                    'all_pro' => $products,
                ];
        $this->view('user/all_products',$data);
    }
    public function order_invoice1($id)
    {
        $p_details = $this->userModel->get_all_userinfo();
        $all_lab = $this->userModel->find_all_order();
        $get_order_details = $this->userModel->get_order_details($id);
        $all_order = $this->userModel->get_pharmacy_med_list($id);
        $get_invoice_details = $this->userModel->get_pharmacy_med_list_single($id);

        $data = [ 
            'p_details' => $p_details,
            'all_lab' => $all_lab,
            'sa' => 'n_book',
            'get_order_details' =>  $get_order_details,
            'get_invoice_details' => $get_invoice_details,
            'sa' => 'p_book',
            'id' => $id,
            'all_order' => $all_order,
        ];
        
        $this->view('user/order_invoice1', $data);
    }


    public function all_orders()
    {
        $products = $this->userModel->get_all_orders();
        $data = [
                    'all_pro' => $products,
                ];
        $this->view('pages/all_orders',$data);
    }

    public function view_order($id)
    {

        $p_details = $this->userModel->get_all_userinfo();
        $all_lab = $this->userModel->find_all_order();
        $get_order_details = $this->userModel->get_order_details($id);
        $all_order = $this->userModel->get_pharmacy_med_list($id);
        $get_invoice_details = $this->userModel->get_pharmacy_med_list_single($id);

        $data = [ 
            'p_details' => $p_details,
            'all_lab' => $all_lab,
            'sa' => 'n_book',
            'get_order_details' =>  $get_order_details,
            'get_invoice_details' => $get_invoice_details,
            'sa' => 'p_book',
            'id' => $id,
            'all_order' => $all_order,
        ];
        
        $this->view('pages/view_order', $data);

    }





}