<?php
	$conn = new mysqli("localhost","root","root","diwapp");
	if($conn->connect_errno){
		die("No database connection");
	}
?>