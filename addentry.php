<?php
session_start();

if(!empty($_SESSION['id'])) {

require 'connection.php';
	try{
		$date = date('m/d/Y');
		$insert = $conn->prepare("INSERT INTO posts (postTitle, postContent, postDate, accountID) VALUES (?, ?, ?, ?)");
		if($insert->execute(array($_POST['title'], $_POST['body'], $date, $_SESSION['id']))) {
			$lastID = $conn->lastInsertId();
			$mails = $conn->query("SELECT * FROM subscribers");
			while($row = $mails->fetchAll(PDO::FETCH_ASSOC)) {
				mail($row['email'],"New blog entry - ".$_POST['title'], 'Check my new entry <a href="asaphotblog.esy.es/post.php?post='.$lastID.'">here</a>');
			}

			header('Location: adminpage.php');
		} else {	
			die('Insert error.');
		}
	} catch(PDOException $e) {
		die('Database Error.');
	}
} else {
	header('Location: index.php');
}
