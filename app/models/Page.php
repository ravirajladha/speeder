<?php
class Page
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }




    public function get_all_products() 
    {
        $this->db->query('SELECT * FROM products');
        $result = $this->db->resultSet();
        return $result;
    }




    public function new_wallet_user($user_id) 
    {
        $this->db->query('INSERT INTO wallets (user_id,balance_amount) VALUES(:userid,:balance)');
        $this->db->bind(':userid', $user_id);
        $this->db->bind(':balance', 0);
    
        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function new_wallet_vendor($user_id) 
    {
        $this->db->query('INSERT INTO vendor_wallets (user_id,balance_amount,status) VALUES(:userid,:balance,:status)');
        $this->db->bind(':userid', $user_id);
        $this->db->bind(':balance', 0);
        $this->db->bind(':status', 1);
        $this->db->execute();
    }



    


    public function update_ad($id,$name,$email,$phone,$area_type,$business_name,$gst,$address,$city,$state,$pincode,$pincodes)
    {
        $this->db->query('UPDATE auth set name = :name, email = :email, phone = :phone WHERE id = :id');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':id', $id);

        if($this->db->execute())
        {
            $this->db->query('UPDATE ad set ad_pincodes = :pincodes, area_type = :area_type,ad_business_name = :business_name, ad_gst = :gst, ad_address = :address, ad_city = :city,ad_state = :state, ad_pincode = :pincode WHERE ad_id = :id');
    
            $this->db->bind(':pincodes', $pincodes);
            $this->db->bind(':area_type', $area_type);
            $this->db->bind(':business_name', $business_name);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            $this->db->bind(':id', $id);
            
            if($this->db->execute())
            { return true; }
        }
        else
        {
          return false;
        }
    }



    public function update_company($id,$name,$email,$phone,$business_name,$gst,$address,$city,$state,$pincode)
    {
        $this->db->query('UPDATE auth set name = :name, email = :email, phone = :phone WHERE id = :id');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':id', $id);

        if($this->db->execute())
        {
            $this->db->query('UPDATE company set company_business_name = :business_name, company_gst = :gst, company_address = :address, company_city = :city,company_state = :state, company_pincode = :pincode WHERE company_id = :id');
    
            $this->db->bind(':business_name', $business_name);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            $this->db->bind(':id', $id);
            
            if($this->db->execute())
            { return true; }
        }
        else
        {
          return false;
        }
    }



    public function update_md($id,$name,$email,$phone,$pass,$business_name,$gst,$address,$city,$state,$pincode,$ads)
    {
        $this->db->query('UPDATE auth set name = :name, email = :email, phone = :phone WHERE id = :id');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':id', $id);

        if($this->db->execute())
        {
            $this->db->query('UPDATE md set md_business_name = :business_name, md_gst = :gst, md_address = :address, md_city = :city, md_state = :state, md_pincode = :pincode, ads = :ads WHERE md_id = :id');
    
            $this->db->bind('ads', $ads);
            $this->db->bind(':id', $id);
            $this->db->bind(':business_name', $business_name);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            
            if($this->db->execute())
            { return true; }
        }
        else
        {
          return false;
        }
    }




    public function update_rd($id,$name,$email,$phone,$pass,$business_name,$gst,$address,$city,$state,$pincode,$mds)
    {
        $this->db->query('UPDATE auth set name = :name, email = :email, phone = :phone WHERE id = :id');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':id', $id);

        if($this->db->execute())
        {
            $this->db->query('UPDATE rd set rd_business_name = :business_name, rd_gst = :gst, rd_address = :address, rd_city = :city, rd_state = :state, rd_pincode = :pincode, mds = :mds WHERE rd_id = :id');
    
            $this->db->bind('mds', $mds);
            $this->db->bind(':id', $id);
            $this->db->bind(':business_name', $business_name);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            
            if($this->db->execute())
            { return true; }
        }
        else
        {
          return false;
        }
    }




    public function get_base_price($id) 
    {
        $this->db->query('SELECT base_amount FROM base_prices WHERE price_id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }


    public function get_banner() 
    {
        $this->db->query('SELECT * FROM banners WHERE id = :id');
        $this->db->bind(':id', 1);
        $result = $this->db->single();
        return $result;
    }


    public function delete_product($id)
    {
        $this->db->query("DELETE FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_cat_products($id) {
        $this->db->query('SELECT * FROM products WHERE p_cat = :id');
         $this->db->bind(':id', $id);
        $result = $this->db->resultSet();
        return $result;
    }


    public function get_single_order($id) {
        $this->db->query('SELECT * FROM product_order_list WHERE p_id = :id');
         $this->db->bind(':id', $id);
        $result = $this->db->resultSet();
        return $result;
    }


      public function get_single_products($id) {
        $this->db->query('SELECT * FROM products WHERE id = :id');
         $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    
    public function email_verify($email) 
    {
        
        $this->db->query('SELECT * FROM auth WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }

    public function email_verify_phone($phone) 
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phone');

        $this->db->bind(':phone', $phone);

        $row = $this->db->single();
        
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }


    public function check_phone($phone) 
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phone');

        $this->db->bind(':phone', $phone);

        $row = $this->db->single();
        
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }


    public function vendor_email_verify($email) 
    {
        $this->db->query('SELECT * FROM vendors WHERE vendor_email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }

    public function check_pass($opass)
    {
        $this->db->query('SELECT * from auth where id = :id');
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        $results = $this->db->single();
        if(password_verify($opass, $results->password))
        {
        return true;
        }
        else
        {
        return false;
        }
    }
    public function update_password($npass, $email)
    {
        $npass = password_hash($npass, PASSWORD_DEFAULT);
        $this->db->query('UPDATE auth set password = :npass, email = :email WHERE id = :id');

        // Bind values
        $this->db->bind(':npass', $npass);
        $this->db->bind(':email', $email);
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }




    public function updatePOD($id,$pod_number,$pod_transport_type,$pod_vehicle_name,$pod_vehicle_number,$pod_booking_time,$pod_contact_number,$pod_slip)
    {
        $this->db->query('UPDATE bookings set pod_number = :pnumber, pod_transport_type = :pttype, pod_vehicle_name = :pvname, pod_vehicle_number = :pvnumber, pod_booking_time = :pbtime, pod_contact_number = :pcnumber, pod_slip = :pod_slip  WHERE booking_id = :id');

        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':pnumber', $pod_number);
        $this->db->bind(':pttype', $pod_transport_type);
        $this->db->bind(':pvname', $pod_vehicle_name);
        $this->db->bind(':pvnumber', $pod_vehicle_number);
        $this->db->bind(':pbtime', $pod_booking_time);
        $this->db->bind(':pcnumber', $pod_contact_number);
        $this->db->bind(':pod_slip', $pod_slip);

        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }


    public function findUserByphno($phno)
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phno');
        // Bind values      
        $this->db->bind(':phno', $phno);
        $row = $this->db->single();
        // Check row 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByPhone($phone)
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phno');
        // Bind values      
        $this->db->bind(':phno', $phone);
        return $this->db->single();
    }

    public function findUserByemail($email)
    {
        $this->db->query('SELECT * FROM auth WHERE email = :email');
        // Bind values      
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        // Check row 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findVendorByPhone($phone)
    {
        $this->db->query('SELECT * FROM vendors WHERE vendor_phone = :phone');
        // Bind values      
        $this->db->bind(':phone', $phone);
        $row = $this->db->single();
        // Check row 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function add_user($name, $email, $phno, $pass)
    {
        $this->db->query('INSERT INTO auth (name,type,email,phone,password,created_at) VALUES(:name,:type, :email, :phno, :pass, :createdat)');
        // Bind values
        
        $this->db->bind(':name', $name);
        $this->db->bind(':type', 'user');
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':createdat', date('Y-m-d H:i:s'));
        // Execute

        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phno);
            $cur_user = $this->db->single();

            $this->db->query('INSERT INTO wallets (user_id,balance_amount) VALUES(:userid,:balance)');
            $this->db->bind(':userid', $cur_user->id);
            $this->db->bind(':balance', 0);
   
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }


    public function add_user_otp($name, $phno, $pincode)
    {
        $this->db->query('INSERT INTO auth (name,type,phone,pincode,created_at) VALUES(:name,:type,:phno,:pincode,:createdat)');
        // Bind values
        
        $this->db->bind(':name', $name);
        $this->db->bind(':type', 'user');
        $this->db->bind(':phno', $phno);
        $this->db->bind(':pincode', $pincode);
        $this->db->bind(':createdat', date('Y-m-d H:i:s'));
        // Execute

        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phno);
            $cur_user = $this->db->single();

            $this->db->query('INSERT INTO wallets (user_id,balance_amount) VALUES(:userid,:balance)');
            $this->db->bind(':userid', $cur_user->id);
            $this->db->bind(':balance', 0);
   
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }


    public function add_user_ent($name, $phno, $gst)
    {
        $this->db->query('INSERT INTO auth (name,type,phone,sub_type,created_at,gst) VALUES(:name,:type,:phno,:sub_type,:createdat,:gst)');
        // Bind values
        
        $this->db->bind(':name', $name);
        $this->db->bind(':type', 'user');
        $this->db->bind(':phno', $phno);
        $this->db->bind(':sub_type', 1);
        $this->db->bind(':gst', $gst);
        $this->db->bind(':createdat', date('Y-m-d H:i:s'));
        // Execute

        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phno);
            $cur_user = $this->db->single();

            $this->db->query('INSERT INTO wallets (user_id,balance_amount) VALUES(:userid,:balance)');
            $this->db->bind(':userid', $cur_user->id);
            $this->db->bind(':balance', 0);
   
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }




    public function wallet_cancel_update($amount)
    {
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)+$amount;
        
        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        // Bind values
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        // Execute

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }


    public function wallet_discrepacy_update($id,$balance)
    {
        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE wallet_id = :id');
        // Bind values
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $id);
        // Execute

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }




    public function update_trucks_md($id,$trucks)
    {
        $this->db->query('UPDATE md SET trucks = :trucks WHERE md_id = :id');
        // Bind values
        
        $this->db->bind(':trucks', $trucks);
        $this->db->bind(':id', $id);
        // Execute

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }


    public function update_discrepancy($id,$item_weight,$item_length,$item_breadth,$item_height,$volumetric_weight,$order_weight,$booking_cost,$weight_discrepancy,$weight_payable)
    {
        $this->db->query('UPDATE bookings SET item_weight = :item_weight,item_length = :item_length,item_breadth = :item_breadth,item_height = :item_height,volumetric_weight = :volumetric_weight,order_weight = :order_weight,booking_cost = :booking_cost,weight_discrepancy = :weight_discrepancy,weight_payable = :weight_payable WHERE booking_id = :id');
        // Bind values
        
        $this->db->bind(':id', $id);
        $this->db->bind(':item_weight', $item_weight);
        $this->db->bind(':item_length', $item_length);
        $this->db->bind(':item_breadth', $item_breadth);
        $this->db->bind(':item_height', $item_height);
        $this->db->bind(':volumetric_weight', $volumetric_weight);
        $this->db->bind(':order_weight', $order_weight);
        $this->db->bind(':booking_cost', $booking_cost);
        $this->db->bind(':weight_discrepancy', $weight_discrepancy);
        $this->db->bind(':weight_payable', $weight_payable);
        
        // Execute

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }



            

    public function add_money($amount, $txnid)
    {
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)+$amount;
        
        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        // Bind values
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        // Execute

        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount) VALUES(:userid, :txnid, :amount)');

            $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }



    public function add_money_vendor($amount, $txnid)
    {
        $wallet = $this->getWallet_vendor();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)+$amount;
        
        $this->db->query('UPDATE vendor_wallets SET balance_amount = :balance WHERE user_id = :id');
        // Bind values
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
        // Execute

        if ($this->db->execute()) {

            $this->db->query('INSERT INTO vendor_transactions (user_id, type, transaction_id, amount) VALUES(:userid, :type, :txnid, :amount)');

            $this->db->bind(':userid', $_SESSION['rexkod_vendor_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);
            $this->db->bind(':type', 1);
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }





    public function add_money_admin_customer($id, $amount, $txnid)
    {
        $wallet = $this->getWalletById($id);
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)+$amount;
        
        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        // Bind values
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $id);
        // Execute

        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount) VALUES(:userid, :txnid, :amount)');

            $this->db->bind(':userid', $id);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }

    public function add_money_admin_vendor($id, $amount, $type)
    {
        $wallet = $this->getWalletById_vendor($id);
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)+$amount;
        
        $this->db->query('UPDATE vendor_wallets SET balance_amount = :balance WHERE user_id = :id');
        // Bind values
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $id);
        // Execute

        if ($this->db->execute()) {

            if($amount < 0){ $amount = $amount * -1; } 

            $this->db->query('INSERT INTO vendor_transactions (user_id, type, amount) VALUES(:userid, :type, :amount)');

            $this->db->bind(':userid', $id);
            $this->db->bind(':type', $type);
            $this->db->bind(':amount', $amount);
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }



    public function add_vendor($name, $img, $email, $phone, $pass, $address, $latlong, $gst, $fssai, $start_time, $end_time, $bank_number, $bank_ifsc)
    {

        $this->db->query('INSERT INTO auth (type, email, phone, password, status, created_at) VALUES(:type,:email, :phone, :pass, :status, :created_at)');
        // Bind values
        $this->db->bind(':type', 'vendor');
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':status', '0');
        $this->db->bind(':created_at', date('Y-m-d H:i:s')); 

        if ($this->db->execute()) {   

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phone);
            $cur_user = $this->db->single();
                 
            $this->db->query('INSERT INTO vendors (vendor_id,vendor_name, vendor_img, vendor_address, vendor_latlong,vendor_gst, vendor_fssai, vendor_start_time, vendor_end_time, vendor_bank_account, vendor_bank_ifsc) VALUES(:vendorid, :name, :img, :address, :latlong, :gst, :fssai, :start_time, :end_time, :bank_number, :bank_ifsc)');
            // Bind values
            $this->db->bind(':vendorid', $cur_user->id);
            $this->db->bind(':name', $name);
            $this->db->bind(':img', $img);
            $this->db->bind(':address', $address);
            $this->db->bind(':latlong', $latlong);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':fssai', $fssai);
            $this->db->bind(':start_time', $start_time);
            $this->db->bind(':end_time', $end_time);
            $this->db->bind(':bank_number', $bank_number);
            $this->db->bind(':bank_ifsc', $bank_ifsc);
            // Execute
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }}

    }



    public function create_ad($name,$email,$phone,$area_type,$business_name,$gst,$address,$city,$state,$pincode,$pincodes,$pass)
    {

        $this->db->query('INSERT INTO auth (type, name, email, phone, password, status, created_at) VALUES(:type, :name, :email, :phone, :pass, :status, :created_at)');
        // Bind values
        $this->db->bind(':type', 'ad');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':status', '0');
        $this->db->bind(':created_at', date('Y-m-d H:i:s')); 

        if ($this->db->execute()) {   

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phone);
            $cur_user = $this->db->single();
                 
            $this->db->query('INSERT INTO ad (ad_id, ad_pincodes, area_type, ad_business_name, ad_gst, ad_address,ad_city,ad_state,ad_pincode) VALUES(:adid, :adpincodes, :area_type, :business_name, :gst, :address, :city, :state, :pincode )');
            // Bind values
            $this->db->bind(':adid', $cur_user->id);
            $this->db->bind(':adpincodes', $pincodes);
            $this->db->bind(':area_type', $area_type);
            $this->db->bind(':business_name', $business_name);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            // Execute

            
    
            if ($this->db->execute()) {
                $this->new_wallet_vendor($cur_user->id);
                return true;
            } else {
                return false;
            }}

    }


    public function create_company($name,$email,$phone,$business_name,$gst,$address,$city,$state,$pincode,$pass)
    {

        $this->db->query('INSERT INTO auth (type, name, email, phone, password, status, created_at) VALUES(:type, :name, :email, :phone, :pass, :status, :created_at)');
        // Bind values
        $this->db->bind(':type', 'company');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':status', '0');
        $this->db->bind(':created_at', date('Y-m-d H:i:s')); 

        if ($this->db->execute()) {   

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phone);
            $cur_user = $this->db->single();
                 
            $this->db->query('INSERT INTO company (company_id, company_business_name, company_gst, company_address,company_city,company_state,company_pincode) VALUES(:adid, :business_name, :gst, :address, :city, :state, :pincode )');
            // Bind values
            $this->db->bind(':adid', $cur_user->id);
            $this->db->bind(':business_name', $business_name);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            // Execute

            
    
            if ($this->db->execute()) {
                $this->new_wallet_vendor($cur_user->id);
                return true;
            } else {
                return false;
            }}

    }



    public function create_md($name,$email,$phone,$pass,$business_name,$gst,$address,$city,$state,$pincode,$ads)
    {

        $this->db->query('INSERT INTO auth (type, name, email, phone, password, status, created_at) VALUES(:type, :name, :email, :phone, :pass, :status, :created_at)');
        // Bind values
        $this->db->bind(':type', 'md');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':status', '0');
        $this->db->bind(':created_at', date('Y-m-d H:i:s')); 

        if ($this->db->execute()) {   

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phone);
            $cur_user = $this->db->single();
                 
            $this->db->query('INSERT INTO md (md_id, md_business_name,md_gst,md_address,md_city,md_state,md_pincode,ads) VALUES(:mdid, :business_name, :gst, :address, :city, :state, :pincode, :ads)');
            // Bind values
            $this->db->bind(':mdid', $cur_user->id);
            $this->db->bind(':business_name', $business_name);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            $this->db->bind(':ads', $ads);
            // Execute
            

            if ($this->db->execute()) {
                $this->new_wallet_vendor($cur_user->id);
                return true;
            } else {
                return false;
            }}

    }




    public function create_rd($name,$email,$phone,$pass,$business_name,$gst,$address,$city,$state,$pincode,$mds)
    {

        $this->db->query('INSERT INTO auth (type, name, email, phone, password, status, created_at) VALUES(:type, :name, :email, :phone, :pass, :status, :created_at)');
        // Bind values
        $this->db->bind(':type', 'rd');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':status', '0');
        $this->db->bind(':created_at', date('Y-m-d H:i:s')); 

        if ($this->db->execute()) {   

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phone);
            $cur_user = $this->db->single();
                 
            $this->db->query('INSERT INTO rd (rd_id, rd_business_name,rd_gst,rd_address,rd_city,rd_state,rd_pincode,mds) VALUES(:rdid, :business_name, :gst, :address, :city, :state, :pincode, :mds)');
            // Bind values
            $this->db->bind(':rdid', $cur_user->id);
            $this->db->bind(':business_name', $business_name);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            $this->db->bind(':mds', $mds);
            // Execute

            
    
            if ($this->db->execute()) {
                $this->new_wallet_vendor($cur_user->id);
                return true;
            } else {
                return false;
            }}

    }




    public function create_delivery($name, $email, $phone, $pass)
    {

        $this->db->query('INSERT INTO auth (type, name, email, phone, password, status, created_at) VALUES(:type, :name, :email, :phone, :pass, :status, :created_at)');
        // Bind values
        $this->db->bind(':type', 'delivery');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':status', '0');
        $this->db->bind(':created_at', date('Y-m-d H:i:s')); 

        if ($this->db->execute()) {   

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phone);
            $cur_user = $this->db->single();
                 
            $this->db->query('INSERT INTO delivery (delivery_id, delivery_ad_id) VALUES(:delid, :deladid)');
            // Bind values
            $this->db->bind(':delid', $cur_user->id);
            $this->db->bind(':deladid', $_SESSION['rexkod_vendor_id']);
            // Execute
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


    }


    public function add_vendor_profile($name, $address, $city, $state, $pincode, $gst, $timing, $minval,$subcat_id)
    {

        if(!empty($_FILES['gst_cert']['name']))
        {
            $f_name = $_FILES['gst_cert']['name'];
            $f_temp = $_FILES['gst_cert']['tmp_name'];
            $size = $_FILES['gst_cert']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp=$f_newfile;
        }
        else
        {
            $temp = NULL;
        }

            $this->db->query('INSERT INTO vendors (vendor_id,vendor_name, vendor_address, vendor_city,vendor_state, vendor_pincode, vendor_gst, vendor_gst_cert, vendor_timing, vendor_minorder, vendor_subcategory_id) VALUES(:vendorid, :name, :address, :city, :state, :pincode, :gst, :gstcert, :timing, :minval, :subcat_id)');
            // Bind values
            $this->db->bind(':vendorid', $_SESSION['rexkod_vendor_id']);
            $this->db->bind(':name', $name);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':gstcert', $temp);
            $this->db->bind(':timing', $timing);
            $this->db->bind(':minval', $minval);
            $this->db->bind(':subcat_id', $subcat_id);
            // Execute
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

    }


    public function add_user_profile($name, $type, $address, $city, $state, $pincode, $gst)
    {

        if(!empty($_FILES['gst_cert']['name']))
        {
            $f_name = $_FILES['gst_cert']['name'];
            $f_temp = $_FILES['gst_cert']['tmp_name'];
            $size = $_FILES['gst_cert']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_user_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp=$f_newfile;
        }
        else
        {
            $temp = NULL;
        }

            $this->db->query('INSERT INTO users (user_id, user_type, user_name, user_address, user_city,user_state, user_pincode, user_country, user_gst, user_gst_cert) VALUES(:userid, :type, :name, :address, :city, :state, :pincode, :country, :gst, :gstcert)');
            // Bind values
            $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
            $this->db->bind(':name', $name);
            $this->db->bind(':type', $type);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':country', 'India');
            $this->db->bind(':pincode', $pincode);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':gstcert', $temp);
            // Execute
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

    }



  


    public function add_feedback($order_id, $user_remark)
    {
        $this->db->query('INSERT INTO feedback(order_id,user_remark) VALUES(:order_id,:user_remark)');
        // Bind values
        
        $this->db->bind(':order_id', $order_id);
        $this->db->bind(':user_remark', $user_remark);
        // Execute

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
}





public function add_nonpincode($pincode)
{
    $this->db->query('INSERT INTO non_pincodes(user_id,pincode) VALUES(:user_id,:pincode)');
    // Bind values
    
    $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
    $this->db->bind(':pincode', $pincode);
    // Execute

    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}



      // Get Post By ID
      public function getVendorById($id){
        $this->db->query('SELECT * FROM vendors WHERE vendor_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }



      public function getFeedback($id){
        $this->db->query('SELECT * FROM feedback WHERE order_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }

      public function getWallet(){
        $this->db->query('SELECT * FROM wallets WHERE user_id = :userid');
        $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
        return $this->db->single();
      }

      public function getWallet_vendor(){
        $this->db->query('SELECT * FROM vendor_wallets WHERE user_id = :userid');
        $this->db->bind(':userid', $_SESSION['rexkod_vendor_id']);
        return $this->db->single();
      }

      public function getWalletById($id){
        $this->db->query('SELECT * FROM wallets WHERE user_id = :userid');
        $this->db->bind(':userid', $id);
        return $this->db->single();
      }

      public function getWalletById_vendor($id){
        $this->db->query('SELECT * FROM vendor_wallets WHERE user_id = :userid');
        $this->db->bind(':userid', $id);
        return $this->db->single();
      }

      public function getTransactions(){
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid');
        $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
        $row = $this->db->resultSet();
        return $row;
      }


      public function getTransactions_vendor(){
        $this->db->query('SELECT * FROM vendor_transactions WHERE user_id = :userid ORDER BY id DESC');
        $this->db->bind(':userid', $_SESSION['rexkod_vendor_id']);
        $row = $this->db->resultSet();
        return $row;
      }



      public function getOrderById($id){
        $this->db->query('SELECT * FROM bookings WHERE booking_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }



      public function get_order($id){
        $this->db->query('SELECT * FROM bookings WHERE speeder_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }


      public function getOrderById_truck($id){
        $this->db->query('SELECT * FROM truck_orders WHERE order_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }


      public function getOrderByScan($id){
        $this->db->query('SELECT * FROM bookings WHERE speeder_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }
      


      public function getDelivery()
      {
          $this->db->query("SELECT *
          FROM delivery
          INNER JOIN auth 
          ON delivery.delivery_id = auth.id
          WHERE delivery.delivery_ad_id=:id
          ;");
  
          $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
          $row = $this->db->resultSet();
          return $row;
      }







      public function getOrderDetailById($id){
        $this->db->query('SELECT * FROM product_order_list WHERE p_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->resultSet();
  
        return $row;
      }

      
  
  
      // Update Post
      public function updateVendor($data){
        // Prepare Query
        $this->db->query('UPDATE testimonials SET name = :name, designation = :designation, content = :content WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':designation', $data['designation']);
        $this->db->bind(':content', $data['content']);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }




      public function update_banner($banner,$pos){
        
       $this->db->query('UPDATE banners SET '.$pos.' = :banner WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', 1);
        $this->db->bind(':banner', $banner);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }


  
      // Delete Post
      public function deleteVendor($id){
        // Prepare Query
        $this->db->query('DELETE FROM testimonials WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', $id);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }


    public function ulogin($email, $pass)
    {
        $this->db->query('SELECT * FROM auth WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        $hashed_password = $row->password;

        if (password_verify($pass, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }


    public function ulogin_otp($phno)
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phone');
        $this->db->bind(':phone', $phno);
        return $this->db->single();
    }

    public function get_users()
    {
        $this->db->query('SELECT * FROM auth');
        $row = $this->db->resultSet();
        return $row;
    }



    public function check_pincode($pin)
    {
        $this->db->query('SELECT DISTINCT district, state  FROM pincodes WHERE pincode = :pin');
        $this->db->bind(':pin', $pin);
        return $this->db->single();
    }

    public function check_area($pin)
    {
        $this->db->query('SELECT post_office as area FROM pincodes WHERE pincode = :pin');
        $this->db->bind(':pin', $pin);
        return $this->db->resultSet();
    }


    public function get_single_product($val)
    {
        $this->db->query('SELECT * FROM products WHERE id = :val');
        $this->db->bind(':val', $val);
        return $this->db->single();
    }

    public function add_item_to_cart_db($data)
    {

        $this->db->query('SELECT * FROM cart WHERE item_id = :id AND created_by = :uid');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
        $x = $this->db->single();
        
        $x1 = 0;
        $qt = 0;
        if ($x) 
        {
            $qt = (int)$data['qty'];
            $p1 = (float)$data['price'];
            $x1 = (float)$data['total'];
            $this->db->query('UPDATE cart SET item_qty=:qty, item_price=:price, item_total_price=:total WHERE id=:id');
            $this->db->bind(':id', $x->id);
            $this->db->bind(':qty', $qt);
            $this->db->bind(':price', $p1);
            $this->db->bind(':total', $x1);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->query('INSERT INTO cart(item_id, item_name, item_qty, item_price, item_total_price, created_by,img,prod_vendorId,prod_vendorName) VALUES (:id,:name,:qty,:price,:total,:created_by,:img,:prod_vendorId,:prod_vendorName)');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':total', $data['total']);
            $this->db->bind(':created_by', $data['created_by']);
            $this->db->bind(':img', $data['img']);

            $this->db->bind(':prod_vendorId', $data['created_byId']);
            $this->db->bind(':prod_vendorName', $data['created_byType']);


            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function get_sum_cart()
    {
        $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        $x = $this->db->resultSet();
        $a = 0;
        foreach ($x as $k) {
            $a = $a + $k->item_total_price;
        }
        return $a;
    }
    public function getcart_items()
    {
        $this->db->query('SELECT * FROM cart WHERE created_by=:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        return $this->db->resultSet();
    }




    public function getSubcategoryById($id)
    {
        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }




    public function get_cart_user_check()
    {
        $this->db->query('SELECT * FROM cart WHERE created_by=:usid');
        $this->db->bind(':usid', $_SESSION['rexkod_user_id']);
        return $this->db->resultSet();
        
    }
    
    public function get_cart_vendor_check($vid)
    {
        $this->db->query('SELECT * FROM cart WHERE prod_vendorId=:vid');
        $this->db->bind(':vid', $vid);
        return $this->db->resultSet();
        
    }


    public function getCategoryById($id)
    {
        $this->db->query("SELECT * FROM category where category_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }


    public function delete_cart_item_db($id)
    {
        $this->db->query("DELETE FROM cart WHERE id=:id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function clear_cart_item_db($id)
    {
        $this->db->query("DELETE FROM cart WHERE created_by=:id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getcart_items_by_item_id($item_id)
    {
        $this->db->query('SELECT * FROM cart WHERE item_id=:item_id AND created_by=:created_by');
         $this->db->bind(':item_id', $item_id);
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        return $this->db->single();
    }
    public function delete_item_to_cart_db($data)
    {
        $this->db->query('UPDATE cart SET item_qty=:qty, item_total_price=:total, item_price=:item_price WHERE id=:id AND created_by=:created_by');
        $this->db->bind(':id', $data['cart_id']);
        $this->db->bind(':qty', $data['qty']);
        $this->db->bind(':item_price', $data['price']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
     public function delete_item_to_cart_db_if_zero($data)
    {
        $this->db->query("DELETE FROM cart WHERE id = :id AND created_by=:created_by");
        $this->db->bind(':id', $data['cart_id']);
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function convert_temp_id_to_user_id_for_pcart()
    {
        $d ='';
        $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id_rec']);
        $x = $this->db->resultSet();
        foreach ($x as $k) 
        {
            $this->db->query('UPDATE cart SET created_by=:created_by WHERE id=:id');
            $this->db->bind(':id', $k->id);
            $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
            $d = $this->db->execute();
        }
        if ($d) {
            return true;
        } else {
            return false;
        }
    }


    public function get_userinfo($id)
    {
        $this->db->query("SELECT * FROM auth where id = :id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }

    public function get_custinfo($id)
    {
        $this->db->query("SELECT * FROM users where user_id = :id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }



    public function ulogin_using_rowId($id)
    {
        $this->db->query('SELECT * FROM vendors WHERE vendor_id = :vendor_id');
        $this->db->bind(':vendor_id', $id);
        $row = $this->db->single();

        return $row;
    }

          public function get_all_userinfo()
    {
        $this->db->query("SELECT * FROM auth where id = :id");

        $this->db->query("SELECT *
        FROM auth
        INNER JOIN users 
        ON auth.id = users.user_id
        WHERE auth.id=:id
        ;");

        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        $row = $this->db->single();

        return $row;
    }


    public function get_sum_cart_for_payment()
    {
        $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        $x = $this->db->resultSet();
        $a = 0;
        foreach ($x as $k) {
            $a = $a + $k->item_total_price;
        }
        return $a;
    }
    public function savecookies()
    {

        $this->db->query('UPDATE auth SET temp_id = :order_id, temp_data = :temp_data WHERE id = :user_id');
        $this->db->bind(':order_id', $_SESSION['order_id']);
        $this->db->bind(':temp_data', $_SESSION['temp_data']);
        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function gettempdate($order_id)
    {
        $this->db->query('SELECT * FROM auth WHERE temp_id = :order_id');
        $this->db->bind(':order_id', $order_id);
        return $results = $this->db->single();
    }
    public function add_cart_for_payment($name, $email, $phno, $add, $city, $state, $zipcode, $country, $data)
    {
        $order_d = array();
        $tempID = md5(uniqid(rand(), true));
        $this->db->query('INSERT INTO orders (name, email,phone, address, city, state, zipcode, country,user_id,img,temp_id,pay_status,invoice_exsist, last_updatedAt, last_updatedBy) VALUES(:name, :email, :phno, :add, :city, :state, :zipcode, :country, :user_id, :img, :temp_id,1,1, :last_updatedAt, :last_updatedBy)');



        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);
        $this->db->bind(':add', $add);
        $this->db->bind(':city', $city);
        $this->db->bind(':state', $state);
        $this->db->bind(':zipcode', $zipcode);
        $this->db->bind(':country', $country);
        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':img', '');
        $this->db->bind(':temp_id', $tempID);
        $this->db->bind(':last_updatedAt', date('d-m-Y h:i'));
        $this->db->bind(':last_updatedBy', $_SESSION['rexkod_user_id']);

        // Execute
        if ($this->db->execute()) {
            $this->db->query('SELECT id FROM orders WHERE temp_id = :temp_id');
            $this->db->bind(':temp_id', $tempID);
            $temp = $this->db->single();

            $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
            $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
            $x = $this->db->resultSet();
            foreach ($x as $k) 
            {
                $s = '';
                $this->db->query('INSERT INTO product_order_list(item_id, item_name, item_qty, item_price, item_total_price, created_by, p_id,p_img) VALUES (:id,:name,:qty,:price,:total,:created_by,:p_id,:p_img)');
                $this->db->bind(':id', $k->item_id);
                $this->db->bind(':name', $k->item_name);
                $this->db->bind(':qty', $k->item_qty);
                $this->db->bind(':price', $k->item_price);
                $this->db->bind(':total', $k->item_total_price);
                $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
                $this->db->bind(':p_id', $temp->id);
                $this->db->bind(':p_img', $k->img);
                $xq = $this->db->execute();
                $s = $k->item_id . "|" . $k->item_name . "|" . $k->item_qty . "|" . $k->item_price;
                $order_d[] = $s;
            }
            $order_d = implode("!", $order_d);
            $this->db->query('INSERT INTO product_invoice (booking_id, name, order_details, sub_total, total, pharmacy_med) VALUES(:booking_id, :name, :order_details, :sub_total, :grand_total, 1)');

            $this->db->bind(':booking_id', $temp->id);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':order_details', $order_d);
            $this->db->bind(':sub_total', $data['tprice']);
            $this->db->bind(':grand_total', $data['tprice']);
            $xq1 = $this->db->execute();

            $this->db->query("UPDATE orders SET price = :grand_total where id = :id");
            $this->db->bind(':id', $temp->id);
            $this->db->bind(':grand_total', $data['tprice']);
            $this->db->execute();

            if ($xq1) {
                $this->db->query('INSERT INTO payment (name, email, ph_no, order_id, transaction_id, price, book_id, status, razorpay_order_id, razorpay_signature) VALUES(:name, :email, :phno, :order_id, :transaction_id, :price, :temp_id, 1, :razorpay_order_id, :razorpay_signature)');
                $this->db->bind(':order_id', $data['ORDERID']);
                $this->db->bind(':transaction_id', $data['TXNID']);
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':phno', $data['phone']);
                $this->db->bind(':price', $data['tprice']);
                $this->db->bind(':temp_id', $temp->id);
                $this->db->bind(':razorpay_order_id', $data['razorpay_order_id']);
                $this->db->bind(':razorpay_signature', $data['razorpay_signature']);
                $this->db->execute();

                $this->db->query("DELETE FROM cart WHERE created_by=:created_by");
                $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
                $dd = $this->db->execute();
                if ($dd) 
                {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            die('Error');
        }
    }



    public function update_user($name, $email, $phno, $address, $pincode, $state, $country, $id)
    {


        $this->db->query('UPDATE auth SET name = :name, email = :email, phone = :phno,address = :address,pin_code = :pincode,state = :state,country = :country WHERE id = :id');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);

        $this->db->bind(':address', $address);
        $this->db->bind(':pincode', $pincode);
        $this->db->bind(':state', $state);
        $this->db->bind(':country', $country);
        $this->db->bind(':id', $id);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function change_heart_func($prod_id, $count)
    {
        $this->db->query('UPDATE products SET very_good=:very_good WHERE id=:id');

        $this->db->bind(':id', $prod_id);
        $this->db->bind(':very_good', $count);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function update_cartCoupon($id)
    {
        $this->db->query('UPDATE cart SET coupon_id=:coup_id WHERE created_by=:uid');

        $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
        $this->db->bind(':coup_id', $id);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function update_delivery_agent($oid,$agentid)
    {
        $this->db->query('UPDATE bookings SET delivery_agent_id=:agentid WHERE booking_id=:oid');

        $this->db->bind(':oid', $oid);
        $this->db->bind(':agentid', $agentid);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function not_delivered($id,$delivery_remark)
    {
        $booking = $this->getOrderById($id);

        if(!$booking->delivery_attempt_1){
        $this->db->query('UPDATE bookings SET delivery_attempt_1=:atdatetime, delivery_remark_1=:delivery_remark WHERE booking_id=:id');
        }else if(!$booking->delivery_attempt_2){
        $this->db->query('UPDATE bookings SET delivery_attempt_2=:atdatetime, delivery_remark_2=:delivery_remark WHERE booking_id=:id');
        }else if(!$booking->delivery_attempt_3){
        $this->db->query('UPDATE bookings SET delivery_attempt_3=:atdatetime, delivery_remark_3=:delivery_remark WHERE booking_id=:id');
        }
        $this->db->bind(':id', $id);
        $this->db->bind(':delivery_remark', $delivery_remark);
        $this->db->bind(':atdatetime', date("d-M-Y h:i A"));

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function from_remark($id,$from_remark)
    {
        $booking = $this->getOrderById($id);

        if(!$booking->from_remark_1){
        $this->db->query('UPDATE bookings SET from_remark_1=:from_remark WHERE booking_id=:id');
        }else if(!$booking->from_remark_2){
        $this->db->query('UPDATE bookings SET from_remark_2=:from_remark WHERE booking_id=:id');
        }else if(!$booking->from_remark_3){
        $this->db->query('UPDATE bookings SET from_remark_3=:from_remark WHERE booking_id=:id');
        }
        $this->db->bind(':id', $id);
        $this->db->bind(':from_remark', $from_remark);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function to_remark($id,$to_remark)
    {
        $booking = $this->getOrderById($id);

        if(!$booking->to_remark_1){
        $this->db->query('UPDATE bookings SET to_remark_1=:to_remark WHERE booking_id=:id');
        }else if(!$booking->to_remark_2){
        $this->db->query('UPDATE bookings SET to_remark_2=:to_remark WHERE booking_id=:id');
        }else if(!$booking->to_remark_3){
        $this->db->query('UPDATE bookings SET to_remark_3=:to_remark WHERE booking_id=:id');
        }
        $this->db->bind(':id', $id);
        $this->db->bind(':to_remark', $to_remark);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function update_pickup_agent($oid,$agentid)
    {
        $this->db->query('UPDATE bookings SET pickup_agent_id=:agentid, booking_status = 1 WHERE booking_id=:oid');

        $this->db->bind(':oid', $oid);
        $this->db->bind(':agentid', $agentid);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function change_good_func($prod_id, $count)
    {
        $this->db->query('UPDATE products SET good=:good WHERE id=:id');

        $this->db->bind(':id', $prod_id);
        $this->db->bind(':good', $count);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function change_not_good_func($prod_id, $count)
    {
        $this->db->query('UPDATE products SET not_good=:not_good WHERE id=:id');

        $this->db->bind(':id', $prod_id);
        $this->db->bind(':not_good', $count);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function md_express_update($id,$status)
    {
        $this->db->query('UPDATE md set express = :status WHERE md_id = :id');
        // Bind values
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);


        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }

     public function get_all_address() {
        $this->db->query('SELECT * FROM user_address WHERE user_id = :user_id');
         $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $result = $this->db->resultSet();
        return $result;
    }


    public function get_all_bookings() {
        $this->db->query('SELECT * FROM bookings WHERE from_id = :user_id OR to_id= :user_id ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $result = $this->db->resultSet();
        return $result;
    }


    public function get_all_truck_orders() {
        $this->db->query('SELECT * FROM truck_orders WHERE user_id = :user_id ORDER BY order_id DESC');
        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_all_hyperlocal_orders() {
        $this->db->query('SELECT * FROM hyperlocal WHERE user_id = :user_id ORDER BY order_id DESC');
        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_hyperlocal_orders_driver() {
        $this->db->query('SELECT * FROM hyperlocal WHERE delivery_id = :delivery_id ORDER BY order_id DESC');
        $this->db->bind(':delivery_id', $_SESSION['rexkod_driver_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_hyperlocal_orders_driver_new($id) {
        $this->db->query('SELECT * FROM hyperlocal WHERE ad_id = :ad_id AND status = 0 ORDER BY order_id DESC');
        $this->db->bind(':ad_id', $id);
        $result = $this->db->resultSet();
        return $result;
    }



    public function truck_orders_md() {
        $this->db->query('SELECT * FROM truck_orders WHERE md_id = :user_id ORDER BY order_id DESC');
        $this->db->bind(':user_id', $_SESSION['rexkod_vendor_id']);
        $result = $this->db->resultSet();
        return $result;
    }


    public function truck_orders_admin() {
        $this->db->query('SELECT * FROM truck_orders ORDER BY order_id DESC');
        $result = $this->db->resultSet();
        return $result;
    }


    public function hyperlocal_orders_admin() {
        $this->db->query('SELECT * FROM hyperlocal ORDER BY order_id DESC');
        $result = $this->db->resultSet();
        return $result;
    }



    public function get_all_contacts() {
        $this->db->query('SELECT * FROM contacts WHERE user_id = :user_id ORDER BY contact_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $result = $this->db->resultSet();
        return $result;
    }


    public function bookings_wallet() {
        $this->db->query('SELECT * FROM bookings WHERE from_id = :user_id AND wallet_id != 0 ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_all_pickup_orders() {
        $this->db->query('SELECT * FROM bookings WHERE pickup_agent_id = :user_id ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_driver_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_all_delivery_orders() {
        $this->db->query('SELECT * FROM bookings WHERE delivery_agent_id = :user_id ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_driver_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_to_orders() {
        $this->db->query('SELECT * FROM bookings WHERE to_ad_id = :user_id ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_vendor_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_to_orders_md() {
        $this->db->query('SELECT * FROM bookings WHERE to_md_id = :user_id ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_vendor_id']);
        $result = $this->db->resultSet();
        return $result;
    }


    public function get_to_orders_rd() {
        $this->db->query('SELECT * FROM bookings WHERE to_rd_id = :user_id ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_vendor_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_from_orders() {
        $this->db->query('SELECT * FROM bookings WHERE from_ad_id = :user_id ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_vendor_id']);
        $result = $this->db->resultSet();
        return $result;
    }


    public function get_from_orders_md() {
        $this->db->query('SELECT * FROM bookings WHERE from_md_id = :user_id ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_vendor_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_from_orders_rd() {
        $this->db->query('SELECT * FROM bookings WHERE from_rd_id = :user_id ORDER BY booking_id DESC');
         $this->db->bind(':user_id', $_SESSION['rexkod_vendor_id']);
        $result = $this->db->resultSet();
        return $result;
    }


    public function get_all_orders() {
        $this->db->query('SELECT * FROM bookings ORDER BY booking_id DESC');
        $result = $this->db->resultSet();
        return $result;
    }
    


    public function checkout_coupons($vid,$sid) {
        $this->db->query('SELECT * FROM coupons WHERE coupon_vendor_id = :vid OR coupon_subcategory_id = :sid');
        $this->db->bind(':vid', $vid);
        $this->db->bind(':sid', $sid);
        $result = $this->db->resultSet();
        return $result;
    }



    public function insert_more_address($address, $pincode, $state, $country)
    {
        $assign_time = date("d-M-Y h:i A");

        $this->db->query('INSERT INTO user_address (address, state, zipcode, country, created_at, user_id) VALUES(:address, :state, :zipcode, :country, :created_at, :user_id)');
        // Bind values

        $this->db->bind(':address', $address);
        $this->db->bind(':zipcode', $pincode);
        $this->db->bind(':state', $state);
        $this->db->bind(':country', $country);
        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':created_at', $assign_time);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_address_by_id($id)
    {
        $this->db->query('SELECT * FROM user_address WHERE id = :id');

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }


    public function cart_active_coupon($id)
    {
        $this->db->query('SELECT * FROM coupons WHERE coupon_id = :id');

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }


    public function get_coupon($coupon){
        $this->db->query("SELECT * FROM coupons WHERE coupon_code = :coupon");
        $this->db->bind(':coupon', $coupon);
        $row = $this->db->single();
        return $row;
      }

    public function get_contact($cid)
    {
        $this->db->query('SELECT * FROM contacts WHERE contact_id = :cid');

        $this->db->bind(':cid', $cid);

        return $results = $this->db->single();
    }




    public function make_primary_address($address, $pincode, $state, $country, $id)
    {


        $this->db->query('UPDATE auth SET address = :address,pin_code = :pincode,state = :state,country = :country WHERE id = :id');

        // Bind values
        
        $this->db->bind(':address', $address);
        $this->db->bind(':pincode', $pincode);
        $this->db->bind(':state', $state);
        $this->db->bind(':country', $country);
        $this->db->bind(':id', $id);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_address_by_id($id)
    {
        $this->db->query("DELETE FROM user_address WHERE id=:id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function change_QR($img)
    {        
        $this->db->query('UPDATE auth SET qr_img = :qr_img WHERE id = :id');

        $this->db->bind(':id', $_SESSION['rexkod_user_id']);

        $this->db->bind(':qr_img', $img);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public function update_orderFeedback($feedback, $order_id)
    {
        $this->db->query('UPDATE orders SET feedback=:feedback, feedback_status=:feedback_status WHERE id=:id');
        $this->db->bind(':feedback', $feedback);
        $this->db->bind(':feedback_status', 1);
        $this->db->bind(':id', $order_id);
  

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    } 


    public function add_cart_for_paymentPayAtdel($name, $email, $phno, $add, $city, $state, $zipcode, $country, $data, $data_checkout)
    {
        
        $this->db->query('INSERT INTO orders (name, email, phone, address, city, state, zipcode, country,vendor_id, user_id, sub_total, coupon_id, coupon_value, total, buyer_protection, tax_percentage, tax_value, shipping, net_total, created_at) VALUES(:name, :email, :phno, :add, :city, :state, :zipcode, :country, :vendorid, :userid, :subtotal, :couponid, :couponval, :total, :buyerpro, :taxpercentage, :taxval, :shipping, :nettotal, :createdat)');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);
        $this->db->bind(':add', $add);
        $this->db->bind(':city', $city);
        $this->db->bind(':state', $state);
        $this->db->bind(':zipcode', $zipcode);
        $this->db->bind(':country', $country);
        $this->db->bind(':vendorid', $data_checkout->vendor_checkout);
        $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
        $this->db->bind(':subtotal', $data_checkout->subtotal_checkout);
        $this->db->bind(':couponid', $data_checkout->coupon_checkout);
        $this->db->bind(':couponval', $data_checkout->coupon_value_checkout);
        $this->db->bind(':total', $data_checkout->total_checkout);
        $this->db->bind(':buyerpro', $data_checkout->buypro_checkout);
        $this->db->bind(':taxpercentage', $data_checkout->tax_Percentage_checkout);
        $this->db->bind(':taxval', $data_checkout->tax_value_checkout);
        $this->db->bind(':shipping', $data_checkout->shipping_checkout);
        $this->db->bind(':nettotal', $data_checkout->net_total); 
        $this->db->bind(':createdat', date('Y-m-d H:i:s')); 
        

        // Execute
        if ($this->db->execute()) {

            $this->db->query('SELECT id FROM orders WHERE user_id = :uid ORDER BY id DESC');
            $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
            $temp = $this->db->single();

            $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
            $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
            $x = $this->db->resultSet();

            foreach ($x as $k) 
            {
                $s = '';
                $this->db->query('INSERT INTO product_order_list(item_id, item_name, item_qty, item_price, item_total_price, created_by, p_id,p_img) VALUES (:id,:name,:qty,:price,:total,:created_by,:p_id,:p_img)');
                $this->db->bind(':id', $k->item_id);
                $this->db->bind(':name', $k->item_name);
                $this->db->bind(':qty', $k->item_qty);
                $this->db->bind(':price', $k->item_price);
                $this->db->bind(':total', $k->item_total_price);
                $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
                $this->db->bind(':p_id', $temp->id);
                $this->db->bind(':p_img', $k->img);

                $xq = $this->db->execute();
            }

            $this->db->query("DELETE FROM cart WHERE created_by=:created_by");
            $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);

            return($this->db->execute());
        
        } else {
            die("Something Went Wrong");
        }
    }


    public function add_item_to_wishlist_db($data)
    {
        $this->db->query('SELECT * FROM wishlist WHERE item_id = :id');
        $this->db->bind(':id', $data['id']);
        $x = $this->db->single();
        $x1 = 0;
        $qt = 0;
        if ($x) 
        {
            $qt = (int)$data['qty'] + (int)$x->item_qty;
            $x1 = (float)$data['total'] + (float)$x->item_total_price;

            $this->db->query('UPDATE wishlist SET item_qty=:qty, item_total_price=:total WHERE id=:id');

            $this->db->bind(':id', $x->id);
            $this->db->bind(':qty', $qt);
            $this->db->bind(':total', $x1);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->query('INSERT INTO wishlist(item_id, item_name, item_qty, item_price, item_total_price, created_by,img) VALUES (:id,:name,:qty,:price,:total,:created_by,:img)');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':total', $data['total']);
            $this->db->bind(':created_by', $data['created_by']);
            $this->db->bind(':img', $data['img']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getwishlist_items()
    {
        $this->db->query('SELECT * FROM wishlist WHERE created_by=:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        return $this->db->resultSet();
    }



    public function add_banner_db($ban_filename,$ban_pos)
    {
        $this->db->query('UPDATE banner SET '.$ban_pos.'=:ban_filename');
        // Bind values
        $this->db->bind(':ban_filename', $ban_filename);
        
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function order_update($id,$status)
    {

        if($status==1){
            $this->db->query('UPDATE bookings SET booking_status=:status WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':bid', $id);
        }else if($status==3){
            $this->db->query('UPDATE bookings SET booking_status=:status,pickup_datetime=:pdt WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':pdt', date('Y-m-d H:i:s'));
            $this->db->bind(':bid', $id);
        }else if($status==4){
            $this->db->query('UPDATE bookings SET booking_status=:status,from_hub_datetime=:fhdt WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':fhdt', date('Y-m-d H:i:s'));
            $this->db->bind(':bid', $id);
        }else if($status==5){
            $this->db->query('UPDATE bookings SET booking_status=:status WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':bid', $id);
        }else if($status==6){
            $this->db->query('UPDATE bookings SET booking_status=:status,from_mother_datetime=:fhdt WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':fhdt', date('Y-m-d H:i:s'));
            $this->db->bind(':bid', $id);
        }else if($status==7){
            $this->db->query('UPDATE bookings SET booking_status=:status WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':bid', $id);
        }else if($status==8){
            $this->db->query('UPDATE bookings SET booking_status=:status,from_region_datetime=:fhdt WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':fhdt', date('Y-m-d H:i:s'));
            $this->db->bind(':bid', $id);
        }else if($status==9){
            $this->db->query('UPDATE bookings SET booking_status=:status WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':bid', $id);
        }else if($status==10){
            $this->db->query('UPDATE bookings SET booking_status=:status,to_region_datetime=:fhdt WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':fhdt', date('Y-m-d H:i:s'));
            $this->db->bind(':bid', $id);
        }else if($status==11){
            $this->db->query('UPDATE bookings SET booking_status=:status WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':bid', $id);
        }else if($status==12){
            $this->db->query('UPDATE bookings SET booking_status=:status,to_mother_datetime=:fhdt WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':fhdt', date('Y-m-d H:i:s'));
            $this->db->bind(':bid', $id);
        }else if($status==13){
            $this->db->query('UPDATE bookings SET booking_status=:status WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':bid', $id);
        }else if($status==14){
            $this->db->query('UPDATE bookings SET booking_status=:status,to_hub_datetime=:thdt WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':thdt', date('Y-m-d H:i:s'));
            $this->db->bind(':bid', $id);
        }else if($status==15){
            $this->db->query('UPDATE bookings SET booking_status=:status WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':bid', $id);
        }else if($status==16){
            $this->db->query('UPDATE bookings SET booking_status=:status,delivery_datetime=:ddt WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':ddt', date('Y-m-d H:i:s'));
            $this->db->bind(':bid', $id);
        }else if($status==99){
            $this->db->query('UPDATE bookings SET booking_status=:status WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':bid', $id);
        }else if($status==20){
            $this->db->query('UPDATE bookings SET booking_status=:status WHERE booking_id=:bid');
            $this->db->bind(':status', $status);
            $this->db->bind(':bid', $id);
        }
        
        
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function hyperlocal_update($id,$status)
    {

        if($status==2){
            $this->db->query('UPDATE hyperlocal SET status=:status,pickup_datetime=:pdt WHERE order_id=:id');
            $this->db->bind(':status', $status);
            $this->db->bind(':pdt', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $id);
        }else if($status==3){
            $this->db->query('UPDATE hyperlocal SET status=:status,delivery_datetime=:pdt WHERE order_id=:id');
            $this->db->bind(':status', $status);
            $this->db->bind(':pdt', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $id);
        }


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function order_update_truck($id,$status)
    {

        if($status==1){
            $this->db->query('UPDATE truck_orders SET status=:status WHERE order_id=:oid');
            $this->db->bind(':status', $status);
            $this->db->bind(':oid', $id);
        }else if($status==2){
            $this->db->query('UPDATE truck_orders SET status=:status WHERE order_id=:oid');
            $this->db->bind(':status', $status);
            $this->db->bind(':oid', $id);
        }else if($status==3){
            $this->db->query('UPDATE truck_orders SET status=:status WHERE order_id=:oid');
            $this->db->bind(':status', $status);
            $this->db->bind(':oid', $id);
        }

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }







    public function order_update_pickup($id,$speeder_id)
    {
        $this->db->query('UPDATE bookings SET speeder_id=:speederid, booking_status=:status,pickup_datetime=:pdt WHERE booking_id=:bid');
        $this->db->bind(':speederid', $speeder_id);
        $this->db->bind(':status', 3);
        $this->db->bind(':pdt', date('Y-m-d H:i:s'));
        $this->db->bind(':bid', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function accept_hyperlocal_order($id)
    {
        $this->db->query('UPDATE hyperlocal SET delivery_id=:did, status=:status WHERE order_id=:id');
        $this->db->bind(':did', $_SESSION['rexkod_driver_id']);
        $this->db->bind(':status', 1);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function cancel_hyperlocal_order($id)
    {
        $this->db->query('UPDATE hyperlocal SET status=:status WHERE order_id=:id');
        $this->db->bind(':status', 4);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function issue_update($id,$issue_type,$issue_remark)
    {
        $this->db->query('UPDATE bookings SET issue_type=:issue_type, issue_remark=:issue_remark WHERE booking_id=:bid');
        $this->db->bind(':issue_type', $issue_type);
        $this->db->bind(':issue_remark', $issue_remark);
        $this->db->bind(':bid', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function create_booking($from_address,$from_city,$from_state ,$from_pincode,$to_id,$to_name,$to_phone,$to_address,$to_city,$to_state,$to_pincode,$item_name,$item_qty ,$item_cost ,$item_order_id,$item_sku,$item_weight,$order_type,$item_length,$item_breadth,$item_height,$volumetric_weight,$order_weight,$need_package,$package_type,$shipping_type,$date_slot_pickup,$time_slot_pickup,$date_slot_delivery,$time_slot_delivery,$booking_cost,$from_ad_id,$from_md_id,$from_rd_id,$to_rd_id,$to_ad_id,$to_md_id,$add_contact,$cod_charges)
    {
        $wallet_id = 0;
        if($order_type==0){
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)-$booking_cost;
        
        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        $this->db->execute();
        $wallet_id = $wallet->wallet_id;
        }

        $this->db->query('INSERT INTO bookings (from_id,from_name,from_phone,from_address,from_city,from_state ,from_pincode, to_id, to_name,to_phone,to_address,to_city,to_state,to_pincode,item_name,item_qty ,item_cost ,item_order_id,item_sku,item_weight,item_length,item_breadth,item_height,volumetric_weight,order_weight,order_type,need_package,package_type,shipping_type,date_slot_pickup,time_slot_pickup,date_slot_delivery,time_slot_delivery,booking_cost,from_ad_id,from_md_id,from_rd_id,to_rd_id,to_ad_id,to_md_id,otp_pickup,otp_pickup2,otp_delivery,wallet_id,cod_charges) VALUES(:from_id,:from_name,:from_phone,:from_address,:from_city,:from_state ,:from_pincode ,:to_id,:to_name,:to_phone,:to_address,:to_city,:to_state,:to_pincode,:item_name,:item_qty ,:item_cost ,:item_order_id,:item_sku,:item_weight,:item_length,:item_breadth,:item_height,:volumetric_weight,:order_weight,:order_type,:need_package,:package_type,:shipping_type,:date_slot_pickup,:time_slot_pickup,:date_slot_delivery,:time_slot_delivery,:booking_cost,:from_ad_id,:from_md_id,:from_rd_id,:to_rd_id,:to_ad_id,:to_md_id,:otp_pickup,:otp_pickup2,:otp_delivery,:walletid,:cod_charges)');


        // Bind values
        $this->db->bind(':from_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':from_name', $_SESSION['rexkod_user_name']);
        $this->db->bind(':from_phone', $_SESSION['rexkod_user_phone']);
        $this->db->bind(':from_address', $from_address);
        $this->db->bind(':from_city', $from_city);
        $this->db->bind(':from_state', $from_state);
        $this->db->bind(':from_pincode', $from_pincode);
        $this->db->bind(':to_id', $to_id);
        $this->db->bind(':to_name', $to_name);
        $this->db->bind(':to_phone', $to_phone);
        $this->db->bind(':to_address', $to_address);
        $this->db->bind(':to_city', $to_city);
        $this->db->bind(':to_state', $to_state);
        $this->db->bind(':to_pincode', $to_pincode);
        $this->db->bind(':item_name', $item_name);
        $this->db->bind(':item_qty', $item_qty);
        $this->db->bind(':item_cost', $item_cost);
        $this->db->bind(':item_order_id', $item_order_id);
        $this->db->bind(':item_sku', $item_sku);
        $this->db->bind(':item_weight', $item_weight);
        $this->db->bind(':order_type', $order_type);
        $this->db->bind(':item_length', $item_length);
        $this->db->bind(':item_breadth', $item_breadth);
        $this->db->bind(':item_height', $item_height);
        $this->db->bind(':volumetric_weight', $volumetric_weight);
        $this->db->bind(':order_weight', $order_weight);
        $this->db->bind(':need_package', $need_package);
        $this->db->bind(':package_type', $package_type);
        $this->db->bind(':shipping_type', $shipping_type);
        $this->db->bind(':date_slot_pickup', $date_slot_pickup);
        $this->db->bind(':time_slot_pickup', $time_slot_pickup);
        $this->db->bind(':date_slot_delivery', $date_slot_delivery);
        $this->db->bind(':time_slot_delivery', $time_slot_delivery);
        $this->db->bind(':booking_cost', $booking_cost);
        $this->db->bind(':from_ad_id', $from_ad_id);
        $this->db->bind(':from_md_id', $from_md_id);
        $this->db->bind(':from_rd_id', $from_rd_id);
        $this->db->bind(':to_rd_id', $to_rd_id);
        $this->db->bind(':to_ad_id', $to_ad_id);
        $this->db->bind(':to_md_id', $to_md_id);
        $this->db->bind(':otp_pickup', $this->generateNumericOTP(4));
        $this->db->bind(':otp_pickup2', $this->generateNumericOTP(4));
        $this->db->bind(':otp_delivery', $this->generateNumericOTP(4));
        $this->db->bind(':walletid', $wallet_id);
        $this->db->bind(':cod_charges', $cod_charges);

        if ($this->db->execute()) {
            if ($add_contact == 1) {
            $this->db->query("SELECT * FROM contacts WHERE phone = :phone");
            $this->db->bind(':phone', $to_phone);
            $result = $this->db->single();
            if(empty($result)){
            $this->db->query('INSERT INTO contacts(user_id, name, phone, address, pincode, city, state) VALUES (:userid,:name,:phone,:address,:pincode,:city,:state)');
            $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
            $this->db->bind(':name', $to_name);
            $this->db->bind(':phone', $to_phone);
            $this->db->bind(':address', $to_address);
            $this->db->bind(':pincode', $to_pincode);
            $this->db->bind(':city', $to_city);
            $this->db->bind(':state',$to_state);
            $this->db->execute();
            }
            }
            return true;
        } else {
            return false;
        }
    }



    public function create_booking_ent($from_id,$from_name,$from_phone,$from_address,$from_city,$from_state ,$from_pincode,$to_id,$to_name,$to_phone,$to_address,$to_city,$to_state,$to_pincode,$item_name,$item_qty ,$item_cost ,$item_order_id,$item_sku,$item_weight,$order_type,$item_length,$item_breadth,$item_height,$volumetric_weight,$order_weight,$need_package,$package_type,$shipping_type,$date_slot_pickup,$time_slot_pickup,$date_slot_delivery,$time_slot_delivery,$booking_cost,$from_ad_id,$from_md_id,$to_ad_id,$to_md_id,$add_contact)
    {
        $wallet_id = 0;
        if($order_type==0){
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)-$booking_cost;
        
        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        $this->db->execute();
        $wallet_id = $wallet->wallet_id;
        }

        $this->db->query('INSERT INTO bookings (from_id,from_name,from_phone,from_address,from_city,from_state ,from_pincode, to_id, to_name,to_phone,to_address,to_city,to_state,to_pincode,item_name,item_qty ,item_cost ,item_order_id,item_sku,item_weight,item_length,item_breadth,item_height,volumetric_weight,order_weight,order_type,need_package,package_type,shipping_type,date_slot_pickup,time_slot_pickup,date_slot_delivery,time_slot_delivery,booking_cost,from_ad_id,from_md_id,to_ad_id,to_md_id,otp_pickup,otp_pickup2,otp_delivery,wallet_id,order_from) VALUES(:from_id,:from_name,:from_phone,:from_address,:from_city,:from_state ,:from_pincode ,:to_id,:to_name,:to_phone,:to_address,:to_city,:to_state,:to_pincode,:item_name,:item_qty ,:item_cost ,:item_order_id,:item_sku,:item_weight,:item_length,:item_breadth,:item_height,:volumetric_weight,:order_weight,:order_type,:need_package,:package_type,:shipping_type,:date_slot_pickup,:time_slot_pickup,:date_slot_delivery,:time_slot_delivery,:booking_cost,:from_ad_id,:from_md_id,:to_ad_id,:to_md_id,:otp_pickup,:otp_pickup2,:otp_delivery,:walletid,:order_from)');


        // Bind values
        $this->db->bind(':from_id', $from_id);
        $this->db->bind(':from_name', $from_name);
        $this->db->bind(':from_phone', $from_phone);
        $this->db->bind(':from_address', $from_address);
        $this->db->bind(':from_city', $from_city);
        $this->db->bind(':from_state', $from_state);
        $this->db->bind(':from_pincode', $from_pincode);
        $this->db->bind(':to_id', $to_id);
        $this->db->bind(':to_name', $to_name);
        $this->db->bind(':to_phone', $to_phone);
        $this->db->bind(':to_address', $to_address);
        $this->db->bind(':to_city', $to_city);
        $this->db->bind(':to_state', $to_state);
        $this->db->bind(':to_pincode', $to_pincode);
        $this->db->bind(':item_name', $item_name);
        $this->db->bind(':item_qty', $item_qty);
        $this->db->bind(':item_cost', $item_cost);
        $this->db->bind(':item_order_id', $item_order_id);
        $this->db->bind(':item_sku', $item_sku);
        $this->db->bind(':item_weight', $item_weight);
        $this->db->bind(':order_type', $order_type);
        $this->db->bind(':item_length', $item_length);
        $this->db->bind(':item_breadth', $item_breadth);
        $this->db->bind(':item_height', $item_height);
        $this->db->bind(':volumetric_weight', $volumetric_weight);
        $this->db->bind(':order_weight', $order_weight);
        $this->db->bind(':need_package', $need_package);
        $this->db->bind(':package_type', $package_type);
        $this->db->bind(':shipping_type', $shipping_type);
        $this->db->bind(':date_slot_pickup', $date_slot_pickup);
        $this->db->bind(':time_slot_pickup', $time_slot_pickup);
        $this->db->bind(':date_slot_delivery', $date_slot_delivery);
        $this->db->bind(':time_slot_delivery', $time_slot_delivery);
        $this->db->bind(':booking_cost', $booking_cost);
        $this->db->bind(':from_ad_id', $from_ad_id);
        $this->db->bind(':from_md_id', $from_md_id);
        $this->db->bind(':to_ad_id', $to_ad_id);
        $this->db->bind(':to_md_id', $to_md_id);
        $this->db->bind(':otp_pickup', $this->generateNumericOTP(4));
        $this->db->bind(':otp_pickup2', $this->generateNumericOTP(4));
        $this->db->bind(':otp_delivery', $this->generateNumericOTP(4));
        $this->db->bind(':walletid', $wallet_id);
        $this->db->bind(':order_from', $_SESSION['rexkod_user_id']);

        if ($this->db->execute()) {
            if ($add_contact == 1) {
            $this->db->query("SELECT * FROM contacts WHERE phone = :phone");
            $this->db->bind(':phone', $to_phone);
            $result = $this->db->single();
            if(empty($result)){
            $this->db->query('INSERT INTO contacts(user_id, name, phone, address, pincode, city, state) VALUES (:userid,:name,:phone,:address,:pincode,:city,:state)');
            $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
            $this->db->bind(':name', $to_name);
            $this->db->bind(':phone', $to_phone);
            $this->db->bind(':address', $to_address);
            $this->db->bind(':pincode', $to_pincode);
            $this->db->bind(':city', $to_city);
            $this->db->bind(':state',$to_state);
            $this->db->execute();
            }
            }
            return true;
        } else {
            return false;
        }
    }


    public function create_billing($from_id,$from_name,$from_phone,$from_address,$from_city,$from_state ,$from_pincode,$to_id,$to_name,$to_phone,$to_address,$to_city,$to_state,$to_pincode,$item_name,$item_qty ,$item_cost ,$item_order_id,$item_sku,$item_weight,$order_type,$item_length,$item_breadth,$item_height,$volumetric_weight,$order_weight,$package_type,$shipping_type,$booking_cost,$from_ad_id,$from_md_id,$from_rd_id,$to_ad_id,$to_md_id,$to_rd_id,$shipping_by,$eway_number,$packing_cost,$order_margin,$speeder_id)
    {

        $wallet_id = 0;
        $wallet = $this->getWalletById_vendor($_SESSION['rexkod_vendor_id']);
        $balance_amount = $wallet->balance_amount;
        $margin =($order_margin * $booking_cost) / 100; 
        $booking_amount = $booking_cost - $margin; 
        $balance = intval($balance_amount)-$booking_amount;
        
        $this->db->query('UPDATE vendor_wallets SET balance_amount = :balance WHERE user_id = :id');
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
        $this->db->execute();
        $wallet_id = $wallet->wallet_id;


        $this->db->query('INSERT INTO vendor_transactions (user_id, type, transaction_id, amount) VALUES(:userid, :type, :txnid, :amount)');

            $this->db->bind(':userid', $_SESSION['rexkod_vendor_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $booking_amount);
            $this->db->bind(':type', 2);
            $this->db->execute();
        

        if($_SESSION['rexkod_login_type']=="rd"){
            $ad_date = date('Y-m-d H:i:s');
            $md_date = date('Y-m-d H:i:s');
            $rd_date = date('Y-m-d H:i:s');
            $bstatus = 8;
            $pickup_date = date('Y-m-d H:i:s');
        }else if($_SESSION['rexkod_login_type']=="md"){
            $ad_date = date('Y-m-d H:i:s');
            $md_date = date('Y-m-d H:i:s');
            $rd_date=NULL;
            $bstatus = 6;
            $pickup_date = date('Y-m-d H:i:s');
        }else if($_SESSION['rexkod_login_type']=="ad"){
            $ad_date = date('Y-m-d H:i:s');
            $md_date=NULL;
            $rd_date=NULL;
            $bstatus=4;
            $pickup_date = date('Y-m-d H:i:s');
        }else if($_SESSION['rexkod_login_type']=="company"){
            $ad_date = NULL;
            $md_date=NULL;
            $rd_date=NULL;
            $bstatus=0;
            $pickup_date = NULL;
        }

        $this->db->query('INSERT INTO bookings (speeder_id,from_id,from_name,from_phone,from_address,from_city,from_state ,from_pincode, to_id, to_name,to_phone,to_address,to_city,to_state,to_pincode,item_name,item_qty ,item_cost ,item_order_id,item_sku,item_weight,item_length,item_breadth,item_height,volumetric_weight,order_weight,order_type,need_package,package_type,shipping_type,booking_cost,from_ad_id,from_md_id,from_rd_id,to_rd_id,to_ad_id,to_md_id,otp_pickup,otp_pickup2,otp_delivery,booking_status,pickup_datetime,from_hub_datetime,from_mother_datetime,from_region_datetime,packing_cost,order_margin,eway_number,shipping_by,order_from) VALUES(:speeder_id,:from_id,:from_name,:from_phone,:from_address,:from_city,:from_state ,:from_pincode ,:to_id,:to_name,:to_phone,:to_address,:to_city,:to_state,:to_pincode,:item_name,:item_qty ,:item_cost ,:item_order_id,:item_sku,:item_weight,:item_length,:item_breadth,:item_height,:volumetric_weight,:order_weight,:order_type,:need_package,:package_type,:shipping_type,:booking_cost,:from_ad_id,:from_md_id,:from_rd_id,:to_rd_id,:to_ad_id,:to_md_id,:otp_pickup,:otp_pickup2,:otp_delivery,:booking_status,:pickup_datetime,:from_hub_datetime,:from_mother_datetime,:from_region_datetime,:packing_cost,:order_margin,:eway_number,:shipping_by,:order_from)');


        // Bind values
        $this->db->bind(':speeder_id', $speeder_id);
        $this->db->bind(':from_id', $from_id);
        $this->db->bind(':from_name', $from_name);
        $this->db->bind(':from_phone', $from_phone);
        $this->db->bind(':from_address', $from_address);
        $this->db->bind(':from_city', $from_city);
        $this->db->bind(':from_state', $from_state);
        $this->db->bind(':from_pincode', $from_pincode);
        $this->db->bind(':to_id', $to_id);
        $this->db->bind(':to_name', $to_name);
        $this->db->bind(':to_phone', $to_phone);
        $this->db->bind(':to_address', $to_address);
        $this->db->bind(':to_city', $to_city);
        $this->db->bind(':to_state', $to_state);
        $this->db->bind(':to_pincode', $to_pincode);
        $this->db->bind(':item_name', $item_name);
        $this->db->bind(':item_qty', $item_qty);
        $this->db->bind(':item_cost', $item_cost);
        $this->db->bind(':item_order_id', $item_order_id);
        $this->db->bind(':item_sku', $item_sku);
        $this->db->bind(':item_weight', $item_weight);
        $this->db->bind(':order_type', $order_type);
        $this->db->bind(':item_length', $item_length);
        $this->db->bind(':item_breadth', $item_breadth);
        $this->db->bind(':item_height', $item_height);
        $this->db->bind(':volumetric_weight', $volumetric_weight);
        $this->db->bind(':order_weight', $order_weight);
        $this->db->bind(':need_package', $need_package);
        $this->db->bind(':package_type', $package_type);
        $this->db->bind(':shipping_type', $shipping_type);
        $this->db->bind(':booking_cost', $booking_cost);
        $this->db->bind(':from_ad_id', $from_ad_id);
        $this->db->bind(':from_md_id', $from_md_id);
        $this->db->bind(':from_rd_id', $from_rd_id);
        $this->db->bind(':to_rd_id', $to_rd_id);
        $this->db->bind(':to_ad_id', $to_ad_id);
        $this->db->bind(':to_md_id', $to_md_id);
        $this->db->bind(':otp_pickup', $this->generateNumericOTP(4));
        $this->db->bind(':otp_pickup2', $this->generateNumericOTP(4));
        $this->db->bind(':otp_delivery', $this->generateNumericOTP(4));
        $this->db->bind(':booking_status', $bstatus);
        $this->db->bind(':pickup_datetime', $pickup_date);
        $this->db->bind(':from_hub_datetime', $ad_date);
        $this->db->bind(':from_mother_datetime', $md_date);
        $this->db->bind(':from_region_datetime', $rd_date);
        $this->db->bind(':packing_cost', $packing_cost);
        $this->db->bind(':order_margin', $order_margin);
        $this->db->bind(':eway_number', $eway_number);
        $this->db->bind(':shipping_by', $shipping_by);
        $this->db->bind(':order_from', $_SESSION['rexkod_vendor_id']);



        if ($this->db->execute()) {
       
            return true;
        } else {
           
            return false;
        }
    }



    public function create_rto($id,$from_address,$from_city,$from_state ,$from_pincode,$to_id,$to_name,$to_phone,$to_address,$to_city,$to_state,$to_pincode,$item_name,$item_qty ,$item_cost ,$item_order_id,$item_sku,$item_weight,$order_type,$item_length,$item_breadth,$item_height,$need_package,$package_type,$shipping_type,$date_slot_pickup,$time_slot_pickup,$date_slot_delivery,$time_slot_delivery,$booking_cost,$from_ad_id,$from_md_id,$to_ad_id,$to_md_id,$from_rd_id,$to_rd_id)
    {
        $this->db->query('INSERT INTO bookings (from_id,from_name,from_phone,from_address,from_city,from_state ,from_pincode, to_id, to_name,to_phone,to_address,to_city,to_state,to_pincode,item_name,item_qty ,item_cost ,item_order_id,item_sku,item_weight,item_length,item_breadth,item_height,order_type,need_package,package_type,shipping_type,date_slot_pickup,time_slot_pickup,date_slot_delivery,time_slot_delivery,booking_cost,from_ad_id,from_md_id,from_rd_id,to_rd_id,to_ad_id,to_md_id,otp_pickup,otp_delivery) VALUES(:from_id,:from_name,:from_phone,:from_address,:from_city,:from_state ,:from_pincode ,:to_id,:to_name,:to_phone,:to_address,:to_city,:to_state,:to_pincode,:item_name,:item_qty ,:item_cost ,:item_order_id,:item_sku,:item_weight,:item_length,:item_breadth,:item_height,:order_type,:need_package,:package_type,:shipping_type,:date_slot_pickup,:time_slot_pickup,:date_slot_delivery,:time_slot_delivery,:booking_cost,:from_ad_id,:from_md_id,:from_rd_id,:to_rd_id,:to_ad_id,:to_md_id,:otp_pickup,:otp_delivery)');


        // Bind values
        $this->db->bind(':from_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':from_name', $_SESSION['rexkod_user_name']);
        $this->db->bind(':from_phone', $_SESSION['rexkod_user_phone']);
        $this->db->bind(':from_address', $from_address);
        $this->db->bind(':from_city', $from_city);
        $this->db->bind(':from_state', $from_state);
        $this->db->bind(':from_pincode', $from_pincode);
        $this->db->bind(':to_id', $to_id);
        $this->db->bind(':to_name', $to_name);
        $this->db->bind(':to_phone', $to_phone);
        $this->db->bind(':to_address', $to_address);
        $this->db->bind(':to_city', $to_city);
        $this->db->bind(':to_state', $to_state);
        $this->db->bind(':to_pincode', $to_pincode);
        $this->db->bind(':item_name', $item_name);
        $this->db->bind(':item_qty', $item_qty);
        $this->db->bind(':item_cost', $item_cost);
        $this->db->bind(':item_order_id', $item_order_id);
        $this->db->bind(':item_sku', $item_sku);
        $this->db->bind(':item_weight', $item_weight);
        $this->db->bind(':order_type', 2);
        $this->db->bind(':item_length', $item_length);
        $this->db->bind(':item_breadth', $item_breadth);
        $this->db->bind(':item_height', $item_height);
        $this->db->bind(':need_package', $need_package);
        $this->db->bind(':package_type', $package_type);
        $this->db->bind(':shipping_type', $shipping_type);
        $this->db->bind(':date_slot_pickup', $date_slot_pickup);
        $this->db->bind(':time_slot_pickup', $time_slot_pickup);
        $this->db->bind(':date_slot_delivery', $date_slot_delivery);
        $this->db->bind(':time_slot_delivery', $time_slot_delivery);
        $this->db->bind(':booking_cost', $booking_cost);
        $this->db->bind(':from_ad_id', $from_ad_id);
        $this->db->bind(':from_md_id', $from_md_id);
        $this->db->bind(':from_rd_id', $from_rd_id);
        $this->db->bind(':to_rd_id', $to_rd_id);
        $this->db->bind(':to_ad_id', $to_ad_id);
        $this->db->bind(':to_md_id', $to_md_id);
        $this->db->bind(':otp_pickup', $this->generateNumericOTP(4));
        $this->db->bind(':otp_delivery', $this->generateNumericOTP(4));

        if ($this->db->execute()) {
            $this->order_update($id,15);
            return true;
        } else {
            return false;
        }
    }

    public function generateNumericOTP($n)
    {
      $generator = "135792468";
      $result = "";
      for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand() % (strlen($generator))), 1);
      } 
      return $result;
    }


     public function get_all_ads(){
        $this->db->query("SELECT * FROM auth WHERE type=:type ORDER BY id DESC");
        $this->db->bind(':type', 'ad');
        $results = $this->db->resultset();
        
        return $results;
      }


      public function get_all_companies(){
        $this->db->query("SELECT * FROM auth WHERE type=:type ORDER BY id DESC");
        $this->db->bind(':type', 'company');
        $results = $this->db->resultset();
        
        return $results;
      }

      public function get_delivery($id){
        $this->db->query("SELECT * FROM delivery WHERE delivery_id=:id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
      }
      

      public function get_all_customers(){
        $this->db->query("SELECT * FROM auth WHERE type=:type ORDER BY id DESC");
        $this->db->bind(':type', 'user');
        $results = $this->db->resultset();
        
        return $results;
      }

      public function get_all_mds(){
        $this->db->query("SELECT * FROM auth WHERE type=:type ORDER BY id DESC");
        $this->db->bind(':type', 'md');
        $results = $this->db->resultset();
        
        return $results;
      }


      public function get_all_rds(){
        $this->db->query("SELECT * FROM auth WHERE type=:type ORDER BY id DESC");
        $this->db->bind(':type', 'rd');
        $results = $this->db->resultset();
        
        return $results;
      }


      public function get_rd($id){
        $this->db->query("SELECT * FROM rd WHERE rd_id=:id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        
        return $result;
      }


      public function get_all_delivery(){
        $this->db->query("SELECT * FROM auth WHERE type=:type");
        $this->db->bind(':type', 'delivery');
        $results = $this->db->resultset();
        
        return $results;
      }

      public function get_ads(){
        $this->db->query("SELECT * FROM ad");
        $results = $this->db->resultset();
        return $results;
      }

      public function get_mds(){
        $this->db->query("SELECT * FROM md");
        $results = $this->db->resultset();
        return $results;
      }


      public function get_rds(){
        $this->db->query("SELECT * FROM rd");
        $results = $this->db->resultset();
        return $results;
      }

      
    public function create_truck_order($from_area,$to_area,$from_latlon,$to_latlon,$from_pincode,$to_pincode,$truck,$distance,$cost,$md_id)
    {
        $wallet_id = 0;
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)-$cost;
        
        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        $this->db->execute();
        $wallet_id = $wallet->wallet_id;
        

        $this->db->query('INSERT INTO truck_orders(user_id,md_id,name,phone,from_area,to_area,from_latlon,to_latlon,from_pincode,to_pincode,truck,distance,cost) VALUES(:user_id,:md_id,:name,:phone,:from_area,:to_area,:from_latlon,:to_latlon,:from_pincode,:to_pincode,:truck,:distance,:cost)');

        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':name', $_SESSION['rexkod_user_name']);
        $this->db->bind(':phone', $_SESSION['rexkod_user_phone']);
        $this->db->bind(':md_id', $md_id);
        $this->db->bind(':from_area', $from_area);
        $this->db->bind(':to_area', $to_area);
        $this->db->bind(':from_latlon', $from_latlon);
        $this->db->bind(':to_latlon', $to_latlon);
        $this->db->bind(':from_pincode', $from_pincode);
        $this->db->bind(':to_pincode', $to_pincode);
        $this->db->bind(':truck', $truck);
        $this->db->bind(':distance', $distance);
        $this->db->bind(':cost', $cost);

        if ($this->db->execute()) {
            
        } else {
            return false;
        }
    }


    public function create_hyperlocal_order($from_area,$to_area,$from_latlon,$to_latlon,$from_pincode,$to_pincode,$from_address,$to_name,$to_phone,$to_address,$parcel_type,$distance,$cost,$ad_id)
    {
        $wallet_id = 0;
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)-$cost;
        
        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        $this->db->execute();
        $wallet_id = $wallet->wallet_id;
        

        $this->db->query('INSERT INTO hyperlocal(user_id,ad_id,from_name,from_phone,from_address,from_area,from_latlon,from_pincode,to_name,to_phone,to_address,to_area,to_latlon,to_pincode,distance,cost,otp_pickup,otp_delivery,parcel_type) VALUES(:user_id,:ad_id,:from_name,:from_phone,:from_address,:from_area,:from_latlon,:from_pincode,:to_name,:to_phone,:to_address,:to_area,:to_latlon,:to_pincode,:distance,:cost,:otp_pickup,:otp_delivery,:parcel_type)');

        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':ad_id', $ad_id);
        $this->db->bind(':from_name', $_SESSION['rexkod_user_name']);
        $this->db->bind(':from_phone', $_SESSION['rexkod_user_phone']);
        $this->db->bind(':from_address', $from_address);
        $this->db->bind(':from_area', $from_area);
        $this->db->bind(':from_latlon', $from_latlon);
        $this->db->bind(':from_pincode', $from_pincode);
        $this->db->bind(':to_name', $to_name);
        $this->db->bind(':to_phone', $to_phone);
        $this->db->bind(':to_address', $to_address);
        $this->db->bind(':to_area', $to_area);
        $this->db->bind(':to_latlon', $to_latlon);
        $this->db->bind(':to_pincode', $to_pincode);
        $this->db->bind(':distance', $distance);
        $this->db->bind(':cost', $cost);
        $this->db->bind(':otp_pickup', $this->generateNumericOTP(4));
        $this->db->bind(':otp_delivery', $this->generateNumericOTP(4));
        $this->db->bind(':parcel_type', $parcel_type);

        if ($this->db->execute()) {
            
        } else {
            return false;
        }
    }



      public function get_ad_pincodes($id){
        $this->db->query("SELECT * FROM ad WHERE ad_id = :aid");
        $this->db->bind(':aid', $id);
        $result = $this->db->single();
        return $result;
      }


      public function get_md_pincodes($id){
        $this->db->query("SELECT * FROM md WHERE md_id = :mid");
        $this->db->bind(':mid', $id);
        $result = $this->db->single();
        return $result;
      }

      public function get_rd_detail($id){
        $this->db->query("SELECT * FROM rd WHERE rd_id = :rid");
        $this->db->bind(':rid', $id);
        $result = $this->db->single();
        return $result;
      }


      public function get_md($id){
        $this->db->query("SELECT * FROM md WHERE md_id = :mid");
        $this->db->bind(':mid', $id);
        $result = $this->db->single();
        return $result;
      }

      public function get_ad($id){
        $this->db->query("SELECT * FROM ad WHERE ad_id = :aid");
        $this->db->bind(':aid', $id);
        $result = $this->db->single();
        return $result;
      }


      public function get_company($id){
        $this->db->query("SELECT * FROM company WHERE company_id = :aid");
        $this->db->bind(':aid', $id);
        $result = $this->db->single();
        return $result;
      }
      

      public function getpropage_points(){
        $this->db->query("SELECT * FROM pro_page_points");
  
        $results = $this->db->resultset();
  
        return $results;
      }

      public function getTruckTypes(){
        $this->db->query("SELECT * FROM trucks");
        $results = $this->db->resultset();
        return $results;
      }



    public function get_all_vendors1()
    {
        $this->db->query('SELECT * FROM vendors');
        
        return $this->db->resultSet();
    }

    public function get_all_products_forVendor($id) 
    {
        $this->db->query('SELECT * FROM products where created_byId = :created_byId');

        $this->db->bind(':created_byId', $id);

        $result = $this->db->resultSet();
        return $result;
    }


    public function get_all_vendor_items($id) 
    {
        $this->db->query('SELECT * FROM items where item_vendor_id = :vid');

        $this->db->bind(':vid', $id);

        $result = $this->db->resultSet();
        return $result;
    }

    public function get_productsBySearch($search_input)
    {
        $this->db->query('SELECT * FROM products WHERE p_name LIKE concat("%", :search_input, "%")');

        $this->db->bind(':search_input', $search_input);

        return $row = $this->db->resultSet();
    }

    public function get_productById($id)
    {
        $this->db->query('SELECT * FROM products WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
        
    }


    public function get_orders_user($user_id) 
    {
        $this->db->query('SELECT * FROM orders where user_id = :user_id ORDER BY id DESC');

        $this->db->bind(':user_id', $user_id);

        $result = $this->db->resultSet();
        return $result;
    }


    public function get_company_orders($user_id) 
    {
        $this->db->query('SELECT * FROM bookings where order_from = :user_id ORDER BY booking_id DESC');

        $this->db->bind(':user_id', $user_id);

        $result = $this->db->resultSet();
        return $result;
    }


    public function get_billing_orders() 
    {
        $this->db->query('SELECT * FROM bookings where order_from !=0');

        $result = $this->db->resultSet();
        return $result;
    }

    public function get_online_orders() 
    {
        $this->db->query('SELECT * FROM bookings where order_from = 0');

        $result = $this->db->resultSet();
        return $result;
    }


    public function get_from_orders_company() 
    {
        $this->db->query('SELECT * FROM bookings where order_from = :user_id ORDER BY booking_id DESC');

        $this->db->bind(':user_id', $_SESSION['rexkod_vendor_id']);

        $result = $this->db->resultSet();
        return $result;
    }
    
    
    public function report_margin($start_date,$end_date) 
    {
        $this->db->query('SELECT * FROM bookings where order_from != 0 AND DATE(booking_datetime) BETWEEN :sdate AND :edate ORDER BY booking_id DESC');
        $this->db->bind(':sdate', $start_date);
        $this->db->bind(':edate', $end_date);
        $result = $this->db->resultSet();
        return $result;
    }

    public function report_cod($start_date,$end_date) 
    {
        $this->db->query('SELECT * FROM bookings where order_type = 3 AND DATE(booking_datetime) BETWEEN :sdate AND :edate ORDER BY booking_id DESC');
        $this->db->bind(':sdate', $start_date);
        $this->db->bind(':edate', $end_date);
        $result = $this->db->resultSet();
        return $result;
    }

    public function report_pending_payment($start_date,$end_date) 
    {
        $this->db->query('SELECT * FROM bookings where (order_type = 1 OR order_type = 2 OR order_type = 3) AND DATE(booking_datetime) BETWEEN :sdate AND :edate ORDER BY booking_id DESC');
        $this->db->bind(':sdate', $start_date);
        $this->db->bind(':edate', $end_date);
        $result = $this->db->resultSet();
        return $result;
    }

    public function report_customer() 
    {
        $this->db->query('SELECT * FROM auth where type =:type ORDER BY id DESC');
        //$this->db->bind(':sdate', $start_date);
        //$this->db->bind(':edate', $end_date);
        $this->db->bind(':type', "user");
        $result = $this->db->resultSet();
        return $result;
    }

    public function report_ad() 
    {
        $this->db->query('SELECT * FROM auth where type =:type ORDER BY id DESC');
        //$this->db->bind(':sdate', $start_date);
        //$this->db->bind(':edate', $end_date);
        $this->db->bind(':type', "ad");
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_orders_fromProdList($id) 
    {
        $this->db->query('SELECT * FROM payment where book_id = :book_id');

        $this->db->bind(':book_id', $id);

        $result = $this->db->single();
        return $result;
    }

    public function get_order_details($id)
    {
        $this->db->query("SELECT * FROM orders where id = :id ");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }

    


    public function weight_discrepancy($id, $diff, $amount)
    {
        $this->db->query('UPDATE bookings SET weight_discrepancy=:diff, weight_payable=:amount WHERE booking_id=:id');

        $this->db->bind(':id', $id);
        $this->db->bind(':diff', $diff);
        $this->db->bind(':amount', $amount);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }












}
