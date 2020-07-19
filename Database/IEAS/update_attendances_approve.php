<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$aId = $_POST['aId'];
	

    require_once 'connect.php';

    $sql = "UPDATE attendance SET  attendance_approveDate = CURRENT_TIMESTAMP(), attendance_status = 'Attend' 
	        WHERE attendances_id = '$aId' ";

    if(mysqli_query($conn, $sql)) {

          $result["success"] = "1";
          $result["message"] = "success";

          echo json_encode($result);
          mysqli_close($conn);
      }
  }

else{

   $result["success"] = "0";
   $result["message"] = "error!";
   echo json_encode($result);

   mysqli_close($conn);
}

?>


