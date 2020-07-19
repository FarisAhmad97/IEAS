<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $ic = $_POST['ic'];
	$pass = $_POST['pass'];
	$hp = $_POST['hp'];

    require_once 'connect.php';

    $sql = "UPDATE student SET student_fullname='$name', student_ic='$ic' , student_password='$pass', student_hp='$hp' WHERE student_ic='$ic' ";

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


