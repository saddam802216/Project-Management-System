<?php

require('connection.php');

function prx($data = false) {
    if($data) {
        echo '<pre>'; print_r($data); echo '</pre>'; die(__FILE__);
    }else {
        echo 'No data available'; die(__FILE__);
    }
}


class Helper {

    public static function getAllUsers() {
        require('connection.php');
        $data = array();
        $filter = '';
        if(isset($_POST['filter']) && !empty($_POST['filter'])){
            $last = date('Y-m-d', strtotime('-30 days'));
            if($_POST['filter']=='Last'){
                $sql = "SELECT * FROM users WHERE created >='".$last."'";
            }else if($_POST['filter']=='After'){
                $sql = "SELECT * FROM users WHERE created <='".$last."'";
            }else{
                $sql = "SELECT * FROM users ";
            }
            $filter = $_POST['filter'];
        }else{
            $sql = "SELECT * FROM users WHERE active=1 AND user_type='customer' || user_type='admin' GROUP BY id ORDER BY user_type ASC";	
        }

        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($user = $result->fetch_assoc()) {
                $data[] = $user;			 
            }
            return $data;
        }
        return false;
    }

    public static function getAllUsersPlan($filterByStatus) {
        require('connection.php');
        $data = array();
        $filter = '';
        if(isset($filterByStatus) && !empty($filterByStatus)){
            $sql = "SELECT u.id as userid, u.name as username, u.status, u.admin, u.package, u.account, u.website_setup_date, u.training_date, u.revision_1, u.revision_2, u.website_buy_off_date,u.cpanel_password, u.wordpress_password, p.id, p.logo, p.about_us, p.shipping, p.payment, p.contactinfo, p.socialmedia, p.domainemail, p.websitedesign, logo.logo as isLogo, aboutus.content as isAbout, shipping.id as isShipping, payment.id as isPayment, contactinfo.id as isContact, socialmedia.id as isSocialmedia, domainemail.id as isDomainemail, websitedesign.id as isWebsitedesign FROM users as u left join plan as p on u.id=p.userid left join logo on u.id=logo.userid left join aboutus on u.id=aboutus.userid left join shipping on u.id=shipping.userid left join payment on u.id=payment.userid left join contactinfo on u.id=contactinfo.userid left join socialmedia on u.id=socialmedia.userid left join domainemail on u.id=domainemail.userid left join websitedesign on u.id=websitedesign.userid WHERE u.user_type='customer' AND u.status='".$filterByStatus."' ORDER BY u.id DESC";
        }else{
            $sql = "SELECT u.id as userid, u.name as username, u.status, u.admin, u.package, u.account, u.website_setup_date, u.training_date, u.revision_1, u.revision_2, u.website_buy_off_date,u.cpanel_password, u.wordpress_password, p.id, p.logo, p.about_us, p.shipping, p.payment, p.contactinfo, p.socialmedia, p.domainemail, p.websitedesign, logo.logo as isLogo, aboutus.content as isAbout, shipping.id as isShipping, payment.id as isPayment, contactinfo.id as isContact, socialmedia.id as isSocialmedia, domainemail.id as isDomainemail, websitedesign.id as isWebsitedesign FROM users as u left join plan as p on u.id=p.userid left join logo on u.id=logo.userid left join aboutus on u.id=aboutus.userid left join shipping on u.id=shipping.userid left join payment on u.id=payment.userid left join contactinfo on u.id=contactinfo.userid left join socialmedia on u.id=socialmedia.userid left join domainemail on u.id=domainemail.userid left join websitedesign on u.id=websitedesign.userid WHERE u.user_type='customer' ORDER BY u.id DESC";	
        }
        $result = $conn->query($sql);
        
        if($result->num_rows > 0){
            while($user = $result->fetch_assoc()) {
                $data[] = $user;			 
            }
            return $data;
        }
        return false;
    }

    public static function getAllAdmin() {
        require('connection.php');
        $data = array();
        
        $sql = "SELECT * FROM users WHERE user_type='admin'";	
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($admin = $result->fetch_assoc()) {
                $data[] = $admin;			 
            }
            return $data;
        }
        return false;
    }

    public function getUserId() {
        $user = $_SESSION['user'];
        return $user['id'];
    }

    public function getUser() {
        $user = $_SESSION['user'];
        return $user;
    }

    public function getUserInfoData() {
        $user = $_SESSION['user'];
        require('connection.php');
        $query = "SELECT u.id as userid, logo.logo as isLogo, aboutus.content as isAbout, shipping.id as isShipping, payment.id as isPayment, contactinfo.id as isContact, socialmedia.id as isSocialmedia, domainemail.id as isDomainemail, websitedesign.id as isWebsitedesign FROM users as u left join logo on u.id=logo.userid left join aboutus on u.id=aboutus.userid left join shipping on u.id=shipping.userid left join payment on u.id=payment.userid left join contactinfo on u.id=contactinfo.userid left join socialmedia on u.id=socialmedia.userid left join domainemail on u.id=domainemail.userid left join websitedesign on u.id=websitedesign.userid WHERE u.id=".$user['id']." AND u.user_type='customer' ";
        $result = $conn->query($query);	
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            return $data;
        }
        return false;
    }

    public function checkLogoExist($userid=false) {
        if($userid) {
            require('connection.php');
            require('constant.php');
            $query = 'SELECT * FROM logo WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $logo = $result->fetch_assoc();
                $logoname = $logo['logo'];
                unlink(LOGO_PATH.$logoname);
                return true;
            }
        }
        return false;
    }

    public function checkAboutusExist($userid=false) {
        if($userid) {
            require('connection.php');
            $query = 'SELECT * FROM aboutus WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return true;
            }
        }
        return false;
    }

    public function checkShippingExist($userid=false) {
        if($userid) {
            require('connection.php');
            $query = 'SELECT * FROM shipping WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return true;
            }
        }
        return false;
    }

    public function checkPaymentExist($userid=false) {
        if($userid) {
            require('connection.php');
            $query = 'SELECT * FROM payment WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return true;
            }
        }
        return false;
    }

    public function checkContactinfoExist($userid=false) {
        if($userid) {
            require('connection.php');
            $query = 'SELECT * FROM contactinfo WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return true;
            }
        }
        return false;
    }

    public function checkSocialmediaExist($userid=false) {
        if($userid) {
            require('connection.php');
            $query = 'SELECT * FROM socialmedia WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return true;
            }
        }
        return false;
    }

    public function checkDomainemailExist($userid=false) {
        if($userid) {
            require('connection.php');
            $query = 'SELECT * FROM domainemail WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return true;
            }
        }
        return false;
    }

    public function checkWebsitedesignExist($userid=false) {
        if($userid) {
            require('connection.php');
            $query = 'SELECT * FROM websitedesign WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return true;
            }
        }
        return false;
    }

    public function getUserLogo($userid=false) {
        if($userid) {
            require('connection.php');
            $query = 'SELECT * FROM logo WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $logo = $result->fetch_assoc();
                return $logo['logo'];
            }
        }
        return false;
    }

    public function getUserTemplete($userid=false) {
        if($userid) {
            require('connection.php');
            $obj = new stdClass();
            $query = 'SELECT * FROM aboutus WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $templete = $result->fetch_assoc();
                $obj->templete = $templete['templete'];
                $obj->content = $templete['content'];
                $obj->photo = $templete['photo'];
                return $obj;
            }
        }
        return false;
    }

    public function getUserShipping($userid=false) {
        if($userid) {
            require('connection.php');
            $obj = new stdClass();
            $query = 'SELECT * FROM shipping WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return $result->fetch_assoc();
            }
        }
        return false;
    }

    public function getUserPayment($userid=false) {
        if($userid) {
            require('connection.php');
            $obj = new stdClass();
            $query = 'SELECT * FROM payment WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return $result->fetch_assoc();
            }
        }
        return false;
    }

    public function getUserContactinfo($userid=false) {
        if($userid) {
            require('connection.php');
            $obj = new stdClass();
            $query = 'SELECT * FROM contactinfo WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return $result->fetch_assoc();
            }
        }
        return false;
    }

    public function getUserSocialmedia($userid=false) {
        if($userid) {
            require('connection.php');
            $obj = new stdClass();
            $query = 'SELECT * FROM socialmedia WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return $result->fetch_assoc();
            }
        }
        return false;
    }

    public function getUserDomainemail($userid=false) {
        if($userid) {
            require('connection.php');
            $obj = new stdClass();
            $query = 'SELECT * FROM domainemail WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return $result->fetch_assoc();
            }
        }
        return false;
    }

    public function getUserWebsiteDesign($userid=false) {
        if($userid) {
            require('connection.php');
            $obj = new stdClass();
            $query = 'SELECT * FROM websitedesign WHERE userid="'.$userid.'"';
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return $result->fetch_assoc();
            }
        }
        return false;
    }

}



?>