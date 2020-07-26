<?php
require_once('helper.php');
require_once('constant.php');

session_start();
if(isset($_SESSION['user'])){
    $userName = $_SESSION['user']['name'];
    $role = $_SESSION['user']['user_type'];
}else{
    header('Location: login.php');
}

$infoData = Helper::getUserInfoData();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Project Management System</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Project Management System</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 <?=($role=='admin')?"hideMe":""?>" id="sidebarToggle" href="#" style="margin-left:30px"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" class="<?=($role=='admin')?"admin_layout_nav":""?>">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <?php if($role=='admin') { ?>
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <!-- Dashboard -->
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->

                            <a class="nav-link" href="customers.php"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div><!-- Customers --></a>

                            <a class="nav-link" href="progress.php"><div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div><!--Progress--></a>

                            <a class="nav-link" href="password.php"><div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div><!--Change Password--></a>
                        </div>
                        <?php }elseif($role=='customer'){  ?>
                         
                            <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div>
                            
                            <div class="sb-sidenav-menu-heading">Interface</div> -->
                            
                            <a class="nav-link" href="logo.php"><div class="sb-nav-link-icon"><i class="fas fa-arrow-circle-up"></i></div>Logo &nbsp;&nbsp;<?=($infoData['isLogo'])?'<span><i class="fas fa-check-square" style="color:#2CA680;position:relative; left:114px"></i></span>':'' ?></a>

                            <a class="nav-link" href="aboutus.php"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>About Us&nbsp;&nbsp;<?=($infoData['isAbout'])?'<i class="fas fa-check-square" style="color:#2CA680; position:relative; left:90px"></i>':'' ?></a>

                            <a class="nav-link" href="shipping.php"><div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>Shipping&nbsp;&nbsp;<?=($infoData['isShipping'])?'<i class="fas fa-check-square" style="color:#2CA680; position:relative; left:90px"></i>':'' ?></a>

                            <a class="nav-link" href="payment.php"><div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>Payment&nbsp;&nbsp;<?=($infoData['isPayment'])?'<i class="fas fa-check-square" style="color:#2CA680; position:relative; left:92px"></i>':'' ?></a>

                            <a class="nav-link" href="contactinfo.php"><div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>Contact Info&nbsp;&nbsp;<?=($infoData['isContact'])?'<i class="fas fa-check-square" style="color:#2CA680; position:relative; left:68px"></i>':'' ?></a>

                            <a class="nav-link" href="socialmedia.php"><div class="sb-nav-link-icon"><i class="fas fa-share-square"></i></div>Social Media&nbsp;&nbsp;<?=($infoData['isSocialmedia'])?'<i class="fas fa-check-square" style="color:#2CA680; position:relative; left:63px"></i>':'' ?></a>

                            <a class="nav-link" href="domainemail.php"><div class="sb-nav-link-icon"><i class="fas fa-link"></i></div>Domain & Email&nbsp;&nbsp;<?=($infoData['isDomainemail'])?'<i class="fas fa-check-square" style="color:#2CA680; position:relative; left:40px"></i>':'' ?></a>

                            <a class="nav-link" href="websitedesign.php"><div class="sb-nav-link-icon"><i class="fas fa-file-image"></i></div>Website Layout&nbsp;&nbsp;<?=($infoData['isWebsitedesign'])?'<i class="fas fa-check-square" style="color:#2CA680; position:relative; left:48px"></i>':'' ?></a>
                            <!-- <h6 style="padding:20px 0px 0px 15px">Contact On Whatsapp</h6> -->
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=60174243432" class="nav-link"><i class="fab fa-whatsapp"></i>&nbsp;Contact Jolin  </a>
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=601159399319" class="nav-link"><i class="fab fa-whatsapp"></i>&nbsp;Contact Lukas  </a>
                        </div>    

                        <?php } ?>
                    </div>
                    <div class="sb-sidenav-footer <?=($role=='admin')?"hideMe":""?>">
                        <div class="small">Logged in as:</div>
                        <?=$userName?>
                    </div>
                </nav>
            </div>