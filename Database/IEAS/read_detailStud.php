<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $ic = $_POST['ic'];

    require_once 'connect.php';

    $sql = "SELECT * FROM student WHERE student_ic='$ic'";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['read'] = array();

    if( mysqli_num_rows($response) === 1 ) {
        
        if ($row = mysqli_fetch_assoc($response)) {
 
             $h['name']     = $row['student_fullname'];
             $h['ic']       = $row['student_ic'];
			 
			 $h['pass']       = $row['student_password'];
			 $h['hp']       = $row['student_hp'];
 
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