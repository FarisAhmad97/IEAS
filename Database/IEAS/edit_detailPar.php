<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $ic = $_POST['ic'];
	$pass = $_POST['pass'];
	$hp = $_POST['hp'];

    require_once 'connect.php';

    $sql = "UPDATE parent SET parent_name='$name', parent_ic='$ic', parent_password='$pass', parent_hp='$hp' WHERE parent_ic='$ic' ";

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


