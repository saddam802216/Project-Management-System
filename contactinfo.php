<?php 

require_once('header.php'); 
$userid = Helper::getUserId();
$data = Helper::getUserContactinfo($userid);

if($data) {
    $company_name = $data['company_name'];
    $company_registration_no = $data['company_registration_no'];
    $address = $data['address'];
    $office_phone = $data['office_phone'];
    $office_fax = $data['office_fax'];
    $person_in_charge_name = $data['person_in_charge_name'];
    $person_in_charge_email = $data['person_in_charge_email'];
    $person_in_charge_phone = $data['person_in_charge_phone'];
}else{
    $company_name = '';
    $company_registration_no = '';
    $address = '';
    $office_phone = '';
    $office_fax = '';
    $person_in_charge_name = '';
    $person_in_charge_email = '';
    $person_in_charge_phone = '';
}
// prx($templete);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Contact Info</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Contact Info</li>
            </ol>
            
        </div>
        
        <div class="row logo-form">
            <div class="col-sm-12">
                <form class="" name="register-form" action="store.php" method="POST" enctype="multipart/form-data">

                <div class="contactinfo">
                    <h6><u>Company Information </u></h6><br>
                    <div class="form-group form-inline">
                        <span class="input-label" for="company_name">Company Name</span>
                        <input type="text" name="company_name" class="form-control" id="company_name" value="<?=$company_name?>" style="width: 30%;" />
                    </div>
                    <div class="form-group form-inline">
                        <span class="input-label" for="company_registration_no">Company Registration Number</span>
                        <input type="text" name="company_registration_no" class="form-control" id="company_registration_no" value="<?=$company_registration_no?>" style="width: 30%;" />
                    </div>
                    <div class="form-group form-inline">
                        <span class="input-label" for="address">Address</span>
                        <input type="text" name="address" class="form-control" id="address" value="<?=$address?>" style="width: 30%;" />
                    </div>
                    <div class="form-group form-inline">
                        <span class="input-label" for="office_phone">Office Phone</span>
                        <input type="text" name="office_phone" class="form-control" id="office_phone" value="<?=$office_phone?>" style="width: 30%;" />
                    </div> 
                    <div class="form-group form-inline">
                        <span class="input-label" for="office_fax">Office Fax</span>
                        <input type="text" name="office_fax" class="form-control" id="office_fax" value="<?=$office_fax?>" style="width: 30%;" />
                    </div>
                    <br><h6><u>Person In charge information </u></h6><br>
                    <div class="form-group form-inline">
                        <span class="input-label" for="person_in_charge_name">Name</span>
                        <input type="text" name="person_in_charge_name" class="form-control" id="person_in_charge_name" value="<?=$person_in_charge_name?>" style="width: 30%;" />
                    </div>
                    <div class="form-group form-inline">
                        <span class="input-label" for="person_in_charge_email">Email</span>
                        <input type="text" name="person_in_charge_email" class="form-control" id="person_in_charge_email" value="<?=$person_in_charge_email?>" style="width: 30%;" />
                    </div>
                    <div class="form-group form-inline">
                        <span class="input-label" for="person_in_charge_phone">Phone</span>
                        <input type="text" name="person_in_charge_phone" class="form-control" id="person_in_charge_phone" value="<?=$person_in_charge_phone?>" style="width: 30%;" />
                    </div> 
                </div>   

                <div class="text-center" style="width:max-content">
                    <input type="submit" name="submit_contactinfo" class="btn btn-primary" />
                    <a href="socialmedia.php" class="btn btn-primary"> Next </a>
                </div>
                </form>
            </div>
            
        </div>    
    </main>
    
</div></div>
<?php require_once('footer.php') ?>

<script>

    $(document).on('click', '.mycustom-checkbox', function() {

        const isChecked = $(this).is(":checked");
        if(isChecked) {
            $(this).closest('.paymentGetway').find('.paymentDetail').show();
        }else{
            $(this).closest('.paymentGetway').find('.paymentDetail').hide();
        }
       
        console.log('isChecked : ', isChecked);

        
    });  

    
</script>