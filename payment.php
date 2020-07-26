<?php 

require_once('header.php'); 
$userid = Helper::getUserId();
$data = Helper::getUserPayment($userid);

if($data) {
    $manual_payment = $data['manual_payment'];
    $bank_name = $data['bank_name'];
    $bank_account_name = $data['bank_account_name'];
    $bank_account_number = $data['bank_account_number'];
    $billpiz = $data['billpiz'];
    $billpiz_email = $data['billpiz_email'];
    $billpiz_password = $data['billpiz_password'];
    $paypal = $data['paypal'];
    $paypal_email = $data['paypal_email'];
    $paypal_password = $data['paypal_password'];
}else{
    $manual_payment = 0;
    $bank_name = '';
    $bank_account_name = '';
    $bank_account_number = '';
    $billpiz = 0;
    $billpiz_email = '';
    $billpiz_password = '';
    $paypal = 0;
    $paypal_email = '';
    $paypal_password = '';
}
// prx($templete);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Payment</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Payment</li>
            </ol>
            
        </div>
        
        <div class="row logo-form">
            <div class="col-sm-12">
                <form class="" name="register-form" action="store.php" method="POST" enctype="multipart/form-data">

                <div class="card shadow-lg border-0 rounded-lg paymentGetway">
                    <div class="card-header">
                        <input class="mycustom-checkbox" name="manual_payment" type="checkbox" <?=$manual_payment==1?' checked':''?> /> Manual Payment
                    </div>
                    <div class="card-body paymentDetail hideAll <?=$manual_payment==1?'':' hideMe'?>">
                        <div class="form-group form-inline">
                            <span class="input-label" for="bank_name">Bank Name</span>
                            <input type="text" name="bank_name" class="form-control" id="bank_name" value="<?=$bank_name?>" />
                        </div>
                        <div class="form-group form-inline">
                            <span class="input-label" for="bank_account_name">Bank Account Name</span>
                            <input type="text" name="bank_account_name" class="form-control" id="bank_account_name" value="<?=$bank_account_name?>" />
                        </div>
                        <div class="form-group form-inline">
                            <span class="input-label" for="bank_account_number">Bank Account Number</span>
                            <input type="text" name="bank_account_number" class="form-control" id="bank_account_number" value="<?=$bank_account_number?>" />
                        </div> 
                    </div>
                </div>   

                <div class="card shadow-lg border-0 rounded-lg paymentGetway">
                    <div class="card-header">
                        <input class="mycustom-checkbox" name="billpiz" type="checkbox" checked /> BillPiz
                    </div>
                    <div class="card-body paymentDetail ">
                        <div class="form-group form-inline">
                            <span class="input-label" for="billpiz_email">Login Email</span>
                            <input type="text" name="billpiz_email" class="form-control" id="billpiz_email" value="<?=$billpiz_email?>" />&nbsp;&nbsp;&nbsp;
                            <a href="https://www.youtube.com/watch?v=zr0txIr6V3U" target="_blank">Why use BillPiz </a>
                        </div>
                        <div class="form-group form-inline">
                            <span class="input-label" for="billpiz_password">Login Password</span>
                            <input type="text" name="billpiz_password" class="form-control" id="billpiz_password" value="<?=$billpiz_password?>" />
                        </div>
                    </div>
                </div>

                <div class="card shadow-lg border-0 rounded-lg paymentGetway">
                    <div class="card-header">
                        <input class="mycustom-checkbox" name="paypal" type="checkbox" <?=$paypal==1?' checked':''?> /> PayPal
                    </div>
                    <div class="card-body paymentDetail hideAll <?=$paypal==1?'':' hideMe'?>">
                        <div class="form-group form-inline">
                            <span class="input-label" for="paypal_email">Login Email</span>
                            <input type="text" name="paypal_email" class="form-control" id="paypal_email" value="<?=$paypal_email?>" />
                        </div>
                        <div class="form-group form-inline">
                            <span class="input-label" for="paypal_password">Login Password</span>
                            <input type="text" name="paypal_password" class="form-control" id="paypal_password" value="<?=$paypal_password?>" />
                        </div>
                    </div>
                </div>

                <div class="text-center" style="width:max-content">
                    <input type="submit" name="submit_payment" class="btn btn-primary" />
                    <a href="contactinfo.php" class="btn btn-primary"> Next </a>
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