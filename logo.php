<?php 

require_once('header.php'); 
$userid = Helper::getUserId();
$logo = Helper::getUserLogo($userid);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Logo</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Logo</li>
            </ol>
            
        </div>

        <div class="row logo-form">
            <div class="col-sm-6">
                <form class="" name="register-form" action="store.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group form-inline">
                        <label class="" for="logo">Upload Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo" accept="image/x-png" />
                    </div>
                    <label class="note" for="note">Note : You need to upload logo at minimum width 500px in PNG (transparent format)</label>
                    <div class="text-center" style="width:max-content">
                        <input type="submit" name="submit_logo" class="btn btn-primary" />
                        <a href="aboutus.php" class="btn btn-primary"> Next </a>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <?php if($logo) { ?>
                <img src="<?=LOGO_PATH.$logo?>" alt="Logo" width="80%" height="auto" />
                <?php } ?>
            </div>
        </div>    
    </main>
    
</div></div>
<?php require_once('footer.php') ?>