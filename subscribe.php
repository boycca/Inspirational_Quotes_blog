<?php
session_start();

require 'connection.php';
	try{
		$insert = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
		if($insert->execute(array($_POST['email']))) {
			echo "<script>alert('Thanks for subscribing!');location.href='index.php'</script>";
		} else {	
			die('Contact Admin.');
		}
	} catch(PDOException $e) {
		die('Database Error.');
	}
