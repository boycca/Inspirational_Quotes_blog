<?php
    require_once 'core/initPublic.php';
    if (Session::exists('home')) {
        echo Session::flash('home');
    }


    $user = new User();
    //if ($user->isLoggedIn()) {
   /* if(!$user -> isLoggedIn()){
    header('Location: login.php');
    exit(); 

  } */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asaphot - Home</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="css/style.css"/>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">  


    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet"> 

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


</head>

<body>

    

            <div class="container">
                <nav class="navbar navbar-default row">
                          <ul class="nav navbar-nav  ">
                             <li class="active"><a href="index.php">Home</a></li>
                              <li ><a href="about.php">About</a></li>
                              <li><a href="contact.php">Contact</a></li>
                              <li class="dropdown"><a data-toggle="dropdown" href="OOTest.php">OOTest <span class="caret"></span> </a>
                                <ul class="dropdown-menu">
                                <li><a href="ooUserTest.php">OO User Test</a></li>
                                <li><a href="ooPostTest.php">OO Post Test</a></li>
                                <!-- <li><a href="logoutUser.php">Generate JSON From Database</a></li>
                                <li><a href="logoutUser.php">Generate XML From Database</a></li> -->
                            </ul>

                              </li>
                           <?php if($user->data()) { ?>
                            <!-- <li><a class="navbar-brand" href="index.html">ASAPHOT</a></li> -->
                             
                              <li class="dropdown"><a data-toggle="dropdown" href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="updateProfile.php">Update Details</a></li>
                                <li><a href="changepassword.php">Change Password</a></li>
                                <li><a href="logoutUser.php">Logout</a></li>
                            </ul>
                            </li>

                              <?php } else { ?>
                              
                              <li><a href="login.php">Login</a></li>
                              <li><a href="register.php">Register</a></li>
                              
                              <?php } ?>

                              <?php
                              if(isset($_SESSION['id'])) {
                    ?>
                    <li class="dropdown" >
                        <a data-toggle="dropdown" href="adminpage.php">Admin Panel</a>
                        <ul class="dropdown-menu">
                            <li><a href="adminpage.php">Manage</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                    </li>
                    <?php
                    } else {
                    ?>
                     
                    <?php
                    }
                    ?>
                      <li><a href="CP2/index.php">Check Point 2</a></li>
                    <li><a href="MVC/index.php">MVC</a></li>
        

                            </ul>
                            </nav>
                        </div>
      
   
    
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><img src="img/asaphot.png" width="250"></h1>
                        <hr class="small">
                        <span class="subheading">A Blog by Asa Jauro</span> <br />
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#subModal">
                          Subscribe
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <h1>Object Oriented User Test Page</h1>
<?php include "userTest.php"; ?>




<!-- Modal -->
<div class="modal fade" id="subModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enter your email for updates!</h4>
      </div>
      <div class="modal-body">
        <form action="subscribe.php" method="POST" id="subsForm">
        <div class="form-group">
            <input type="email" id="txt_email" class="form-control" placeholder="mail@mail.com" required name="email">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Subscribe!" onClick="subForm()">
      </form>
      </div>
    </div>
  </div>
</div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Moses.Jauro">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; asaphot.com 2015</p>
                </div>
            </div>
        </div>
    </footer>
<!-- Button trigger modal -->
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>