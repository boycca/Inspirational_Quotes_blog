<?php
    require_once 'core/initPublic.php';
    

?> 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asaphot - Register</title>
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

<style>
body { margin:0; padding:0; background-color:#CCC; }
.fileuploadholder {
    width:400px;
    height:200px;
    margin: 60px auto 0px auto;
    background-color:#FFF;
    border:1px solid #CCC;
    padding:6px;
}
</style>
    

</head>

<body>

    <!-- Navigation -->
    <div class="container">
                           <nav class="navbar navbar-default row">
                          <ul class="nav navbar-nav  ">
                              <li><a href="index.php">Home</a></li>  
                              <li><a href="about.php">About</a></li>
                              <li><a href="contact.php">Contact</a></li>
                              <li class="dropdown"><a data-toggle="dropdown" href="ooUserTest.php">OOTest <span class="caret"></span> </a>
                                <ul class="dropdown-menu">
                                <li><a href="ooUserTest.php">OO User Test</a></li>
                                                            </ul>

                              </li>
                              <li><a href="login.php">Login</a></li>
                              <li><a href="register.php">Register</a></li>

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
    <!--  background image for this header -->
    <header class="intro-header" style="background-image: url('img/about-bg.jpg')">
        <div class="containers">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Register</h1>
                         <div class = "content">
                                
                              

                              <p class ="msg">
                                <?php
                                if (Input::exists()) {
        if (Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username'  => array(
                    'fieldName' => 'Username',
                    'required'  => true,
                    'min'       => 2,
                    'max'       => 20,
                    'unique'    => 'users'
                ),
                'password'  => array(
                    'fieldName' => 'Password',
                    'required'  => true,
                    'min'       => 6
                ),
                'passwordAgain' => array(
                    'fieldName' => 'Password Repeat',
                    'required'  => true,
                    'min'       => 6,
                    'matches'   => 'password'
                ),
                'name'  => array(
                    'fieldName' => 'Your Name',
                    'required'  => true,
                    'min'       => 2,
                    'max'       => 50
                ),
                'email'  => array(
                    'fieldName' => 'email',
                    'required'  => true,
                    'min'       => 2,
                    'max'       => 50
                )
            ));

            if ($validation->passed()) {
                $user = new User();
                $salt = Hash::salt(32);
                try {
                    $user->create(array(
                        'username'  => Input::get('username'),
                        'password'  => Hash::make(Input::get('password'),$salt),
                        'salt'      => $salt,
                        'name'      => Input::get('name'),
                        'email'      => Input::get('email'),
                        'joined'    => date('Y-m-d H:i:s'),
                        'userGroup' => 1
                    ));
                    Session::flash('home','You have been registered and can now log in');
                    Redirect::to('index.php');
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                foreach ($validation->errors() as $error) {
                    echo $error, '<br>';
                }
            }
        }
    }


?>





                                </p>


<div class ="login_reg" id ="box">
<form action="" method="post">
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"/>
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/>
    </div>
    <div class="field">
        <label for="password_again">Enter your password again</label>
        <input type="password" name="passwordAgain" id="passwordAgain"/>
    </div>
    <div class="field">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>"/>
    </div>
    <div class="field">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>"/>
    </div>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
    <!--<input type="submit" value="Register"/> -->
    <div colspan="2">
                                            <span style="float:right;">
                                                <input type="submit" name="register" value="Register" />
                                                <input type="reset" value="Reset" />
                                            </span>
                                            </div>
</form>



</div>


</div>

                        
                    
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
   

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

   

</body>

</html>