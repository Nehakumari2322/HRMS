<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/vendor/navbar.php';?>


<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-sm-3 pt-2"  style="padding-left:0px;padding-right:0px">
            <?php require APPROOT . '/views/inc/vendor/sidebard.php';?> 
        </div>
      
        <div class="col-lg-9 col-md-8 col-sm-12 pt-5">
        <?php if($moreData['message']){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $moreData['message'];?>
            <button type="button" class="btn-close mt-5" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

           <div class="card pt-4 p-3">
            <form  class="w3-container" action="<?php echo URLROOT; ?>clients/leadfilter" method="post">
            <div class="row mt-3">
              
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <label>Select by Project </label>
                    <select class="w3-input w3-border" id="pid" name="pid">
                        <option value="">Select Project Name</option>
                        <?php $count=0; foreach($data as $dataline){ ?> 
                            <option value="<?php echo $dataline->p_id ;?>"><?php echo $dataline->name;?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-sm-3">
                    <label>Filter By Status </label>
                    <select class="w3-input w3-border" aria-label="Default select example" name="status" id="status">
                        <option value="">Select Status</option>
                        <option value="Fresh">Fresh</option>
                        <option value="Verified">Verified</option>
                        <option value="Not Verified">Not Verified</option>
                        <option value="Interested">Interested</option>
                        <option value="Not Interested">Not Interested</option>
                        <option value="Call back">Call back</option>
                        <option value="Follow Up ">Follow Up </option>
                        <option value="Invalid number">Invalid number</option>
                        <option value="Appointment Fixed">Appointment Fixed</option>
                        <option value="Booking Done">Booking Done</option>
                        <option value="Site Visit">Site Visit</option>
                    </select>
                </div>
                
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <button  class="btn mt-3 bg-success text-light" style="width:100%" name="search" id="search">Apply</button>
                </div>
               <div class="col-sm-4"></div>   
            </div>
            </form>
            <form class="w3-container" action="<?php echo URLROOT; ?>clients/leadDetails" method="post">
            <hr>
            <?php echo $store ?>
    <div class="table-responsive">
        <table class="table align-middle mb-0 bg-white display" id="example">
            <thead class="bg-light">
                <tr>
                    <th>SN</th>
                    <th>Lead Name</th>
                    <th>Lead Status</th>
                    <th>Update</th>
                    <th>Source</th>
                    <th>Vendor Remarks</th>
                    <th>Client Remarks</th>
                    <th>Created At</th>
                    <th>Modified At</th>
                    <th>Client Modified At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=0; foreach($additionalData as $dataline){ ?>
                <tr>
                    <th scope="row"><?php echo $count+1; ?></th>
                    <input type="hidden" name="<?php echo 'lead_id'.$count;?>" id="<?php echo 'lead_id'.$count;?>" value="<?php echo $dataline->l_id;?>">
                    <th>
                        <button type="submit" class="btn" name="<?php echo 'lead_name'.$count;?>" id="<?php echo 'lead_name'.$count;?>" style="box-shadow:none;text-align:left">
                            <?php echo $dataline->name; ?>
                        </button>
                    </th>
                    <th>
                        <select class="w3-input w3-border" aria-label="Default select example" id="<?php echo 'status'.$count;?>" name="<?php echo 'status'.$count;?>">
                            <option value="<?php echo $dataline->status ;?>"><?php echo $dataline->status ;?></option>
                            <option value="Fresh">Fresh</option>
                            <option value="Verified">Verified</option>
                            <option value="Not Verified">Not Verified</option>
                            <option value="Interested">Interested</option>
                            <option value="Not Interested">Not Interested</option>
                            <option value="Call back">Call back</option>
                            <option value="Follow Up">Follow Up</option>
                            <option value="Invalid number">Invalid number</option>
                            <option value="Appointment Fixed">Appointment Fixed</option>
                            <option value="Booking Done">Booking Done</option>
                            <option value="Site Visit">Site Visit</option>
                        </select>
                    </th>
                    <th>
                        <button class="btn" type="submit" style="box-shadow:none" name="<?php echo 'update'.$count;?>" id="<?php echo 'update'.$count;?>">
                            <img src="<?php echo URLROOT.'/img/tick.png';?>" height="18px" />
                        </button>
                    </th>
                    <td><?php echo $dataline->source; ?></td>
                    <td><?php echo $dataline->vendor_remarks; ?></td>
                    <td><input value="<?php echo $dataline->client_remarks;?>" name="<?php echo 'client_remark'.$count;?>" id="<?php echo 'client_remark'.$count;?>" type="text"/></td>
                    <td><?php echo $dataline->created_ts; ?></td>
                    <td><?php echo $dataline->updated_ts; ?></td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn"name="<?php echo 'edit'.$count;?>" id="<?php echo 'edit'.$count;?>" style="box-shadow:none">
                            <img src="<?php echo URLROOT.'/img/edit.png';?>" height="18px"/>
                        </button> 
                        <!-- <button type="submit" class="btn" name="<?php echo 'delete'.$count;?>" id="<?php echo 'delete'.$count;?>" style="box-shadow:none">
                            <img src="<?php echo URLROOT.'/img/delete.png';?>" height="18px"/>
                        </button>  -->
                    </td>
                </tr>
                <?php $count++; } ?>
               
                <!-- Ensure this hidden input is placed after the loop -->
                <input type="type" name="totalcount" id="totalcount" value="<?php echo $count;?>" style="visibility:hidden;">
               
            </tbody>
        </table>
    </div>
</form>


           </div>
        </div>
    </div>
</div>

<script>
 new DataTable('#example');
  </script>
<?php require APPROOT . '/views/inc/footer.php';?>