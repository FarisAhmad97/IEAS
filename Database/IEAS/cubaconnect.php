<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ieas";

	//Create connect
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	
	if($conn){
		
		echo "Connection Successful. Connected to server.";
	}
	else{
		echo "Not Connect. Please try again.";
	}



?>