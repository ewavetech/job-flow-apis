<?php
include"connection.php";
$return;
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$password = $_REQUEST['password'];
$repeate_password = $_REQUEST['repeate_password'];
$confirmEmail = 'fales';
$user_type = 'jobseeker';
$query = "insert into userinfo (FirstName,LastName,UserEmail,UserType,Phone,ConfirmEmail)";
$res = mysql_query($query);
if($res){
	$query_id = "select * from userinfo where UserEmail = '$email'";
$res_id = mysql_query($query_id);
	$row = mysql_fetch_array($res_id);
	$id = $row['UserId'];
	$query_password = "insert into userpassword(UserId,UserPassword,ReoeatPassword) value('$id','$password','$repeate_password')";
	$res_password = mysql_query($query_password);
	if($res_password){
		$return = 1;
		echo json_encode($return);
		exit;
		}
	
	}
	else{
		//email already exist
		$return = 2;
		echo json_encode($return);
		exit;
		}

?>