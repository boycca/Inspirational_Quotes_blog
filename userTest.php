<?php 

 require_once('classes/User.php'); 
    require_once 'core/initPublic.php';
    if (Session::exists('home')) {
        echo Session::flash('home');
    } 


    $user = new User();

  $user->setUserID("ID"); 
  $user->setUsername("Frank");
  $user->setEmail("something@yahoo.com");
  $user->setPassword("1234567");
  $user->setFullname("Frank Edwards");
  $user->setJoinedDate("23/2/2015");
  
	print "User Details <br/><br/>";


  print "<br/>User ID = ".$user->getUserID();
  print "<br/>Username = ".$user->getUsername();
  print "<br/>Email = ".$user->getEmail();
  print "<br/>Password = ".$user->getPassword();
  print "<br/>Full Name = ".$user->getFullname();
  print "<br/>Joined Date = ".$user->getJoinedDate();




 /* print "<br/>UserID = ".$user->data()->ID;
  print "<br/>Username = ".$user->data()->username;
  print "<br/>User Email = ".$user->data()->email;
  print "<br/>Full Name = ".$user->data()->name;
  print "<br/>Password = ".$user->data()->password;
  print "<br/>Joined Date = ".$user->data()->joined; 
  print "<br/> Logged in = " .$user->isLoggedIn();
  print "<br/>Exists = ".$user->exists();
  /*print "<br/>Image Name = ".$user->getProtection();
  print "<br/>Quantity = ".$user->getIsAdmin(); */


//Exiting will invoke the destructors 

  $user->__destruct(); 
?>