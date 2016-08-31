<?php
include("../db_connection.php");
    $user_name		=	$_REQUEST['user_name'];
	$password	=	$_REQUEST['user_password'];
	$res;
	$row_res = array();
	$query  = "select * from userinfo where UserEmail = '$user_name' ";
	$res = mysql_query($query);
	if(mysql_num_rows($res)>0){
		$row	=	mysql_fetch_array($res);
		$user_id = $row['UserId'];
		$user_varify = $row['ConfirmEmail'];
		if($user_varify == 'fales'){
			$res = 2;
			echo json_encode($res);
			exit;
			}
		$query_password = "select * from userpassword where UserPassword = $password and UserId = '$user_id'";
		$res_password = mysql_query($query_password);
		if(mysql_num_rows($res_password)>0){
				/*$res = 1;
				$id = '-';
				//$res.'-'.$user_id*/
				$row_res['login'][] = $row;
				
	echo json_encode($row_res);
		}
			else{
					$res = 0;
						echo json_encode($res);
			}
		}
		else{
				$res = 0;
				echo json_encode($res);
			
			}
?>