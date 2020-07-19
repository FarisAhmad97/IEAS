<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $ic = $_POST['ic'];

    require_once 'connect.php';
	
    $sql      = "SELECT *
				 FROM attendance a
				 JOIN student s
				 ON a.student_ic = s.student_ic
				 WHERE attendances_date = CURDATE() AND a.student_ic = '$ic'";
	
				  
    $response = mysqli_query($conn, $sql);
	
    $result = array();
    $result['login'] = array();
    
    if (mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response); 
		
		$index['ic']       = $row['student_ic'];
		$index['name']       = $row['student_fullname'];
		
		$index['id']          = $row['attendances_id'];
		$index['attdate']     = $row['attendances_date'];
		$index['approveDate'] = $row['attendance_approveDate'];
		$index['status']      = $row['attendance_status'];
		
		
		
	
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