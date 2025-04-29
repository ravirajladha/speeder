<?php require APPROOT . '/views/inc_enterprises/header.php'; ?>
<?php require APPROOT . '/views/inc_enterprises/nav-header.php'; ?>


        <div class="main-container">
            <div class="container">
            <?php if(!$data['feedback']){ ?>   
                <div class="card">
                    <form action="<?php echo URLROOT; ?>/enterprises/add_feedback/<?php echo $data['id']; ?>" method="POST">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            Add Feedback
                        </h6>
                    </div>
                    <div class="card-body">
                   
                        <div class="form-group float-label active">
                            <textarea class="form-control" name="user_remark"></textarea>
                            <label class="form-control-label">Enter Remarks</label>
                       
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-block btn-default rounded">Submit Feedback</button>
                    </div>
                    </form>
                </div>

<?php } else { ?>
                <div class="card">
                   
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            Feedback #<?php echo $data['feedback']->id; ?>
                        </h6>
                    </div>
                    <div class="card-body">
                   
                        <div class="form-group float-label active">
                            <textarea class="form-control" name="user_remark" readonly><?php echo $data['feedback']->user_remark; ?></textarea>
                       
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="btn btn-block btn-default rounded"><?php echo $data['feedback']->admin_remark; ?></p>
                    </div>
                  
                </div>

<?php } ?>
                



            </div>
        </div>
    </main>


    <?php require APPROOT . '/views/inc_enterprises/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_enterprises/footer.php'; ?>