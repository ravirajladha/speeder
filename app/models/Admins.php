<?php
class Admins
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function get_all_orders() 
    {
        $this->db->query('SELECT * FROM orders ORDER BY id desc');
        $result = $this->db->resultSet();
        return $result;
    }
      public function get_all_userinfo()
    {
        $this->db->query("SELECT * FROM auth where auth_id = :id");
        $this->db->bind(':id', $_SESSION['user_id']);
        return $results = $this->db->single();
    }



    public function get_all_category()
    {
        $this->db->query('SELECT * FROM category WHERE category_vendor_id = :vid order by category_id DESC');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        return $this->db->resultSet();
    }

    public function get_all_coupons()
    {
        $this->db->query('SELECT * FROM coupons order by coupon_id DESC');
        
        return $this->db->resultSet();
    }


    public function get_all_subcategory()
    {
        $this->db->query('SELECT * FROM subcategory WHERE subcategory_vendor_id = :vid order by subcategory_id DESC');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        
        return $this->db->resultSet();
    }



    public function create_product_db($name, $subcat, $p_details, $created_byId, $data)
    {
        $unqdate = date("Ymd");
        $unqtime = time();
        $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
        
        if(!empty($_FILES['pro_img1']['name']))
        {
            $f_name = $_FILES['pro_img1']['name'];
            $f_temp = $_FILES['pro_img1']['tmp_name'];
            $size = $_FILES['pro_img1']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile='1'.$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp1=$f_newfile;
        }
        else
        {
            $temp1 = NULL;
        }


        if(!empty($_FILES['pro_img2']['name']))
        {
            $f_name = $_FILES['pro_img2']['name'];
            $f_temp = $_FILES['pro_img2']['tmp_name'];
            $size = $_FILES['pro_img2']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile='2'.$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp2=$f_newfile;
        }
        else
        {
            $temp2 = NULL;
        }


        if(!empty($_FILES['pro_img3']['name']))
        {
            $f_name = $_FILES['pro_img3']['name'];
            $f_temp = $_FILES['pro_img3']['tmp_name'];
            $size = $_FILES['pro_img3']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile='3'.$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp3=$f_newfile;
        }
        else
        {
            $temp3 = NULL;
        }

        if(!empty($_FILES['desc_img']['name']))
        {
            $f_name = $_FILES['desc_img']['name'];
            $f_temp = $_FILES['desc_img']['tmp_name'];
            $size = $_FILES['desc_img']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile='4'.$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp4=$f_newfile;
        }
        else
        {
            $temp4 = NULL;
        }




        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $subcat);

        $cat_val = $this->db->single();

        $cat_id = $cat_val->category_id;



        $this->db->query('INSERT INTO products(p_name, p_image, p_image2, p_image3, p_cat, p_subcat, p_details, p_desc_img, p_type, created_byId, created_byType, min1, max1, price1, min2, max2, price2, min3, max3, price3, min4, max4, price4, min5, max5, price5) VALUES (:name,:image,:image2,:image3,:cat,:subcat,:p_details, :p_desc_img, :p_type, :created_byId, :created_byType, :min1, :max1, :price1, :min2, :max2, :price2, :min3, :max3, :price3, :min4, :max4, :price4, :min5, :max5, :price5)');

        //bind our parameters
        $this->db->bind(':name',$name);
        $this->db->bind(':image',$temp1);
        $this->db->bind(':image2',$temp2);
        $this->db->bind(':image3',$temp3);
        
        $this->db->bind(':cat',$cat_id);
        $this->db->bind(':subcat',$subcat);
        $this->db->bind(':p_details',$p_details);
        $this->db->bind(':p_desc_img',$temp4);
       
        $this->db->bind(':p_type','0');

        $this->db->bind(':created_byId',$created_byId);
        $this->db->bind(':created_byType',"vendor");


        $this->db->bind(':min1',$data['min1']);
        $this->db->bind(':max1',$data['max1']);
        $this->db->bind(':price1',$data['price1']);

        $this->db->bind(':min2',$data['min2']);
        $this->db->bind(':max2',$data['max2']);
        $this->db->bind(':price2',$data['price2']);

        $this->db->bind(':min3',$data['min3']);
        $this->db->bind(':max3',$data['max3']);
        $this->db->bind(':price3',$data['price3']);

        $this->db->bind(':min4',$data['min4']);
        $this->db->bind(':max4',$data['max4']);
        $this->db->bind(':price4',$data['price4']);

        $this->db->bind(':min5',$data['min5']);
        $this->db->bind(':max5',$data['max5']);
        $this->db->bind(':price5',$data['price5']);



        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }


    
    public function create_item_db($name, $subcat, $desc, $price, $discount_price, $price_dine, $discount_price_dine)
    {
        $unqdate = date("Ymd");
        $unqtime = time();
        $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
        
        if(!empty($_FILES['item_image']['name']))
        {
            $f_name = $_FILES['item_image']['name'];
            $f_temp = $_FILES['item_image']['tmp_name'];
            $size = $_FILES['item_image']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile='1'.$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp1=$f_newfile;
        }
        else
        {
            $temp1 = NULL;
        }

        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $subcat);

        $cat_val = $this->db->single();

        $cat_id = $cat_val->category_id;



        $this->db->query('INSERT INTO items(item_name, item_vendor_id, item_cat_id, item_subcat_id, item_img, item_desc, item_price, item_discount_price, item_price_dine, item_discount_price_dine) VALUES (:name, :vid, :catid, :subcatid, :image, :desc, :price, :disprice, :pricedine, :dispricedine)');

        //bind our parameters
        $this->db->bind(':name',$name);
        $this->db->bind(':vid',$_SESSION['rexkod_vendor_id']);
        $this->db->bind(':catid',$cat_id);
        $this->db->bind(':subcatid',$subcat);
        $this->db->bind(':image',$temp1);
        $this->db->bind(':desc',$desc);

        $this->db->bind(':price',$price);
        $this->db->bind(':disprice',$discount_price);
        $this->db->bind(':pricedine',$price_dine);
        $this->db->bind(':dispricedine',$discount_price_dine);



        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }




    public function get_all_customers()
    {
        $this->db->query("SELECT * FROM auth WHERE type = :type order by id DESC");
        $this->db->bind(':type', 'user');
        return $result = $this->db->resultSet();
    }

    public function get_all_payouts()
    {
        $this->db->query("SELECT * FROM payouts");
        return $result = $this->db->resultSet();
    }


    public function find_all_order()
    {
        $this->db->query("SELECT * FROM orders where user_id = :id order by id DESC");
        $this->db->bind(':id', $_SESSION['user_id']);
        return $results = $this->db->resultSet();
    }

    public function get_order_details($id)
    {
        $this->db->query("SELECT * FROM orders where id = :id ");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_pharmacy_med_list($id)
    {
        $this->db->query("SELECT * FROM product_order_list where p_id = :booking_id");

        $this->db->bind(':booking_id', $id);


        return $results = $this->db->resultSet();
    }
    public function get_pharmacy_med_list_single($id)
    {
        $this->db->query("SELECT * FROM product_order_list where p_id = :booking_id");

        $this->db->bind(':booking_id', $id);
 

        return $results = $this->db->single();
    }
    public function change_status($id,$st)
    {
        $assign_time = date("d-M-Y h:i A");

        $this->db->query('UPDATE orders set status = :status, last_updatedAt = :updated_at, last_updatedBy = :user_id WHERE id = :id');
        // Bind values
        $this->db->bind(':status', $st);
        $this->db->bind(':id', $id);
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':updated_at', $assign_time);


        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    public function insert_auth_deliveryUser($data)
    {
        $this->db->query('INSERT INTO auth (name, email,phone,password,type, address, pin_code) VALUES(:name, :email, :phno, :pass, :type, :address, :pin_code)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phno', $data['ph_no']);
        $this->db->bind(':pass', $data['password']);
        $this->db->bind(':type', 'delivery');
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':pin_code', $data['pin_code']);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_deliveryUsers()
    {
        $this->db->query("SELECT * FROM auth where type = :type");

        $this->db->bind(':type', 'delivery');


        return $results = $this->db->resultSet();
    }

    public function get_all_by_ID($id)
    {
        $this->db->query("SELECT * FROM auth where auth_id = :id");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function get_ad($id)
    {
        $this->db->query("SELECT *
        FROM ad
        INNER JOIN auth 
        ON ad.ad_id = auth.id
        WHERE ad.ad_id=:id
        ;");

        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function get_company($id)
    {
        $this->db->query("SELECT *
        FROM company
        INNER JOIN auth 
        ON company.company_id = auth.id
        WHERE company.company_id=:id
        ;");

        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function get_md($id)
    {
        $this->db->query("SELECT *
        FROM md
        INNER JOIN auth 
        ON md.md_id = auth.id
        WHERE md.md_id=:id
        ;");

        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }


    public function get_rd($id)
    {
        $this->db->query("SELECT *
        FROM rd
        INNER JOIN auth 
        ON rd.rd_id = auth.id
        WHERE rd.rd_id=:id
        ;");

        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function update_auth_deliveryUser($data)
    {
        $this->db->query('UPDATE auth set name = :name, email = :email, phone = :ph_no, address = :address, pin_code = :pin_code WHERE auth_id = :auth_id');
        // Bind values
        $this->db->bind(':auth_id', $data['auth_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':ph_no', $data['ph_no']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':pin_code', $data['pin_code']);


        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    public function update_auth_deliveryUser1($data)
    {
        $this->db->query('UPDATE auth set name = :name, email = :email, phone = :ph_no, password = :password, address = :address, pin_code = :pin_code WHERE auth_id = :auth_id');
        // Bind values
        $this->db->bind(':auth_id', $data['auth_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':ph_no', $data['ph_no']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':pin_code', $data['pin_code']);
         $this->db->bind(':password', $data['password']);


        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    public function delete_deliveryUserby_id($id)
    {
        $this->db->query("DELETE FROM auth WHERE auth_id = :auth_id");

        $this->db->bind(':auth_id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function change_deliverystatus($id,$delivery_userId, $delivery_userName)
    {
        $assign_time = date("d-M-Y h:i A");

        $this->db->query('UPDATE orders set status = :status, delivery_user = :delivery_userName, delivery_userId = :delivery_userId, last_updatedAt = :updated_at, last_updatedBy = :user_id  WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':status', 3);
        $this->db->bind(':delivery_userId', $delivery_userId);
        $this->db->bind(':delivery_userName', $delivery_userName);


        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':updated_at', $assign_time);
        
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }




    public function update_admin_remark($id,$admin_remark)
    {

        $this->db->query('UPDATE feedback set admin_remark = :admin_remark WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':admin_remark', $admin_remark);

        if($this->db->execute())
        {

          return true;
        }
        else
        {
          return false;
        }

    }


    public function update_feedback_status($id,$status)
    {

        $this->db->query('UPDATE feedback set status = :status WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if($this->db->execute())
        {

          return true;
        }
        else
        {
          return false;
        }

    }



    public function find_all_orderByDelivery()
    {
        $this->db->query("SELECT * FROM orders where delivery_userId = :user_id order by id DESC");
        $this->db->bind(':user_id', $_SESSION['user_id']);
        
        return $results = $this->db->resultSet();
    }


    public function getTransactions_all()
    {
        $this->db->query("SELECT * FROM transactions order by id DESC");
        return $results = $this->db->resultSet();
    }

    public function getFeedbacks()
    {
        $this->db->query("SELECT * FROM feedback order by id DESC");
        return $results = $this->db->resultSet();
    }

    public function create_category($category_name,$category_img,$category_start_time,$category_end_time)
    {
        $unqdate = date("Ymd");
        $unqtime = time();
        $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
        
        

        $this->db->query('INSERT INTO category(category_name, category_vendor_id, category_img, category_start_time, category_end_time) VALUES (:category_name, :vid, :category_img, :starttime, :endtime)');
        //bind our parameters
        $this->db->bind(':category_name',$category_name);
        $this->db->bind(':vid',$_SESSION['rexkod_vendor_id']);
        $this->db->bind(':category_img',$category_img);
        $this->db->bind(':starttime',$category_start_time);
        $this->db->bind(':endtime',$category_end_time);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }


    public function change_status_coupon($id,$st)
    {

        $this->db->query('UPDATE coupons set coupon_status = :status WHERE coupon_id = :id');
        // Bind values
        $this->db->bind(':status', $st);
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

    public function create_coupon($coupon_title, $coupon_code, $coupon_type, $coupon_value, $coupon_cap)
    {
        $this->db->query('INSERT INTO coupons(coupon_title, coupon_code, coupon_type, coupon_value, coupon_cap, coupon_status) VALUES (:coupon_title, :coupon_code, :coupon_type, :coupon_value, :coupon_cap, :coupon_status)');
        //bind our parameters
        
        $this->db->bind(':coupon_title',$coupon_title);
        $this->db->bind(':coupon_code',$coupon_code);
        $this->db->bind(':coupon_type',$coupon_type);
        $this->db->bind(':coupon_value',$coupon_value);
        $this->db->bind(':coupon_cap',$coupon_cap);
        $this->db->bind(':coupon_status',1);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }





    public function create_subcategory($subcategory_name,$subcategory_img,$category_id,$subcategory_tax)
    {
        $this->db->query('INSERT INTO subcategory(subcategory_name, subcategory_vendor_id, category_id, subcategory_img, subcategory_tax) VALUES (:subcategory_name, :vid, :category_id, :subcategory_img, :subcategory_tax)');
        //bind our parameters
        $this->db->bind(':subcategory_name',$subcategory_name);
        $this->db->bind(':category_id',$category_id);
        $this->db->bind(':vid',$_SESSION['rexkod_vendor_id']);
        $this->db->bind(':subcategory_img',$subcategory_img);
        $this->db->bind(':subcategory_tax',$subcategory_tax);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }


    public function getSubcategoryById($id)
    {
        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }




    public function add_vendor($email, $phone, $pass)
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
                return true;
            } else {
                return false;
            }

    }



    public function getCategoryById($id)
    {
        $this->db->query("SELECT * FROM category where category_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function update_category($id,$category_name, $img)
    {

        $temp = 0;
        if(!empty($_FILES['files']['name']))
        {
            $f_name = $_FILES['files']['name'];
            $f_temp = $_FILES['files']['tmp_name'];
            $size = $_FILES['files']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile=uniqid().'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp=$f_newfile;
        }
        else
        {
            $temp = $img;
        }


        $this->db->query('UPDATE category set category_name = :category_name, img = :img  WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':category_name', $category_name);
        $this->db->bind(':img', $temp);

        
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    public function update_status_category($id,$status)
    {

        $this->db->query('UPDATE category set hide_status = :hide_status WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':hide_status', $status);


        
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }



    public function update_cod_customer($id,$cod_val)
    {

        $this->db->query('UPDATE users set user_permission = :cod_val WHERE user_id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':cod_val', $cod_val);

        if($this->db->execute())
        {

          return true;
        }
        else
        {
          return false;
        }

    }


    public function update_cod_vendor($id,$cod_val)
    {

        $this->db->query('UPDATE vendors set vendor_permissions = :cod_val WHERE vendor_id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':cod_val', $cod_val);

        if($this->db->execute())
        {

          return true;
        }
        else
        {
          return false;
        }

    }




    public function get_productBy_id($id)
    {
        $this->db->query("SELECT * FROM products where id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function get_categoryBy_name($category_name)
    {
        $this->db->query("SELECT * FROM category where category_name = :category_name");

        $this->db->bind(':category_name', $category_name);

        return $results = $this->db->single();
    }

    public function update_product_db($id, $name, $price, $discount_price, $cat, $p_details, $product_type, $p_image)
    {
        $temp = 0;
        if(!empty($_FILES['files']['name']))
        {
            $f_name = $_FILES['files']['name'];
            $f_temp = $_FILES['files']['tmp_name'];
            $size = $_FILES['files']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile=uniqid().'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp=$f_newfile;
        }
        else
        {
            $temp = $p_image;
        }

        $this->db->query('UPDATE products set p_name = :name, p_image = :image, p_price =:price, discount_price = :discount_price, p_cat = :cat, p_details = :p_details, p_type = :p_type WHERE id = :id');
        // Bind values
        $this->db->bind(':id',$id);
        $this->db->bind(':name',$name);
        $this->db->bind(':image',$temp);
        $this->db->bind(':price',$price);
         $this->db->bind(':discount_price',$discount_price);
        $this->db->bind(':cat',$cat);
        $this->db->bind(':p_details',$p_details);       
        $this->db->bind(':p_type',$product_type);
        
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }


    public function viewOrder_deliveryUser($user_id)
    {
        $this->db->query("SELECT * FROM orders where delivery_userId = :user_id order by id DESC");
        $this->db->bind(':user_id', $user_id);
        
        return $results = $this->db->resultSet();
    }

    public function update_active_status_db($id, $status)
     {
        // $assign_time = date("d-M-Y h:i A");

        $this->db->query('UPDATE auth set active_status = :active_status where auth_id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':active_status', $status);


       
        if($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }


    public function verify_vendor($id)
    {
       $this->db->query('UPDATE vendors set vendor_verified = :verify where vendor_id = :id');

       $this->db->bind(':id', $id);
       $this->db->bind(':verify', '1');


      
       if($this->db->execute())
       {
           return true;
       }
       else
       {
           return false;
       }

   }


   public function verify_customer($id)
   {
      $this->db->query('UPDATE users set user_verified = :verify where user_id = :id');

      $this->db->bind(':id', $id);
      $this->db->bind(':verify', '1');


     
      if($this->db->execute())
      {
          return true;
      }
      else
      {
          return false;
      }

  }


    public function view_allProdByCat($id)
    {
        $this->db->query("SELECT * FROM products where p_cat = :p_cat ");

        $this->db->bind(':p_cat', $id);

        return $results = $this->db->resultSet();
    }

    public function get_download_content(){


            $this->db->query('SELECT * from products');

          

            $result=$this->db->resultSet();

             return $result;
        }























    
   
}
