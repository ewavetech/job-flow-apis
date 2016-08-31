<?php
include("../db_connection.php");
    $user_id = $_REQUEST['user_id'];
	$alljob = array();;
	$res;
	$user_id = '17';
	$query  = "select * from applicants where UserId = '$user_id' ";
	$query_res = mysql_query($query);
	$num_row = mysql_num_rows($query_res);
	if($num_row>0){
		while($row = mysql_fetch_array($query_res)){
			$job_id = $row['JobId'];
			$query_job = "select * from job where JobId = '$job_id';";
			$job_res = mysql_query($query_job);
			while($row1 = mysql_fetch_array($job_res)){
				
				$alljob['all_applied_job'][] = $row1;
				
				}
			//inner loop
			
		}// outer loop
	
		}
		
		
		else{
			$res = 0;
			echo  json_encode($res);
			exit;
			}
	echo json_encode($alljob);
	
	?>