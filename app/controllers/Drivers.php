<?php
class Drivers extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');  
        $this->adminModel = $this->model('Admins');  
     
    }

    public function index() 
	{
      if($_SESSION['rexkod_driver_id']){
	   $this->view('drivers/index');
      } else {
        redirect('drivers/login');
      }
        
	}


    public function landing()
    {
        
            $this->view('drivers/landing');
    }

    public function logout()
    {
       session_destroy();
       redirect('drivers/login');
    }


    public function home()
    {               
        $this->view('drivers/home');
    }

    public function product_details()
    {               
        $this->view('drivers/product_details');
    }

    public function new_order()
    {               
        $this->view('drivers/new_order');
    }

    public function new_order2()
    {               
        $this->view('drivers/new_order2');
    }


    public function order($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        
        $data = [
                    'order' => $get_order,
                ];
                
       $this->view('drivers/order',$data); 
    } 

    public function invoice()
    {               
        $this->view('drivers/invoice');
    }

    public function payments()
    {               
        $this->view('drivers/payments');
    }


    public function users()
    {               
        $this->view('drivers/users');
    }

    public function reviews()
    {               
        $this->view('drivers/reviews');
    }

    public function settings()
    {               
        $vendor_detail = $this->pageModel->getVendorById($_SESSION['rexkod_vendor_id']); 
        $user_detail = $this->pageModel->get_userinfo($_SESSION['rexkod_vendor_id']); 
        
        $data = [
                    'vendor' => $vendor_detail,
                    'user' => $user_detail,
                ];

        $this->view('drivers/settings', $data);
    }

    public function support()
    {               
        $this->view('drivers/support');
    }

    public function menu()
    {
        $all_items = $this->pageModel->get_all_vendor_items($_SESSION['rexkod_vendor_id']); 
        
        $data = [
                    'all_items' => $all_items,
                ];

        $this->view('drivers/menu',$data);
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
                            redirect('drivers/profile'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Profile Not Added';
                            $this->view('drivers/add_profile'); 
                        }
             }
            else 
            {
                $this->view('drivers/add_profile',$data); 
            }
        }



    public function about()
    {               
        $this->view('drivers/about');
    }

    public function services()
    {               
        $this->view('drivers/services');
    }

    public function contact()
    {               
        $this->view('drivers/contact');
    }


    public function vendors()
    {         
        $get_all_vendors = $this->pageModel->get_all_vendors1();

        $data = [

            'get_all_vendors' => $get_all_vendors,
        ];

        $this->view('drivers/vendors', $data);
    }





    public function category()
    {

        $get_all_category = $this->adminModel->get_all_category();

        $data = [
                    'all_category' => $get_all_category,
        ];

        $this->view('drivers/category',$data);

    }



    public function subcategory()
    {

        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
                    'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('drivers/subcategory',$data);

    }

    public function add_food()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
                    'all_subcategory' => $get_all_subcategory,
        ];
        

        $this->view('drivers/add_food', $data);
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
            redirect('drivers/menu');
        }else
        {
             $_SESSION['success'] = "Food not added";
            redirect('drivers/meny');
        }
    }


    

    public function add_category()
    {
        $this->view('drivers/add_category');
    }


    public function add_subcategory()
    {
        $get_all_category = $this->adminModel->get_all_category();

        $data = [
            'all_category' => $get_all_category,
        ];

        $this->view('drivers/add_subcategory', $data);
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
        redirect('drivers/category'); 
    }



    public function create_booking()
    {

        $from_address = $_POST['from_address'];
        $from_city = $_POST['from_city'];
        $from_state = $_POST['from_state'];
        $from_pincode = $_POST['from_pincode'];
        $to_name = $_POST['to_name'];
        $to_phone = $_POST['to_phone'];
        $to_address = $_POST['to_address'];
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
        
        $to_id = NULL;
        $get_to_id = $this->pageModel->email_verify_phone($to_phone);
        if($get_to_id){
            $to_id = $get_to_id->id;
        }
       
        $all_ads = $this->pageModel->get_all_ads();
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
        
        if(isset($_POST['need_package'])){
            $need_package = 1;
        }else {
            $need_package = 0;
        }

        if($from_ad_id && $to_ad_id){
        $this->pageModel->create_booking($from_address,$from_city,$from_state ,$from_pincode,$to_id,$to_name,$to_phone,$to_address,$to_city,$to_state,$to_pincode,$item_name,$item_qty ,$item_cost ,$item_order_id,$item_sku,$item_weight,$order_type,$item_length,$item_breadth,$item_height,$need_package,$from_ad_id,$to_ad_id);

        $_SESSION['success'] = "Bookings created Successfully";
        redirect('drivers/orders'); 
        }
        else {
        $_SESSION['success'] = "Non Servicable Pincodes";
        redirect('drivers/new_order');
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
        redirect('drivers/subcategory'); 
        } else {
            $_SESSION['success'] = "Subcategory Not Created";
            redirect('drivers/subcategory'); 
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

        $this->view('drivers/products_forVendor', $data);
    }



    
    public function products()
    {    
        $get_all_category = $this->pageModel->get_all_category();

        $products = $this->pageModel->get_all_products();

        $data = [
                    'all_pro' => $products,
                    'all_category' => $get_all_category,
                ];

        $this->view('drivers/products', $data);
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

        $this->view('drivers/single_product', $data);
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
        
                redirect('drivers/single_product/'.$pro_id);  
            }
            else {

                $_SESSION['success'] = "Item not added to cart, Clear existing cart!";
        
                redirect('drivers/single_product/'.$pro_id);  

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

        $this->view('drivers/cart',$data);
    }




    public function delete_cart_item($id)
    {
        $update_cart_1 = $this->pageModel->delete_cart_item_db($id);

        $s = $this->pageModel->getcart_items(); 

        $data = [ 's'=>$s, ];

        redirect('drivers/cart',$data);
    }



    public function order_update($id,$status)
    {
        $this->pageModel->order_update($id,$status);

        $_SESSION['success'] = "Status updated Successfully";
        if($status<=4){
            redirect('drivers/pickup_orders'); 
        }else{
            redirect('drivers/delivery_orders'); 
        }
        
    }


    public function hyperlocal_update($id,$status)
    {
        $this->pageModel->hyperlocal_update($id,$status);

        redirect('drivers/hyperlocal_orders'); 
        
        
    }


    


    public function order_update_pickup($id)
    {
        $speeder_id = $_POST['barcode'];
        $this->pageModel->order_update_pickup($id,$speeder_id);
 
        $_SESSION['success'] = "Status updated Successfully";
        if($status<=2){
            redirect('drivers/pickup_orders'); 
        }else{
            redirect('drivers/delivery_orders'); 
        }
        
    }


    public function accept_order($id)
    {
        $this->pageModel->accept_hyperlocal_order($id);
        redirect('drivers/hyperlocal_orders'); 
        
        
    }


    public function update_discrepancy()
    {
        $item_weight = $_POST['item_weight'];
        $item_length = $_POST['item_length'];
        $item_breadth = $_POST['item_breadth'];
        $item_height = $_POST['item_height'];
        $order_id = $_POST['id'];

        $volumetric_weight = (($item_length * $item_breadth * $item_height)/5000)*1000;
        if($item_weight >= $volumetric_weight){
            $order_weight = $item_weight;
        }else {
            $order_weight = $volumetric_weight;
        }


        $order = $this->pageModel->getOrderById($order_id);
        if($order->weight_discrepancy){
            $wallet = $this->pageModel->getWalletById($order->from_id);
            $payable = $order->weight_payable;
            $wallet_balance = $wallet->balance_amount;
            $cost = $order->booking_cost;
            $new_cost = $cost + $payable;
            if($order->order_type="0"){
               $balance = $wallet_balance - $payable;
            } else  if($order->order_type="10"){
               $balance = $wallet_balance - $new_cost;
            }

            $this->pageModel->wallet_discrepacy_update($wallet->wallet_id,$balance);
            $this->pageModel->update_discrepancy($order_id,$item_weight,$item_length,$item_breadth,$item_height,$volumetric_weight,$order_weight,$new_cost,0,0);
        }
       
    }



    public function not_delivered($id)
    {
        $delivery_remark = $_POST['delivery_remark'];
        $this->pageModel->not_delivered($id,$delivery_remark);
        $this->pageModel->order_update($id,14);
        $_SESSION['success'] = "Status updated Successfully";
        redirect('drivers/delivery_orders'); 
        
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
        redirect('drivers/checkout', $data);
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

        $this->view('drivers/checkout', $data);
    }



    public function address()
    {
        $get_user_details = $this->pageModel->get_all_userinfo();

        $data = [ 

            'get_user_details' =>$get_user_details,
        ];

        $this->view('drivers/address',$data);

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
                redirect('drivers/sucess');  
                } 


             
           
        }else
        {
            $_SESSION['success'] = "login and continue";
            redirect('drivers/login');
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
            redirect('drivers/success');
        }
        else
        {
            $_SESSION['success'] = "payment failed order not placed";
           redirect('drivers/index');
        }
    }



    public function login()
    {
        $this->view('drivers/login');
    }






    public function user_login()
    {
       
        if(!isset($_POST['username']))
        {
            
            $this->view('drivers/login');
        }
        else
        { 
            
            if(!isset($_POST['password']))
            {
                $_SESSION['success'] = "Enter Password";
                $this->view('drivers/login');
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
                    $this->view('drivers/login');
                }
                else
                {
                    if(!empty($check_email))
                    {
                        $user_results  = $check_email;

                        $password_res = $check_email->password;
                    }
                    elseif(!empty($email_verify_phone))
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
                       $this->view('drivers/login');
                       
                    }else
                    {
                        if($user->type=="delivery")
                        {
                            $_SESSION['rexkod_driver_id'] = $user->id;
                            $_SESSION['rexkod_driver_name'] = $user->name;
                            $_SESSION['rexkod_driver_email'] = $user->email;
                            $_SESSION['rexkod_driver_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('drivers/index');
                        }

                         else {
                            $_SESSION['success'] = "You don't have access";
                            $this->view('drivers/login');
                        }
                        
                    }
                    
                }
               
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
       

        $this->view('drivers/search',$data);
    }

    public function pickup_orders()
    {
        $orders = $this->pageModel->get_all_pickup_orders();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('drivers/pickup_orders',$data);
    }


    public function hyperlocal_orders()
    {
        $delivery = $this->pageModel->get_delivery($_SESSION['rexkod_driver_id']);
        $new_orders = count($this->pageModel->get_hyperlocal_orders_driver_new($delivery->delivery_ad_id));
        
        $orders = $this->pageModel->get_hyperlocal_orders_driver();
        $data = [
                    'all_orders' => $orders,
                    'new_orders' => $new_orders,
                ];
        $this->view('drivers/hyperlocal_orders',$data);
    }

    public function hyperlocal_new()
    {
        $delivery = $this->pageModel->get_delivery($_SESSION['rexkod_driver_id']);
        $orders = $this->pageModel->get_hyperlocal_orders_driver_new($delivery->delivery_ad_id);
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('drivers/hyperlocal_new',$data);
    }

    public function delivery_orders()
    {
        $orders = $this->pageModel->get_all_delivery_orders();
        $data = [
                    'all_orders' => $orders,
                ];
        $this->view('drivers/delivery_orders',$data);
    }



    public function order_detail($id)
    {
        
        $get_order_detail = $this->pageModel->get_single_order($id);

        $data = [ 

            'get_order_detail' =>$get_order_detail,
        ];

        $this->view('drivers/order_detail',$data);
    }




    public function register()
    {
        
        $this->view('drivers/register');
         
    }

    public function user_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $name = $_POST['user_name'];
            $email = $_POST['user_email'];
            $phno = $_POST['user_phone'];
            $pass = $_POST['user_password'];

            
 
            if (empty($email)) 
            {
                $_SESSION['success'] = 'Please enter email';
                redirect('drivers/register');
            } else if ($this->pageModel->findUserByemail($email)) 
            {
              $_SESSION['success'] = 'Email already taken';
              redirect('drivers/register');
            } 
            else 
            {


                if ($this->pageModel->findUserByphno($phno)) 
                {
                  $_SESSION['success'] = 'Phone number already taken';
                  redirect('drivers/register');
                } 
                else 
                {

                    $pass = password_hash($pass, PASSWORD_DEFAULT);

                    if ($this->pageModel->add_user($name, $email, $phno, $pass)) 
                    {
                        
                            $user = $this->pageModel->ulogin($email, $_POST['user_password']);
                        
                            $_SESSION['rexkod_user_id'] = $user->id;
                            $_SESSION['rexkod_user_name'] = $user->name;
                            $_SESSION['rexkod_user_email'] = $user->email;
                            $_SESSION['rexkod_user_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            
                            redirect('drivers/index');

                        $_SESSION['success'] = "Registered Successfully..! ";
                        redirect('drivers/index');
                    }
                    else
                    {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('drivers/register');
                    }
                }
            }
        } 
        else 
        {
          redirect('drivers/register');
        }
    }




    public function profile()
    {
        $get_user_details = $this->pageModel->get_all_userinfo();
        $data = [ 

            'get_user_details' =>$get_user_details,
        ];
        $this->view('drivers/profile',$data);

    }



    public function success()
    {
        $this->view('drivers/success');
    }




    public function check_discrepancy()
    {  
        $order_id = $_POST['id'];
        $order = $this->pageModel->getOrderById($order_id);
        $item_weight = $_POST['item_weight'];
        $item_length = $_POST['item_length'];
        $item_breadth = $_POST['item_breadth'];
        $item_height = $_POST['item_height'];

        $volumetric_weight = (($item_length * $item_breadth * $item_height)/5000)*1000;
        if($item_weight >= $volumetric_weight){
            $weight = $item_weight;
        }else {
            $weight = $volumetric_weight;
        }

        $cost = $order->booking_cost;
        $order_type = $order->order_type;


        if($weight <= $order->order_weight && $order_type == "0"){
            $this->pageModel->weight_discrepancy($order_id,0,0);
           echo "No Weight Discrepancy";
        }else if($weight <= $order->order_weight && $order_type == "10"){
            $this->pageModel->weight_discrepancy($order_id,0,0);
           echo "No Weight Discrepancy<br> Collect at Pickup: ₹".$cost;
        }else if($weight > $order->order_weight && $order_type == "0"){
            $weight_diff = $weight - $order->order_weight;
            if($weight_diff<=500){
                $weight_count =1;
            }else  if($weight_diff<=1000){
                $weight_count = 2;
            }else {
                $weight_count = $weight/500;
            }
            round($weight_count, 0);
            $payable = 0;
            for($i=1;$i<=$weight_count;$i++){
                $payable = $payable + 40; 
            }
        
            $this->pageModel->weight_discrepancy($order_id,$weight_diff,$payable);

            echo "<span style='color:red;'>Weight Discrepancy Found</span><br>Extra ". $weight_diff ."gms - Payable ₹".$payable;

        } else if($weight > $order->order_weight && $order_type == "10"){
            $weight_diff = $weight - $order->order_weight;
            if($weight_diff<=500){
                $weight_count =1;
            }else  if($weight_diff<=1000){
                $weight_count = 2;
            }else {
                $weight_count = $weight/500;
            }
            round($weight_count, 0);
            $payable = 0;
            for($i=1;$i<=$weight_count;$i++){
                $payable = $payable + 40; 
            }
            $total_cost = $cost + $payable;
            $this->pageModel->weight_discrepancy($order_id,$weight_diff,$payable);

            echo "<span style='color:red;'>Weight Discrepancy Found</span><br>Extra ". $weight_diff ."gms - (₹".$payable.")<br>Total: ₹".$cost." + ₹".$payable."= ₹".$total_cost."<br>Collect at Pickup: ₹".$total_cost;
        }

  }


}

                            
                            
