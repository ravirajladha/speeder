<html lang="en">


  <style type="text/css" media="print">
  /* @page { 
        size: landscape;
    }
    body { 
        writing-mode: tb-rl;
    } */
</style>
<style>
  table, thead, tr, th, td {
  border: 2px solid;
  border-color:#333;
}
</style>

<?php 
$order = $data['order']; 
$pageMod = New Page; 
$md= $pageMod->get_userinfo($order->to_md_id); 
$md_name = $md->name; ?>
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <main role="main" class="container row">
    <div class="col-md-6">
             <div class="border border-dark" style='padding:10px;'>
                 <div class="row">
                     <div class="col-md-8">
                     <h5>Deliver To:</h5>
                     <p><?php echo $order->to_name; ?><br>
                     <?php echo $order->to_address.", ".$order->to_city.", ".$order->to_state.", ".$order->to_pincode; ?><br><strong>Phone: <?php echo $order->to_phone; ?></strong></p>
                     </div>
                     <div class="col-md-4">
                        <img style='padding:25px;' src="<?php echo URLROOT; ?>/assets/logo.png" width='150' alt="">
                     </div>
                 </div>
                
            </div>
            <div class="border border-dark" style='padding:10px;'>
            <div class="row">
                     <div class="col-md-8">
                     ORDER ID: <?php echo $order->booking_id; ?><br>
                        <?php echo "<img style='margin-top:20px;' alt='testing' width='200' src='".URLROOT."/barcode.php?codetype=code128b&size=50&text=".$order->speeder_id."&print=true'/>";?>
                     </div>
                     <div class="col-md-4">
                        <img style='padding:10px;' src="<?php echo URLROOT; ?>/assets/<?php if($order->package_type==0 || $order->package_type==3){echo 'standard.png';} else if($order->package_type==1){echo 'battery.png';} else if($order->package_type==2){echo 'fragile.jpeg';}?>" width='125' alt="">
                     </div>
                 </div>
                
                
            </div>
            <div class="border border-dark" style='padding:10px;'>
            <div class="row">
                     <div class="col-md-7">
                     Shipping Weight: <?php echo $order->item_weight; ?><br>
                     Dimensions: <?php echo $order->item_length; ?>L x <?php echo $order->item_breadth; ?>B x <?php echo $order->item_height; ?>H 
                     </div>
                     <div class="col-md-5">
                       <strong class='pull-right'>Route Code: <?php echo $md_name; ?><br></strong>
                     </div><br><br><br><br><br>
                     <table class="table"  style='margin:5px;'>
    <thead>
      <tr>
        <th>Name</th>
        <th>QTY</th>
        <th>Total Value</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $order->item_name; ?></td>
        <td><?php echo $order->item_qty; ?></td>
        <td><?php echo $order->item_cost; ?></td>
      </tr>
    </tbody>
  </table>
  <div class="col-md-9">
                     <h4>Cash to Collect - <i class='fa fa-inr'></i> <?php if($order->order_type==1){echo $order->booking_cost;}else {echo "NIL";} ?></h4>
                     </div>
                     <div class="col-md-3">
                       <strong style='border-color:#333;border:2px;'><?php if($order->order_type==1){echo "COD";}else {echo "PAID";} ?></strong>
                     </div>
                       </div>
                       
            </div>    
            <div class="border border-dark" style='padding:10px;'>
            <div class="row">
                     <div class="col-md-9">
                     <h5>Shipped By (If not delivered, Return to)</h5>
                     <p><?php echo $order->from_name; ?> <br>
                     <?php echo $order->from_address.", ".$order->from_city.", ".$order->from_state.", ".$order->from_pincode; ?><br><strong>Phone: <?php echo $order->from_phone; ?></strong></p>
                     </div>
                     <div class="col-md-3">
                        <div>
                            FORWARD
                        </div>
                     </div>
                 </div>
                
                
            </div>

    </div>
        
    
      
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

