<?php
require_once('helper.php');
require_once('connection.php');
require_once('constant.php');
$data = $_POST;
session_start();

if(isset($data['submit_websitedesign'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';
    
    if($data['submit_websitedesign']) {
        $templete = $data['templete'];
        $userid = Helper::getUserId();
        $currentDate = date('Y-m-d');
        $created_by = $userid;
        $isWebsitedesignExist = Helper::checkWebsitedesignExist($userid);
        if($isWebsitedesignExist) {
            $query = "UPDATE `websitedesign` SET  `templete`='".$templete."', `modified`='".$currentDate."', `modified_by`='".$created_by."' WHERE userid='".$userid."'";
        }else{
            $query = "INSERT INTO `websitedesign` (id, userid, templete, created, created_by) VALUES (null, '".$userid."', '".$templete."', '".$currentDate."', '".$created_by."')";
        }
        if ($conn->query($query) === TRUE) {
            header('Location: websitedesign.php');
            exit;
        }
    }else {
        $obj->status = false;
        $obj->message = 'File not uploaded!';
        header('Location: websitedesign.php');
        exit;
    }
}

if(isset($data['submit_domainemail'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';
    if($data['submit_domainemail']) {
        $domain_name = $data['domain_name'];
        $domain_server_name = $data['domain_server_name'];
        $email1 = isset($data['email1'])?$data['email1']:'';
        $email2 = isset($data['email2'])?$data['email2']:'';
        $email3 = isset($data['email3'])?$data['email3']:'';
        $email4 = isset($data['email4'])?$data['email4']:'';
        $email5 = isset($data['email5'])?$data['email5']:'';
        $email6 = isset($data['email6'])?$data['email6']:'';
        $email7 = isset($data['email7'])?$data['email7']:'';
        $email8 = isset($data['email8'])?$data['email8']:'';
        $email9 = isset($data['email9'])?$data['email9']:'';
        $email10 = isset($data['email10'])?$data['email10']:'';

        $userid = Helper::getUserId();
        $currentDate = date('Y-m-d');
        $created_by = $userid;
        $isDomainemailExist = Helper::checkDomainemailExist($userid);
        if($isDomainemailExist) {
            $query = "UPDATE `domainemail` SET  `domain_name`='".$domain_name."', `domain_server_name`='".$domain_server_name."', `email1`='".$email1."', `email2`='".$email2."', `email3`='".$email3."', `email4`='".$email4."', `email5`='".$email5."', `email6`='".$email6."', `email7`='".$email7."', `email8`='".$email8."', `email9`='".$email9."', `email10`='".$email10."', `modified`='".$currentDate."', `modified_by`='".$created_by."' WHERE userid='".$userid."'";
        }else{
            $query = "INSERT INTO `domainemail` (id, userid, domain_name, domain_server_name, email1, email2, email3, email4, email5, email6, email7, email8, email9, email10, created, created_by) VALUES (null, '".$userid."', '".$domain_name."', '".$domain_server_name."', '".$email1."', '".$email2."', '".$email3."', '".$email4."', '".$email5."', '".$email6."', '".$email7."', '".$email8."', '".$email9."', '".$email10."', '".$currentDate."', '".$created_by."')";
        }

        if ($conn->query($query) === TRUE) {
            header('Location: domainemail.php');
            exit;
        }
    }else {
        $obj->status = false;
        $obj->message = 'File not uploaded!';
        header('Location: domainemail.php');
        exit;
    }
}

if(isset($data['submit_socialmedia'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';
    if($data['submit_socialmedia']) {
        $facebook = $data['facebook'];
        $youtube = $data['youtube'];
        $instagram = $data['instagram'];
        $whatsapp = $data['whatsapp'];

        $userid = Helper::getUserId();
        $currentDate = date('Y-m-d');
        $created_by = $userid;
        $isSocialmediaExist = Helper::checkSocialmediaExist($userid);
        if($isSocialmediaExist) {
            $query = "UPDATE `socialmedia` SET  `facebook`='".$facebook."', `youtube`='".$youtube."', `instagram`='".$instagram."', `whatsapp`='".$whatsapp."', `modified`='".$currentDate."', `modified_by`='".$created_by."' WHERE userid='".$userid."'";
        }else{
            $query = "INSERT INTO `socialmedia` (id, userid, facebook, youtube, instagram, whatsapp, created, created_by) VALUES (null, '".$userid."', '".$facebook."', '".$youtube."', '".$instagram."', '".$whatsapp."', '".$currentDate."', '".$created_by."')";
        }

        if ($conn->query($query) === TRUE) {
            header('Location: socialmedia.php');
            exit;
        }
    }else {
        $obj->status = false;
        $obj->message = 'File not uploaded!';
        header('Location: socialmedia.php');
        exit;
    }
}

if(isset($data['submit_contactinfo'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';
    if($data['submit_contactinfo']) {
        $company_name = $data['company_name'];
        $company_registration_no = $data['company_registration_no'];
        $address = $data['address'];
        $office_phone = $data['office_phone'];
        $office_fax = $data['office_fax'];
        $person_in_charge_name = $data['person_in_charge_name'];
        $person_in_charge_email = $data['person_in_charge_email'];
        $person_in_charge_phone = $data['person_in_charge_phone'];

        $userid = Helper::getUserId();
        $currentDate = date('Y-m-d');
        $created_by = $userid;
        $isContactinfoExist = Helper::checkContactinfoExist($userid);
        if($isContactinfoExist) {
            $query = "UPDATE `contactinfo` SET  `company_name`='".$company_name."', `company_registration_no`='".$company_registration_no."', `address`='".$address."', `office_phone`='".$office_phone."', `office_fax`='".$office_fax."', `person_in_charge_name`='".$person_in_charge_name."', `person_in_charge_email`='".$person_in_charge_email."', `person_in_charge_phone`='".$person_in_charge_phone."', `modified`='".$currentDate."', `modified_by`='".$created_by."' WHERE userid='".$userid."'";
        }else{
            $query = "INSERT INTO `contactinfo` (id, userid, company_name, company_registration_no, address, office_phone, office_fax, person_in_charge_name, person_in_charge_email, person_in_charge_phone, created, created_by) VALUES (null, '".$userid."', '".$company_name."', '".$company_registration_no."', '".$address."', '".$office_phone."','".$office_fax."', '".$person_in_charge_name."', '".$person_in_charge_email."','".$person_in_charge_phone."', '".$currentDate."', '".$created_by."')";
        }

        if ($conn->query($query) === TRUE) {
            header('Location: contactinfo.php');
            exit;
        }
    }else {
        $obj->status = false;
        $obj->message = 'File not uploaded!';
        header('Location: contactinfo.php');
        exit;
    }
}

if(isset($data['submit_payment'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';
    if($data['submit_payment']) {
        
        if(isset($data['manual_payment'])) {
            $manual_payment = 1;
            $bank_name = $data['bank_name'];
            $bank_account_name = $data['bank_account_name'];
            $bank_account_number = $data['bank_account_number'];
        }else{
            $manual_payment = 0;
            $bank_name = '';
            $bank_account_name = '';
            $bank_account_number = '';
        }

        if(isset($data['billpiz'])) {
            $billpiz = 1;
            $billpiz_email = $data['billpiz_email'];
            $billpiz_password = $data['billpiz_password'];
        }else{
            $billpiz = 0;
            $billpiz_email = '';
            $billpiz_password = '';
        }

        if(isset($data['paypal'])) {
            $paypal = 1;
            $paypal_email = $data['paypal_email'];
            $paypal_password = $data['paypal_password'];
        }else{
            $paypal = 0;
            $paypal_email = '';
            $paypal_password = '';
        }

    
        $userid = Helper::getUserId();
        $currentDate = date('Y-m-d');
        $created_by = $userid;
        $isPaymentExist = Helper::checkPaymentExist($userid);
        if($isPaymentExist) {
            $query = "UPDATE `payment` SET  `manual_payment`='".$manual_payment."', `bank_name`='".$bank_name."', `bank_account_name`='".$bank_account_name."', `bank_account_number`='".$bank_account_number."', `billpiz`='".$billpiz."', `billpiz_email`='".$billpiz_email."', `billpiz_password`='".$billpiz_password."', `paypal`='".$paypal."', `paypal_email`='".$paypal_email."', `paypal_password`='".$paypal_password."', `modified`='".$currentDate."', `modified_by`='".$created_by."' WHERE userid='".$userid."'";
        }else{
            $query = "INSERT INTO `payment` (id, userid, manual_payment, bank_name, bank_account_name, bank_account_number, billpiz, billpiz_email, billpiz_password, paypal, paypal_email, paypal_password, created, created_by) VALUES (null, '".$userid."', '".$manual_payment."', '".$bank_name."', '".$bank_account_name."', '".$bank_account_number."','".$billpiz."', '".$billpiz_email."', '".$billpiz_password."','".$paypal."', '".$paypal_email."', '".$paypal_password."', '".$currentDate."', '".$created_by."')";
        }
        
        if ($conn->query($query) === TRUE) {
            header('Location: payment.php');
            exit;
        }
    }else {
        $obj->status = false;
        $obj->message = 'File not uploaded!';
        header('Location: payment.php');
        exit;
    }
}

if(isset($data['submit_shipping'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';
    if($data['submit_shipping']) {
        $shipping_rate_type = isset($data['shipping_rate_type'])?$data['shipping_rate_type']:'';
        $base_cost_pms = $data['base_cost_pms'];
        $weight_rate_charge_pms = $data['weight_rate_charge_pms'];
        $base_cost_ssl = $data['base_cost_ssl'];
        $weight_rate_charge_ssl = $data['weight_rate_charge_ssl'];
        $remarks = $data['remarks'];
    
        $userid = Helper::getUserId();
        $currentDate = date('Y-m-d');
        $created_by = $userid;
        $isShippingExist = Helper::checkShippingExist($userid);
        if($isShippingExist) {
            $query = "UPDATE `shipping` SET  `shipping_rate_type`='".$shipping_rate_type."',`base_cost_pms`='".$base_cost_pms."', `weight_rate_charge_pms`='".$weight_rate_charge_pms."', `base_cost_ssl`='".$base_cost_ssl."', `weight_rate_charge_ssl`='".$weight_rate_charge_ssl."', `remarks`='".$remarks."', `modified`='".$currentDate."', `modified_by`='".$created_by."' WHERE userid='".$userid."'";
        }else{
            $query = "INSERT INTO `shipping` (id, userid, shipping_rate_type, base_cost_pms, weight_rate_charge_pms, base_cost_ssl, weight_rate_charge_ssl, remarks, created, created_by) VALUES (null, '".$userid."', '".$shipping_rate_type."', '".$base_cost_pms."', '".$weight_rate_charge_pms."', '".$base_cost_ssl."', '".$weight_rate_charge_ssl."', '".$remarks."', '".$currentDate."', '".$created_by."')";
        }
        
        if ($conn->query($query) === TRUE) {
            header('Location: shipping.php');
            exit;
        }
    }else {
        $obj->status = false;
        $obj->message = 'File not uploaded!';
        header('Location: shipping.php');
        exit;
    }
}

if(isset($data['submit_aboutus'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';
    if($data['templete']) {
        $templete = $data['templete'];
        if($templete==1) {
            $content = $data['templete1'];
        }elseif($templete==2) {
            $content = $data['templete2'];
        }elseif($templete==3) {
            $content = $data['templete3'];
        }else{
            $content = '';
        }
        $photo = ( isset($data['photo']) && !empty($data['photo']) ) ? implode(',', $data['photo']) : '';
        $userid = Helper::getUserId();
        $currentDate = date('Y-m-d');
        $created_by = $userid;
        $isAboutusExist = Helper::checkAboutusExist($userid);
        if($isAboutusExist) {
            $query = "UPDATE `aboutus` SET  `templete`='".$templete."', `content`='".$content."', `photo`='".$photo."', `modified`='".$currentDate."', `modified_by`='".$created_by."' WHERE userid='".$userid."'";
        }else{
            $query = "INSERT INTO `aboutus` (id, userid, templete, content, photo, created, created_by) VALUES (null, '".$userid."', '".$templete."', '".$content."', '".$photo."', '".$currentDate."', '".$created_by."')";
        }
        
        if ($conn->query($query) === TRUE) {
            header('Location: aboutus.php');
            exit;
        }
    }else {
        $obj->status = false;
        $obj->message = 'File not uploaded!';
        header('Location: aboutus.php');
        exit;
    }
}

if(isset($data['submit_logo'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';

    $file = $_FILES;
    $allowedExts = array("png");
    $extension = explode(".", $file["logo"]["name"]);
    $extension = end($extension);
    $src = $_FILES['logo']['tmp_name'];
    
    if ( ($file["logo"]["type"] == "image/png") && ($file["logo"]["size"] < 100000) && in_array($extension, $allowedExts) ) {

        $time = time();
        $rand=rand(10000,999999999);
        $encname=$time.$rand;
        $logoname=$encname.'.'.$extension;
        $logopath=LOGO_PATH.$logoname;
        
        if(move_uploaded_file($src, $logopath)) {
            $userid = Helper::getUserId();
            $currentDate = date('Y-m-d');
            $created_by = $userid;
            $isLogoExist = Helper::checkLogoExist($userid);
            if($isLogoExist) {
                $query = "UPDATE `logo` SET  `logo`='".$logoname."', `modified`='".$currentDate."', `modified_by`='".$created_by."' WHERE userid='".$userid."'";
            }else{
                $query = "INSERT INTO `logo` (id, userid, logo, created, created_by) VALUES (null, '".$userid."', '".$logoname."', '".$currentDate."', '".$created_by."')";
            }
            
            if ($conn->query($query) === TRUE) {
                header('Location: logo.php');
                exit;
            }
        }else {
            $obj->status = false;
            $obj->message = 'File not uploaded!';
            header('Location: logo.php');
            exit;
        }
    }
}

if(isset($data['login'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';

    $email = $data['email'];
    $password = $data['password'];
    $sql = "SELECT * FROM users WHERE email='".$email."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
        $sql = "SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
		$result = $conn->query($sql);
        if($result->num_rows > 0){
            $sql = "SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
            while($user = $result->fetch_assoc()) {
                session_start();
                $_SESSION['user'] = $user;			 
            }
            if(isset($data['remember']) && !empty($data['remember'])) {
                $hour = time() + 3600 * 24 * 30;
                setcookie('email', $email, $hour);
                setcookie('password', $password, $hour);
                setcookie('remember_me', '1', $hour);
            }

            header('Location: index.php');
            exit;
        }else{
            $obj->status = false;
            $obj->message = "Entered wrong password!";
            $_SESSION['login'] = $obj;
            header('Location: login.php');	
            exit;
        }
	}else{
        $obj->status = false;
        $obj->message = "User not registerd, Please register first!";
        $_SESSION['login'] = $obj;
        header('Location: login.php');	
        exit;
	}
}

if(isset($data['register'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';
    $name = $data['fname'].' '.$data['lname'];
    $fname = $data['fname'];
    $lname = $data['lname'];
    $email = $data['email'];
    $package = isset($data['package'])?$data['package']:'';
    $password = $data['password'];
    $status = 1;
    $user_type = $data['role'];
    $currentData = date('Y-m-d');
    $conformPassword = $data['conformPassword'];
    $isUpdate = false;
    $cpanel_username = $data['cpanel_username'];
    $cpanel_password = $data['cpanel_password'];
    $wordpress_username = $data['wordpress_username'];
    $wordpress_password = $data['wordpress_password'];
    $website_setup_date = $data['website_setup_date'];
    $training_date = $data['training_date'];
    $website_buy_off_date = $data['website_buy_off_date'];
    $revision_1 = isset($data['revision_1'])?$data['revision_1']:''; 
    $revision_2 = isset($data['revision_2'])?$data['revision_2']:''; 

	if($password!==$conformPassword){
        $obj->status = false;
        $obj->message = 'password not match with conform password, Please try again!';
        $_SESSION['register'] = $obj;
        header('Location: register.php');
        exit;
    }
    
    if(isset($data['id']) && !empty($data['id'])) {
        $sql = "UPDATE `users` SET `name`='".$name."', `fname`='".$fname."', `lname`='".$lname."', `email`='".$email."', `package`='".$package."', `password`='".$password."', `cpanel_username`='".$cpanel_username."', `cpanel_password`='".$cpanel_password."', `wordpress_username`='".$wordpress_username."', `wordpress_password`='".$wordpress_password."', `website_setup_date`='".$website_setup_date."', `training_date`='".$training_date."', `website_buy_off_date`='".$website_buy_off_date."', `revision_1`='".$revision_1."', `revision_2`='".$revision_2."', `status`='".$status."', `user_type`='".$user_type."', `modified`='".$currentData."' WHERE id='".$data['id']."'";
        $isUpdate = true;
    }else{
        $sql = "INSERT INTO `users` (id, name, fname, lname, email, package, password, cpanel_username, cpanel_password, wordpress_username, wordpress_password, website_setup_date, training_date, website_buy_off_date, revision_1, revision_2, status, user_type, created, active) VALUES (null, '".$name."', '".$fname."', '".$lname."', '".$email."', '".$package."', '".$password."', '".$cpanel_username."', '".$cpanel_password."', '".$wordpress_username."', '".$wordpress_password."', '".$website_setup_date."', '".$training_date."', '".$website_buy_off_date."', '".$revision_1."', '".$revision_2."', '".$status."', '".$user_type."', '".$currentData."', 1)";
    } 
  
	if ($conn->query($sql) === TRUE) {
        $obj->message = 'User created successfully, Please login!';  
        $conn->close();
        if(isset($data['planRegistration'])) {
            header('Location: progress.php');
            exit;
        }
        if($isUpdate) {
            header('Location: customers.php');
            exit;
        }
        $_SESSION['register'] = $obj;
        header('Location: login.php');
        exit;
	} else {
        $obj->status = true;
        $obj->message = 'User can not be create, Please try again!'; 
        $conn->close();
        if(isset($data['planRegistration'])) {
            header('Location: progress.php');
            exit;
        }
        $_SESSION['register'] = $obj;
        header('Location: register.php');
        exit;
    }
    
}

if(isset($data['submit_save_password'])) {
    $obj = new stdClass;
    $obj->status = true;
    $obj->message = '';
    
    if($data['submit_save_password']) {
        $password = $data['password'];
        $currentDate = date('Y-m-d');
        $userid = Helper::getUserId();
        
        $query = "UPDATE `users` SET  `password`='".$password."', `modified`='".$currentDate."' WHERE id='".$userid."'";
        
        if ($conn->query($query) === TRUE) {
            header('Location: login.php');
            exit;
        }
    }

    $obj->status = false;
    $obj->message = 'File not uploaded!';
    header('Location: password.php');
    exit;

}


?>