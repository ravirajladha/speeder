<?php

require_once(APPROOT."/libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


class Go extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');  
        $this->adminModel = $this->model('Admins');  
     
    }

    public function index() 
	{
      if($_SESSION['rexkod_user_id']){

        $banner = $this->pageModel->get_banner();
        $orders = $this->pageModel->get_all_bookings();
        $contacts = $this->pageModel->get_all_contacts();
        $data = [
                    'banner' => $banner,
                    'orders' => $orders,
                    'contacts' => $contacts
                ];
        $this->view('go/index', $data);

      } else {
        $this->view('go/login');
      }


        
	}


    public function cancel_hyperlocal_order($id)
    {
        $this->pageModel->cancel_hyperlocal_order($id);
        redirect('go/hyperlocal_orders'); 
        
        
    }

    

    public function landing()
    {
        
            $this->view('go/landing');
    }

    public function feedback($id)
    {
        $feedback = $this->pageModel->getFeedback($id);
        
        $data = [
            'feedback' => $feedback,
            'id' => $id
        ];
        $this->view('go/feedback',$data);
    }

    public function add_feedback($id)
    {
        $user_remark = $_POST['user_remark'];
        $this->pageModel->add_feedback($id,$user_remark);
        redirect('go/orders');
    }

    public function payment()
    {
            $this->view('go/payment');
    }

    public function logout()
    {
       session_destroy();
       redirect('go/login');
    }


    public function home()
    {               
        $this->view('go/home');
    }

    public function wallet()
    {               
        $orders = $this->pageModel->bookings_wallet();
        $wallet = $this->pageModel->getWallet();
        
        $data = [
                    'wallet' => $wallet,
                    'orders' => $orders
                ];
                
       $this->view('go/wallet',$data);
    }

    public function transactions()
    {               
        $transactions = $this->pageModel->getTransactions();
        
        $data = [
                    'transactions' => $transactions,
                ];
                
       $this->view('go/transactions',$data);
    }




    public function check_coupon()
    {               
        $coupon_code = $_POST['coupon'];
        $subtotal = $_POST['subtotal'];
        $coupon = $this->pageModel->get_coupon($coupon_code);
        $discount = 0;
        if($coupon->coupon_type==1){
        $perc = $coupon->coupon_value;
        $discount = ($perc * $subtotal)/100;
        if($discount > $coupon->coupon_cap){$discount = $coupon->coupon_cap;}
        }else{
            $discount = $coupon->coupon_value;
        }
        $discount = round($discount,0);
        $_SESSION['net_total'] = $subtotal-$discount;
        $_SESSION['coupon_id'] = $coupon->coupon_id;
        $_SESSION['coupon_val'] = $discount;

        echo $discount;
    }

    
    public function contacts()
    {               
        $contacts = $this->pageModel->get_all_contacts();
        $data = [
                    'contacts' => $contacts
                ];
        $this->view('go/contacts',$data);
    }

    
    public function truck_order()
    {               
        $this->view('go/truck_order');
    }


    public function hyperlocal()
    {               
        $this->view('go/hyperlocal');
    }


    public function discrepancy()
    {               
        $this->view('go/discrepancy');
    }

    public function refer()
    {               
        $this->view('go/refer');
    }

    public function about()
    {               
        $this->view('go/about');
    }

    public function support()
    {               
        $this->view('go/support');
    }

    public function privacy_policy()
    {               
        $this->view('go/privacy_policy');
    }
/*
    public function check_servicablity()
    {               
        $from_pincode = $_POST['from_pincode'];
        $to_pincode = $_POST['to_pincode'];
        $from_state= $_POST['from_state'];
        $to_state= $_POST['to_state'];
        $item_weight= $_POST['item_weight'];
        $item_length= $_POST['item_length'];
        $item_breadth= $_POST['item_breadth'];
        $item_height= $_POST['item_height'];
        $parcel_type= $_POST['parcel_type'];
        $order_type= $_POST['order_type'];
        $shipping_type= $_POST['shipping_type'];

        $base_price = (array) $this->pageModel->get_base_price($shipping_type);
        $base_price = $base_price['base_amount'];


        
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
            }else if($from_express == 1 && $from_pincode == $to_pincode){
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

        
        if($parcel_type==2){
            $price_perc = ($price * 20) / 100;
            $price = $price + $price_perc;
        }else if($parcel_type==3){
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

        if($shipping_type==1){
            $price_perc = ( $price * 200 ) / 100;
            $price = $price + $price_perc;
        }else if($shipping_type==2){
            $price_perc = ($price * 150) / 100;
            $price = $price + $price_perc;
        }
        
        $price = number_format($price, 2, '.', '');

        $wallet = $this->pageModel->getWallet();

        if($express_check == 1){

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

            }else {
                echo "Express Shipping not available on these pincodes";
            }
}
*/

public function check_servicablity()
{               
    $from_pincode = $_POST['from_pincode'];
    $to_pincode = $_POST['to_pincode'];
    $from_state= $_POST['from_state'];
    $to_state= $_POST['to_state'];
    $item_cost= $_POST['item_cost'];
    $item_weight= $_POST['item_weight'];
    $item_length= $_POST['item_length'];
    $item_breadth= $_POST['item_breadth'];
    $item_height= $_POST['item_height'];
    $parcel_type= $_POST['parcel_type'];
    $order_type= $_POST['order_type'];
    $shipping_type= $_POST['shipping_type'];

    $base_price = (array) $this->pageModel->get_base_price($shipping_type);
    $base_price = $base_price['base_amount'];


    
    $all_ads = $this->pageModel->get_ads();
    foreach ($all_ads as $fromad){
    $frompin = explode(',', $fromad->ad_pincodes);
    foreach($frompin as $pin){
        if($pin == $from_pincode){
         $from_area_type = $fromad->area_type;
         $from_ad_id = $fromad->ad_id;
        } else if($pin == $to_pincode){
         $to_area_type = $fromad->area_type;
         $to_ad_id = $fromad->ad_id;
        }
    }
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
           $from_express = $curmd->express;
        } else if($ad == $to_ad_id){
           $to_express = $curmd->express;
        }
    }
    }


    $express_check =1;
    if($shipping_type == 1){
        if($from_express == 1 && $to_express == 1){
            $express_check =1;
        }else if($from_express == 1 && $from_pincode == $to_pincode){
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

    if($weight<=750){
        $weight_count =1;
    }else  if($weight<=1000){
        $weight_count = 2;
    }else {
        $weight_count = $weight/500;
    }

    round($weight_count, 0);
    
    
   
    
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
       
    


        $price = ($price * $weight)/1000; 

    if($parcel_type==2){
        $price_perc = ($price * 20) / 100;
        $price = $price + $price_perc;
    }else if($parcel_type==3){
        $price_perc = ($price * 20) / 100;
        $price = $price - $price_perc;
    }

    if($order_type==2){
        $price_perc = ($price * 25) / 100;
        $price = $price + $price_perc;
    }

    if($order_type==3){
        if($item_cost){
        $price_perc = ($item_cost * 2) / 100;
        $price = $price + $price_perc;
        } else {
            echo "Please enter Cost of Package";
            die();
        }
    }

    if($shipping_type==1){
        $price_perc = ( $price * 200 ) / 100;
        $price = $price + $price_perc;
    }else if($shipping_type==2){
        $price_perc = ($price * 150) / 100;
        $price = $price + $price_perc;
    }
    
    $price = number_format($price, 2, '.', '');

    $wallet = $this->pageModel->getWallet();

    if($express_check == 1){

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

        }else {
            echo "Express Shipping not available on these pincodes";
        }
}


    public function from_remark($id)
    {
        $from_remark = $_POST['from_remark'];
        $this->pageModel->from_remark($id,$from_remark);
        $_SESSION['success'] = "Status updated Successfully";
        redirect('go/orders'); 
        
    }


    public function check_truck()
    {
        $lat1 = $_POST['lat1'];
        $lon1 = $_POST['lon1'];
        $lat2 = $_POST['lat2'];
        $lon2 = $_POST['lon2'];
        $pincode1 = $_POST['pincode1'];
        $pincode2 = $_POST['pincode2'];
        
        $radius = 6378137;
        static $x = M_PI / 180;
        $lat1 *= $x; $lon1 *= $x;
        $lat2 *= $x; $lon2 *= $x;
        $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
        $distance = ($distance * $radius)/1000;
        $distance = round($distance,2);


        $all_mds = $this->pageModel->get_mds();
        foreach ($all_mds as $frommd){
        $frompin = explode(',', $frommd->md_pincodes);
        foreach($frompin as $pin){
            if($pin == $pincode1){
             $trucks = $frommd->trucks;
            }
        }
        }

        echo $distance."*".$trucks;
    }

    public function check_hyperlocal()
    {
        $lat1 = $_POST['lat1'];
        $lon1 = $_POST['lon1'];
        $lat2 = $_POST['lat2'];
        $lon2 = $_POST['lon2'];
        $pincode1 = $_POST['pincode1'];
        $pincode2 = $_POST['pincode2'];
        
        $radius = 6378137;
        static $x = M_PI / 180;
        $lat1 *= $x; $lon1 *= $x;
        $lat2 *= $x; $lon2 *= $x;
        $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
        $distance = ($distance * $radius)/1000;
        $distance = round($distance,2);

        $hyperlocal = 0;
        $all_ads = $this->pageModel->get_ads();
        foreach ($all_ads as $fromad){
        $frompin = explode(',', $fromad->ad_pincodes);
        foreach($frompin as $pin){
            if($pin == $pincode1){
             $hyperlocal = 1;
            }
        }
        }
        $user_wallet = $this->pageModel->getWallet();
        $wallet = $user_wallet->balance_amount;
        echo $distance."*".$hyperlocal."*".$wallet;
    }




    public function create_truck_order()
    {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $lat1 = $_POST['lat1'];
        $lon1 = $_POST['lon1'];
        $lat2 = $_POST['lat2'];
        $lon2 = $_POST['lon2'];
        $pincode1 = $_POST['pincode1'];
        $pincode2 = $_POST['pincode2'];
        $truck = $_POST['truck'];

        $all_mds = $this->pageModel->get_mds();
        foreach ($all_mds as $frommd){
        $frompin = explode(',', $frommd->md_pincodes);
        foreach($frompin as $pin){
            if($pin == $pincode1){
             $md_id = $frommd->md_id;
            }
        }
        }

        
        $radius = 6378137;
        static $x = M_PI / 180;
        $lat1 *= $x; $lon1 *= $x;
        $lat2 *= $x; $lon2 *= $x;
        $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
        $distance = ($distance * $radius)/1000;
        $distance = round($distance,2);

        if($truck == 1){
            $cost = $distance * 100;
        }else if($truck == 2){
            $cost = $distance * 200;
        }else if($truck == 3){
            $cost = $distance * 300;
        }

        $from_latlon = $lat1.",".$lon1;
        $to_latlon = $lat2.",".$lon2;

        $wallet = $this->pageModel->getWallet();
        if($wallet->balance_amount > $cost ){
            $this->pageModel->create_truck_order($from,$to,$from_latlon,$to_latlon,$pincode1,$pincode2,$truck,$distance,$cost,$md_id);
            echo "1, <br>Order Created";
        } else {
            echo "2, <br><span style='color:red;'>Insufficient wallet balance.<span>";
        }

        
    }

    public function create_hyperlocal_order()
    {
        $from_area = $_POST['from_area'];
        $to_area = $_POST['to_area'];
        $lat1 = $_POST['lat1'];
        $lon1 = $_POST['lon1'];
        $lat2 = $_POST['lat2'];
        $lon2 = $_POST['lon2'];
        $from_pincode = $_POST['from_pincode'];
        $to_pincode = $_POST['to_pincode'];
        $from_address = $_POST['from_address'];
        $to_address = $_POST['to_address'];
        $to_name = $_POST['to_name'];
        $to_phone = $_POST['to_phone'];
        $parcel_type = $_POST['parcel_type'];

        $all_ads = $this->pageModel->get_ads();
        foreach ($all_ads as $fromad){
        $frompin = explode(',', $fromad->ad_pincodes);
        foreach($frompin as $pin){
            if($pin == $from_pincode){
             $ad_id = $fromad->ad_id;
            }
        }
        }

        
        $radius = 6378137;
        static $x = M_PI / 180;
        $lat1 *= $x; $lon1 *= $x;
        $lat2 *= $x; $lon2 *= $x;
        $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
        $distance = ($distance * $radius)/1000;
        $distance = round($distance,2);

        $cost = $distance * 10;
       

        $from_latlon = $lat1.",".$lon1;
        $to_latlon = $lat2.",".$lon2;

        $wallet = $this->pageModel->getWallet();
        if($wallet->balance_amount > $cost ){
            $this->pageModel->create_hyperlocal_order($from_area,$to_area,$from_latlon,$to_latlon,$from_pincode,$to_pincode,$from_address,$to_name,$to_phone,$to_address,$parcel_type,$distance,$cost,$ad_id);
            
            echo "1, <br>Order Created";
        } else {
            echo "2, <br><span style='color:red;'>Insufficient wallet balance.<span>";
        }

      
    }




    public function to_remark($id)
    {
        $to_remark = $_POST['from_remark'];
        $this->pageModel->to_remark($id,$to_remark);
        $_SESSION['success'] = "Status updated Successfully";
        redirect('go/orders'); 
        
    }


    public function check_pincode()
    {               
        $pin = $_POST['pin'];
        $pin_data = $this->pageModel->check_pincode($pin);
        $area_data = $this->pageModel->check_area($pin);
        $pin_data = json_decode(json_encode($pin_data), true);
        $area_data = json_decode(json_encode($area_data), true);
        $count = 0;
        $area_val=NULL;
        foreach($area_data as $area){
        if($count){ $area_val = $area_val."*";}
        $area_val = $area_val."".$area['area'];
        $count++;
        }

        $service = 0;
        $all_ads = $this->pageModel->get_ads();
        foreach ($all_ads as $ad){
        $adpin = explode(',', $ad->ad_pincodes);
        foreach($adpin as $pin_cur){
            if($pin_cur == $pin){
                $service = 1;
            } 
        }
        }
        

        if($service == 0){
            $this->pageModel->add_nonpincode($pin);
        }

        echo $pin_data['district'].",".$pin_data['state'].",".$area_val.",".$service;
    }


    public function new_order($cid = NULL)
    {               
        $wallet = $this->pageModel->getWallet();
        $contact = $this->pageModel->get_contact($cid);
        
        $data = [
                    'wallet' => $wallet,
                    'contact' => $contact,
                ];
        $this->view('go/new_order',$data);
    }

    public function new_order2()
    {               
        $this->view('go/new_order2');
    }


    public function order($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        
        $data = [
                    'order' => $get_order,
                ];
                
       $this->view('go/order',$data); 
    } 

    public function invoice()
    {               
        $this->view('go/invoice');
    }

    public function payments()
    {               
        $this->view('go/payments');
    }


    public function users()
    {               
        $this->view('go/users');
    }

    public function reviews()
    {               
        $this->view('go/reviews');
    }

    public function settings()
    {               
        $vendor_detail = $this->pageModel->getVendorById($_SESSION['rexkod_vendor_id']); 
        $user_detail = $this->pageModel->get_userinfo($_SESSION['rexkod_vendor_id']); 
        
        $data = [
                    'vendor' => $vendor_detail,
                    'user' => $user_detail,
                ];

        $this->view('go/settings', $data);
    }

    

    public function menu()
    {
        $all_items = $this->pageModel->get_all_vendor_items($_SESSION['rexkod_vendor_id']); 
        
        $data = [
                    'all_items' => $all_items,
                ];

        $this->view('go/menu',$data);
    }



        
    public function add_profile(){


            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {

                
                $name = $_POST['name'];
                if (isset($_POST['user_type'])) {
                    $type = 1;
                } else {
                    $type = 0;
                }
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $pincode = $_POST['pincode'];
                $gst = $_POST['gst'];

                
                        if ($this->pageModel->add_user_profile($name, $type, $address, $city, $state, $pincode, $gst)) 
                        {
                            $_SESSION['success'] = "Profile Added Successfully..! ";
                            redirect('go/profile'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Profile Not Added';
                            $this->view('go/add_profile'); 
                        }
             }
            else 
            {
                $this->view('go/add_profile',$data); 
            }
        }



 


    public function send_otp($phone,$otp)
    {
        
        
        $url = "http://sms.profuseservices.com/sendsms.jsp?user=lsamelec&password=2e9e8f3a08XX&senderid=BLPCLS&tempid=1007163111151840759&mobiles=+91".$phone."&sms=Dear%20User,%20your%20OTP%20for%20login%20is%20".$otp.".%20Please%20do%20not%20share%20with%20anyone.%20Team%20Biglander";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 40,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
        ));

        function url($url)
        {
            $result = parse_url($url);
        }
        curl_exec($curl);
        curl_close($curl);
    }



    public function services()
    {               
        $this->view('go/services');
    }

    public function contact()
    {               
        $this->view('go/contact');
    }


    public function vendors()
    {         
        $get_all_vendors = $this->pageModel->get_all_vendors1();

        $data = [

            'get_all_vendors' => $get_all_vendors,
        ];

        $this->view('go/vendors', $data);
    }





    public function category()
    {

        $get_all_category = $this->adminModel->get_all_category();

        $data = [
                    'all_category' => $get_all_category,
        ];

        $this->view('go/category',$data);

    }



    public function subcategory()
    {

        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
                    'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('go/subcategory',$data);

    }

    public function add_food()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
                    'all_subcategory' => $get_all_subcategory,
        ];
        

        $this->view('go/add_food', $data);
    }


    public function create_food()
    {
        
        $name = $_POST['item_name'];
        $subcat = $_POST['item_subcat'];
        $desc = $_POST['item_description'];
        $price = $_POST['item_price'];
        $discount_price = $_POST['item_discount_price'];
        $price_dine = $_POST['item_price_dine'];
        $discount_price_dine = $_POST['item_discount_price_dine'];

        $result = $this->adminModel->create_item_db($name, $subcat, $desc, $price, $discount_price, $price_dine, $discount_price_dine);


        if($result)
        {
            $_SESSION['success'] = "Food added successfully..!";
            redirect('go/menu');
        }else
        {
             $_SESSION['success'] = "Food not added";
            redirect('go/meny');
        }
    }


    

    public function add_category()
    {
        $this->view('go/add_category');
    }


    public function add_subcategory()
    {
        $get_all_category = $this->adminModel->get_all_category();

        $data = [
            'all_category' => $get_all_category,
        ];

        $this->view('go/add_subcategory', $data);
    }


    public function create_category()
    {

        if(!empty($_FILES['category_image']['name']))
        {
            $f_name = $_FILES['category_image']['name'];
            $f_temp = $_FILES['category_image']['tmp_name'];
            $size = $_FILES['category_image']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile='1'.$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $category_img=$f_newfile;
        }
        else
        {
            $category_img = cat_img.png;
        }


        $category_name = $_POST['category_name'];
        $category_start_time = $_POST['category_start_time'];
        $category_end_time = $_POST['category_end_time'];

        $this->adminModel->create_category($category_name,$category_img,$category_start_time,$category_end_time);

        $_SESSION['success'] = "Category created Successfully";
        redirect('go/category'); 
    }



    public function create_booking()
    {

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
        $item_order_id = $_POST['item_order_id'];
        $item_sku = $_POST['item_sku'];
        $item_weight = $_POST['item_weight'];
        $order_type = $_POST['order_type'];
        $item_length = $_POST['item_length'];
        $item_breadth = $_POST['item_breadth'];
        $item_height = $_POST['item_height'];
        $package_type = $_POST['package_type'];
        $shipping_type = $_POST['shipping_type'];
        $date_slot_delivery = NULL;
        $time_slot_delivery = NULL;

        if($shipping_type == 0){
            $date_slot_pickup = $_POST['standard_date_slot'];
            $time_slot_pickup = $_POST['standard_time_slot'];
        } else if($shipping_type == 1){
            $date_slot_pickup = $_POST['express_date_slot'];
            $time_slot_pickup = $_POST['express_time_slot'];
        } else if($shipping_type == 2){
            $date_slot_pickup = $_POST['schedule_date_slot'];
            $time_slot_pickup = $_POST['schedule_time_slot'];
            $date_slot_delivery = $_POST['schedule_date_slot2'];
            $time_slot_delivery = $_POST['schedule_time_slot2'];
        }

        $booking_cost = $_POST['booking_cost'];
        $booking_cost = preg_replace("/[^0-9.]/", "", $booking_cost);
        
        $to_id = NULL;
        $get_to_id = $this->pageModel->email_verify_phone($to_phone);
        if($get_to_id){
            $to_id = $get_to_id->id;
        }
       
        $all_ads = $this->pageModel->get_ads();
        foreach ($all_ads as $fromad){
        $frompin = explode(',', $fromad->ad_pincodes);
        foreach($frompin as $pin){
            if($pin == $from_pincode){
             $from_area_type = $fromad->area_type;
             $from_ad_id = $fromad->ad_id;
            } else if($pin == $to_pincode){
             $to_area_type = $fromad->area_type;
             $to_ad_id = $fromad->ad_id;
            }
        }
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

      
        if(isset($_POST['need_package'])){
            $need_package = 1;
        }else {
            $need_package = 0;
        }

        if(isset($_POST['add_contact'])){
            $add_contact = 1;
        }else {
            $add_contact = 0;
        }

        $volumetric_weight = (($item_length * $item_breadth * $item_height)/5000)*1000;
        if($item_weight >= $volumetric_weight){
            $order_weight = $item_weight;
        }else {
            $order_weight = $volumetric_weight;
        }
        $cod_charges = 0;
        if($order_type==3){
            $price_perc = ($item_cost * 2) / 100;
            $cod_charges = $price_perc;
        }

        if($from_ad_id && $to_ad_id && $from_md_id && $to_md_id && $from_rd_id && $to_rd_id){
        $this->pageModel->create_booking($from_address,$from_city,$from_state ,$from_pincode,$to_id,$to_name,$to_phone,$to_address,$to_city,$to_state,$to_pincode,$item_name,$item_qty ,$item_cost ,$item_order_id,$item_sku,$item_weight,$order_type,$item_length,$item_breadth,$item_height,$volumetric_weight,$order_weight,$need_package,$package_type,$shipping_type,$date_slot_pickup,$time_slot_pickup,$date_slot_delivery,$time_slot_delivery,$booking_cost,$from_ad_id,$from_md_id,$from_rd_id,$to_rd_id,$to_ad_id,$to_md_id,$add_contact,$cod_charges);

      
        $_SESSION['success'] = "Bookings created Successfully";
        redirect('go/orders'); 
        }
        else {
    
        $_SESSION['success'] = "Non Servicable Pincodes";
        redirect('go/new_order');
        }
        
    }


    public function create_subcategory()
    {

        if(!empty($_FILES['subcategory_image']['name']))
        {
            $f_name = $_FILES['subcategory_image']['name'];
            $f_temp = $_FILES['subcategory_image']['tmp_name'];
            $size = $_FILES['subcategory_image']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile='1'.$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $subcategory_img=$f_newfile;
        }
        else
        {
            $subcategory_img = cat_img.png;
        }


        $subcategory_name = $_POST['subcategory_name'];
        $category_id = $_POST['category_id'];
        $subcategory_tax = $_POST['subcategory_tax'];

        $cursub = $this->adminModel->create_subcategory($subcategory_name, $subcategory_img, $category_id,$subcategory_tax);

        if($cursub){
        $_SESSION['success'] = "Subcategory created Successfully";
        redirect('go/subcategory'); 
        } else {
            $_SESSION['success'] = "Subcategory Not Created";
            redirect('go/subcategory'); 
        }
    }


    public function find_productsFor_vendorId($id)
    {
        $products_forVendor = $this->pageModel->get_all_products_forVendor($id);

        $res = $this->pageModel->ulogin_using_rowId($id);

        $data = [

            'products_forVendor' => $products_forVendor,
            'res' => $res,
        ];

        $this->view('go/products_forVendor', $data);
    }



    
    public function products()
    {    
        $get_all_category = $this->pageModel->get_all_category();

        $products = $this->pageModel->get_all_products();

        $data = [
                    'all_pro' => $products,
                    'all_category' => $get_all_category,
                ];

        $this->view('go/products', $data);
    }
   


    public function single_product($id)
    {

        $s = $this->pageModel->get_single_products($id);
        $pro_subcategory = $this->adminModel->getSubcategoryById($s->p_subcat); 
        $cart_products = $this->pageModel->getcart_items(); 
        $pp_points = $this->pageModel->getpropage_points(); 
        $data = [ 
            'single_product'=>$s,
            'cart_products'=>$cart_products,
            'subcategory'=>$pro_subcategory,
            'pp_points'=>$pp_points,
        ];

        $this->view('go/single_product', $data);
    }






    


    public function add_to_cart($pro_id)
    {   
       
        $created_by = $_SESSION['rexkod_user_id'];
        $qty = $_POST['qty_count'];
        $incart=0;
        $final_price =0;

        $cart_products = $this->pageModel->getcart_items();
        foreach ($cart_products as $cart) {
            if($cart->item_id == $pro_id){
              $incart=1;
            }
        }


        $x = $this->pageModel->get_single_product($pro_id);

        $found_user = $this->pageModel->get_cart_user_check();
        $found_vendor = $this->pageModel->get_cart_vendor_check($x->created_byId);

        $cart_permission = 0;

        if(empty($found_user)){
            $cart_permission =1;
        }
        else if(!empty($found_user) && !empty($found_vendor)){
            $cart_permission =1;
        }



 


        
        if($cart_permission==1){
            
            if($x->min2 == 0){
                
                $final_price = $x->price1;          
            }else if($x->min3 == 0){
                
                if($qty <= $x->max1){
                    $final_price = $x->price1;
                }else {
                    $final_price = $x->price2;
                }
            }else if($x->min4 == 0){
            
                if($qty <= $x->max1){
                    $final_price = $x->price1;
                }else if($qty <= $x->max2){
                    $final_price = $x->price2;
                }else {
                    $final_price = $x->price3;
                }
            }else if($x->min5 == 0){
                
                if($qty <= $x->max1){
                    $final_price = $x->price1;
                }else if($qty <= $x->max2){
                    $final_price = $x->price2;
                }else if($qty <= $x->max3){
                    $final_price = $x->price3;
                }else {
                    $final_price = $x->price4;
                }
            }else if($x->min5 != 0){
                
                if($qty <= $x->max1){
            
                    $final_price = $x->price1;
                }else if($qty <= $x->max2){
                
                    $final_price = $x->price2;
                }else if($qty <= $x->max3){
                
                    $final_price = $x->price3;
                }else if($qty <= $x->max4){
                
                    $final_price = $x->price4;
                }else {
                
                    $final_price = $x->price5;
                }
            }



        $z = (((float)$final_price) * ((float)$qty));

        $data = [
            'id' => $pro_id,
            'name' => $x->p_name,
            'qty' => $qty,
            'price' => $final_price,
            'total' => $z,
            'created_by' => $created_by,
            'created_byId' => $x->created_byId,
            'created_byType' => $x->created_byType,
            'img' => $x->p_image,
                ];

                $this->pageModel->add_item_to_cart_db($data);

        
                $_SESSION['success'] = "Item Added to cart";
        
                redirect('go/single_product/'.$pro_id);  
            }
            else {

                $_SESSION['success'] = "Item not added to cart, Clear existing cart!";
        
                redirect('go/single_product/'.$pro_id);  

            }
        
       
    }






    public function cart_delete()
    {
        $created_by = $_SESSION['rexkod_user_id'];
        $p_id = $_POST['product_id'];
        $x = $this->pageModel->getcart_items_by_item_id($p_id); 
        $qty = $_POST['count'];
        $qty_old = $x->item_qty;
        $q = $qty_new = $qty_old-$qty;
        
        if($q==0)
        {
            $z = (((float)$x->item_price) * ((float)$q));
            $data = [
                    'cart_id'=>$x->id,
                    'created_by' => $created_by,
                ];
            $this->pageModel->delete_item_to_cart_db_if_zero($data);

        }else
        {
            $z = (((float)$x->item_price) * ((float)$q));
            $data = [
                    'cart_id'=>$x->id,
                    'id' => $p_id,
                    'name' => $x->item_name,
                    'qty' => $q,
                    'price' => $x->item_price,
                    'total' => $z,
                    'created_by' => $created_by,
                ];
            $this->pageModel->delete_item_to_cart_db($data);
        }
        // echo "Item deleted";       
    }



    public function cart()
    {
        $s = $this->pageModel->getcart_items();  

        $data = [ 's'=>$s, ];

        $this->view('go/cart',$data);
    }




    public function delete_cart_item($id)
    {
        $update_cart_1 = $this->pageModel->delete_cart_item_db($id);

        $s = $this->pageModel->getcart_items(); 

        $data = [ 's'=>$s, ];

        redirect('go/cart',$data);
    }




    public function update_cart_coupon($id)
    {
        $cart_coupon = $this->pageModel->update_cartCoupon($id);

        $s = $this->pageModel->getcart_items();
        $usr = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']); 

        $data = [ 
            's'=>$s,
            'sum' =>$this->pageModel->get_sum_cart(),
            'userinfo'=>$usr,
        ];
        if($cart_coupon){
            $_SESSION['success'] = "Coupon added successfully";
        }else {
            $_SESSION['success'] = "Coupon not added";
        }
        redirect('go/checkout', $data);
    }



    public function checkout()
    {
        $s = $this->pageModel->getcart_items();
        $usr = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']); 

        $data = [ 
            's'=>$s,
            'sum' =>$this->pageModel->get_sum_cart(),
            'userinfo'=>$usr,
        ];

        $this->view('go/checkout', $data);
    }



    public function address()
    {
        $get_user_details = $this->pageModel->get_all_userinfo();

        $data = [ 

            'get_user_details' =>$get_user_details,
        ];

        $this->view('go/address',$data);

    }


    

    public function pay_for_payment()
    {
        if(isset($_SESSION['rexkod_user_id']))
        {

                $data_checkout = (object) unserialize($_SESSION['data_checkout']);
                //unset($_SESSION['data_checkout']);

                $i_total = $this->pageModel->get_sum_cart_for_payment();

                $i_total = round($i_total);
                $_SESSION['order_id'] = "ORDS" . rand(10000,99999999);   

                $tx = $this->pageModel->get_userinfo($_SESSION['rexkod_user_id']);
                $txuser = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']);

                $data = [

                    'name' => $txuser->user_name,
                    'email' => $tx->email,
                    'phone' => $tx->phone,
                    'tprice' => $i_total,
                    'ORDERID' => $_SESSION['order_id'],
                    'add' => $txuser->user_address,
                    'zipcode' => $txuser->user_pincode,
                    'city' => $txuser->user_city,
                    'state' => $txuser->user_state,
                    'country' => $txuser->user_country,
                    
                ];

                $res = $this->pageModel->add_cart_for_paymentPayAtdel($data['name'], $data['email'], $data['phone'], $data['add'], $data['city'], $data['state'], $data['zipcode'], $data['country'], $data, $data_checkout);  

                if($res){
                $_SESSION['success'] = "order placed successfully";
                redirect('go/sucess');  
                } 


             
           
        }else
        {
            $_SESSION['success'] = "login and continue";
            redirect('go/login');
        }
    } 


    public function paymentStatus_cart()
    {

        echo $_SESSION['order_id'];

        $tx = $this->pageModel->gettempdate($_SESSION['order_id']);

        $x1 = explode("|", $tx->temp_data);
        $_SESSION['price'] = $x1[0];

        $_SESSION['name'] = $tx->name;
        $_SESSION['email'] =  $tx->email;
        $_SESSION['phone'] =   $tx->phone;
        $_SESSION['foxcart_user'] = $tx->auth_id;
        $_SESSION['user_all'] = $tx;
        $_SESSION['rexkod_user_id'] = $tx->auth_id;
        $_SESSION['user_name'] = $tx->name;
        $_SESSION['user_email'] = $tx->email;
        $_SESSION['user_phone'] = $tx->phone;
        $_SESSION['user_img'] = $tx->img;
        $_SESSION['l_name'] = "cart payment";

        if ($_SESSION['payment_status'] == 'success') 
        {
            $data = [
                'name' => $_SESSION['name'],
                'email' => $_SESSION['email'],
                'phone' => $_SESSION['phone'],
                'tprice' => $_SESSION['price'],
                'ORDERID' => $_SESSION['order_id'],
                'TXNID' => $_SESSION['razorpay_payment_id'],
                'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                'razorpay_signature' => $_SESSION['razorpay_signature'],
            ];
            $add = $x1[1];
            $city = $x1[2];
            $state = $x1[3];
            $zipcode = $x1[4];
            $country = $x1[5];

            // var_dump($data);

            $x = $this->pageModel->ulogin_using_rowId($_SESSION['rexkod_user_id']);

            $res = $this->pageModel->add_cart_for_payment($data['name'], $data['email'], $data['phone'], $add, $city, $state, $zipcode, $country,$data);

            $_SESSION['success'] = "Order Placed Successfully";
            redirect('go/success');
        }
        else
        {
            $_SESSION['success'] = "payment failed order not placed";
           redirect('go/index');
        }
    }



    public function login()
    {
        $this->view('go/login');
    }




    public function cancel_order($id)
    {
        $this->pageModel->order_update($id,99);
        $order = $this->pageModel->getOrderById($id);
        if($order->order_type=="0"){
            $this->pageModel->wallet_cancel_update($order->booking_cost);
        }
        redirect('go/orders'); 
    }


    public function cancel_truck_order($id)
    {
        $this->pageModel->order_update_truck($id,3);
        $order = $this->pageModel->getOrderById_truck($id);
        $this->pageModel->wallet_cancel_update($order->cost);
        redirect('go/truck_orders'); 
    }




    public function user_login()
    {
        $phno = $_POST['user_phone'];

        $email_verify_phone = $this->pageModel->email_verify_phone($phno);
        
        if(empty($email_verify_phone))
        {
            $_SESSION['success'] = "Phone number is not registered!";
            $this->view('go/login');
        }
        else
        {
                $user = $this->pageModel->ulogin_otp($phno);
                if($user->type=="delivery")
                {
                    $_SESSION['rexkod_vendor_id'] = $user->id;
                    $_SESSION['rexkod_vendor_name'] = $user->name;
                    $_SESSION['rexkod_vendor_email'] = $user->email;
                    $_SESSION['rexkod_vendor_phone'] = $user->phone;
                    $_SESSION['rexkod_login_type'] = $user->type;
                    redirect('drivers/index');
                }

                elseif($user->type=="user")
                {
                    $_SESSION['rexkod_user_id'] = $user->id;
                    $_SESSION['rexkod_user_name'] = $user->name;
                    $_SESSION['rexkod_user_email'] = $user->email;
                    $_SESSION['rexkod_user_phone'] = $user->phone;
                    $_SESSION['rexkod_login_type'] = $user->type;
                    redirect('go/index');
                    
                } else {
                    $_SESSION['success'] = "You don't have access";
                    $this->view('go/login');
                }
            
        }
         
    }


    

    public function search()
    {

        $res = $this->pageModel->get_productsBySearch($_POST['search_input']);



        $data = [ 
            'res'=>$res,
            'search_input' =>$_POST['search_input'],
        ];
       

        $this->view('go/search',$data);
    }

    public function orders()
    {
        $orders = $this->pageModel->get_all_bookings();
        $wallet = $this->pageModel->getWallet();
        $data = [
                    'all_orders' => $orders,
                    'wallet' => $wallet
                ];
        $this->view('go/orders',$data);
    }


    public function truck_orders()
    {
        $orders = $this->pageModel->get_all_truck_orders();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('go/truck_orders',$data);
    }


    public function hyperlocal_orders()
    {
        $orders = $this->pageModel->get_all_hyperlocal_orders();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('go/hyperlocal_orders',$data);
    }



    public function order_detail($id)
    {
        
        $get_order_detail = $this->pageModel->get_single_order($id);

        $data = [ 

            'get_order_detail' =>$get_order_detail,
        ];

        $this->view('go/order_detail',$data);
    }




    public function register()
    {
        
        $this->view('go/register');
         
    }

    public function user_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $name = $_POST['user_name'];
            $phno = $_POST['user_phone'];
            $pincode = $_POST['user_pincode'];

            
 
            if ($this->pageModel->findUserByphno($phno)) 
                {
                  $_SESSION['success'] = 'Phone number already taken';
                  redirect('go/register');
                } 
                else 
                {

                    if ($this->pageModel->add_user_otp($name,$phno,$pincode)) 
                    {
                        
                            $user = $this->pageModel->ulogin_otp($phno);
                        
                            $_SESSION['rexkod_user_id'] = $user->id;
                            $_SESSION['rexkod_user_name'] = $user->name;
                            $_SESSION['rexkod_user_email'] = $user->email;
                            $_SESSION['rexkod_user_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            
                            redirect('go/index');

                        $_SESSION['success'] = "Registered Successfully..! ";
                        redirect('go/index');
                    }
                    else
                    {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('go/register');
                    }
                }
        } 
        else 
        {
          redirect('go/register');
        }
    }




    public function profile()
    {
        $get_user_details = $this->pageModel->get_all_userinfo();

        $data = [ 

            'get_user_details' =>$get_user_details,
        ];

        $this->view('go/profile',$data);

    }



    public function success()
    {
        $this->view('go/success');
    }



    public function add_money($amount,$txnid)
    {
      
        $add_money = $this->pageModel->add_money($amount,$txnid);
        $_SESSION['success'] = "Money added successfully";
        redirect('go/wallet');
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

		$this->view('go/rezorpay',$data);
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
			redirect('go/add_money/'.$_SESSION['payable_amount'].'/'.$_SESSION['razorpay_order_id']);
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







}




                            
                            
