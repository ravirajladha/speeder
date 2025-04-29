<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav-header.php'; ?>



  <!-- page content start -->
  <div class="container mt-3 mb-4 text-center">
      <?php 
      $total_amount = 0;
      foreach($data['transactions'] as $txn){ 
      $total_amount = $total_amount + $txn->amount;}
      ?>
            <h2 class="text-white"><i class='fa fa-inr'></i> <?php echo $total_amount; ?></h2>
            <p class="text-white mb-4">Total Transactions</p>
        </div>

        <div class="main-container">
            <div class="container">
                <div class="card">
                    <div class="card-body px-0">
                        <div class="container"><h6>Transactions</h6></div>
                        <ul class="list-group list-group-flush">
                            
                        
                        <?php foreach($data['transactions'] as $transaction){ ?>
                        <li class="list-group-item">
                                <div class="row align-items-center">
                                    
                                    <div class="col align-self-center pr-0">
                                        <h6 class="font-weight-normal mb-1">#<?php echo $transaction->id; ?></h6>
                                        <p class="small text-secondary"><?php echo date('M jS Y, h:m A', strtotime($transaction->datetime)); ?></p>
                                    </div>
                                    <div class="col-auto">
                                        <h6 class="text-success"><i class='fa fa-inr'></i> <?php echo $transaction->amount; ?></h6>
                                    </div>
                                </div>
                            </li>
                         <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require APPROOT . '/views/inc/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc/footer.php'; ?>

