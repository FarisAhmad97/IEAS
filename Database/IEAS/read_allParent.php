<?php

    require_once 'connect.php';

    $sql = $conn->prepare("SELECT * 
	                       FROM parent p
						   JOIN student s
                           ON p.student_ic = s.student_ic
						   ORDER BY parent_name;");
						   
	$sql->execute();
	
	$sql->bind_result($parent_ic, $student_ic, $parent_name, $parent_password, $parent_hp, $user_type,  $student_ic,  $student_fullname,  $student_password,
	                   $student_hp,  $subject_id, $user_type);
	
	$student = array();

    while($sql->fetch()){
		
		$temp = array();
		
		$temp['Pname']      = $parent_name; 
		$temp['Pic']       = $parent_ic;
		$temp['Sname']      = $student_fullname; 
		$temp['Sic']       = $student_ic; 
		$temp['pass']      = $parent_password; 
		$temp['hp']        = $parent_hp; 
		$temp['user_type'] = $user_type;
		
		array_push($student, $temp);
	}
	
	echo json_encode($student);
 
 ?>