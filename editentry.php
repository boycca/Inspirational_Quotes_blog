<?php
session_start();

if(!empty($_SESSION['id'])) {

require 'connection.php';
	try{
		$date = date('m/d/Y');
		$insert = $conn->prepare("UPDATE posts SET postTitle=?, postContent=? WHERE postID=?");
		if($insert->execute(array($_POST['title'], $_POST['body'], $_POST['id']))) {
			header('Location: adminpage.php');
		} else {	
			die('Update error.');
		}
	} catch(PDOException $e) {
		die('Database Error.');
	}
} else {
	header('Location: index.php');
}
