<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $ic = $_POST['ic'];
    $pass = $_POST['pass'];

    require_once 'connect.php';
	
    $sql1      = "SELECT s.student_ic, s.student_fullname, s.student_password, s.student_hp, s.user_type, 
					     u.subject_id, u.subject_name, date_format(u.subject_startTime,'%l:%i %p') as subject_startTime,     
                         date_format(u.subject_endTime,'%l:%i %p') as subject_endTime, u.subject_day
			   	  FROM student s 
				  JOIN subject u 
			      ON u.subject_id = s.subject_id
				  WHERE s.student_ic ='$ic' AND student_password = '$pass' AND s.user_type ='Student'";
	
				  
    $response1 = mysqli_query($conn, $sql1);
	
	$sql2      = "SELECT p.parent_ic, s.student_ic, s.student_fullname, p.parent_name, p.parent_password, p.parent_hp, p.user_type, 
                         u.subject_id, u.subject_name, date_format(u.subject_startTime,'%l:%i %p') as subject_startTime, 
						 date_format(u.subject_endTime,'%l:%i %p') as subject_endTime, u.subject_day
			   	  FROM parent p 
				  JOIN student s 
				  ON p.student_ic = s.student_ic
				  JOIN subject u 
			      ON u.subject_id = s.subject_id
				  WHERE parent_ic ='$ic' AND parent_password = '$pass' AND p.user_type ='Parent'";
				  
				  
				  
	$response2 = mysqli_query($conn, $sql2);
	
	$sql3      = "SELECT t.tutor_ic, t.tutor_name, t.tutor_password, t.user_type, u.subject_id, u.subject_name, date_format(u.subject_startTime,'%l:%i %p') as subject_startTime,      
                         date_format(u.subject_endTime,'%l:%i %p') as subject_endTime, u.subject_day 
				  FROM tutor t 
				  JOIN subject u 
				  ON t.subject_id = u.subject_id
				  WHERE t.tutor_ic ='$ic' AND t.tutor_password = '$pass' AND t.user_type ='Tutor'";
	

	$response3 = mysqli_query($conn, $sql3);
	
	$sql4      = "SELECT * FROM admin WHERE admin_ic ='$ic' AND admin_password = '$pass'";
	$response4 = mysqli_query($conn, $sql4);

   
    $result = array();
    $result['login'] = array();
    
    if (mysqli_num_rows($response1) === 1 ) {
        
        $row = mysqli_fetch_assoc($response1); 
		
		$index['name']         = $row['student_fullname'];
		$index['ic']           = $row['student_ic'];
		$index['pass']         = $row['student_password'];
		$index['hp']           = $row['student_hp'];
		$index['userType']     = $row['user_type'];
		
		$index['subjectId']    = $row['subject_id'];
		$index['subjectName']  = $row['subject_name'];
		$index['subjectDay']   = $row['subject_day'];
		$index['subjectStart'] = $row['subject_startTime'];
		$index['subjectEnd']   = $row['subject_endTime'];
			
			

		array_push($result['login'], $index);

		$result['success'] = "1";
		$result['message'] = "success";
		echo json_encode($result);

		mysqli_close($conn);


	}else if (mysqli_num_rows($response2) === 1 ) {
			
		$row = mysqli_fetch_assoc($response2); 
		
		$index['name']         = $row['parent_name'];
		$index['ic']           = $row['parent_ic'];
		$index['pass']         = $row['parent_password'];
		$index['hp']           = $row['parent_hp'];
		$index['userType']     = $row['user_type'];
		
		$index['icS']          = $row['student_ic'];
		$index['nameS']        = $row['student_fullname'];
		
		$index['subjectId']    = $row['subject_id'];
		$index['subjectName']  = $row['subject_name'];
		$index['subjectDay']   = $row['subject_day'];
		$index['subjectStart'] = $row['subject_startTime'];
		$index['subjectEnd']   = $row['subject_endTime'];
			
		array_push($result['login'], $index);

		$result['success'] = "1";
		$result['message'] = "success";
		echo json_encode($result);

		mysqli_close($conn);

	}else if (mysqli_num_rows($response3) === 1 ) {
			
		$row = mysqli_fetch_assoc($response3); 
		
		$index['name']     = $row['tutor_name'];
		$index['ic']       = $row['tutor_ic'];
		$index['pass']       = $row['tutor_password'];
		$index['userType'] = $row['user_type'];
		
		$index['subjectId']    = $row['subject_id'];
		$index['subjectName']  = $row['subject_name'];
		$index['subjectDay']   = $row['subject_day'];
		$index['subjectStart'] = $row['subject_startTime'];
		$index['subjectEnd']   = $row['subject_endTime'];
			
		array_push($result['login'], $index);

		$result['success'] = "1";
		$result['message'] = "success";
		echo json_encode($result);

		mysqli_close($conn);
		
	}else if (mysqli_num_rows($response4) === 1 ) {
			
		$row = mysqli_fetch_assoc($response4); 
		
		$index['name']     = $row['admin_name'];
		$index['ic']       = $row['admin_ic'];
		$index['pass']       = $row['admin_password'];
		$index['userType'] = $row['user_type'];
			
		array_push($result['login'], $index);

		$result['success'] = "1";
		$result['message'] = "success";
		echo json_encode($result);

		mysqli_close($conn);	
	
	}else {

		$result['success'] = "0";
		$result['message'] = "error";
		echo json_encode($result);

		mysqli_close($conn);

        }




}
?>