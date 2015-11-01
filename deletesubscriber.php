<?php
require 'connection.php';

$stmt = $conn->prepare("DELETE FROM subscribers WHERE id=?");
if($stmt->execute(array($_GET['id']))) {
	header('Location: adminpage.php');
} else {
	die('Delete error');
}