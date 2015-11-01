<?php
    require_once 'core/initPublic.php';
    if (Session::exists('home')) {
        echo Session::flash('home');
    }


    $user = new User();
    //if ($user->isLoggedIn()) {
   

  
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asaphot - About</title>
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

    <!-- Navigation -->
    
            <div class="container">
                <nav class="navbar navbar-default row">
                          <ul class="nav navbar-nav  ">
                            <li><a href="index.php">Home</a></li>
                              <li><a href="about.php">About</a></li>
                              <li><a href="contact.php">Contact</a></li>
                              <li class="dropdown"><a data-toggle="dropdown" href="OOTest.php">OOTest <span class="caret"></span> </a>
                                <ul class="dropdown-menu">
                                <li><a href="ooUserTest.php">OO User Test</a></li>
                                
                            </ul>

                              </li>
                            
                            <?php if($user->data()) { ?>
                            <!-- <li><a class="navbar-brand" href="index.html">ASAPHOT</a></li> -->
                              
                              <li class="dropdown"><a data-toggle="dropdown" href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="updateProfile.php">Update Details</a></li>
                                <li><a href="changepassword.php">Change Password</a></li>
                                <li><a href="logout.php">Logout</a></li>
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

    <!-- Page Header -->
    <!-- background image for this header. -->
    <header class="intro-header" style="background-image: url('img/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>About Me</h1>
                        <hr class="small">
                        <span class="subheading">This is what I do.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>My name is Jauro Asanarimam Moses. Im in my final year at Linton University Malaysia with a major of BACHELOR OF SCIENCE (HONS) COMPUTING 3+0 IN COLLABORATION WITH LEEDS BECKETT UNIVERSITY, UK. Im a graphic designer and a video editor from Nigeria. I use Sofwares like Adobe Photoshop, Adobe Illustrator and Final cut pro.  I speak English, Nyanja, Hausa, French, spanish and Swahili.</p>
                <p>Dont get it twisted, Im not a poet. This is an assignment from Advanced Internet Development A. Feel free to read through the inspiring posts in here and subscribe to get latest updates. </p>
                <p></p>
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>