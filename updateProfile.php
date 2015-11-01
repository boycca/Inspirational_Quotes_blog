<?php
    require_once 'core/initPublic.php';
    if (Session::exists('home')) {
        echo Session::flash('home');
    }


    $user = new User();
    //if ($user->isLoggedIn()) {
    if(!$user -> isLoggedIn()){
    header('Location: login.php');
    exit();

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

    <title>Asaphot - Profile</title>
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
                             <!-- <li class="dropdown"><a data-toggle="dropdown" href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?><span class="caret"></span></a>
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
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/about-bg.jpg')">
        <div class="containers">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                         <h1>Update Your Profile here</h1> 
                          <div class = "content">

                              <p class ="msg">
                                <?php
if (!$user->isLoggedIn()) {
        Redirect::to('index.php');
    }

    if (Input::exists()) {
        if (Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'name'  => array(
                    'fieldName' => 'Your Name',
                    'required'  => true,
                    'min'       => 2,
                    'max'       => 50
                ),
                 'username'  => array(
                    'fieldName' => 'username',
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
                try {
                    $user->update(array(
                        'name' => Input::get('name'),
                        'username' => Input::get('username'),
                        'email' => Input::get('email')
                        
                    ));
                    Session::flash('home','Your details have been updated');
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
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo escape($user->data()->name); ?>" autocomplete="off"/>
        <label for="name">Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape($user->data()->username); ?>" autocomplete="off"/>
        <label for="name">Email Address</label>
        <input type="text" name="email" id="email" value="<?php echo escape($user->data()->email); ?>" autocomplete="off"/>
    </div>
    <span style="float:right;">
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
    <input type="submit" value="Update"/>
     </span>
</form>


<div class="fileuploadholder">
    <form action ="updateProfile.php" method="post" enctype= "multipart/form-data" name="FileUploadForm" id="FileUploadForm">
    <label for="image">Select Image</label>
    <input type ="file" name="image">
    <input type ="submit" name="upload" value="Upload Now">
</form>
<?php
    if(isset($_FILES['image'])){
        // Creates the Variables needed to upload the file
        $UploadName = $_FILES['image']['name'];
        $UploadName = mt_rand(100000, 999999).$UploadName;
        $UploadTmp = $_FILES['image']['tmp_name'];
        $UploadType = $_FILES['image']['type'];
        $FileSize = $_FILES['image']['size'];
        
        // Removes Unwanted Spaces and characters from the files names of the files being uploaded
        $UploadName = preg_replace("#[^a-z0-9.]#i", "", $UploadName);
        // Upload File Size Limit 
        if(($FileSize > 125000)){
            
            die("Error - File too Big");
            
        }
        // Checks a File has been Selected and Uploads them into a Directory on your Server
        if(!$UploadTmp){
            die("No File Selected, Please Select an Image");
        }else{
            move_uploaded_file($UploadTmp, "user_photos/$UploadName");
            echo "File was Uploaded Successfully!!";
            echo "<img src='user_photos/$UploadName'>";

        }
    }
?>
</div>  
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