<?php 

require_once('header.php'); 

$filterByStatus = (isset($_GET['filter']) && !empty($_GET['filter']))?$_GET['filter']:'';
$plans = Helper::getAllUsersPlan($filterByStatus);
$admins = Helper::getAllAdmin();
// prx($plans);


// Status Filter
$customerStatus = unserialize (CUSTOMER_STATUS);
$statusFilterHTML = "";
foreach($customerStatus as $statusValue=>$status) { 
    $statusVal = $statusValue + 1;
    $statusSelected = ($statusVal==$filterByStatus)?" selected":"";   
    $statusFilterHTML .= '<option value="'.$statusVal.'" '.$statusSelected.'>'.$status.'</option>'; 
}

// Packages
$packages = unserialize (PACKAGES);
$packageHTML = "";
foreach($packages as $packageValue=>$package) { 
    $packageHTML .= '<option value="'.$packageValue.'" >'.$package.'</option>'; 
}

?>

<div id="layoutSidenav_content" class="<?=($role=='admin')?"admin_layout_content":""?>">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Progress</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Progress</li>
                <!-- Trigger the modal with a button -->
                <li style="float: right;" id="breadcrumb_create_customer" class="customerModal"><button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#customerModal" style="font-size: 16px; padding: 2px 15px;">Create New</button></li>
                <li style="float: right;" id="breadcrumb_create_customer" class="statusFilter">
                    <div class="filter_by_status">
                        <form name="filterForm" id="filterForm" action="" method="GET">
                            <select name="filter" class="">
                                <option value="">--- All ---</option>
                                <?=$statusFilterHTML?>
                            </select>
                        </form>
                    </div>
                </li>
                
                
            </ol>
            <!-- <div class="card mb-4">
                <div class="card-body">
                    All user's plan in detail. You can view and update all user's plan.
                    
                </div>
            </div> -->
            <div class="card mb-4">
                <!-- <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    All Progress
                </div> -->
                <div class="card-body">
                    <div class="spinner-body">
                        <div class="lds-hourglass"> </div>    
                    </div>
                    

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length='25'>
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Customer</th>
                                    <th>Package</th>
                                    <th>Logo</th>
                                    <th>About Us</th>
                                    <th>Shipping</th>
                                    <th>Payment</th>
                                    <th>Contact Info</th>
                                    <th>Social Media</th>
                                    <th>Domain & Email</th>
                                    <th>Website Design</th>
                                    <th>Password</th>
                                    <!-- <th>Account</th> -->
                                    <th>Website setup date</th>
                                    <th>Training date</th>
                                    <th>Revision 1</th>
                                    <th>Revision 2</th>
                                    <th>Website buy off date</th>
                                    <th>PIC</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <!-- <tfoot>
                                <tr>
                                <th>S No</th>
                                    <th>Customer</th>
                                    <th>Logo</th>
                                    <th>About Us</th>
                                    <th>Shipping</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot> -->
                            <tbody>
                                <?php
                                $sno = 1;
                                
                                if(!empty($plans)){
                                    
                                    foreach($plans as $key=>$plan) {
                                    
                                    $adminHTML = '';
                                    foreach($admins as $admin) { 
                                        $adminSelected = ($admin['id']==$plan['admin'])?" selected":"";   
                                        $adminHTML .= '<option value="'.$admin['id'].'" '.$adminSelected.'>'.$admin['name'].'</option>'; 
                                    }   

                                    $statusHTML = "";
                                    foreach($customerStatus as $statusValue=>$status) { 
                                        $statusVal = $statusValue + 1;
                                        $statusSelected = ($statusVal==$plan['status'])?" selected":"";   
                                        $statusHTML .= '<option value="'.$statusVal.'" '.$statusSelected.'>'.$status.'</option>'; 
                                    }

                                    $pack = (!empty($plan['package']))?$packages[$plan['package']]:'NoN';
                                ?>
                                <tr class="planData">
                                    <td><?=$sno?></td>
                                    <td><?=$plan['username']?></td>
                                    <td><?=$pack?></td>
                                    <td>

                                    <?php $eyeColor = $plan['isLogo'] ? '' : '#696969';  ?>

                                        <input class="mycustom-checkbox" name="logo" type="checkbox" <?=($plan['logo']==1)?'checked':''?> />  
                                        
                                        <a href="javascript:void(0)" class="view-option" data-type="logo" data-id="<?=$plan['userid']?>" data-toggle="modal" data-target="#viewInfoModal"><i class="fa fa-eye" aria-hidden="true" style="color: <?=$eyeColor?>"></i>
                                        </a> 
                                             
                                    </td>
                                    <td>
                                    <?php $eyeColor = $plan['isAbout'] ? '' : '#696969';  ?>
                                        <input class="mycustom-checkbox" name="about_us" type="checkbox" <?=($plan['about_us']==1)?'checked':''?> />
                                        
                                        <a href="javascript:void(0)" class="view-option" data-type="about_us" data-id="<?=$plan['userid']?>" data-toggle="modal" data-target="#viewInfoModal" ><i class="fa fa-eye" aria-hidden="true" style="color: <?=$eyeColor?>"></i>
                                        </a>    
                                        
                                    </td>
                                    <td>
                                    <?php $eyeColor = $plan['isShipping'] ? '' : '#696969';  ?>
                                       <input class="mycustom-checkbox" name="shipping" type="checkbox" <?=($plan['shipping']==1)?'checked':''?> />
                                       
                                       <a href="javascript:void(0)" class="view-option" data-type="shipping" data-id="<?=$plan['userid']?>" data-toggle="modal" data-target="#viewInfoModal"  ><i class="fa fa-eye" aria-hidden="true" style="color: <?=$eyeColor?>"></i>
                                        </a>
                                       
                                    </td>
                                    <td>
                                    <?php $eyeColor = $plan['isPayment'] ? '' : '#696969';  ?>
                                        <input class="mycustom-checkbox" name="payment" type="checkbox" <?=($plan['payment']==1)?'checked':''?> />
                                        
                                        <a href="javascript:void(0)" class="view-option" data-type="payment" data-id="<?=$plan['userid']?>" data-toggle="modal" data-target="#viewInfoModal" ><i class="fa fa-eye" aria-hidden="true" style="color: <?=$eyeColor?>"></i>
                                        </a>
                                        
                                    </td>
                                    <td>
                                    <?php $eyeColor = $plan['isContact'] ? '' : '#696969';  ?>
                                        <input class="mycustom-checkbox" name="contactinfo" type="checkbox" <?=($plan['contactinfo']==1)?'checked':''?> />    
                                        
                                        <a href="javascript:void(0)" class="view-option" data-type="contactinfo" data-id="<?=$plan['userid']?>" data-toggle="modal" data-target="#viewInfoModal"><i class="fa fa-eye" aria-hidden="true" style="color: <?=$eyeColor?>"></i>
                                        </a>
                                        
                                    </td>
                                    <td>
                                    <?php $eyeColor = $plan['isSocialmedia'] ? '' : '#696969';  ?>
                                        <input class="mycustom-checkbox" name="socialmedia" type="checkbox" <?=($plan['socialmedia']==1)?'checked':''?> />
                                        
                                        <a href="javascript:void(0)" class="view-option" data-type="socialmedia" data-id="<?=$plan['userid']?>" data-toggle="modal" data-target="#viewInfoModal"><i class="fa fa-eye" aria-hidden="true" style="color: <?=$eyeColor?>"></i>
                                        </a>
                                        
                                    </td>
                                    <td>
                                    <?php $eyeColor = $plan['isDomainemail'] ? '' : '#696969';  ?>
                                       <input class="mycustom-checkbox" name="domainemail" type="checkbox" <?=($plan['domainemail']==1)?'checked':''?> />
                                       
                                       <a href="javascript:void(0)" class="view-option" data-type="domainemail" data-id="<?=$plan['userid']?>" data-toggle="modal" data-target="#viewInfoModal"><i class="fa fa-eye" aria-hidden="true" style="color: <?=$eyeColor?>"></i>
                                        </a>
                                        
                                    </td>
                                    <td>
                                    <?php $eyeColor = $plan['isWebsitedesign'] ? '' : '#696969';  ?>
                                        <input class="mycustom-checkbox" name="websitedesign" type="checkbox" <?=($plan['websitedesign']==1)?'checked':''?> />
                                        
                                        <a href="javascript:void(0)" class="view-option" data-type="websitedesign" data-id="<?=$plan['userid']?>" data-toggle="modal" data-target="#viewInfoModal"><i class="fa fa-eye" aria-hidden="true" style="color: <?=$eyeColor?>"></i>
                                        </a>
                                        
                                    </td>
                                    <td>
                                    <?php $eyeColor = ($plan['cpanel_password'] && $plan['wordpress_password']) ? '' : '#696969';  ?>
                                        
                                        <a href="javascript:void(0)" class="view-option" data-type="showPassword" data-id="<?=$plan['userid']?>" data-toggle="modal" data-target="#viewInfoModal"><i class="fa fa-eye" aria-hidden="true" style="color: <?=$eyeColor?>"></i>
                                        </a>
                                        
                                    </td>
                                    <!-- <td> <input type="text" name="account" class="account" value="<?=$plan['account']?>" /> </td> -->
                                    <td> <input class="website_setup_date" name="website_setup_date" type="date" value="<?=$plan['website_setup_date']?>" /> </td>
                                    <td><input class="training_date" name="training_date" type="date" value="<?=$plan['training_date']?>"  /></td>
                                    <td><input type="checkbox" class="revision_1" name="revision_1" value="1" <?=($plan['revision_1'])?" checked":"" ?>></td>
                                    <td><input type="checkbox" class="revision_2" name="revision_2" value="1" <?=($plan['revision_2'])?" checked":"" ?> ></td>
                                    <td><input class="website_buy_off_date" name="website_buy_off_date" type="date" value="<?=$plan['website_buy_off_date']?>" /></td>
                                    <td>
                                        <select name="admin" class="adminStatus paddint-vertical-5">
                                            <option value="" >-- Select --</option>
                                            <?=$adminHTML?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="status" class="userStatus paddint-vertical-5">
                                        <option value="" >-- Select --</option>
                                            <?=$statusHTML?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="userid" class="user_id" value="<?=$plan['userid']?>" />
                                    <input type="hidden" name="planid" class="plan_id" value="<?=(isset($plan['id']) &&!empty($plan['id']))?$plan['id']:0?>" />
                                </tr>

                                <?php 

                                $sno++;
                                    } }
                                
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
     <!--View Info Modal -->
     <div id="viewInfoModal" class="modal fade" role="dialog" >
    <div class="modal-dialog modal-view-main">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <!-- <div class="card-header" >
                            <h3 class="text-center font-weight-light my-4">View Info</h3>
                        </div> -->
                        <div class="card-body" id="view-info-body">
                            ....
                        </div>
                    </div>   
                </div>
            </div>
        </main>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
    </div>
    <!-- Modal -->
    <div id="customerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Create Account</h3>
                        </div>
                        <div class="card-body">
                            <form name="register-form" action="store.php" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">First Name</label>
                                            <input name="fname" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Last Name</label>
                                            <input name="lname" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input name="email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPackage">Package</label>
                                            <select name="package" class="form-control ">
                                                <?=$packageHTML?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                            <input name="conformPassword" class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                        <label class="small mb-1" for="role" style="padding-right:20px">User Role : </label>
                                            <input type="radio" name="role" value="admin" />
                                            PIC &nbsp;&nbsp; 
                                            <input type="radio" name="role" value="customer" checked />
                                            Customer
                                        </div>
                                    </div>
                                    <input type="hidden" name="planRegistration" value="1">
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="cpanel_username">cPanel Username</label>
                                            <input name="cpanel_username" class="form-control py-4" id="cpanel_username" type="text" placeholder="Enter cPanel Username" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="cpanel_password">cPanel Password</label>
                                            <input name="cpanel_password" class="form-control py-4" id="cpanel_password" type="text" placeholder="Enter cPanel Password" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="wordpress_username">Wordpress Username</label>
                                            <input name="wordpress_username" class="form-control py-4" id="wordpress_username" type="text" placeholder="Enter Wordpress Username" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="wordpress_password">Wordpress Password</label>
                                            <input name="wordpress_password" class="form-control py-4" id="wordpress_password" type="text" placeholder="Enter Wordpress Password" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="wordpress_username">Website Setup date</label>
                                            <input name="website_setup_date" class="form-control py-4" id="website_setup_date" type="date" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="wordpress_username">Training date</label>
                                            <input name="training_date" class="form-control py-4" id="training_date" type="date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="revision_1"> Revision 1</label>
                                            <input type="checkbox" name="revision_1" value="1">
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="revision_2"> Revision 2</label>
                                            <input type="checkbox" name="revision_2" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="wordpress_username">Website buy off date</label>
                                            <input name="website_buy_off_date" class="form-control py-4" id="website_buy_off_date" type="date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <input type="submit" name="register" class="btn btn-primary btn-block" value="Create Account">
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>
        </main>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>


       
<?php require_once('footer.php') ?>


<script>

                                    
        $(document).on('change', '.userStatus', function(){
            const status = $(this).val();
            const userId = $(this).closest('.planData').find('.user_id').val();
            
            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "userid": userId,
                    "status": status,
                    "task":"updateStatus"
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    console.log(data);
                }
            }); 
        });

        $(document).on('change', '.adminStatus', function(){
            const admin = $(this).val();
            const userId = $(this).closest('.planData').find('.user_id').val();
            console.log("admin : ", admin, "userId : ", userId);
            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "userid": userId,
                    "admin": admin,
                    "task":"updateAdmin"
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    console.log(data);
                }
            }); 
        });

        // update Account value
        $(document).on('change', '.account', function(){
            const val = $(this).val();
            const userId = $(this).closest('.planData').find('.user_id').val();
            // console.log("val : ", val, "userId : ", userId);
            
            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "userid": userId,
                    "value": val,
                    "task":"updateAccount"
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    console.log(data);
                }
            }); 
        });

        // update website_setup_date value
        $(document).on('change', '.website_setup_date', function(){
            const val = $(this).val();
            const userId = $(this).closest('.planData').find('.user_id').val();
            // console.log("val : ", val, "userId : ", userId);
            
            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "userid": userId,
                    "value": val,
                    "task":"updateWebsiteSetupDate"
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    console.log(data);
                }
            }); 
        });

        // update training_date value
        $(document).on('change', '.training_date', function(){
            const val = $(this).val();
            const userId = $(this).closest('.planData').find('.user_id').val();
            // console.log("val : ", val, "userId : ", userId);
            
            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "userid": userId,
                    "value": val,
                    "task":"updateTrainingDate"
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    console.log(data);
                }
            }); 
        });


        // update revision_1 value
        $(document).on('click', '.revision_1', function(){
            const val = $(this).is(":checked");
            const userId = $(this).closest('.planData').find('.user_id').val();
            // console.log("val : ", val, "userId : ", userId);
            
            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "userid": userId,
                    "value": val,
                    "task":"updaterevisionOne"
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    console.log(data);
                }
            }); 
        });

        // update revision_2 value
        $(document).on('click', '.revision_2', function(){
            const val = $(this).is(":checked");
            const userId = $(this).closest('.planData').find('.user_id').val();
            // console.log("val : ", val, "userId : ", userId);
            
            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "userid": userId,
                    "value": val,
                    "task":"updaterevisionTwo"
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    console.log(data);
                }
            }); 
        });

        // update website_buy_off_date value
        $(document).on('change', '.website_buy_off_date', function(){
            const val = $(this).val();
            const userId = $(this).closest('.planData').find('.user_id').val();
            // console.log("val : ", val, "userId : ", userId);
            
            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "userid": userId,
                    "value": val,
                    "task":"websiteBuyOffDate"
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    console.log(data);
                }
            }); 
        });




        $(document).on('click', '.mycustom-checkbox', function() {
            const userId = $(this).closest('.planData').find('.user_id').val();
            const planId = $(this).closest('.planData').find('.plan_id').val();
            const planValue = $(this).is(":checked");
            const planName = $(this).attr('name');
            console.log('planValue : ', planValue, 'planName : ', planName, 'userId : ', userId);

            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "userid": userId,
                    "planid": planId,
                    "planName": planName,
                    "planValue": planValue,
                    "task":"updatePlan"
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    console.log(data);
                }
            }); 
        });        

        $(document).on('change', '.statusFilter', function(){
            $('form#filterForm').submit();
        });

        // View opton

        $(document).on('click', '.view-option', function() {
            const dataType = $(this).attr('data-type');
            const dataId = $(this).attr('data-id');
            $('.modal-view-main').hide();
            jQuery.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: "json",
                data: {
                    "dataType": dataType,
                    "dataId": dataId,
                    "task": "view-option",
                },

                beforeSend: function() {
                    $('.spinner-body').show();
                },

                complete: function() {
                    $('.spinner-body').hide();
                },

                success: function(data) {
                    $('.modal-view-main').show();
                    if(data.msg=='success') {
                        $(document).find('#view-info-body').html(data.html);
                    }else{
                        $(document).find('#view-info-body').html(data.msg);
                    }
                    console.log(data);
                }
            }); 
        }); 

                                
</script>