<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$ic = $_POST['ic'];
	

    require_once 'connect.php';

    $sql = "DELETE FROM parent 
			WHERE parent_ic = '$ic'";

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


