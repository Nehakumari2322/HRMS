<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>


<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-sm-3" style="padding-left:0px;position:fixed">
            <?php require APPROOT . '/views/inc/sidenavbar.php';?> 
        </div>
        <div class="col-sm-3"> </div>
        
        <div class="col-sm-9 mt-5 pt-5">
        <?php if($additionalData['message']){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $additionalData['message'];?>
            <button type="button" class="btn-close mt-5" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        
        <form  class="w3-container" action="<?php echo URLROOT; ?>taskmanagers/updateLeadAssignedTo" method="post" >
            <div class="card p-5 mt-5" style="width:50%;display:block;margin:auto">
                <input type="hidden" name="leadId" id="leadId" value="<?php echo $data->l_id;?>">
                
                <div class="row">
                    <div class="col-sm-6">
                        <label>Client Name</label>
                        <p> <?php echo $data->name ;?> </p>
                    </div>
                    <div class="col-sm-6">
                        <label>Project Name</label>
                        <p> <?php echo $data->project_name ;?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label>Email</label>
                        <p> <?php echo $data->email ;?></p>
                    </div>
                    <div class="col-sm-6">
                        <label>Phone</label>
                        <p> <?php echo $data->phone ;?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label>Requirements</label>
                        <p>  <?php echo $data->requirement ;?> </p>
                    </div>
                    <div class="col-sm-6">
                        <label>Created By</label>
                        <p> <?php echo $data->created_by ;?></p>
                    </div>
                </div> 
                <div class="row">    
                    <div class="col-sm-6">
                        <label>Re-assign To</label>
                        <select class="w3-input w3-border" id="vendor_name" name="vendor_name">
                            <option value=" <?php echo $data->assign_to ;?>"> <?php echo $data->assign_to ;?></option>
                            <?php $count=0; foreach($moreData as $dataline){ ?> 
                            <option value="<?php echo $dataline->name ;?>"><?php echo $dataline->name;?></option>
                            <?php } ?>  
                        </select>
                    
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit" id="submit">Submit</button>
                    </div>   
                </div>    
            </div>
         
        </div>
    </div>
</div>
</form>

<?php require APPROOT . '/views/inc/footer.php';?>