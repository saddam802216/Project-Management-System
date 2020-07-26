<?php 

require_once('header.php'); 
$userid = Helper::getUserId();
$shipping = Helper::getUserShipping($userid);
if($shipping) {
    $shipping_rate_type = $shipping['shipping_rate_type'];
    $base_cost_pms = $shipping['base_cost_pms'];
    $weight_rate_charge_pms = $shipping['weight_rate_charge_pms'];
    $base_cost_ssl = $shipping['base_cost_ssl'];
    $weight_rate_charge_ssl = $shipping['weight_rate_charge_ssl'];
    $remarks = $shipping['remarks'];
    
}else{
    $shipping_rate_type = '';
    $base_cost_pms = '';
    $weight_rate_charge_pms = '';
    $base_cost_ssl = '';
    $weight_rate_charge_ssl = '';
    $remarks = '';
}
// prx($templete);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Shipping</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Shipping</li>
            </ol>
            
        </div>
        
        <div class="row logo-form">
            <div class="col-sm-12">
                <form class="" name="register-form" action="store.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group form-inline templeteTextarea">
                        <input type="radio" name="shipping_rate_type" value="1" <?=($shipping_rate_type==1)?'checked':''?> />&nbsp;
                        <label> Use Emico Rate</lable>&nbsp;&nbsp;&nbsp;&nbsp;  <a href="#" data-toggle="modal" data-target="#viewShippingRateModal"> View Rate </a>
                    </div>  
                    <div class="form-group form-inline templeteTextarea">
                        <input type="radio" name="shipping_rate_type" value="2" <?=($shipping_rate_type==2)?'checked':''?>  />&nbsp;
                        <label> Weight Base</lable> 
                    </div>
                    <div class="shipping_inner_box">
                    <h6><u>Peninsular Malaysia</u></h6>
                    <div class="form-group form-inline templeteTextarea">
                        <div class="col-sm-3">
                            <label style="display:contents">Base Cost less than 10 KG </label>&nbsp;
                        </div>
                        <div class="col-sm-3">
                            <input type="number" name="base_cost_pms" class="form-control " id="base_cost_pms" value="<?=$base_cost_pms?>" />
                        </div>
                        
                    </div>
                    <div class="form-group form-inline templeteTextarea">
                        <div class="col-sm-3">
                            <label style="display:contents">Weight Rate Charge RM </label>&nbsp;
                        </div>
                        <div class="col-sm-3">    
                            <input type="number" name="weight_rate_charge_pms" class="form-control" id="weight_rate_charge_pms" value="<?=$weight_rate_charge_pms?>" /> 
                        </div>
                        <div class="col-sm-3">  
                            <label style="display:contents">For additional 1 KG </label>&nbsp;
                        </div>
                    </div>

                    <h6><u>Sabah, Sarawak & Labuan</u></h6>
                    <div class="form-group form-inline templeteTextarea">
                        <div class="col-sm-3">
                            <label style="display:contents">Base Cost less than 10 KG </label>&nbsp;
                        </div>
                        <div class="col-sm-3">
                            <input type="number" name="base_cost_ssl" class="form-control" id="base_cost_ssl" value="<?=$base_cost_ssl?>" />
                        </div>
                        
                    </div>
                    <div class="form-group form-inline templeteTextarea">
                        <div class="col-sm-3">
                            <label style="display:contents">Weight Rate Charge RM </label>&nbsp;
                        </div>
                        <div class="col-sm-3">
                            <input type="number" name="weight_rate_charge_ssl" class="form-control" id="weight_rate_charge_ssl" value="<?=$weight_rate_charge_ssl?>" />
                        </div>
                        <div class="col-sm-3">
                            <label style="display:contents">For additional 1 KG </label>&nbsp;
                        </div>    
                    </div>
                    <h6><u>Others</u></h6>
                    <div class="form-group form-inline templeteTextarea">
                        <div class="col-sm-3">
                            <label style="display:block;display: block;position: relative;top: -60px;"> Remarks </label> &nbsp;&nbsp;
                        </div>
                        <div class="col-sm-3">
                            <textarea name="remarks" cols="48" rows="6"><?=$remarks?> </textarea>
                        </div>
                    </div>
                    </div>

                    <!-- <h6>Flat Rate</h6>
                    <div class="form-group form-inline templeteTextarea">
                        <input type="text" name="shipping_charge_pms" class="form-control w-per-10" id="shipping_charge_pms" value="<?=$shipping_charge_pms?>" />
                        <span class="pl-per-5 input-label-right" for="shipping_charge_pms">Peninsular Malaysia Shipping Charge</span>
                    </div>
                    <div class="form-group form-inline templeteTextarea">
                        <input type="text" name="shipping_charge_ssl" class="form-control w-per-10" id="shipping_charge_ssl" value="<?=$shipping_charge_ssl?>" />
                        <span class="pl-per-5 input-label-right" for="shipping_charge_ssl">Sabah Sarawak Labuan Shipping Charge</span>
                    </div> 

                    <h6>Weight Base</h6>
                    <div class="form-group form-inline templeteTextarea">
                        <input type="text" name="price_bellow_one" class="form-control w-per-10" id="price_bellow_one" value="<?=$price_bellow_one?>" />
                        <span class="pl-per-5 input-label-right" for="price_bellow_one">Price Bellow 1KG</span>
                    </div>
                    <div class="form-group form-inline templeteTextarea">
                        <input type="text" name="price_after_one" class="form-control w-per-10" id="price_after_one" value="<?=$price_after_one?>" />
                        <span class="pl-per-5 input-label-right" for="price_after_one">Price After 1KG</span>
                    </div>  -->
                    <!-- <label class="note" for="note">Note : You need to upload logo at minimum width 500px in PNG (transparent format)</label> -->
                    <div class="text-center" style="width:max-content">
                        <input type="submit" name="submit_shipping" class="btn btn-primary" />
                        <a href="payment.php" class="btn btn-primary"> Next </a>
                    </div>
                </form>
            </div>
            
        </div>    
    </main>
    
</div></div>
<!--View Info Modal -->
<div id="viewShippingRateModal" class="modal fade" role="dialog" >
    <div class="modal-dialog modal-view-main" style="max-width:767px !important">

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
                            <img src="<?=SHIPPING_RATE_PATH?>shipping_rate.jpeg" />
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
<?php require_once('footer.php') ?>
