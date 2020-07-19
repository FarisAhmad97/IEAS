<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $ic = $_POST['ic'];

    require_once 'connect.php';

    $sql = "SELECT p.parent_ic, s.student_ic,s.student_fullname, p.parent_name, p.parent_password, p.parent_hp, p.user_type, 
				         u.subject_id, u.subject_name, u.subject_startTime, u.subject_endTime, u.subject_day
			   	   FROM parent p 
				   JOIN student s 
				   ON p.student_ic = s.student_ic
				   JOIN subject u 
			       ON u.subject_id = s.subject_id
				   WHERE parent_ic ='$ic'";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['read'] = array();

    if( mysqli_num_rows($response) === 1 ) {
        
        if ($row = mysqli_fetch_assoc($response)) {
 
             $h['name']     = $row['parent_name'];
             $h['ic']       = $row['parent_ic'];
			 $h['icS']      = $row['student_ic'];
			 $h['nameS']    = $row['student_fullname'];
			 
			 $h['pass']       = $row['parent_password'];
			 $h['hp']       = $row['parent_hp'];
 
             array_push($result["read"], $h);
 
             $result["success"] = "1";
             echo json_encode($result);
        }
 
   }
 
 }else {
 
     $result["success"] = "0";
     $result["message"] = "Error!";
     echo json_encode($result);
 
     mysqli_close($conn);
 }
 
 ?>