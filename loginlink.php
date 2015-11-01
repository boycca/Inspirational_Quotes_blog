<?php
session_start();
if(isset($_POST['loginbtn'])) {
if(empty($_SESSION['id'])) {
require 'connection.php';
	try{
		$pword = sha1($_POST['password']);
		$login = $conn->prepare("SELECT * FROM accounts WHERE email=? AND password=?");
		$login->execute(array($_POST['email'], $pword));
		$row = $login->fetch(PDO::FETCH_ASSOC);
		if(count($row) > 0) {
			$_SESSION['id'] = $row['id'];
			header('Location: adminpage.php');
		} else {
			echo "<script>alert('Invalid credentials');location.href='adminlogin.php';</script>";
		}
	} catch(PDOException $e) {
		die('Database Error.');
	}
} else {
	header('Location: adminpage.php');
}
} else {
	header('Location: index.php');
}