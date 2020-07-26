<?php 

require_once('header.php'); 
$userid = Helper::getUserId();
$data = Helper::getUserWebsiteDesign($userid);
if($data) {
    $templete = $data['templete'];
}else{
    $templete = '';
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Website Layout</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Website Layout</li>
            </ol>
            
        </div>

        <div class="row logo-form">
            <div class="col-sm-12">
                <form class="" name="register-form" action="store.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-inline">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="radio" name="templete" width="80px" class="tamplete-radio" value="1" <?=$templete==1?' checked':''?> /> 
                                    </div>
                                    <div class="col-sm-9">
                                        <a href="#">www.example.com</a>
                                        <a target="_blank" href="<?=WEBSITE_DESIGN_PATH?>style1.jpg">
                                            <img class="website_design_img" src="<?=WEBSITE_DESIGN_PATH?>style1-a.jpg" alt="Forest">
                                        </a> 
                                    </div> 
                                </div>  
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-inline">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="radio" name="templete" width="80px" class="tamplete-radio" value="2" <?=$templete==2?' checked':''?> /> 
                                    </div>
                                    <div class="col-sm-9">
                                    <a href="#">www.example.com</a>
                                        <a target="_blank" href="?=WEBSITE_DESIGN_PATH?>style2.jpg">
                                            <img class="website_design_img" src="<?=WEBSITE_DESIGN_PATH?>style2-a.jpg" alt="Forest">
                                        </a> 
                                    </div> 
                                </div>  
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-inline">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="radio" name="templete" width="80px" class="tamplete-radio" value="3" <?=$templete==3?' checked':''?> /> 
                                    </div>
                                    <div class="col-sm-9">
                                    <a href="#">www.example.com</a>
                                        <a target="_blank" href="<?=WEBSITE_DESIGN_PATH?>style3.jpg">
                                            <img class="website_design_img" src="<?=WEBSITE_DESIGN_PATH?>style3-a.jpg" alt="Forest">
                                        </a> 
                                    </div> 
                                </div>  
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-inline">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="radio" name="templete" width="80px" class="tamplete-radio" value="4" <?=$templete==4?' checked':''?> /> 
                                    </div>
                                    <div class="col-sm-9">
                                    <a href="#">www.example.com</a>
                                        <a target="_blank" href="<?=WEBSITE_DESIGN_PATH?>style4.jpg">
                                            <img class="website_design_img" src="<?=WEBSITE_DESIGN_PATH?>style4-a.jpg" alt="Forest">
                                        </a> 
                                    </div> 
                                </div>  
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-inline">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="radio" name="templete" width="80px" class="tamplete-radio" value="5" <?=$templete==5?' checked':''?> /> 
                                    </div>
                                    <div class="col-sm-9">
                                    <a href="#">www.example.com</a>
                                        <a target="_blank" href="<?=WEBSITE_DESIGN_PATH?>style5.jpg">
                                            <img class="website_design_img" src="<?=WEBSITE_DESIGN_PATH?>style5-a.jpg" alt="Forest">
                                        </a> 
                                    </div> 
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="text-center" style="width:max-content">
                        <input type="submit" name="submit_websitedesign" value="Complete & submit" class="form-control btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>    
    </main>
    
</div></div>
<?php require_once('footer.php') ?>