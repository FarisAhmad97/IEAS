<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    
	
    $attendances_id         = $_POST['attendances_id'];
    $student_ic             = $_POST['student_ic'];
	$tutor_ic               = $_POST['tutor_ic'];
	$attendance_approveDate = $_POST['attendance_approveDate'];
	
	

    include_once 'connect.php';

    $sql = "INSERT INTO attendance (attendances_id, student_ic, tutor_ic, attendance_time, attendances_date, 
	                                attendance_approveDate, attendance_status) 
			VALUES ('".$attendances_id."','".$student_ic."','".$tutor_ic."',CURTIME(),CURDATE(),'".
			$attendance_approveDate."','".'Pending'."')";
			

    if ( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}

?>