<?php
try {
	$username = 'asajau_ei';
	$password = 'bossfahook';
    $conn = new PDO('mysql:host=localhost;dbname=asajau_ei;charset=utf8', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}