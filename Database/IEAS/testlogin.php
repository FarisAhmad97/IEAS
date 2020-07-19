<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $ic = $_POST['ic'];
    $pass = $_POST['pass'];
	
    require_once 'connect.php';
	
    $sql1      = "SELECT * 
	              FROM subject u 
				  JOIN student s
				  ON u.subject_id = s.subject_id
				  WHERE student_ic ='$ic' AND student_password = '$pass'";
												
    $response1 = mysqli_query($conn, $sql1);
	
	
    $result = array();
    $result['login'] = array();
    
    if (mysqli_num_rows($response1) === 1 ) {
        
        $row = mysqli_fetch_assoc($response1); 
		
		
		$index['name']     = $row['student_fullname'];
		$index['ic']       = $row['student_ic'];
		
		$index['userType'] = $row['user_type'];
		$index['subjectId'] = $row['subject_id'];
		$index['subjectName'] = $row['subject_name'];
		$index['subjectDay'] = $row['subject_day'];
		$index['subjectStart'] = $row['subject_startTime'];
		$index['subjectEnd'] = $row['subject_endTime'];
		
		
		
		
		array_push($result['login'], $index);
		
		$result['success'] = "1";
		$result['message'] = "success";
		echo json_encode($result);
		
		mysqli_close($conn);
		
		
	}else{
		
		$result['success'] = "0";
		$result['message'] = "error";
		echo json_encode($result);
		
		mysqli_close($conn);
	
        }
}
?>