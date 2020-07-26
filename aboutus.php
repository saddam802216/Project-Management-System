<?php 

require_once('header.php'); 
$userid = Helper::getUserId();
$templete = Helper::getUserTemplete($userid);
$photos = !empty($templete->photo) ? explode(',', $templete->photo) : ''; 
$imgs = unserialize(ABOUTUS_IMAGE);

// prx($photos);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">About Us</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
            
        </div>
        
        <div class="row logo-form">
            <div class="col-sm-12">
                <form class="" name="register-form" action="store.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                    <div class="form-group templete-option">
                        <select name="templete" id="templete">
                            <option value="">--- Templete ---</option>
                            <option value="1" <?=(isset($templete->templete) && $templete->templete==1)?' selected':''?>>Templete 1</option>
                            <option value="2" <?=(isset($templete->templete) && $templete->templete==2)?' selected':''?>>Templete 2</option>
                            <option value="3" <?=(isset($templete->templete) && $templete->templete==3)?' selected':''?>>Templete 3</option>
                        </select>
                    </div>
                    
                    <div class="form-group form-inline templeteTextarea">
                       <textarea name="templete1" id="templete1" class="<?=(isset($templete->templete) && $templete->templete==1)?'':'hideMe '?>  templete-layout hideAll"><?=(isset($templete->templete) && $templete->templete==1)?$templete->content:'Templete 1 '?></textarea>
                       <textarea name="templete2" id="templete2" class="<?=(isset($templete->templete) && $templete->templete==2)?'':'hideMe '?> templete-layout hideAll"><?=(isset($templete->templete) && $templete->templete==2)?$templete->content:'Templete 2 '?></textarea>
                       <textarea name="templete3" id="templete3" class="<?=(isset($templete->templete) && $templete->templete==3)?'':'hideMe '?> templete-layout hideAll"><?=(isset($templete->templete) && $templete->templete==3)?$templete->content:'Templete 3 '?></textarea>
                    </div> 
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group templete-option">
                            <h6> Photo Library </h6>
                            <p>Select 3 Photos for aboutus page</p>
                            <div class="row">
                                <?php 
                                
                                foreach($imgs as $key=>$img) { 
                                if($key==0)
                                continue;
                                ?>

                                <div class="col-sm-4" style="padding:10px">
                                    <input type="checkbox" class="select_img" name="photo[]" value="<?=$key?>" <?=(!empty($photos) && in_array($key, $photos)) ? " checked" : ''?>>
                                    <a href="<?=ABOUTUS_IMAGE_PATH.$img?>" target="_blank">
                                    <img src="<?=ABOUTUS_IMAGE_PATH.$img?>" class="image_img" /></a>
                                </div>

                                <?php } ?>
                            
                            </div>
                    
                    </div>
                    </div>
                    </div>
                    <!-- <label class="note" for="note">Note : You need to upload logo at minimum width 500px in PNG (transparent format)</label> -->
                    <div class="text-center" style="width:max-content">
                        <input type="submit" name="submit_aboutus" class="btn btn-primary" />
                        <a href="shipping.php" class="btn btn-primary"> Next </a>
                    </div>
                </form>
            </div>
            
        </div>    
    </main>
    
</div></div>
<?php require_once('footer.php') ?>

<script>
    $(document).on('change', '#templete', function(){
        let temp = $(this).val();
        $('.hideAll').hide();
        $('#templete'+temp).show();
    });

    $(document).on('click', '.select_img', function(){
        let count = $('input:checkbox:checked').length;
        if(count>3) {
            alert("You select maximum 3 images!")
            return false;
        }
    });
</script>