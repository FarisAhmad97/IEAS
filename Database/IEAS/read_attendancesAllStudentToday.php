<?php

    require_once 'connect.php';

    $sql = $conn->prepare("SELECT a.attendances_id, s.student_ic, a.tutor_ic, date_format(a.attendance_time,'%l:%i %p') as attendance_time, 
	                              date_format(a.attendances_date,'%d/%m/%Y') as attendances_date, 
								  date_format(a.attendance_approveDate,'%l:%i %p %d/%m/%Y') as attendance_approveDate, a.attendance_status,
								  s.student_ic, s.student_fullname, s.student_password, s.student_hp, s.subject_id, s.user_type
						   FROM attendance a
				           JOIN student s
				           ON a.student_ic = s.student_ic
				           WHERE attendances_date = CURDATE()
						   ORDER BY a.attendance_time DESC");
						  
	$sql->execute();
	
	$sql->bind_result($attendances_id, $student_ic, $tutor_ic, $attendance_time, $attendances_date, $attendance_approveDate, $attendance_status, 
	                  $student_ic, $student_fullname, $student_password, $student_hp, $subject_id, $user_type);
	
	$student = array();

    while($sql->fetch()){
		
		$temp = array();
		
		$temp['attId']         = $attendances_id;
		$temp['ic']            = $student_ic;
		$temp['name']          = $student_fullname;
		
		$temp['attTime']       = $attendance_time;
		$temp['attdate']       = $attendances_date;
		$temp['attApproveDate']= $attendance_approveDate;
		$temp['attStatus']     = $attendance_status;
		
		
		array_push($student, $temp);
	}
	
	echo json_encode($student);
 
 ?>