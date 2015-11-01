<?php
    require_once 'core/initPublic.php';
    $user = new User();

    if (!$user->isLoggedIn()) {
        Redirect::to('index.php');
    }
?> 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asaphot</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="css/style.css"/>

    <!-- Bootstrap Core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
   <link href="css/clean-blog.min.css" rel="stylesheet">  

 

</head>

<body>

    <!-- Navigation -->
    
            <div class="container">
                <nav class="navbar navbar-default row">
                          <ul class="nav navbar-nav  ">
                            
                            <?php if($user->data()) { ?>
                            <!-- <li><a class="navbar-brand" href="index.html">ASAPHOT</a></li> -->
                              <li><a href="index.php">Home</a></li>
                              <li><a href="about.php">About</a></li>
                              <li><a href="contact.php">Contact</a></li>
                             <!--  <li class="dropdown"><a data-toggle="dropdown" href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="updateProfile.php">Update Details</a></li>
                                <li><a href="changepassword.php">Change Password</a></li>
                                <li><a href="logoutUser.php">Logout</a></li>
                            </ul>
                            </li> -->

                              <?php } else { ?>
                              <li><a href="login.php">Login</a></li>
                              <li><a href="register.php">Register</a></li>
                              
                              <?php } ?>
        

                            </ul>
                            </nav>
                        </div>

    <!-- Page Header -->
    <!-- background image for this header -->
    <header class="intro-header" style="background-image: url('img/about-bg.jpg')">
        <div class="containers">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                         <h1>Change Your Password</h1> 
                         <div class = "content">
                                
                              

                              <p class ="msg">
                                    <?php
                                    if (Input::exists()) {
        if (Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'currentPassword' => array(
                    'fieldName' => 'Existing Password',
                    'required'  => true,
                    'min'       => 6,
                    'max'       => 50
                ),
                'newPassword' => array(
                    'fieldName' => 'New Password',
                    'required'  => true,
                    'min'       => 6,
                    'max'       => 50
                ),
                'newPasswordAgain' => array(
                    'fieldName' => 'New Password Again',
                    'required'  => true,
                    'min'       => 6,
                    'max'       => 50,
                    'matches'   => 'newPassword'
                )
            ));

            if ($validation->passed()) {
                $user = new User();
                if (Hash::make(Input::get('currentPassword'), $user->data()->salt) !== $user->data()->password) {
                    echo 'Your current password is incorrect';
                } else {
                    $salt = Hash::salt(32);
                    $user->update(array(
                        'password'  => Hash::make(Input::get('newPassword'), $salt),
                        'salt'      => $salt
                    ));
                    Session::flash('home','Your details have been updated');
                    Redirect::to('index.php');
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



<div class="login_reg">
<form action="" method="post">
    <div class="field">
        <label for="currentPassword">Your existing Password</label>
        <input type="password" name="currentPassword" id="currentPassword"/>
    </div>
    <div class="field">
        <label for="newPassword">New Password</label>
        <input type="password" name="newPassword" id="newPassword"/>
    </div>
    <div class="field">
        <label for="newPasswordAgain">Enter your new password again</label>
        <input type="password" name="newPasswordAgain" id="newPasswordAgain"/>
    </div>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
    <input type="submit" value="Update"/>
</form>
</div>


                            </div>

                        
                    
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
   

  

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