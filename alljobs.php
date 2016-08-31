<?php
include("../db_connection.php");
	$res;
	$query  = "select * from job where Status = 'active' ";
	$rows = mysql_query($query);
	$row = array();
	
	while($res = mysql_fetch_array($rows)){
		$res1++;
		$job_id = $res['JobId'];
		$company_id = $res['CompanyId'];
		$start_date = $res['StartDate'];
			    $end_date = $res['EndDate'];
				$date1=date_create($date);
               $date2=date_create($end_date);
               $diff=date_diff($date1,$date2);
                $day=$diff->format("%R%a");
			   if($day<0){ 
			   
				   }
				   else{
					   $update_query = "update job set Days = '$day' where JobId = '$job_id'";
					   $query_res = mysql_query($update_query);
					   if($query_res){
						   $que = "select * from job where JobId = '$job_id' ";
						   $que_res = mysql_query($que);
						   if($que_res){
						   $row2 = mysql_fetch_array($que_res);
						   $company_id = $row2['CompanyId'];
						  $query = "select * from companyinformation where CompanyId = '$company_id'";
						  $query_result = mysql_query($query);
						  if($query_result){
							  $row1 = mysql_fetch_array($query_result);
						  $company_name=$row1['CompanyName'];
							  $update_query = "update job set CompanyName = '$company_name' where JobId = '$job_id'";
					   $query_res = mysql_query($update_query);
					   if($query_res){
						   
						   }
							  }
							  else{
								  }
						   }
						   else{
							//   echo "not result";
							   }
					   }
					    
					   }
		
		}
		$query  = "select * from job where Status = 'active' ";
	$rows = mysql_query($query);
	while($res = mysql_fetch_array($rows)){
		$day = $res['Days'];
		if($day>0){
			 $row['jobs'][] = $res;
			}
		
		}
		
			echo  json_encode($row);

?>