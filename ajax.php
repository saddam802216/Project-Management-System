<?php
	require('connection.php');
	require('helper.php');

	$data = $_POST;

	if(isset($data['task']) && $data['task']=='updateAdmin'){
		
		$obj = new stdClass();
		$obj->result = 'error';
		$sql = 'UPDATE users SET `admin`="'.$data["admin"].'" WHERE id='.$data["userid"];
		if($conn->query($sql)){
			$obj->result = 'success';
		}
		exit(json_encode($obj));		
	}

	if(isset($data['task']) && $data['task']=='updateAccount'){
		
		$obj = new stdClass();
		$obj->result = 'error';
		$sql = 'UPDATE users SET `account`="'.$data["value"].'" WHERE id='.$data["userid"];
		if($conn->query($sql)){
			$obj->result = 'success';
		}
		exit(json_encode($obj));		
	}

	if(isset($data['task']) && $data['task']=='updateWebsiteSetupDate'){
		
		$obj = new stdClass();
		$obj->result = 'error';
		$sql = 'UPDATE users SET `website_setup_date`="'.$data["value"].'" WHERE id='.$data["userid"];
		if($conn->query($sql)){
			$obj->result = 'success';
		}
		exit(json_encode($obj));		
	}

	if(isset($data['task']) && $data['task']=='updateTrainingDate'){
		
		$obj = new stdClass();
		$obj->result = 'error';
		$sql = 'UPDATE users SET `training_date`="'.$data["value"].'" WHERE id='.$data["userid"];
		if($conn->query($sql)){
			$obj->result = 'success';
		}
		exit(json_encode($obj));		
	}

	if(isset($data['task']) && $data['task']=='updaterevisionOne'){
		$value = $data['value']=='true';
		$obj = new stdClass();
		$obj->result = 'error';
		$sql = 'UPDATE users SET `revision_1`="'.$value.'" WHERE id='.$data["userid"];
		if($conn->query($sql)){
			$obj->result = 'success';
		}
		exit(json_encode($obj));		
	}

	if(isset($data['task']) && $data['task']=='updaterevisionTwo'){
		$value = $data['value']=='true';
		$obj = new stdClass();
		$obj->result = 'error';
		$sql = 'UPDATE users SET `revision_2`="'.$value.'" WHERE id='.$data["userid"];
		if($conn->query($sql)){
			$obj->result = 'success';
		}
		exit(json_encode($obj));		
	}

	if(isset($data['task']) && $data['task']=='websiteBuyOffDate'){
		
		$obj = new stdClass();
		$obj->result = 'error';
		$sql = 'UPDATE users SET `website_buy_off_date`="'.$data["value"].'" WHERE id='.$data["userid"];
		if($conn->query($sql)){
			$obj->result = 'success';
		}
		exit(json_encode($obj));		
	}


	if(isset($data['task']) && $data['task']=='updateStatus'){
		
		$obj = new stdClass();
		$obj->result = 'error';
		$sql = 'UPDATE users SET `status`="'.$data["status"].'" WHERE id='.$data["userid"];
		if($conn->query($sql)){
			$obj->result = 'success';
		}
		exit(json_encode($obj));		
	}

	if(isset($data['task']) && $data['task']=='updatePlan'){
		$obj = new stdClass();
		$obj->result = 'error';
		$field_name = $data['planName'];
		$field_value = $data['planValue']=='true';
		$userid = $data['userid'];
		if($data['planid']) {
			$sql = 'UPDATE plan SET `'.$field_name.'`="'.$field_value.'" WHERE id='.$data["planid"];
		}else{
			$sql = 'INSERT INTO plan (id, userid, '.$field_name.') VALUES (null, "'.$userid.'", "'.$field_value.'")';
		}
		
		if($conn->query($sql)){
			$obj->result = 'success';
		}
		exit(json_encode($obj));		
	}

	if(isset($data['task']) && $data['task']=='view-option'){
		$obj = new stdClass();
		$obj->html = '';
		$obj->msg = 'success';
		
		if(!empty($data) && isset($data['dataType']) && isset($data['dataId']) && !empty($data['dataType']) && !empty($data['dataId'])) {
			// prx($data);
			switch ($data['dataType']) {
				
				case "logo":
					$res = getLogoHtml($data["dataId"]);
					$obj->html = $res->html;
					$obj->msg = $res->msg;
				break;

				case "about_us":
					$res = getAboutusHtml($data["dataId"]);
					$obj->html = $res->html;
					$obj->msg = $res->msg;
				break;

				case "shipping":
					$res = getShippingHtml($data["dataId"]);
					$obj->html = $res->html;
					$obj->msg = $res->msg;
				break;

				case "payment":
					$res = getPaymentHtml($data["dataId"]);
					$obj->html = $res->html;
					$obj->msg = $res->msg;
				break;

				case "contactinfo":
					$res = getContactInfoHtml($data["dataId"]);
					$obj->html = $res->html;
					$obj->msg = $res->msg;
				break;

				case "socialmedia":
					$res = getSocialMediaHtml($data["dataId"]);
					$obj->html = $res->html;
					$obj->msg = $res->msg;
				break;

				case "domainemail":
					$res = getDomainEmailHtml($data["dataId"]);
					$obj->html = $res->html;
					$obj->msg = $res->msg;
				break;

				case "websitedesign":
					$res = getWDHtml($data["dataId"]);
					$obj->html = $res->html;
					$obj->msg = $res->msg;
				break;

				case "showPassword":
					$res = getPasswordHtml($data["dataId"]);
					$obj->html = $res->html;
					$obj->msg = $res->msg;
				break;
			
			}
		}else {
			$obj->msg = "First checked  the check box!";
		}
		
		exit(json_encode($obj));		
	}

	if(isset($data['task']) && $data['task']=='updateUserData'){
		$obj = new stdClass();
		$obj->result = 'error';
		$obj->data = '';
		if( !(isset($data['userid'])) || empty($data['userid']) ) {
			return false;
		}
		
		require('connection.php');
		require_once('constant.php');
		$userid = $data['userid'];
		$query = 'SELECT * FROM users WHERE id="'.$userid.'"';
		$result = $conn->query($query);
		if($result->num_rows > 0){
			$user = $result->fetch_assoc();
			// Packages
			$packages = unserialize (PACKAGES);
			$packageHTML = "";
			foreach($packages as $packageValue=>$package) { 
				$statusSelected = ($packageValue==$user["package"])?" selected":""; 
				$packageHTML .= '<option value="'.$packageValue.'" '.$statusSelected.'>'.$package.'</option>'; 
			}
			$adminChecked = ($user["user_type"]=='admin')?" checked":""; 
			$customerChecked = ($user["user_type"]=='customer')?" checked":""; 
			$revision1Checked = ($user["revision_1"])?" checked":""; 
			$revision2Checked = ($user["revision_2"])?" checked":""; 

			$html = '';

			$html .= '<div class="form-row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="inputFirstName">First Name</label>
					<input name="fname" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" value="'.$user["fname"].'" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="inputLastName">Last Name</label>
					<input name="lname" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" value="'.$user["lname"].'" />
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="inputEmailAddress">Email</label>
					<input name="email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" value="'.$user["email"].'" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="inputPackage">Package</label> 
					<select name="package" class="form-control ">
					'.$packageHTML.'
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="inputPassword">Password</label>
					<input name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" value="'.$user["password"].'" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
					<input name="conformPassword" class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" value="'.$user["password"].'" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group">
				<label class="small mb-1" for="role" style="padding-right:20px">User Role : </label>
					<input type="radio" name="role" value="admin" '.$adminChecked.'/>
					PIC &nbsp;&nbsp; 
					<input type="radio" name="role" value="customer" '.$customerChecked.' />
					Customer
				</div>
			</div>
			<input type="hidden" name="id" value="'.$user['id'].'">
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="cpanel_username">cPanel Username</label>
					<input name="cpanel_username" class="form-control py-4" id="cpanel_username" type="text" placeholder="Enter cPanel Username" value="'.$user["cpanel_username"].'" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="cpanel_password">cPanel Password</label>
					<input name="cpanel_password" class="form-control py-4" id="cpanel_password" type="text" placeholder="Enter cPanel Password" value="'.$user["cpanel_password"].'" />
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="wordpress_username">Wordpress Username</label>
					<input name="wordpress_username" class="form-control py-4" id="wordpress_username" type="text" placeholder="Enter Wordpress Username" value="'.$user["wordpress_username"].'" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="wordpress_password">Wordpress Password</label>
					<input name="wordpress_password" class="form-control py-4" id="wordpress_password" type="text" placeholder="Enter Wordpress Password" value="'.$user["wordpress_password"].'" />
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="wordpress_username">Website Setup date</label>
					<input name="website_setup_date" class="form-control py-4" id="website_setup_date" type="date" value="'.$user["website_setup_date"].'" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="wordpress_username">Training date</label>
					<input name="training_date" class="form-control py-4" id="training_date" type="date" value="'.$user["training_date"].'" />
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="revision_1"> Revision 1</label>
					<input type="checkbox" name="revision_1" value="1" '.$revision1Checked.' />
				</div>
				<div class="form-group">
					<label class="small mb-1" for="revision_2"> Revision 2</label>
					<input type="checkbox" name="revision_2" value="1" '.$revision2Checked.' />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="small mb-1" for="wordpress_username">Website buy off date</label>
					<input name="website_buy_off_date" class="form-control py-4" id="website_buy_off_date" type="date"  value="'.$user["website_buy_off_date"].'" />
				</div>
			</div>
		</div>
		<div class="form-group mb-0">
			<input type="submit" name="register" class="btn btn-primary btn-block" value="Update Account">
		</div>';
			
		$obj->result = 'success';
		$obj->data = $html;
			
		}
		exit(json_encode($obj));		
	}
	
	if(isset($data['task']) && $data['task']=='deleteUserData'){
		$obj = new stdClass();
		$obj->result = 'error';
		if( isset($data['userid']) || !empty($data['userid']) ) {
			require('connection.php');
			$query = "UPDATE users SET `active`='0' WHERE id='".$data['userid']."'";
			if($conn->query($query)){
				$obj->result = 'success';
			}
		}

		exit(json_encode($obj));		
	}
		

	function getLogoHtml($id=false) {
		require('connection.php');
		require('constant.php');
		$res = new stdClass();
		$res->html = '';
		$res->msg = 'success';
		$query = 'SELECT * FROM logo WHERE userid="'.$id.'"';
		$result = $conn->query($query);
		
		if($result->num_rows > 0){
			$data = $result->fetch_assoc();
			$html = '<h5>Logo</h5><div class="row logo-form">
				<div class="col-sm-12">
					<img src="'.LOGO_PATH.$data['logo'].'" alt="Logo" width="100%" height="auto" />
				</div>
			</div>';
			$res->html = $html;
			
		}else{
			$res->msg = "No data available!";
		}
		return $res;
	}

	function getAboutusHtml($id=false) {
		require('connection.php');
		require('constant.php');
		$res = new stdClass();
		$res->html = '';
		$res->msg = 'success';
		$query = 'SELECT * FROM aboutus WHERE userid="'.$id.'"';
		$result = $conn->query($query);
		
		if($result->num_rows > 0){
			$data = $result->fetch_assoc();
			$imgHTML = '';
			if(!empty($data['photo'])) {
				$images = unserialize(ABOUTUS_IMAGE);
				$imgs = explode(',', $data['photo']);
				$imgHTML .= '<div class="row" style="margin-top: 20px;">';
				foreach($imgs as $img) {	
					$imgHTML .= '<div class="col-sm-4"><img src="'.ABOUTUS_IMAGE_PATH.$images[$img].'" width="90%" /></div>';
				}
				$imgHTML .= '</div>';
			}
			$html = '<h5>About Us</h5><div class="row logo-form">
				<div class="col-sm-12">
					<pre>'.$data['content'].'</pre>
				</div>
			</div>';
			$res->html = $html.$imgHTML;
			
		}else{
			$res->msg = "No data available!";
		}
		return $res;
	}

	function getShippingHtml($id=false) {
		require('connection.php');
		require('constant.php');
		$res = new stdClass();
		$res->html = '';
		$res->msg = 'success';
		$query = 'SELECT * FROM shipping WHERE userid="'.$id.'"';
		$result = $conn->query($query);
		
		if($result->num_rows > 0){
			$data = $result->fetch_assoc();
			if(isset($data['shipping_rate_type']) && $data['shipping_rate_type']==1) {
				$html = '
					<h5>Shipping</h5>
					<p> Use Emico Rate </p>';
			}else{
			$html = '<style>
						table, th, td {
						border: 1px solid #00000045;
						border-collapse: collapse;
						padding: 5px;
						}
					</style>
					<h5>Shipping</h5>
					<table id="t01" width="100%">
						<tr><td colspan="2"><strong>Peninsular Malaysia</strong></td></tr>
						<tr>
							<td>Base Cost less than 10 KG</td>
							<td>'.$data['base_cost_pms'].'</td>	
						</tr>
						<tr>
							<td>Weight Rate Charge RM </td>
							<td>'.$data['weight_rate_charge_pms'].'</td>	
						</tr>
						<tr><td colspan="2"><strong>Sabah, Sarawak & Labuan</strong></td></tr>
						<tr>
							<td>Base Cost less than 10 KG</td>
							<td>'.$data['base_cost_ssl'].'</td>	
						</tr>
						<tr>
							<td>Weight Rate Charge RM</td>
							<td>'.$data['weight_rate_charge_ssl'].'</td>	
						</tr>
						<tr><td colspan="2"><strong>Remarks</strong></td></tr>
						<tr><td colspan="2">'.$data['remarks'].'</td></tr>
					</table>';
			}
			$res->html = $html;
			
		}else{
			$res->msg = "No data available!";
		}
		return $res;
	}

	function getPaymentHtml($id=false) {
		require('connection.php');
		require('constant.php');
		$res = new stdClass();
		$res->html = '';
		$res->msg = 'success';
		$query = 'SELECT * FROM payment WHERE userid="'.$id.'"';
		$result = $conn->query($query);
		
		if($result->num_rows > 0){
			$data = $result->fetch_assoc();
			// prx($data);
			$html = '<style>
						table, th, td {
						border: 1px solid #00000045;
						border-collapse: collapse;
						padding: 5px;
						}
					</style>
					<h5>Payment</h5>
					<table id="t01" width="100%">';
					if($data['manual_payment']) {
						$html .= '<tr><th colspan="2">Manual Payment</th></tr>
						<tr>
							<td>Bank Name</td>
							<td>RM'.$data['bank_name'].'</td>	
						</tr>
						<tr>
							<td>Bank Account Name</td>
							<td>RM'.$data['bank_account_name'].'</td>	
						</tr>
						<tr>
							<td>Bank Account Number</td>
							<td>RM'.$data['bank_account_number'].'</td>	
						</tr>	
						';
					}
					if($data['billpiz']) {
						$html .= '<tr><th colspan="2">BillPiz</th></tr>
						<tr>
							<td>Login Email</td>
							<td>RM'.$data['billpiz_email'].'</td>	
						</tr>
						<tr>
							<td>Login Password</td>
							<td>RM'.$data['billpiz_password'].'</td>	
						</tr>	
						';
					}
					if($data['paypal']) {
						$html .= '<tr><th colspan="2">PayPal</th></tr>
						<tr>
							<td>Login Email</td>
							<td>RM'.$data['paypal_email'].'</td>	
						</tr>
						<tr>
							<td>Login Password</td>
							<td>RM'.$data['paypal_password'].'</td>	
						</tr>	
						';
					}

			$html .=	'</table>';
			$res->html = $html;
			
		}else{
			$res->msg = "No data available!";
		}
		return $res;
	}

	function getContactInfoHtml($id=false) {
		require('connection.php');
		require('constant.php');
		$res = new stdClass();
		$res->html = '';
		$res->msg = 'success';
		$query = 'SELECT * FROM contactinfo WHERE userid="'.$id.'"';
		$result = $conn->query($query);
		
		if($result->num_rows > 0){
			$data = $result->fetch_assoc();
			// prx($data);
			$html = '<style>
						table, th, td {
						border: 1px solid #00000045;
						border-collapse: collapse;
						padding: 5px;
						}
					</style>
					<h5>Contact Info</h5>
					<table id="t01" width="100%">
						<tr>
							<td>Company Name</td>
							<td>'.$data['company_name'].'</td>	
						</tr>
						<tr>
							<td>Company Registration No</td>
							<td>'.$data['company_registration_no'].'</td>	
						</tr>
						<tr>
							<td>Address</td>
							<td>'.$data['address'].'</td>	
						</tr>
						<tr>
							<td>Office Phone</td>
							<td>'.$data['office_phone'].'</td>	
						</tr>
						<tr>
							<td>Office Fax</td>
							<td>'.$data['office_fax'].'</td>	
						</tr>
						<tr>
							<td>Person in charge name</td>
							<td>'.$data['person_in_charge_name'].'</td>	
						</tr>
						<tr>
							<td>Person in charge email</td>
							<td>'.$data['person_in_charge_email'].'</td>	
						</tr>
						<tr>
							<td>Person in charge phone</td>
							<td>'.$data['person_in_charge_phone'].'</td>	
						</tr>
					</table>';
			$res->html = $html;
			
		}else{
			$res->msg = "No data available!";
		}
		return $res;
	}

	function getSocialMediaHtml($id=false) {
		require('connection.php');
		require('constant.php');
		$res = new stdClass();
		$res->html = '';
		$res->msg = 'success';
		$query = 'SELECT * FROM socialmedia WHERE userid="'.$id.'"';
		$result = $conn->query($query);
		
		if($result->num_rows > 0){
			$data = $result->fetch_assoc();
			// prx($data);
			$html = '<style>
						table, th, td {
						border: 1px solid #00000045;
						border-collapse: collapse;
						padding: 5px;
						}
					</style>
					<h5>Social Media</h5>
					<table id="t01" width="100%">
						<tr>
							<td>Facebook</td>
							<td>'.$data['facebook'].'</td>	
						</tr>
						<tr>
							<td>Youtube</td>
							<td>'.$data['youtube'].'</td>	
						</tr>
						<tr>
							<td>Instagram</td>
							<td>'.$data['instagram'].'</td>	
						</tr>
						<tr>
							<td>Whatsapp</td>
							<td>'.$data['whatsapp'].'</td>	
						</tr>
						
					</table>';
			$res->html = $html;
			
		}else{
			$res->msg = "No data available!";
		}
		return $res;
	}

	function getDomainEmailHtml($id=false) {
		require('connection.php');
		require('constant.php');
		$res = new stdClass();
		$res->html = '';
		$res->msg = 'success';
		$query = 'SELECT * FROM domainemail WHERE userid="'.$id.'"';
		$result = $conn->query($query);
		
		if($result->num_rows > 0){
			$data = $result->fetch_assoc();
			// prx($data);
			$html = '<style>
						table, th, td {
						border: 1px solid #00000045;
						border-collapse: collapse;
						padding: 5px;
						}
					</style>
					<h5>Domain & Email</h5>
					<table id="t01" width="100%">
						<tr>
							<td>Domain Name (First Choice)</td>
							<td>'.$data['domain_name'].'</td>	
						</tr>
						<tr>
							<td>Domain Name (Second Choice)</td>
							<td>'.$data['domain_server_name'].'</td>	
						</tr>
						<tr>
							<td>email1</td>
							<td>'.$data['email1'].'</td>	
						</tr>
						<tr>
							<td>email2</td>
							<td>'.$data['email2'].'</td>	
						</tr>
						<tr>
							<td>email3</td>
							<td>'.$data['email3'].'</td>	
						</tr>
						<tr>
							<td>email4</td>
							<td>'.$data['email4'].'</td>	
						</tr>
						<tr>
							<td>email5</td>
							<td>'.$data['email5'].'</td>	
						</tr>
						<tr>
							<td>email6</td>
							<td>'.$data['email6'].'</td>	
						</tr>
						<tr>
							<td>email7</td>
							<td>'.$data['email7'].'</td>	
						</tr>
						<tr>
							<td>email8</td>
							<td>'.$data['email8'].'</td>	
						</tr>
						<tr>
							<td>email9</td>
							<td>'.$data['email9'].'</td>	
						</tr>
						<tr>
							<td>email10</td>
							<td>'.$data['email10'].'</td>	
						</tr>
						
						
					</table>';
			$res->html = $html;
			
		}else{
			$res->msg = "No data available!";
		}
		return $res;
	}
	
	function getWDHtml($id=false) {
		require('connection.php');
		require('constant.php');
		$res = new stdClass();
		$res->html = '';
		$res->msg = 'success';
		$query = 'SELECT * FROM websitedesign WHERE userid="'.$id.'"';
		$result = $conn->query($query);
		
		if($result->num_rows > 0){
			$temp = unserialize(WEBSITE_TEMP);
			$templete = unserialize(WEBSITE_TEMPLETE);
			$data = $result->fetch_assoc();
			$html = '<h5>Website Design</h5><div class="row logo-form">
				<div class="col-sm-12">
					<a target="_blank" href="'.WEBSITE_DESIGN_PATH.$templete[$data['templete']].'">
					<img src="'.WEBSITE_DESIGN_PATH.$temp[$data['templete']].'" alt="Logo" width="100%" height="auto" />
				</a> 
					
				</div>
			</div>';
			$res->html = $html;
			
		}else{
			$res->msg = "No data available!";
		}
		return $res;
	}

	function getPasswordHtml($id=false) {
		require('connection.php');
		require('constant.php');
		$res = new stdClass();
		$res->html = '';
		$res->msg = 'success';
		$query = 'SELECT * FROM users WHERE id="'.$id.'"';
		$result = $conn->query($query);
		
		if($result->num_rows > 0){
			
			$data = $result->fetch_assoc();
			$html = '<style>
			table, th, td {
			border: 1px solid #00000045;
			border-collapse: collapse;
			padding: 5px;
			}
		</style><h5>Password</h5><table id="t01" width="100%">
			<tr>
				<td>cPanel Username</td>
				<td>'.$data['cpanel_username'].'</td>	
			</tr>
			<tr>
				<td>cPanel Password</td>
				<td>'.$data['cpanel_password'].'</td>	
			</tr>
			<tr>
				<td>Wordpress Username</td>
				<td>'.$data['wordpress_username'].'</td>	
			</tr>
			<tr>
				<td>Wordpress Password</td>
				<td>'.$data['wordpress_password'].'</td>	
			</tr>
			
		</table>';
			$res->html = $html;
			
		}else{
			$res->msg = "No data available!";
		}
		return $res;
	}

?>