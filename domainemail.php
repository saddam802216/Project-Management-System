<?php 

require_once('header.php'); 
$userid = Helper::getUserId();
$data = Helper::getUserDomainemail($userid);
$user = Helper::getUser();
$package = $user['package'];

if($data) {
    $domain_name = $data['domain_name'];
    $domain_server_name = $data['domain_server_name'];
    $email1 = $data['email1'];
    $email2 = $data['email2'];
    $email3 = $data['email3'];
    $email4 = $data['email4'];
    $email5 = $data['email5'];
    $email6 = $data['email6'];
    $email7 = $data['email7'];
    $email8 = $data['email8'];
    $email9 = $data['email9'];
    $email10 = $data['email10'];
    
}else{
    $domain_name = '';
    $domain_server_name = '';
    $email1 = '';
    $email2 = '';
    $email3 = '';
    $email4 = '';
    $email5 = '';
    $email6 = '';
    $email7 = '';
    $email8 = '';
    $email9 = '';
    $email10 = '';
    
    }
// prx($templete);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Domain & Email</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Domain & Email</li>
            </ol>
            
        </div>
        
        <div class="row logo-form">
            <div class="col-sm-12">
                <form class="" name="register-form" action="store.php" method="POST" enctype="multipart/form-data">

                <div class="contactinfo">
                    <div class="row">
                    <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="domain_name">Domain Name (First Choice)</span>
                        <input type="text" name="domain_name" class="form-control" id="domain_name" value="<?=$domain_name?>" />
                    </div>
                    <div class="form-group form-inline col-sm-6">
                        <span class="input-label" for="domain_server_name">Domain Name (Second Choice)</span>
                        <input type="text" name="domain_server_name" class="form-control" id="domain_server_name" value="<?=$domain_server_name?>" />
                    </div>
                    </div>
                    <?php if($package==1 || $package==2 || $package==3 || $package==4) { ?>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                            <span class="input-label" for="email1">Email 1</span>
                            <input type="text" name="email1" class="form-control" id="email1" value="<?=$email1?>" />
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($package==2 || $package==3 || $package==4) { ?>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="email2">Email 2</span>
                        <input type="text" name="email2" class="form-control" id="email2" value="<?=$email2?>" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="email3">Email 3</span>
                        <input type="text" name="email3" class="form-control" id="email3" value="<?=$email3?>" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="email4">Email 4</span>
                        <input type="text" name="email4" class="form-control" id="email4" value="<?=$email4?>" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="email5">Email 5</span>
                        <input type="text" name="email5" class="form-control" id="email5" value="<?=$email5?>" />
                    </div>
                    </div>
                    <?php } ?>    
                    <?php if($package==4) { ?>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="email6">Email 6</span>
                        <input type="text" name="email6" class="form-control" id="email6" value="<?=$email6?>" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="email7">Email 7</span>
                        <input type="text" name="email7" class="form-control" id="email7" value="<?=$email7?>" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="email8">Email 8</span>
                        <input type="text" name="email8" class="form-control" id="email8" value="<?=$email8?>" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="email9">Email 9</span>
                        <input type="text" name="email9" class="form-control" id="email9" value="<?=$email9?>" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-inline clo-sm-6">
                        <span class="input-label" for="email10">Email 10</span>
                        <input type="text" name="email10" class="form-control" id="email10" value="<?=$email10?>" />
                    </div>
                    </div>
                    <?php } ?>
                    
                </div>   

                <div class="text-center" style="width:max-content">
                    <input type="submit" name="submit_domainemail" class="btn btn-primary" />
                    <a href="websitedesign.php" class="btn btn-primary"> Next </a>
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