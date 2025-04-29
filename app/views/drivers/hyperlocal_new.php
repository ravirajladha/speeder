<?php require APPROOT . '/views/inc_driver/header.php'; ?>
<?php require APPROOT . '/views/inc_driver/nav-header.php'; ?>



<div class="container mt-3 mb-3 text-center">
            <h4 class="text-white">New Local Orders</h4>
        </div>
    <!-- Begin page content -->
    <main class="flex-shrink-0 min">

        <!-- page content start -->

        <div class="main-container">
            <div class="container">
              
            <?php $order_count = 0;
            foreach($data['all_orders'] as $order):
          
                ?>
                
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <div class="row mb-2">
                            <div class="col">
                            <h6>Order #<?php echo $order->order_id; ?></h6>
                            <h6 class="mb-1 text-default">From: <?php echo $order->from_area. " <br><br>To: " . $order->to_area; ?></h6>
                            </div>
                            
                        </div>
                        <div class="media">                            
                            <div class="media-body">
                            
                            <p class=""><?php echo $order->distance; ?>Kms</p>
                           
                                <h6 class="mb-1"><?php echo $order->parcel_type; ?><span class='pull-right'><a href="<?php echo URLROOT;?>/drivers/accept_order/<?php echo $order->order_id; ?>"><button class="btn btn-sm btn-success">Accept Order</button></a></span></h6>
                               
                            
                            </div>        
                        </div>
                    </div>
                </div>
                <?php endforeach; 
                
                ?>
              
            </div>
        </div>
    </main>

    <?php require APPROOT . '/views/inc_driver/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_driver/footer.php'; ?>

<script>
  function checkotp_first(val,otp,oid){
    if(val == otp){
      
        $.ajax({
            url  : '<?php echo URLROOT; ?>/drivers/order_update/'+ oid +'/100',
            type : 'POST',
            data : {oid},

            success : function()
            {
                
            }

        });
        
    document.getElementById("first"+oid).style.display = "none";
    document.getElementById("main"+oid).style.display = "block";
    }
  }
  
  function checkotp_second(val,otp,id){

    if(val == otp){

        var item_weight = $('#item_weight').val();
        var item_length = $('#item_length').val();
        var item_breadth = $('#item_breadth').val();
        var item_height = $('#item_height').val();

        $.ajax({
            url  : '<?php echo URLROOT; ?>/drivers/update_discrepancy/',
            type : 'POST',
            data : {id, item_weight,item_length,item_breadth,item_height},

            success : function(res)
            {
                
            }

        });
    document.getElementById("picked").style.display = "block";
    document.getElementById("pm"+id).innerHTML = "No Weight Discrepancy";
    }
  }



function checkcost(id){

    var item_weight = $('#item_weight').val();
    var item_length = $('#item_length').val();
    var item_breadth = $('#item_breadth').val();
    var item_height = $('#item_height').val();

        $.ajax({
            url  : '<?php echo URLROOT; ?>/drivers/check_discrepancy',
            type : 'POST',
            data : {id, item_weight,item_length,item_breadth,item_height},

            success : function(res)
            {
                document.getElementById("pm"+id).innerHTML = res;
            }

        });
                        
    document.getElementById("fm"+id).style.display = "block";
  }





</script>



