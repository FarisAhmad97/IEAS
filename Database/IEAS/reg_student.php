<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    
    $student_ic        = $_POST['student_ic'];
    $student_fullname  = $_POST['student_fullname'];
	$student_password  = $_POST['student_password'];
	$student_hp        = $_POST['student_hp'];
	$subject_id        = $_POST["subject_id"];
	$user_type         = $_POST["user_type"];
	
	


    include_once 'connect.php';

    $sql = "INSERT INTO student (student_ic, student_fullname, student_password, student_hp, subject_id, user_type) 
	
			VALUES ('".$student_ic."','".$student_fullname."','".$student_password."','".$student_hp."','".$subject_id."','".$user_type."')";

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