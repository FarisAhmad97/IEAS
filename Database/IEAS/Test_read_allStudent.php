<?php

    require_once 'connect.php';

    $sql = $conn->prepare("SELECT * 
	                       FROM student
						   ORDER BY student_fullname;");
						   
	$sql->execute();
	
	$sql->bind_result($student_ic, $student_fullname, $student_password, $student_hp, $subject_id, $user_type);
	
	$student = array();

    while($sql->fetch()){
		
		$temp = array();
		$temp['ic']        = $student_ic;
		$temp['name']      = $student_fullname; 
		$temp['pass']      = $student_password; 
		$temp['hp']        = $student_hp; 
		$temp['sub_id']    = $subject_id; 
		$temp['user_type'] = $user_type;
		
		array_push($student, $temp);
	}
	
	echo json_encode($student);
 
 ?>