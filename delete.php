<?php
require 'connection.php';

$stmt = $conn->prepare("DELETE FROM posts WHERE postID=?");
if($stmt->execute(array($_GET['id']))) {
	header('Location: adminpage.php');
} else {
	die('Delete error');
}