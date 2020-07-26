<?php 

require_once('header.php'); 
$userid = Helper::getUserId();
$data = Helper::getUserSocialmedia($userid);

if($data) {
    $facebook = ($data['facebook'])?$data['facebook']:'https://';
    $youtube = ($data['youtube'])?$data['youtube']:'https://';
    $instagram = ($data['instagram'])?$data['instagram']:'https://';
    $whatsapp = ($data['whatsapp'])?$data['whatsapp']:'6';
}else{
    $facebook = 'https://';
    $youtube = 'https://';
    $instagram = 'https://';
    $whatsapp = '6';
    }
// prx($templete);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Social Media</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Social Media</li>
            </ol>
            
        </div>
        
        <div class="row logo-form">
            <div class="col-sm-12">
                <form class="" name="register-form" action="store.php" method="POST" enctype="multipart/form-data">

                <div class="contactinfo">
                    <div class="form-group form-inline">
                        <span class="input-label" for="facebook">Facebook</span>
                        <input type="text" name="facebook" class="form-control" id="facebook" value="<?=$facebook?>" style="width: 30%;" /> &nbsp;&nbsp;&nbsp; www.facebook.com/xxx
                    </div>
                    <div class="form-group form-inline">
                        <span class="input-label" for="youtube">Youtube</span>
                        <input type="text" name="youtube" class="form-control" id="youtube" value="<?=$youtube?>" style="width: 30%;" />&nbsp;&nbsp;&nbsp; account name
                    </div>
                    <div class="form-group form-inline">
                        <span class="input-label" for="instagram">Instagram</span>
                        <input type="text" name="instagram" class="form-control" id="instagram" value="<?=$instagram?>" style="width: 30%;" />&nbsp;&nbsp;&nbsp; account name
                    </div>
                    <div class="form-group form-inline">
                        <span class="input-label" for="whatsapp">Whatsapp</span>
                        <input type="text" name="whatsapp" class="form-control" id="whatsapp" value="<?=$whatsapp?>" style="width: 30%;" />&nbsp;&nbsp;&nbsp; whatsapp contact number
                    </div> 
                    
                </div>  

                <div class="text-center" style="width:max-content">
                    <input type="submit" name="submit_socialmedia" class="btn btn-primary" />
                    <a href="domainemail.php" class="btn btn-primary"> Next </a>
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