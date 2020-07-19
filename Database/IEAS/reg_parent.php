<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    
    $parent_ic         = $_POST['parent_ic'];
	$student_ic        = $_POST['student_ic'];
	$parent_name       = $_POST['parent_name'];
    $parent_password   = $_POST['parent_password'];
	$parent_hp         = $_POST['parent_hp'];
	$user_type         = $_POST['user_type'];
	
	


    include_once 'connect.php';

    $sql = "INSERT INTO parent (parent_ic, student_ic, parent_name, parent_password, parent_hp, user_type) 
	
			VALUES ('".$parent_ic."','".$student_ic."','".$parent_name."','".$parent_password."','".$parent_hp."','".$user_type."')";

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