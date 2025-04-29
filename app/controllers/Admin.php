<?php

require_once(APPROOT."/libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Admin extends Controller 
{
	public function __construct()
	{
	    $this->pageModel = $this->model('Page'); 
        $this->adminModel = $this->model('Admins');
	}

	public function index() 
	{
      
      if(isset($_SESSION['rexkod_vendor_id']) || $_SESSION['rexkod_admin_id']){
        // $online_orders = count($this->pageModel->get_online_orders());
        // $billing_orders = count($this->pageModel->get_billing_orders());
        $all_orders = count($this->pageModel->get_all_orders());
        $ad_orders = count($this->pageModel->get_from_orders());
        $md_orders = count($this->pageModel->get_from_orders_md());
        $rd_orders = count($this->pageModel->get_from_orders_rd());
        $company_orders = count($this->pageModel->get_from_orders_company());
        $local_orders = count($this->pageModel->hyperlocal_orders_admin());
        $truck_orders = count($this->pageModel->truck_orders_admin());
        $customers = count($this->adminModel->get_all_customers());
        $banner = $this->pageModel->get_banner();
        $wallet = $this->pageModel->getWalletById_vendor($_SESSION['rexkod_vendor_id']);
        $transactions = count($this->pageModel->getTransactions_vendor());
        $data = [
                    'banners' => $banner,
                    'all_orders' => $all_orders,
                    // 'online_orders' => $online_orders,
                    // 'billing_orders' => $billing_orders,
                    'local_orders' => $local_orders,
                    'truck_orders' => $truck_orders,
                    'customers' => $customers,
                    'ad_orders' => $ad_orders,
                    'md_orders' => $md_orders,
                    'rd_orders' => $rd_orders,
                    'company_orders' => $company_orders,
                    'wallet' => $wallet,
                    'transactions' => $transactions,
                ];
	   $this->view('admin/index',$data);
      } else {
        $this->view('admin/login');
      }
        
	}

    public function add_restaurant() 
	{
	   $this->view('admin/add_restaurant');
        
	}

    public function create_billing()
    {

        $from_name = $_POST['from_name'];
        $from_phone = $_POST['from_phone'];
        $from_address = $_POST['from_address'];
        $from_area = $_POST['from_area'];
        $from_city = $_POST['from_city'];
        $from_state = $_POST['from_state'];
        $from_pincode = $_POST['from_pincode'];
        $to_name = $_POST['to_name'];
        $to_phone = $_POST['to_phone'];
        $to_address = $_POST['to_address'];
        $to_area = $_POST['to_area'];
        $to_city = $_POST['to_city'];
        $to_state = $_POST['to_state'];
        $to_pincode = $_POST['to_pincode'];
        $item_name = $_POST['item_name'];
        $item_qty = $_POST['item_qty'];
        $item_cost = $_POST['item_cost'];
        $item_weight = $_POST['item_weight'];
        $item_length = $_POST['item_length'];
        $item_breadth = $_POST['item_breadth'];
        $item_height = $_POST['item_height'];
        $package_type = $_POST['package_type'];
        $shipping_by = $_POST['shipping_by'];
        $eway_number = $_POST['eway_number'];
        $packing_cost = $_POST['packing_cost'];
        $order_margin = $_POST['order_margin'];
        $speeder_id = $_POST['speeder_id'];
        $order_type = 0;
        $shipping_type = 0;

        $booking_cost = $_POST['booking_cost'];
        $booking_cost = preg_replace("/[^0-9.]/", "", $booking_cost);
        
        $to_id = NULL;
        $from_id = NULL;
        $get_from_id = $this->pageModel->email_verify_phone($from_phone);
        if($get_from_id){
            $from_id = $get_from_id->id;
        }
        $get_to_id = $this->pageModel->email_verify_phone($to_phone);
        if($get_to_id){
            $to_id = $get_to_id->id;
        }

       

        $all_ads = $this->pageModel->get_ads();
        foreach ($all_ads as $fromad){
        $frompin = explode(',', $fromad->ad_pincodes);
        foreach($frompin as $pin){
            if($pin == $from_pincode){
             $from_ad_id = $fromad->ad_id;
             $from_area_type = $fromad->area_type;
            } else if($pin == $to_pincode){
             $to_ad_id = $fromad->ad_id;
             $to_area_type = $fromad->area_type;
            }
        }
        }
    
        
       

        $volumetric_weight = (($item_length * $item_breadth * $item_height)/5000)*1000;
        if($item_weight >= $volumetric_weight){
            $order_weight = $item_weight;
        }else {
            $order_weight = $volumetric_weight;
        }

        if($from_pincode == $to_pincode){
            $to_ad_id = $from_ad_id;
            $to_area_type = $from_area_type;
        }

        $all_mds = $this->pageModel->get_mds();
        foreach ($all_mds as $curmd){
        $ads = explode(',', $curmd->ads);
        foreach($ads as $ad){
            if($ad == $from_ad_id){
             $from_md_id = $curmd->md_id;
            } else if($ad == $to_ad_id){
             $to_md_id = $curmd->md_id;
            }
        }
        }

        if($from_pincode == $to_pincode){
            $to_md_id = $from_md_id;
        }


        $all_rds = $this->pageModel->get_rds();
        foreach ($all_rds as $currd){
        $mds = explode(',', $currd->mds);
        foreach($mds as $md){
            if($md == $from_md_id){
             $from_rd_id = $currd->rd_id;
            } else if($md == $to_md_id){
             $to_rd_id = $currd->rd_id;
            }
        }
        }

        if($from_pincode == $to_pincode){
            $to_rd_id = $from_rd_id;
        }


        if($from_ad_id && $to_ad_id && $from_md_id && $to_md_id && $from_rd_id && $to_rd_id){
        $this->pageModel->create_billing($from_id,$from_name,$from_phone,$from_address,$from_city,$from_state ,$from_pincode,$to_id,$to_name,$to_phone,$to_address,$to_city,$to_state,$to_pincode,$item_name,$item_qty ,$item_cost ,$item_order_id,$item_sku,$item_weight,$order_type,$item_length,$item_breadth,$item_height,$volumetric_weight,$order_weight,$package_type,$shipping_type,$booking_cost,$from_ad_id,$from_md_id,$from_rd_id,$to_ad_id,$to_md_id,$to_rd_id,$shipping_by,$eway_number,$packing_cost,$order_margin,$speeder_id);

        $_SESSION['success'] = "Bookings created Successfully";
        if($_SESSION['rexkod_login_type']=="md"){
            redirect('admin/from_orders_md'); 
        }else if($_SESSION['rexkod_login_type']=="ad"){
            redirect('admin/from_orders'); 
        }else if($_SESSION['rexkod_login_type']=="rd"){
            redirect('admin/from_orders_rd'); 
        }else if($_SESSION['rexkod_login_type']=="company"){
            redirect('admin/company_orders'); 
        }
        }
        else {
        $_SESSION['success'] = "Non Servicable Pincodes";
        redirect('admin/billing');
        }
        
    }



    public function banners() 
	{
        $banner = $this->pageModel->get_banner();
        $data = [
                    'banner' => $banner,
                ];
        $this->view('admin/banners',$data);
    }

    public function packages() 
	{
	   $this->view('admin/packages');
        
	}

    public function orders()
    {
        $orders = $this->pageModel->get_all_orders();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/orders',$data);
    }


    public function to_orders()
    {
        $orders = $this->pageModel->get_to_orders();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/to_orders',$data);
    }


    public function truck_orders_md()
    {
        $orders = $this->pageModel->truck_orders_md();
        $trucks = $this->pageModel->getTruckTypes();
        $md= $this->pageModel->get_md($_SESSION['rexkod_vendor_id']);
        $data = [
                    'all_orders' => $orders,
                    'trucks' => $trucks,
                    'md' => $md
                ];
        $this->view('admin/truck_orders_md',$data);
    }

    public function hyperlocal_orders_ad()
    {
        $orders = $this->pageModel->truck_orders_md();
        $trucks = $this->pageModel->getTruckTypes();
        $md= $this->pageModel->get_md($_SESSION['rexkod_vendor_id']);
        $data = [
                    'all_orders' => $orders,
                    'trucks' => $trucks,
                    'md' => $md
                ];
        $this->view('admin/hyperlocal_orders_ad',$data);
    }



    public function truck_orders_admin()
    {
        $orders = $this->pageModel->truck_orders_admin();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/truck_orders_admin',$data);
    }


    public function hyperlocal_orders()
    {
        $orders = $this->pageModel->hyperlocal_orders_admin();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/hyperlocal_orders',$data);
    }


    public function update_trucks_md($id)
    {
        $truck_val = $this->pageModel->getTruckTypes();
        $count = 0;
        foreach($truck_val as $truck){
            if($_POST['T'.$truck->truck_id]){
                if($count){ $trucks = $trucks.",";}
                $trucks = $trucks."".$truck->truck_id;
                $count++;
            }
        }
        $this->pageModel->update_trucks_md($id,$trucks);
        redirect('admin/truck_orders_md');
    }

    public function to_orders_md()
    {
        $orders = $this->pageModel->get_to_orders_md();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/to_orders_md',$data);
    }


    public function to_orders_rd()
    {
        $orders = $this->pageModel->get_to_orders_rd();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/to_orders_rd',$data);
    }


    public function from_orders()
    {
        $orders = $this->pageModel->get_from_orders();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/from_orders',$data);
    }


    public function company_orders()
    {
        $orders = $this->pageModel->get_company_orders($_SESSION['rexkod_vendor_id']);
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/company_orders',$data);
    }


    public function report_margin()
    {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $orders = $this->pageModel->report_margin($start_date,$end_date);
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/report_margin',$data);
    }

    public function report_cod()
    {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $orders = $this->pageModel->report_cod($start_date,$end_date);
        $data = [
                    'all_orders' => $orders,
                ];
               
        $this->view('admin/report_cod',$data);
    }

    public function report_pending_payment()
    {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $orders = $this->pageModel->report_pending_payment($start_date,$end_date);
        $data = [
                    'all_orders' => $orders,
                ];
               
        $this->view('admin/report_pending_payment',$data);
    }

    public function report_customer()
    {
       //$start_date = $_POST['start_date'];
        //$end_date = $_POST['end_date'];
        $users = $this->pageModel->report_customer();
        
        $data = [
                    'users' => $users,
                ];
        $this->view('admin/report_customer',$data);
    }



    public function update_wallet()
    {
        $users = $this->pageModel->get_users();

        foreach ($users as $user2){
            if($user2->type == "user"){
                $wallet = $this->pageModel->getWalletById($user2->id);
                if(!$wallet){
                $this->pageModel->new_wallet_user($user2->id);
                }
            } else {
                $vendor_wallet = $this->pageModel->getWalletById_vendor($user2->id);
                if(!$vendor_wallet){
                    $this->pageModel->new_wallet_vendor($user2->id); 
                }
            }
        }
        
        
        
    }

    public function report_ad()
    {
       //$start_date = $_POST['start_date'];
        //$end_date = $_POST['end_date'];
        $users = $this->pageModel->report_ad();
        
        $data = [
                    'users' => $users,
                ];
        $this->view('admin/report_ad',$data);
    }


    public function report_customer_wallet()
    {
       //$start_date = $_POST['start_date'];
        //$end_date = $_POST['end_date'];
        $users = $this->pageModel->report_customer();
        
        $data = [
                    'users' => $users,
                ];
        $this->view('admin/report_customer_wallet',$data);
    }


    public function cancel_order_admin($id)
    {
        $this->pageModel->order_update($id,99);
        redirect('admin/orders'); 
    }



    public function billing()
    {
        $this->view('admin/billing'); 
    }
/*

    public function check_costing()
    {               
        $from_pincode = $_POST['from_pincode'];
        $to_pincode = $_POST['to_pincode'];
        $from_state= $_POST['from_state'];
        $to_state= $_POST['to_state'];
        $item_weight= $_POST['item_weight'];
        $item_weight = $item_weight * 1000;
        $item_length= $_POST['item_length'];
        $item_breadth= $_POST['item_breadth'];
        $item_height= $_POST['item_height'];
        $parcel_type= $_POST['parcel_type'];
        $order_type= $_POST['order_type'];
        $shipping_type= 0;
        $item_cost= $_POST['item_cost'];
        $eway_number= $_POST['eway_number'];
        $packing_cost= $_POST['packing_cost'];
        $order_margin= $_POST['order_margin'];

       
        
        $all_ads = $this->pageModel->get_ads();
        foreach ($all_ads as $fromad){
        $frompin = explode(',', $fromad->ad_pincodes);
        foreach($frompin as $pin){
            if($pin == $from_pincode){
             $from_ad_id = $fromad->ad_id;
            } else if($pin == $to_pincode){
             $to_ad_id = $fromad->ad_id;
            }
        }
        }

        $all_mds = $this->pageModel->get_mds();
        foreach ($all_mds as $frommd){
        $frompin = explode(',', $frommd->md_pincodes);
        foreach($frompin as $pin){
            if($pin == $from_pincode){
             $from_md_id = $frommd->md_id;
            } else if($pin == $to_pincode){
             $to_md_id = $frommd->md_id;
            }
        }
        }

        if($_SESSION['rexkod_login_type']=="md"){
            if($_SESSION['rexkod_vendor_id'] != $from_md_id){
                echo "This Source Pincode not Permitted";
                die();
            }
        }else if($_SESSION['rexkod_login_type']=="ad"){
            if($_SESSION['rexkod_vendor_id'] != $from_ad_id){
                echo "This Source Pincode not Permitted";
                die();
            }
        }
        


        
        $all_mds = $this->pageModel->get_mds();
        foreach ($all_mds as $frommd){
        $frompin = explode(',', $frommd->md_pincodes);
        foreach($frompin as $pin){
            if($pin == $from_pincode){
             $from_area_type = $frommd->area_type;
             $from_express = $frommd->express;
            } else if($pin == $to_pincode){
             $to_area_type = $frommd->area_type;
             $to_express = $frommd->express;
            }
        }
        }

        $express_check =1;
        if($shipping_type == 1){
            if($from_express == 1 && $to_express == 1){
                $express_check =1;
            }else {
                $express_check =0;
            }
        }

        if($from_pincode == $to_pincode){
            $to_area_type = $from_area_type;
        }
        
        $volumetric_weight = (($item_length * $item_breadth * $item_height)/5000)*1000;
        if($item_weight >= $volumetric_weight){
            $weight = $item_weight;
        }else {
            $weight = $volumetric_weight;
        }

        
        
        

        if($weight < 5001){
        
        $weight_cost = 0;
        $weight_count = 0;
        if($weight==1000){
            $weight_count = 1;
            $weight_cost = 20;
        }else if($weight > 1000){
            $weight_count = $weight/500;
            $weight_count = $weight_count - 1;
            $weight_cost = $weight_count * 20;
        }

        $base_price = (array) $this->pageModel->get_base_price($shipping_type);
        $base_price = $base_price['base_amount'];
        
        if($from_state == $to_state){
            if($from_area_type == "t1" && $to_area_type== "t1"){
                $price_perc = ($base_price * 30) / 100;
                $price = $base_price - $price_perc;
            }else if(($from_area_type == "t1" && $to_area_type== "t2") || ($from_area_type == "t2" && $to_area_type== "t1")){
                $price_perc = ($base_price * 15) / 100;
                $price = $base_price - $price_perc;
            }else if(($from_area_type == "t1" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t1")){
                $price_perc = ($base_price * 5) / 100;
                $price = $base_price - $price_perc;
            }else if($from_area_type == "t2" && $to_area_type== "t2"){
                $price_perc = ($base_price * 15) / 100;
                $price = $base_price - $price_perc;
            }else if(($from_area_type == "t2" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t2")){
                $price_perc = ($base_price * 5) / 100;
                $price = $base_price - $price_perc;
            }else if($from_area_type == "t3" && $to_area_type== "t3"){
                $price_perc = ($base_price * 5) / 100;
                $price = $base_price - $price_perc;
            }

        }else {
            if($from_area_type == "t1" && $to_area_type== "t1"){
                $price = $base_price;
            }else if(($from_area_type == "t1" && $to_area_type== "t2") || ($from_area_type == "t2" && $to_area_type== "t1")){
                $price_perc = ($base_price * 25) / 100;
                $price = $base_price + $price_perc;
            }else if(($from_area_type == "t1" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t1")){
                $price_perc = ($base_price * 90) / 100;
                $price = $base_price + $price_perc;
            }else if($from_area_type == "t2" && $to_area_type== "t2"){
                $price_perc = ($base_price * 25) / 100;
                $price = $base_price + $price_perc;
            }else if(($from_area_type == "t2" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t2")){
                $price_perc = ($base_price * 90) / 100;
                $price = $base_price + $price_perc;
            }else if($from_area_type == "t3" && $to_area_type== "t3"){
                $price_perc = ($base_price * 90) / 100;
                $price = $base_price + $price_perc;
            }
        }

        $price = $price + $weight_cost;
        $price = number_format($price, 2, '.', '');
        
        }else {
                
            $base_price = 35;
               
            if($from_state == $to_state){
                if($from_area_type == "t1" && $to_area_type== "t1"){
                    $price_perc = ($base_price * 28.6) / 100;
                    $price = $base_price - $price_perc;
                }else if(($from_area_type == "t1" && $to_area_type== "t2") || ($from_area_type == "t2" && $to_area_type== "t1")){
                    $price = $base_price;
                }else if(($from_area_type == "t1" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t1")){
                    $price_perc = ($base_price * 14.3) / 100;
                    $price = $base_price + $price_perc;
                }else if($from_area_type == "t2" && $to_area_type== "t2"){
                    $price = $base_price;
                }else if(($from_area_type == "t2" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t2")){
                    $price_perc = ($base_price * 14.3) / 100;
                    $price = $base_price + $price_perc;
                }else if($from_area_type == "t3" && $to_area_type== "t3"){
                    $price_perc = ($base_price * 14.3) / 100;
                    $price = $base_price + $price_perc;
                }
    
            }else {
                if($from_area_type == "t1" && $to_area_type== "t1"){
                    $price_perc = ($base_price * 20) / 100;
                    $price = $base_price + $price_perc;
                }else if(($from_area_type == "t1" && $to_area_type== "t2") || ($from_area_type == "t2" && $to_area_type== "t1")){
                    $price_perc = ($base_price * 28.6) / 100;
                    $price = $base_price + $price_perc;
                }else if(($from_area_type == "t1" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t1")){
                    $price_perc = ($base_price * 51.4) / 100;
                    $price = $base_price + $price_perc;
                }else if($from_area_type == "t2" && $to_area_type== "t2"){
                    $price_perc = ($base_price * 28.6) / 100;
                    $price = $base_price + $price_perc;
                }else if(($from_area_type == "t2" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t2")){
                    $price_perc = ($base_price * 51.4) / 100;
                    $price = $base_price + $price_perc;
                }else if($from_area_type == "t3" && $to_area_type== "t3"){
                    $price_perc = ($base_price * 51.4) / 100;
                    $price = $base_price + $price_perc;
                }
            }

               
                if($weight>25000 && $weight<=50000){
                $price_perc = ( $price * 10 ) / 100;
                $price = $price - $price_perc;
                }else if($weight>50000 && $weight<=100000){
                    $price_perc = ( $price * 20 ) / 100;
                    $price = $price - $price_perc;
                }else if($weight>100000){
                    $price_perc = ( $price * 23.8 ) / 100;
                    $price = $price - $price_perc;
                }
                $price = round($price);
                $price = ($price * $weight)/1000; 

        }



        
        if($parcel_type==3){
            $price_perc = ($price * 20) / 100;
            $price = $price - $price_perc;
        }

        if($order_type==10){
            $price_perc = ($price * 25) / 100;
            $price = $price + $price_perc;
        }

        if($order_type==1){
            $price_perc = ($price * 50) / 100;
            $price = $price + $price_perc;
        }

        if($order_margin < 101){
            $price_perc = ($price * $order_margin) / 100;
            $price = $price + $price_perc;
        }else {
            echo "Margin should be less than 100% | ";
        }

        if($packing_cost){
           $price = $price + $packing_cost;
        }

        if($shipping_type==1){
            $price_perc = ( $price * 200 ) / 100;
            $price = $price + $price_perc;
        }else if($shipping_type==2){
            $price_perc = ($price * 150) / 100;
            $price = $price + $price_perc;
        }


        




        
        $price = round($price);

        $wallet = $this->pageModel->getWallet();





        if($item_cost > 49999 && !$eway_number){
            echo "Please update e-Way bill number";
            }else {
                if($wallet->balance_amount < $price && $order_type == "0"){
                    $price_cur = round($price);
                    echo "Insufficent wallet ballance. Cost:  ₹".$price_cur;
                }
                else if($from_area_type && $to_area_type){
                    echo $price;
                }else if($from_area_type && !$to_area_type){
                    echo "Non Servicable Destination";
                }else if(!$from_area_type && $to_area_type){
                    echo "Non Servicable Source";
                }else if(!$from_area_type && !$to_area_type){
                    echo "Non Servicable Pincodes";
                }
            }
}

*/

public function check_costing()
{               
    $from_pincode = $_POST['from_pincode'];
    $to_pincode = $_POST['to_pincode'];
    $from_state= $_POST['from_state'];
    $to_state= $_POST['to_state'];
    $item_weight= $_POST['item_weight'];
    $item_weight = $item_weight * 1000;
    $item_length= $_POST['item_length'];
    $item_breadth= $_POST['item_breadth'];
    $item_height= $_POST['item_height'];
    $parcel_type= $_POST['parcel_type'];
    $order_type= $_POST['order_type'];
    $shipping_type= 0;
    $item_cost= $_POST['item_cost'];
    $eway_number= $_POST['eway_number'];
    $packing_cost= $_POST['packing_cost'];
    $order_margin= $_POST['order_margin'];
    $shipping_by= $_POST['shipping_by'];

    
    $all_ads = $this->pageModel->get_ads();
    foreach ($all_ads as $fromad){
    $frompin = explode(',', $fromad->ad_pincodes);
    foreach($frompin as $pin){
        if($pin == $from_pincode){
         $from_ad_id = $fromad->ad_id;
         $from_area_type = $fromad->area_type;
        } else if($pin == $to_pincode){
         $to_ad_id = $fromad->ad_id;
         $to_area_type = $fromad->area_type;
        }
    }
    }

    if($from_pincode == $to_pincode){
        $to_ad_id = $from_ad_id;
        $to_area_type = $from_area_type;
    }
    $volumetric_weight = 0;
    $volumetric_weight = (($item_length * $item_breadth * $item_height)/5000)*1000;
    if($item_weight >= $volumetric_weight){
        $weight = $item_weight;
    }else {
        $weight = $volumetric_weight;
    }



    if($_SESSION['rexkod_login_type']=="ad"){
        if($_SESSION['rexkod_vendor_id'] != $from_ad_id){
            echo "This Source Pincode not Permitted";
            die();
        }
    }
    



    

    
    $weight_cost = 0;
    $weight_count = 0;
    if($weight==1000){
        $weight_count = 1;
        $weight_cost = 20;
    }else if($weight > 1000){
        $weight_count = $weight/500;
        $weight_count = $weight_count - 1;
        $weight_cost = $weight_count * 20;
    }

   
    $base_price = 25;
    
    if($from_state == $to_state){
        if($from_area_type == "t1" && $to_area_type== "t1"){
            $price_perc = ($base_price * 30) / 100;
            $price = $base_price - $price_perc;
        }else if(($from_area_type == "t1" && $to_area_type== "t2") || ($from_area_type == "t2" && $to_area_type== "t1")){
            $price_perc = ($base_price * 15) / 100;
            $price = $base_price;
        }else if(($from_area_type == "t1" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t1")){
            $price_perc = ($base_price * 30) / 100;
            $price = $base_price + $price_perc;
        }else if($from_area_type == "t2" && $to_area_type== "t2"){
            $price_perc = ($base_price * 15) / 100;
            $price = $base_price;
        }else if(($from_area_type == "t2" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t2")){
            $price_perc = ($base_price * 30) / 100;
            $price = $base_price + $price_perc;
        }else if($from_area_type == "t3" && $to_area_type== "t3"){
            $price_perc = ($base_price * 30) / 100;
            $price = $base_price + $price_perc;
        }

    }else {
        if($from_area_type == "t1" && $to_area_type== "t1"){
            $price_perc = ($base_price * 70) / 100;
            $price = $base_price + $price_perc;
        }else if(($from_area_type == "t1" && $to_area_type== "t2") || ($from_area_type == "t2" && $to_area_type== "t1")){
            $price_perc = ($base_price * 100) / 100;
            $price = $base_price + $price_perc;
        }else if(($from_area_type == "t1" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t1")){
            $price_perc = ($base_price * 200) / 100;
            $price = $base_price + $price_perc;
        }else if($from_area_type == "t2" && $to_area_type== "t2"){
            $price_perc = ($base_price * 100) / 100;
            $price = $base_price + $price_perc;
        }else if(($from_area_type == "t2" && $to_area_type== "t3") || ($from_area_type == "t3" && $to_area_type== "t2")){
            $price_perc = ($base_price * 200) / 100;
            $price = $base_price + $price_perc;
        }else if($from_area_type == "t3" && $to_area_type== "t3"){
            $price_perc = ($base_price * 200) / 100;
            $price = $base_price + $price_perc;
        }
    }


        if($weight>5001 && $weight<=10000){
        $price_perc = ( $price * 15 ) / 100;
        $price = $price - $price_perc;
        }else if($weight>10001 && $weight<=25000){
        $price_perc = ( $price * 20 ) / 100;
        $price = $price - $price_perc;
        }else if($weight>25001 && $weight<=50000){
            $price_perc = ( $price * 25 ) / 100;
            $price = $price - $price_perc;
        }else if($weight>50001){
            $price_perc = ( $price * 40 ) / 100;
            $price = $price - $price_perc;
        }
       
    

        $price = round($price);
        $price = ($price * $weight)/1000; 



    
 



    
    if($parcel_type==3){
        $price_perc = ($price * 20) / 100;
        $price = $price - $price_perc;
    }

    if($order_type==10){
        $price_perc = ($price * 25) / 100;
        $price = $price + $price_perc;
    }

    if($order_type==1){
        $price_perc = ($price * 50) / 100;
        $price = $price + $price_perc;
    }

    if($order_margin < 101){
        $price_perc = ($price * $order_margin) / 100;
        $price = $price + $price_perc;
    }else {
        echo "Margin should be less than 100% | ";
    }

    if($packing_cost){
       $price = $price + $packing_cost;
    }

    if($shipping_type==1){
        $price_perc = ( $price * 200 ) / 100;
        $price = $price + $price_perc;
    }else if($shipping_type==2){
        $price_perc = ($price * 150) / 100;
        $price = $price + $price_perc;
    }


    if($shipping_by==1){
        $price_perc = ( $price * 200 ) / 100;
        $price = $price + $price_perc;
    }


    




    
    //$price = round($price);

    $wallet = $this->pageModel->getWalletById_vendor($_SESSION['rexkod_vendor_id']);





    if($item_cost > 49999 && !$eway_number){
        echo "Please update e-Way bill number";
        }else {
            if($wallet->balance_amount < $price){
                $price_cur = round($price);
                echo "Insufficent wallet ballance. Cost:  ₹".$price_cur;
            }
            else if($from_ad_id && $to_ad_id){
                echo $price;
            }else if($from_ad_id && !$to_ad_id){
                echo "Non Servicable Destination";
            }else if(!$from_ad_id && $to_ad_id){
                echo "Non Servicable Source";
            }else if(!$from_ad_id && !$to_ad_id){
                echo "Non Servicable Pincodes";
            }
        }
}




public function report_sales()
    {
        $orders = $this->pageModel->get_all_orders();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/report_sales', $data); 
    }

    public function from_orders_md()
    {
        $orders = $this->pageModel->get_from_orders_md();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/from_orders_md',$data);
    }


    public function from_orders_rd()
    {
        $orders = $this->pageModel->get_from_orders_rd();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('admin/from_orders_rd',$data);
    }



    public function reports() 
	{
	   $this->view('admin/reports');
        
	}

   

    public function transactions() 
	{
        $transactions = $this->adminModel->getTransactions_all();
        $data = [
                    'transactions' => $transactions,
                ];
        $this->view('admin/transactions',$data);
        
	}


    public function feedbacks() 
	{
        $feedbacks = $this->adminModel->getFeedbacks();
        $data = [
                    'feedbacks' => $feedbacks,
                ];
        $this->view('admin/feedbacks',$data);
        
	}

    

    public function users() 
	{
	   $this->view('admin/users');
        
	}



    public function update_admin_remark($id)
    { 
        $admin_remark = $_POST['admin_remark'];
        $this->adminModel->update_admin_remark($id,$admin_remark);
        redirect('admin/feedbacks');
        
    }


    public function update_feedback_status($id)
    { 
        $status = $_POST['feedback_status'];
        $this->adminModel->update_feedback_status($id,$status);
        redirect('admin/feedbacks');
        
    }




    public function view_product($id)
    {

        $products = $this->pageModel->get_single_products($id);

        $data = [
                    'get_pro' => $products,
                ];
        $this->view('admin/view_product',$data);
    }







    public function login()
    {
        $_POST['username'] = "admin@gmail.com";
        $_POST['password'] = "admin";

        error_log("POST data: " . print_r($_POST, true));
        // if (!isset($_POST['username']) || !isset($_POST['password'])) {
        //     error_log("Username or password not set");
        //     $_SESSION['success'] = "Please enter both username and password";
        //     $this->view('admin/login');
        //     return;
        // }
        if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
            error_log("Username or password is empty");
            $_SESSION['success'] = "Username and password cannot be empty";
            $this->view('admin/login');
            return;
        }
        // echo($_POST['username']);
        // die();
        // if(isset($_POST['username']))
        // {
        // echo($_POST['username']);
        // die();
        // }
        if(!isset($_POST['username']))
        {
            
            $this->view('admin/login');
        }
        else
        {  
            // echo($_POST['username']);
            // die();
            if(!isset($_POST['password']))
            {
                $_SESSION['success'] = "Enter Password";
                $this->view('admin/login');
            }
            else
            {
                $user = "";
                

                if ( is_numeric($_POST['username']) ) {
                    $email_verify_phone = $this->pageModel->email_verify_phone($_POST['username']);
                } else {
                    $check_email = $this->pageModel->email_verify($_POST['username']);
                }
                

                if(empty($check_email) && empty($email_verify_phone))
                {
                    $_SESSION['success'] = "Invalid Username";
                    $this->view('admin/login');
                }
                else
                {
                    if(!empty($check_email))
                    {
                        $user_results  = $check_email;

                        $password_res = $check_email->password;
                    }
                    else if(!empty($email_verify_phone))
                    {
                        $user_results  = $email_verify_phone;

                        $password_res = $email_verify_phone->password;
                    }


                    if(password_verify($_POST['password'], $password_res))
                    {
                        $user = $user_results;
                    }
                    else
                    {
                         $user = "";
                    }
                    if(empty($user))
                    {

                       $_SESSION['success'] = "Invalid Credential!";
                       $this->view('admin/login');
                       
                    }else
                    {
                        if($user->type=="admin")
                        {
                            $_SESSION['rexkod_admin_id'] = $user->id;
                            $_SESSION['rexkod_admin_name'] = $user->name;
                            $_SESSION['rexkod_admin_email'] = $user->email;
                            $_SESSION['rexkod_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('admin/index');
                        }

                        elseif($user->type=="ad")
                        {
                            $_SESSION['rexkod_vendor_id'] = $user->id;
                            $_SESSION['rexkod_vendor_name'] = $user->name;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('admin/index');
                        }

                        elseif($user->type=="md")
                        {
                            $_SESSION['rexkod_vendor_id'] = $user->id;
                            $_SESSION['rexkod_vendor_name'] = $user->name;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('admin/index');
                        }

                        elseif($user->type=="rd")
                        {
                            $_SESSION['rexkod_vendor_id'] = $user->id;
                            $_SESSION['rexkod_vendor_name'] = $user->name;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('admin/index');
                        }

                        elseif($user->type=="company")
                        {
                            $_SESSION['rexkod_vendor_id'] = $user->id;
                            $_SESSION['rexkod_vendor_name'] = $user->name;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('admin/index');
                        }

                        elseif($user->type=="delivery")
                        {
                            $_SESSION['success'] = "You do not have access!";
                            redirect('admin/login');
                            
                        }
                        else
                        {
                            
                            $_SESSION['success'] = "You do not have access!";
                            redirect('admin/login');
                        }
                    }
                    
                }
               
            }
        }
    }



    
    public function order_update($id,$status)
    {
        $this->pageModel->order_update($id,$status);

        $_SESSION['success'] = "Status updated Successfully";
        if($status<=2){
            redirect('drivers/pickup_orders'); 
        }else{
            redirect('admin/order/'.$id); 
        }
        
    }


    public function issue_update($id)
    {
        $issue_type = $_POST['issue_type'];
        $issue_remark = $_POST['issue_remark'];
        $this->pageModel->issue_update($id,$issue_type,$issue_remark);

        $_SESSION['success'] = "Status updated Successfully";
            redirect('admin/order/'.$id); 
        
    }

 
    


	public function add_product()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
                    'all_subcategory' => $get_all_subcategory,
        ];
        

        $this->view('admin/add_product', $data);
    }
    




    public function create_product()
    {
        
        $name = $_POST['name'];
        $subcat = $_POST['subcat'];
        // $price = $_POST['price'];
        
        $p_details = $_POST['p_details'];

        if(isset($_SESSION['rexkod_admin_id'])){
            $created_byId = $_SESSION['rexkod_admin_id'];
        }else {
            $created_byId = $_SESSION['rexkod_vendor_id'];
        }

        $min1 = $_POST['min1'];
        $max1 = $_POST['max1'];
        $price1 = $_POST['price1'];

        $min2 = $_POST['min2'];
        $max2 = $_POST['max2'];
        $price2 = $_POST['price2'];

        $min3 = $_POST['min3'];
        $max3 = $_POST['max3'];
        $price3 = $_POST['price3'];

        $min4 = $_POST['min4'];
        $max4 = $_POST['max4'];
        $price4 = $_POST['price4'];


        $min5 = $_POST['min5'];
        $max5 = $_POST['max5'];
        $price5 = $_POST['price5'];

        $data = [
            'min1' => $min1,
            'max1' => $max1,
            'price1' => $price1,
            'min2' => $min2,
            'max2' => $max2,
            'price2' => $price2,
            'min3' => $min3,
            'max3' => $max3,
            'price3' => $price3,
            'min4' => $min4,
            'max4' => $max4,
            'price4' => $price4,
            'min5' => $min5,
            'max5' => $max5,
            'price5' => $price5,
        ];
        $result = $this->adminModel->create_product_db($name, $subcat, $p_details, $created_byId, $data);


        if($result)
        {
            $_SESSION['success'] = "product added successfully..!";
            redirect('admin/index');
        }else
        {
             $_SESSION['success'] = "try later..!";
            redirect('admin/index');
        }
    }





    



    public function all_products()
    {

        $products = $this->pageModel->get_all_products();
        $data = [
                    'all_pro' => $products,
                ];

        $this->view('admin/all_products',$data);
    }

    public function all_cat_subcat()
    {

        $get_all_category = $this->adminModel->get_all_category();
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_category' => $get_all_category,
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('admin/all_cat_subcat',$data);
    }


    


    public function del_product($id)
    {
        $this->pageModel->delete_product($id);
        $_SESSION['success'] = "product deleted successfully";
        redirect('admin/all_products');
    }


    public function update_cod_customer($id)
    { 
        if(isset($_POST['cod'])){
            $cod_val='1';
        }else {
            $cod_val='0';
        }
        
        $codupdate = $this->adminModel->update_cod_customer($id,$cod_val);

        
        if($codupdate){
        $_SESSION['success'] = "COD Updated";
        redirect('admin/customers_cod');
        } else {
            
            $_SESSION['success'] = "COD Not Updated";
            redirect('admin/customers_cod');
    
            }
    }


    public function update_cod_vendor($id)
    { 
        if(isset($_POST['cod'])){
            $cod_val='1';
        }else {
            $cod_val='0';
        }
        
        $codupdate = $this->adminModel->update_cod_vendor($id,$cod_val);

        
        if($codupdate){
        $_SESSION['success'] = "COD Updated";
        redirect('admin/vendors_cod');
        } else {
            
            $_SESSION['success'] = "COD Not Updated";
            redirect('admin/vendors_cod');
    
            }
    }
    






    public function change_pass()
    {
        $this->view('admin/change_pass');
    }




    public function add_money_admin_customer($id)
    {
        $amount = $_POST['amount'];
        $this->pageModel->add_money_admin_customer($id, $amount, "speeder");
        redirect('admin/add_money_customer/'.$id);
    }



    public function add_money_admin_vendor($id)
    {
        $amount = $_POST['amount'];
        if($amount > 0){
            $type=3;
        }else {
            $type=4;
        }
        $this->pageModel->add_money_admin_vendor($id, $amount, $type);
        redirect('admin/add_money_vendor/'.$id);
    }

 

    public function add_coupon()
    {

        $this->view('admin/add_coupon');
    }


 

    public function add_coupon_subcat()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('admin/add_coupon_subcat',$data);
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
                            if(empty($_POST['user_email']))
                            {
                                $email = $r->email;
                            }
                            else
                            {
                                $email = $_POST['user_email'];
                            }

                            $this->pageModel->update_password($_POST['npass'], $email);

                            $_SESSION['success'] = "Password Changed successfully..!";
                            redirect('admin/change_pass');
                        }
                        else
                        {
                            $_SESSION['success'] = "Confirm Password not matching with New Password";
                            redirect('admin/change_pass');
                        }
                    }
                    else
                    {
                        $_SESSION['success'] = "Enter Confirm Password";
                        redirect('admin/change_pass');
                    }
                }
                else
                {
                    $_SESSION['success'] = "Enter New Password";
                    redirect('admin/change_pass');
                }
            }
            else
            {
              $_SESSION['success'] = "current password not matching";
              redirect('admin/change_pass');
            }
        }
        else
        {
          $_SESSION['success'] = "Enter current Password";
          redirect('admin/change_pass');
        }
    }

    public function logout()
    {
       session_destroy();
       redirect('admin/login');
    }

    
    public function orders2()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('admin/orders',$data);
    }


    public function returns()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('admin/returns',$data);
    }



    public function label_orders()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('admin/label_orders',$data);
    }


     public function order_invoice1($id)
    {
        $p_details = $this->adminModel->get_all_userinfo();
        $all_lab = $this->adminModel->find_all_order();

        $get_order_details = $this->adminModel->get_order_details($id);
        $all_order = $this->adminModel->get_pharmacy_med_list($id);
        $get_invoice_details = $this->adminModel->get_pharmacy_med_list_single($id);

        $data = [ 
            // 'p_details' => $p_details,
            // 'all_lab' => $all_lab,
            'sa' => 'n_book',
            'get_order_details' =>  $get_order_details,
            'get_invoice_details' => $get_invoice_details,
            'sa' => 'p_book',
            'id' => $id,
            'all_order' => $all_order,
        ];
        
        $this->view('admin/order_invoice1', $data);
    }


    public function change_state($id)
    {
        // echo 111;
        $st  = $_POST['st'];
        $this->adminModel->change_status($id,$st);
        $_SESSION['success'] = "Status changed";
        redirect('admin/all_orders');
    }


    public function update_pod($id)
    {
        if(!empty($_FILES['pod_slip']['name']))
        {
            $f_name = $_FILES['pod_slip']['name'];
            $f_temp = $_FILES['pod_slip']['tmp_name'];
            $size = $_FILES['pod_slip']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $pod_slip =$f_newfile;
        }
        else
        {
            $pod_slip  = NULL;
        }
        
        $pod_number  = $_POST['pod_number'];
        $pod_transport_type  = $_POST['pod_transport_type'];
        $pod_vehicle_name  = $_POST['pod_vehicle_name'];
        $pod_vehicle_number  = $_POST['pod_vehicle_number'];
        $pod_booking_time  = $_POST['pod_booking_time'];
        $pod_contact_number  = $_POST['pod_contact_number'];
        $this->pageModel->updatePOD($id,$pod_number,$pod_transport_type,$pod_vehicle_name,$pod_vehicle_number,$pod_booking_time,$pod_contact_number,$pod_slip);
        $_SESSION['success'] = "pod Updated";
        redirect('admin/order/'.$id);
    }




    public function shipping_label($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        
        $data = [
                    'order' => $get_order
                ];

       $this->view('admin/shipping_label',$data); 
    } 


    public function print_bill($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        
        $data = [
                    'order' => $get_order
                ];

       $this->view('admin/print_bill',$data); 
    } 


    public function scan_barcode()
    {
       $barcode = $_POST['barcode'];
       $order= $this->pageModel->getOrderByScan($barcode);
       if($order){
        redirect('admin/order/'.$order->booking_id); 
        }else {   
        redirect('admin/index'); 
        }
    } 


    public function view_order($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        
        $get_order_detail = $this->pageModel->getOrderDetailById($id);
        
        $data = [
                    'get_order' => $get_order,
                    'get_order_detail' => $get_order_detail
                ];
                
       $this->view('admin/view_order',$data); 
    } 


    public function order($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        $get_delivery = $this->pageModel->getDelivery();
        
        $data = [
                    'order' => $get_order,
                    'deliveries' => $get_delivery,
                ];

       $this->view('admin/order',$data); 
    } 


    
    public function transactions2()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('admin/transactions',$data);
    }

    public function reports2()
    {
       $this->view('admin/reports'); 
    }

    public function vendor_verify($id)
    {
        $verified = $this->adminModel->verify_vendor($id);

        if($verified){
        $_SESSION['success'] = "Vendor Verified!";
        redirect('admin/view_vendor/'.$id);
        }else {
        $_SESSION['success'] = "Vendor Not Verified!";
        redirect('admin/view_vendor/'.$id);
        }

    }


    public function customer_verify($id)
    {
        $verified = $this->adminModel->verify_customer($id);

        if($verified){
        $_SESSION['success'] = "Customer Verified!";
        redirect('admin/view_customer/'.$id);
        }else {
        $_SESSION['success'] = "Customer Not Verified!";
        redirect('admin/view_customer/'.$id);
        }

    }








    public function create_rto($id)
    {
        $booking = $this->pageModel->getOrderById($id);
        $from_id = $booking->to_id;
        $from_name = $booking->to_name;
        $from_phone = $booking->to_phone;
        $from_address = $booking->to_address;
        $from_city = $booking->to_city;
        $from_state = $booking->to_state;
        $from_pincode = $booking->to_pincode;
        $to_id = $booking->from_id;
        $to_name = $booking->from_name;
        $to_phone = $booking->from_phone;
        $to_address = $booking->from_address;
        $to_city = $booking->from_city;
        $to_state = $booking->from_state;
        $to_pincode = $booking->from_pincode;
        $item_name = $booking->item_name;
        $item_qty = $booking->item_qty;
        $item_cost = $booking->item_cost;
        $item_order_id = $booking->item_order_id;
        $item_sku = $booking->item_sku;
        $item_weight = $booking->item_weight;
        $item_length = $booking->item_length;
        $item_breadth = $booking->item_breadth;
        $item_height = $booking->item_height;
        $package_type = $booking->package_type;
        $shipping_type = 0;

        $date_slot_delivery = NULL;
        $time_slot_delivery = NULL;


        $booking_cost = $booking->booking_cost;
        
        $from_ad_id = $booking->to_ad_id;
        $to_ad_id = $booking->from_ad_id;

        $from_md_id = $booking->to_md_id;
        $to_md_id = $booking->from_md_id;

        $from_rd_id = $booking->to_rd_id;
        $to_rd_id = $booking->from_rd_id;


        if($from_ad_id && $to_ad_id && $from_md_id && $to_md_id){
        $this->pageModel->create_rto($id,$from_address,$from_city,$from_state ,$from_pincode,$to_id,$to_name,$to_phone,$to_address,$to_city,$to_state,$to_pincode,$item_name,$item_qty ,$item_cost ,$item_order_id,$item_sku,$item_weight,$order_type,$item_length,$item_breadth,$item_height,$need_package,$package_type,$shipping_type,$date_slot_pickup,$time_slot_pickup,$date_slot_delivery,$time_slot_delivery,$booking_cost,$from_ad_id,$from_md_id,$to_ad_id,$to_md_id,$from_rd_id,$to_rd_id);

        $_SESSION['success'] = "Bookings created Successfully";
        redirect('admin/order/'.$id); 
        }
        else {
        $_SESSION['success'] = "Non Servicable Pincodes";
        redirect('admin/order/'.$id); 
        }
        
    }







    public function ads()
    {

        $get_all_ads = $this->pageModel->get_all_ads();
        $data = [
                    'ads' => $get_all_ads
        ];

       $this->view('admin/ads',$data); 
    }


    public function companies()
    {

        $get_all_companies = $this->pageModel->get_all_companies();
        $data = [
                    'companies' => $get_all_companies
        ];

       $this->view('admin/companies',$data); 
    }


    public function ads_md()
    {

        $md = $this->pageModel->get_md($_SESSION['rexkod_vendor_id']);
        $ads = explode(',', $md->ads);
        $data = [
            'ads' => $ads,
        ];
        $this->view('admin/ads_md',$data); 
    }


    public function mds_rd()
    {

        $rd = $this->pageModel->get_rd($_SESSION['rexkod_vendor_id']);
        $mds = explode(',', $rd->mds);
        $data = [
            'mds' => $mds,
        ];
        $this->view('admin/mds_rd',$data); 
    }


    public function mds()
    {

        $get_all_mds = $this->pageModel->get_all_mds();
        $data = [
                    'mds' => $get_all_mds
        ];

       $this->view('admin/mds',$data); 
    }


    public function rds()
    {

        $get_all_rds = $this->pageModel->get_all_rds();
        $data = [
                    'rds' => $get_all_rds
        ];

       $this->view('admin/rds',$data); 
    }





    public function delivery()
    {

        $get_all_delivery = $this->pageModel->getDelivery();
        $data = [
                    'deliveries' => $get_all_delivery
        ];

       $this->view('admin/delivery',$data); 
    }


    public function vendors_cod()
    {

        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];
        
        

       $this->view('admin/vendors_cod',$data); 
    }




    public function view_vendor($id)
    {
        $get_user = $this->pageModel->get_userinfo($id);
        $get_vendor = $this->pageModel->getVendorById($id);
        

        $data = [
                    'user_detail' => $get_user,
                    'vendor_detail' => $get_vendor,
        ];
        
        $this->view('admin/view_vendor',$data); 
    }


    public function view_customer($id)
    {
        $get_user = $this->pageModel->get_userinfo($id);
        $get_customer = $this->pageModel->get_custinfo($id);
        

        $data = [
            'user_detail' => $get_user,
            'customer_detail' => $get_customer
        ];
        
        $this->view('admin/view_customer',$data); 
    }



    public function profile()
    {
        $id = $_SESSION['rexkod_vendor_id'];
        $get_user = $this->pageModel->get_userinfo($id);
        $get_vendor = $this->pageModel->getVendorById($id);
        

        $data = [
                    'user_detail' => $get_user,
                    'vendor_detail' => $get_vendor,
        ];
        $this->view('admin/profile',$data); 
    }



    public function admin_register()
    {
       $this->view('admin/admin_register'); 
    }




    public function add_ad(){

                $this->view('admin/add_ad'); 
  
        }

        public function add_delivery(){

            $this->view('admin/add_delivery'); 

    }



    public function add_company(){

        $this->view('admin/add_company'); 

}
    



public function add_md(){

    $ads = $this->pageModel->get_all_ads();
    $data = [
        'ads' => $ads,
    ];
    $this->view('admin/add_md', $data); 

}


public function add_rd(){

    $mds = $this->pageModel->get_all_mds();
    $data = [
        'mds' => $mds,
    ];

    $this->view('admin/add_rd', $data); 

}




        
    public function add_profile(){

        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {

                
                $name = $_POST['name'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $pincode = $_POST['pincode'];
                $gst = $_POST['gst'];
                $timing = $_POST['timing'];
                $minval = $_POST['minval'];
                $subcat_id = $_POST['subcat_id'];
     
                
                        if ($this->pageModel->add_vendor_profile($name, $address, $city, $state, $pincode, $gst, $timing, $minval, $subcat_id)) 
                        {
                            $_SESSION['success'] = "Profile Added Successfully..! ";
                            redirect('admin/profile'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Profile Not Added';
                            $this->view('admin/add_profile'); 
                        }
             }
            else 
            {
                $this->view('admin/add_profile',$data); 
            }
        }





            public function create_ad(){
    
           
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $area_type = $_POST['area_type'];
                    $business_name = $_POST['business_name'];
                    $gst = $_POST['gst'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    $pincode = $_POST['pincode'];
                    $pincodes = $_POST['pincodes'];

                    

                    $pass = password_hash($phone, PASSWORD_DEFAULT);
         
                    $check_phone = $this->pageModel->check_phone($_POST['phone']);

                    if($check_phone){
                        $_SESSION['success'] = "Phone number is already taken.";
                        redirect('admin/add_ad'); 
                    } else {
    
                           if ($this->pageModel->create_ad($name,$email,$phone,$area_type,$business_name,$gst,$address,$city,$state,$pincode,$pincodes,$pass)) 
                            {
                                $_SESSION['success'] = "AD Added Successfully..! ";
                                redirect('admin/ads'); 
                            }
                            else
                            {
                                $_SESSION['success'] = 'AD Not Added';
                                $this->view('admin/add_ad'); 
                            }
                }
            }

            public function create_company(){
    
           
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $business_name = $_POST['business_name'];
                $gst = $_POST['gst'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $pincode = $_POST['pincode'];

                

                $pass = password_hash($phone, PASSWORD_DEFAULT);
     
                $check_phone = $this->pageModel->check_phone($_POST['phone']);

                if($check_phone){
                    $_SESSION['success'] = "Phone number is already taken.";
                    redirect('admin/add_company'); 
                } else {

                       if ($this->pageModel->create_company($name,$email,$phone,$business_name,$gst,$address,$city,$state,$pincode,$pass)) 
                        {
                            $_SESSION['success'] = "Company Added Successfully..! ";
                            redirect('admin/companies'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Company Not Added';
                            $this->view('admin/add_company'); 
                        }
            }
        }


            public function create_md(){
    
           
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $business_name = $_POST['business_name'];
                $gst = $_POST['gst'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $pincode = $_POST['pincode'];
                $ads_val = $_POST['ads'];
                $ads = implode(', ', $ads_val);
                $pass = password_hash($phone, PASSWORD_DEFAULT);
     
                $check_phone = $this->pageModel->check_phone($_POST['phone']);

                if($check_phone){
                    $_SESSION['success'] = "Phone number already taken.";
                    redirect('admin/add_md'); 
                } else {

                
                       if ($this->pageModel->create_md($name,$email,$phone,$pass,$business_name,$gst,$address,$city,$state,$pincode,$ads)) 
                        {
                            $_SESSION['success'] = "MD Added Successfully..! ";
                            redirect('admin/mds'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'MD Not Added';
                            $this->view('admin/add_vendor'); 
                        }
                    }
            }



            public function create_rd(){
    
           
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $business_name = $_POST['business_name'];
                $gst = $_POST['gst'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $pincode = $_POST['pincode'];
                $mds_val = $_POST['mds'];
                $mds = implode(', ', $mds_val);
               
                $pass = password_hash($phone, PASSWORD_DEFAULT);
     
                $check_phone = $this->pageModel->check_phone($_POST['phone']);

                if($check_phone){
                    $_SESSION['success'] = "Phone number already taken.";
                    redirect('admin/add_rd'); 
                } else {

                       if ($this->pageModel->create_rd($name,$email,$phone,$pass,$business_name,$gst,$address,$city,$state,$pincode,$mds)) 
                        {
                            $_SESSION['success'] = "RD Added Successfully..! ";
                            redirect('admin/rds'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'RD Not Added';
                            $this->view('admin/add_rd'); 
                        }
                    }
            }



            public function create_delivery(){
    
           
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];

                $check_phone = $this->pageModel->check_phone($_POST['phone']);

                if($check_phone){
                    $_SESSION['success'] = "Phone number already taken.";
                    redirect('admin/add_delivery'); 
                } else {

                $pass = password_hash($phone, PASSWORD_DEFAULT);
     
                
                       if ($this->pageModel->create_delivery($name,$email,$phone,$pass)) 
                        {
                            $_SESSION['success'] = "Delivery Agent Added Successfully..! ";
                            redirect('admin/delivery'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Delivery Agent Not Added';
                            $this->view('admin/add_delivery'); 
                        }
                }
        }

        
    


        
        public function settings()
        {
           $this->view('admin/settings'); 
        }

        public function shipping_subcat()
        {
            $get_all_subcategory = $this->adminModel->get_all_subcategory();

            $data = [
                        'all_subcategory' => $get_all_subcategory,
            ];
            $this->view('admin/shipping_subcat', $data); 
        }

        public function shipping_range()
        {
           $this->view('admin/shipping_range'); 
        }

        public function tcs_certificate_vendor()
        {
           $this->view('admin/tcs_certificate_vendor'); 
        }

        public function tcs_certificate_customer()
        {
           $this->view('admin/tcs_certificate_customer'); 
        }
 

    public function add_user()
    {
       $this->view('admin/add_user'); 
    }

    public function wallet()
    {               
       
        $wallet = $this->pageModel->getWallet_vendor();
        $transactions = $this->pageModel->getTransactions_vendor();
        
        $data = [
                    'wallet' => $wallet,
                    'transactions' => $transactions
                ];
                
       $this->view('admin/wallet',$data);
    }

    public function invoice()
    {
       $this->view('admin/invoice'); 
    }

    public function create_user()
    {

        $pass = $_POST['password'];

        $pass1 = password_hash($pass, PASSWORD_DEFAULT);

        $data = [ 

            'name' =>  $_POST['name'],
            'email' =>  $_POST['email'],
            'ph_no' =>  $_POST['ph_no'],
            'address' =>  $_POST['address'],
            'pin_code' =>  $_POST['pin_code'],
            'password' =>  $pass1,            
        ];

        $insert_auth_deliveryUser = $this->adminModel->insert_auth_deliveryUser($data);

        $_SESSION['success'] = "Delivery user Created Successfully";
        redirect('admin/all_deliveryUsers');
    }

    public function all_deliveryUsers()
    {
        $get_all_deliveryUsers = $this->adminModel->get_all_deliveryUsers();

        $data = [ 
            
            'get_all_deliveryUsers' => $get_all_deliveryUsers,
        ];

       $this->view('admin/all_deliveryUsers', $data); 
    }

    public function edit_deliveryUser($id)
    {

        $get_all_by_ID = $this->adminModel->get_all_by_ID($id);

         $data = [ 
            
            'get_all_by_ID' => $get_all_by_ID,
        ];

       $this->view('admin/edit_deliveryUser', $data);

    }

    public function update_md($id){
    
           
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $business_name = $_POST['business_name'];
        $gst = $_POST['gst'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $ads_val = $_POST['ads'];
        $ads = implode(', ', $ads_val);

        if ($this->pageModel->update_md($id,$name,$email,$phone,$pass,$business_name,$gst,$address,$city,$state,$pincode,$ads)){
            $_SESSION['success'] = "MD Updated Successfully..! ";
            redirect('admin/edit_md/'.$id); 
        }
        else
        {
            $_SESSION['success'] = 'MD Not Updated';
            redirect('admin/edit_md/'.$id); 
        }
    }


    public function update_user()
    {
        if(empty($_POST['password']))
        {

            $data = [ 

                'auth_id' =>  $_POST['auth_id'],
                'name' =>  $_POST['name'],
                'email' =>  $_POST['email'],
                'ph_no' =>  $_POST['ph_no'],
                'address' =>  $_POST['address'],
                'pin_code' =>  $_POST['pin_code'],            
            ];

            $update_auth_deliveryUser = $this->adminModel->update_auth_deliveryUser($data);

            $_SESSION['success'] = "Delivery user Updated Successfully";
            redirect('admin/all_deliveryUsers');

        }
        else
        {
            $pass = $_POST['password'];

            $pass1 = password_hash($pass, PASSWORD_DEFAULT);
     
            
            $data = [ 

                'auth_id' =>  $_POST['auth_id'],
                'name' =>  $_POST['name'],
                'email' =>  $_POST['email'],
                'ph_no' =>  $_POST['ph_no'],
                'address' =>  $_POST['address'],
                'pin_code' =>  $_POST['pin_code'],  
                'password' =>  $pass1,          
            ];

            $update_auth_deliveryUser = $this->adminModel->update_auth_deliveryUser1($data);

            $_SESSION['success'] = "Delivery user Updated Successfully";
            redirect('admin/all_deliveryUsers');

        }

        
    }

    public function delete_deliveryUser($id)
    {

       $delete_deliveryUserby_id = $this->adminModel->delete_deliveryUserby_id($id);
       
       $_SESSION['success'] = "Delivery user deleted Successfully";
            redirect('admin/all_deliveryUsers'); 

    }

    public function assign_orders()
    {
        $get_all_deliveryUsers = $this->adminModel->get_all_deliveryUsers();

        $products = $this->adminModel->get_all_orders();
       
        $data = [
                    'all_pro' => $products,
                    'get_all_deliveryUsers' => $get_all_deliveryUsers,
                ];
 
        $this->view('admin/assign_orders',$data);

    }

    public function assign_deliveryUser($id)
    {

        $get_all_by_ID = $this->adminModel->get_all_by_ID($_POST['delivery_user']);

        $this->adminModel->change_deliverystatus($id,$get_all_by_ID->auth_id, $get_all_by_ID->name);

        $_SESSION['success'] = "Delivery User Assigned Successfully";
        redirect('admin/assign_orders');

    }

  




    public function add_category()
    {
        $this->view('admin/add_category');
    }


    public function add_subcategory()
    {
        $get_all_category = $this->adminModel->get_all_category();

        $data = [
            'all_category' => $get_all_category,
        ];

        $this->view('admin/add_subcategory', $data);
    }


    public function create_category()
    {
        $category_name = $_POST['category_name'];

        $this->adminModel->create_category($category_name);

        $_SESSION['success'] = "Category created Successfully";
        redirect('admin/index'); 
    }


    public function create_coupon()
    {
        $coupon_title = $_POST['coupon_title'];
        $coupon_code = $_POST['coupon_code'];
        $coupon_type = $_POST['coupon_type'];
        $coupon_value = $_POST['coupon_value'];
        $coupon_cap = $_POST['coupon_cap'];
        $coupon_stat = $this->adminModel->create_coupon($coupon_title,$coupon_code,$coupon_type,$coupon_value,$coupon_cap);

        if($coupon_stat){
            $_SESSION['success'] = "Coupon created Successfully";
             redirect('admin/coupons'); }

    else {
        $_SESSION['success'] = "Coupon not created";
             redirect('admin/add_coupon'); }
             
    }
    


    public function create_subcategory()
    {
        $subcategory_name = $_POST['subcategory_name'];
        $category_id = $_POST['category_id'];
        $subcategory_hsn = $_POST['subcategory_hsn'];
        $subcategory_tax = $_POST['subcategory_tax'];
        $shipping_cost = $_POST['shipping_cost'];

        $cursub = $this->adminModel->create_subcategory($subcategory_name,$category_id,$subcategory_hsn,$subcategory_tax,$shipping_cost);

        if($cursub){
        $_SESSION['success'] = "Subcategory created Successfully";
        redirect('admin/subcategory'); 
        } else {
            $_SESSION['success'] = "Subcategory Not Created";
            redirect('admin/add_subcategory'); 
        }
    }



    public function category()
    {

        $get_all_category = $this->adminModel->get_all_category();

        $data = [
                    'all_category' => $get_all_category,
        ];

        $this->view('admin/category',$data);

    }

  

    public function change_state_coupon($id)
    {
        
        $status  = $_POST['coupon_status'];
        $this->adminModel->change_status_coupon($id,$status);
        $_SESSION['success'] = "Status changed";
        redirect('admin/coupons');
    }


    
    public function coupons()
    {

        $get_all_coupons = $this->adminModel->get_all_coupons();

        $data = [
                    'all_coupons' => $get_all_coupons,
        ];

        $this->view('admin/coupons',$data);

    }


    public function subcategory()
    {

        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
                    'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('admin/subcategory',$data);

    }


    public function payouts()
    {

        $get_payouts = $this->adminModel->get_all_payouts();

        $data = [
                    'all_payouts' => $get_payouts,
        ];

        $this->view('admin/payouts',$data);

    }



    public function edit_category($id)
    {
        $get_categoryBy_id = $this->adminModel->getCategoryById($id);

        $data = [
            'category' => $get_categoryBy_id,
        ];

        $this->view('admin/edit_category',$data);
    }



    public function edit_ad($id)
    {
        $get_ad = $this->adminModel->get_ad($id);

        $data = [
            'ad' => $get_ad,
        ];

        $this->view('admin/edit_ad',$data);
    }


    public function edit_company($id)
    {
        $get_company = $this->adminModel->get_company($id);

        $data = [
            'company' => $get_company,
        ];

        $this->view('admin/edit_company',$data);
    }


    public function edit_md($id)
    {
        $get_md = $this->adminModel->get_md($id);
        $ads = $this->pageModel->get_all_ads();
        $cur_md = $this->pageModel->get_md($id);
      
        $data = [
            'md' => $get_md,
            'ads' => $ads,
            'cur_md' => $cur_md,
            
        ];

        $this->view('admin/edit_md',$data);
    }



    public function edit_rd($id)
    {
        $get_rd = $this->adminModel->get_rd($id);
        $mds = $this->pageModel->get_all_mds();
        $cur_rd = $this->pageModel->get_rd($id);
      
        $data = [
            'rd' => $get_rd,
            'mds' => $mds,
            'cur_rd' => $cur_rd,
            
        ];
        
        $this->view('admin/edit_rd',$data);
    }



    public function update_ad($id){
    
           
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $area_type = $_POST['area_type'];
        $business_name = $_POST['business_name'];
        $gst = $_POST['gst'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $pincodes = $_POST['pincodes'];

        if ($this->pageModel->update_ad($id,$name,$email,$phone,$area_type,$business_name,$gst,$address,$city,$state,$pincode,$pincodes)) 
        {
            $_SESSION['success'] = "AD Updated Successfully..! ";
            redirect('admin/edit_ad/'.$id); 
        }
        else
        {
            $_SESSION['success'] = 'AD Not Updated';
            redirect('admin/edit_ad/'.$id); 
        }
    }


    public function update_company($id){
    
           
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $business_name = $_POST['business_name'];
        $gst = $_POST['gst'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];

        if ($this->pageModel->update_company($id,$name,$email,$phone,$business_name,$gst,$address,$city,$state,$pincode)) 
        {
            $_SESSION['success'] = "Company Updated Successfully..! ";
            redirect('admin/edit_company/'.$id); 
        }
        else
        {
            $_SESSION['success'] = 'Company Not Updated';
            redirect('admin/edit_company/'.$id); 
        }
    }



    
    public function update_banner($ban){
    

        if(!empty($_FILES['banner']['name']))
        {
            $f_name = $_FILES['banner']['name'];
            $f_temp = $_FILES['banner']['tmp_name'];
            $size = $_FILES['banner']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $banner =$f_newfile;
        }
        else
        {
            $banner  = NULL;
        }
        
        $pos = "banner".$ban;
        
        if ($this->pageModel->update_banner($banner,$pos)) 
        {
            $_SESSION['success'] = "Updated Successfully..! ";
            redirect('admin/banners'); 
        }
        else
        {
            $_SESSION['success'] = 'Not Updated';
            redirect('admin/banners'); 
        }
    }


    public function update_rd($id){
    
           
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $business_name = $_POST['business_name'];
        $gst = $_POST['gst'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $mds_val = $_POST['mds'];
        $mds = implode(', ', $mds_val);

        if ($this->pageModel->update_rd($id,$name,$email,$phone,$pass,$business_name,$gst,$address,$city,$state,$pincode,$mds)) 
        {
            $_SESSION['success'] = "RD Updated Successfully..! ";
            redirect('admin/edit_rd/'.$id); 
        }
        else
        {
            $_SESSION['success'] = 'RD Not Updated';
            redirect('admin/edit_rd/'.$id); 
        }
    }
  

    public function edit_subcategory($id)
    {
        $get_subcategoryBy_id = $this->adminModel->getSubcategoryById($id);

        $data = [
            'subcategory' => $get_subcategoryBy_id,
        ];

        $this->view('admin/edit_subcategory',$data);
    }




    public function md_express_update($id,$status)
    {
        $this->pageModel->md_express_update($id,$status);
        redirect('admin/mds'); 
    }



    public function vendor_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $email = $_POST['email'];
            $phno = $_POST['phno'];
            $pass = $_POST['password'];
 
            if (empty($email)) 
            {
                $_SESSION['success'] = 'Please enter email';
                redirect('admin/admin_register');
            } else if ($this->pageModel->findUserByemail($email)) 
            {
              $_SESSION['success'] = 'Email already taken';
              redirect('admin/admin_register');
            } 
            else 
            {


                if ($this->pageModel->findUserByphno($phno)) 
                {
                  $_SESSION['success'] = 'Phone number already taken';
                  redirect('admin/admin_register');
                } 
                else 
                {

                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                    if ($this->adminModel->add_vendor($email, $phno, $pass)) 
                    {
                        
                            $user = $this->pageModel->ulogin($email, $_POST['password']);
                        
                            $_SESSION['rexkod_vendor_id'] = $user->id;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;

                        $_SESSION['success'] = "Registered Successfully..! ";
                        redirect('admin/add_profile');
                    }
                    else
                    {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('admin/admin_register');
                    }
                }
            }
        } 
        else 
        {
          redirect('admin/admin_register');
        }
    }




    public function update_category()
    {
        $get_categoryBy_id = $this->adminModel->get_categoryBy_id($_POST['id']);

        $update_category = $this->adminModel->update_category($_POST['id'], $_POST['category_name'], $get_categoryBy_id->img);

        $_SESSION['success'] = "Category updated Successfully";
        redirect('admin/all_category'); 

    }


    public function update_delivery_agent($oid)
    {
        $agentid = $_POST['delivery_agent'];
        $update_delivery = $this->pageModel->update_delivery_agent($oid,$agentid);

        $_SESSION['success'] = "Delivery Agent Added Successfully";
        redirect('admin/order/'.$oid); 

    }

    public function update_pickup_agent($oid)
    {
        $agentid = $_POST['pickup_agent'];
        $update_delivery = $this->pageModel->update_pickup_agent($oid,$agentid);

        $_SESSION['success'] = "Pickup Agent Added Successfully";
        redirect('admin/order/'.$oid); 

    }

    public function change_status_category($id)
    {
        $id_arr = explode("|", $id);

        if($id_arr[1] == 11)
        {
            $status = 1;
        }
        elseif($id_arr[1] == 22)
        {
            $status = 0;
        }

        $update_status_category = $this->adminModel->update_status_category($id_arr[0], $status);

        $_SESSION['success'] = "Status updated Successfully";
        redirect('admin/all_category'); 
    }


    public function change_status_order($id)
    {
        $id_arr = explode("|", $id);

        if($id_arr[1] == 11)
        {
            $status = 1;
        }
        elseif($id_arr[1] == 22)
        {
            $status = 0;
        }

        $update_status_order = $this->adminModel->update_status_order();

        $_SESSION['success'] = "Status updated Successfully";
        redirect('admin/all_category'); 
    }

    public function edit_product($id)
    {
        $get_productBy_id = $this->adminModel->get_productBy_id($id);

         $data = [
            'product' => $get_productBy_id,
        ];

        $this->view('admin/edit_product',$data);

    }

    public function update_product()
    {
        $id = $_POST['id'];

        // echo $_POST['category_name'];

        // $get_categoryBy_name = $this->adminModel->get_categoryBy_name($_POST['category_name']);

        // var_dump($get_categoryBy_name);

        $cat = $_POST['cat'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $discount_price = $_POST['discount_price'];
        $p_details = $_POST['p_details'];
        $product_type = $_POST['product_type'];

        $get_productBy_id = $this->adminModel->get_productBy_id($_POST['id']);


        $result = $this->adminModel->update_product_db($id, $name, $price, $discount_price, $cat, $p_details, $product_type, $get_productBy_id->p_image);
        if($result)
        {
            $_SESSION['success'] = "Product Updated successfully..!";
            redirect('admin/all_products');
        }else
        {
             $_SESSION['success'] = "try later..!";
            redirect('admin/all_products');
        }

    }

    public function viewOrder_deliveryUser($user_id)
    {

        $viewOrder_deliveryUser = $this->adminModel->viewOrder_deliveryUser($user_id);

        $get_all_by_ID = $this->adminModel->get_all_by_ID($user_id);

        $data = [
            'viewOrder_deliveryUser' => $viewOrder_deliveryUser,
            'get_all_by_ID' => $get_all_by_ID
        ];

        $this->view('admin/viewOrder_deliveryUser',$data);

    }

    public function viewOrderbyType_deliveryUser($comb_id)
    {
        $comb_arr = explode("|", $comb_id);

        $viewOrder_deliveryUser = $this->adminModel->viewOrder_deliveryUser($comb_arr[1]);

        $get_all_by_ID = $this->adminModel->get_all_by_ID($comb_arr[1]);

        $data = [
            'viewOrder_deliveryUser' => $viewOrder_deliveryUser,
            'get_all_by_ID' => $get_all_by_ID,
            'status' => $comb_arr[0] 
        ];

        $this->view('admin/viewOrderbyType_deliveryUser',$data);

    }

    public function pending_orders()
    {
        $products = $this->adminModel->get_all_orders();

        $data = [
            
            'all_pro' => $products,
        ];
        $this->view('admin/pending_orders',$data);
    }

    public function completed_orders()
    {
        $products = $this->adminModel->get_all_orders();
        
        $data = [
            
            'all_pro' => $products,
        ];
        $this->view('admin/completed_orders',$data);
    }

    public function update_active_status($id)
    {
        $id_arr = explode("|", $id);

        if($id_arr[1] == 1)
        {
            $update_active_status_db = $this->adminModel->update_active_status_db($id_arr[0], 1);

            $_SESSION['success'] = "Delivery User Activated successfully";    

            redirect('admin/all_deliveryUsers');

        }
        elseif($id_arr[1] == 0)
        {
            $update_active_status_db = $this->adminModel->update_active_status_db($id_arr[0], 0);

            $_SESSION['success'] = "Delivery User De-Activated successfully";    

            redirect('admin/all_deliveryUsers');
        }
    }

    public function product_ratings()
    {

        $products = $this->pageModel->get_all_products();
        $data = [
                    'all_pro' => $products,
                ];
        $this->view('admin/product_ratings',$data);
    }

    public function qr_code()
    {
         $res = $this->pageModel->ulogin_using_rowId($_SESSION['user_id']);

        $data = [
            'res' => $res
        ];

        $this->view('admin/qr_code', $data);
    }

    public function create_QR()
    {
        if(!empty($_FILES['files_display']['name']))
        {
            $f_name = $_FILES['files_display']['name'];
            $f_temp = $_FILES['files_display']['tmp_name'];
            $size = $_FILES['files_display']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile=uniqid().'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $_SESSION['attachment']=$f_newfile;
        }
        else
        {
            $_SESSION['attachment']="demo.png";
        }

        $products = $this->pageModel->change_QR($_SESSION['attachment']);

        $_SESSION['success'] = "QR code uploaded successfully";    

            redirect('admin/qr_code');
    }


    public function view_orderDetails($id)
    {

        $get_order_details = $this->adminModel->get_order_details($id);

        $data = [ 
                    
            'get_order_details' =>  $get_order_details,            
        ];

        $this->view('admin/view_orderDetails', $data);
    }

    public function view_allProdByCat($id)
    {

         $view_allProdByCat = $this->adminModel->view_allProdByCat($id);

        $data = [ 
                    
            'all_pro' =>  $view_allProdByCat,            
        ];

        $this->view('admin/view_allProdByCat', $data);


    }


     public function download_excel() {




        $productResult=$this->adminModel->get_download_content();

        

          $this->exportProductDatabase($productResult);


    }



    public function customers()
    {         
        $get_all_customers = $this->adminModel->get_all_customers();

        $data = [

            'customers' => $get_all_customers,
        ];

        $this->view('admin/customers',$data); 
    }


    public function customers_cod()
    {         
        $get_all_customers = $this->adminModel->get_all_customers();

        $data = [

            'all_customers' => $get_all_customers,
        ];

        $this->view('admin/customers_cod',$data); 
    }



       

      public function exportProductDatabase($productResult) {
      
        $timestamp = time();
        $filename = 'Export_excel_' . $timestamp . '.xls';
        
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        
        $isPrintHeader = false;

        foreach ($productResult as $file) {
                        $result = [];
                        array_walk_recursive($file, function($item) use (&$result) {
                        $result[] = $item;
                        });
                     // fputcsv($output, $result);
                 


        // foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($result)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($result)) . "\n";


         }
        exit();

    }

    public function banner()
    {
        $get_banner = $this->pageModel->get_banner();

        $data = [

            'get_banner' => $get_banner
        ];   

        $this->view('admin/banner', $data);
    }



    public function create_banner()
    {

        if(!empty($_FILES['ban_file']['name']))
        {
            $f_name = $_FILES['ban_file']['name'];
            $f_temp = $_FILES['ban_file']['tmp_name'];
            $size = $_FILES['ban_file']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile=uniqid().'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $ban_filename=$f_newfile;
            $ban_pos = $_POST['ban_pos'];
            

            switch ($ban_pos) {
                case "Banner 1":
                  $ban_pos="ban1";
                  break;
                case "Banner 2":
                  $ban_pos="ban2";
                  break;
                case "Banner 3":
                  $ban_pos="ban3";
                  break;
                case "Banner 4":
                  $ban_pos="ban4";
                  break;
                case "Banner 5":
                  $ban_pos="ban5";
                  break;
                case "Deal 1":
                  $ban_pos="deal1";
                  break;
                case "Deal 2":
                   $ban_pos="deal2";
                    break;
                case "Deal 3":
                    $ban_pos="deal3";
                    break;
            
              }


            
            $result = $this->pageModel->add_banner_db($ban_filename,$ban_pos);
        }

        
        if($result){
            $_SESSION['success'] = "Banner Updated Successfully";
            redirect('admin/banner');
        } else {
            $_SESSION['success'] = "Banner Not Updated";
            redirect('admin/banner');
        }
       

    }



    public function pay()
	{
		  $api = new Api(RPKID, RPKS);
		/**
		 * You can calculate payment amount as per your logic
		 * Always set the amount from backend for security reasons
		 */
		$_SESSION['payable_amount'] = $_POST['amount'];

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' =>  1
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$_SESSION['razorpay_order_id'] = $razorpayOrderId;

		$data = $this->prepareData($amount,$razorpayOrderId);

		$this->view('admin/rezorpay',$data);
	}

	/**
	 * This function verifies the payment,after successful payment
	 */
	public function verify()
	{
		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RPKID, RPKS);
		try {
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);
				$api->utility->verifyPaymentSignature($attributes);
			} catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
            unset($_SESSION['order_type']);
			redirect('admin/add_money/'.$_SESSION['payable_amount'].'/'.$_SESSION['razorpay_order_id']);
		}
		else {
			redirect('ecom/error');
		}
	}

	
	public function prepareData($amount,$razorpayOrderId)
	{
		$data = array(
			"key" => RPKID,
			"amount" => $amount,
			"name" => "Speeder",
			"description" => "Speeder Shipping Services Pvt. Ltd.",
			"image" => URLROOT."/assets/icon.png",
			"prefill" => array(
				"name"  => $_SESSION['rexkod_user_name'],
				"email"  => $_SESSION['rexkod_user_email'],
				"contact" => $_SESSION['rexkod_user_phone'],
			),
			"notes"  => array(
				"address"  => "India",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#00b491"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	public function paymentFailed()
	{
		$this->view('ecom/error');
	}


    public function add_money($amount,$txnid)
    {
        $add_money = $this->pageModel->add_money_vendor($amount,$txnid);
        $_SESSION['success'] = "Money added successfully";
        redirect('admin/wallet');
    }

    
    public function add_money_customer($id)
    {
        $user = $this->pageModel->get_userinfo($id);
        $wallet = $this->pageModel->getWalletById($id);
        $data = [
                    'user' => $user,
                    'wallet' => $wallet,
        ];
        $this->view('admin/add_money_customer',$data);
    }

    
    public function add_money_vendor($id)
    {
        $user = $this->pageModel->get_userinfo($id);
        $wallet = $this->pageModel->getWalletById_vendor($id);
        $data = [
                    'user' => $user,
                    'wallet' => $wallet,
        ];
        $this->view('admin/add_money_vendor',$data);
    }

   


}