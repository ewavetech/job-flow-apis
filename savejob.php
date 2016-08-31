<?php
include("../db_connection.php");
	$res;
	$job_id		=	$_REQUEST['job_id'];
	$user_id	=	$_REQUEST['user_id'];
	$query = "insert into savejob (JobId, UserId) values('$job_id','$user_id')";
	$query_result = mysql_query($query);
	if($query_result){
		$res = 1;
		echo json_encode($res);
		
		}
		else{
			$res = 0;
			echo  json_encode($res);
			}
	
?>