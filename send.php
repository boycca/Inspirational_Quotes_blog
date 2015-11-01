<?php
if(isset($_POST['sendbtn'])) {
$to = "jauroasa@yahoo.com";
$subject = "Question from blog";
$txt = "Question from: ".$_POST['txt_name'] . "\r\n" . $_POST['txt_body'];
$headers = "From: ".$_POST['txt_ea'] . "\r\n" .
"CC: jauroasa@yahoo.com.com";

mail($to,$subject,$txt,$headers);
}