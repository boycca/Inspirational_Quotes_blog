<?php
//session_start();
require_once 'core/initPublic.php';
    if (!$username = Input::get('user')) {
        Redirect::to('index.php');
    } else {
        $user = new User($username);
        if (!$user->exists()) {
            Redirect::to(404);
        } else {
            $data = $user->data();
        }
?>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                
                  <?php if($user->data()) { ?>                   
                   <li><a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>
                    <ul>
                                <li><a href="update.php">Update Details</a></li>
                                <li><a href="changepassword.php">Change Password</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                   <?php } else { ?>
                     <li>
                        <a href="Login.php">Login</a>
                    </li>
                     <li>
                        <a href="register.php">Register</a>
                    </li>
                   <?php } ?>

                   
                    <?php
                    if(isset($_SESSION['id'])) {
                    ?>
                    <li>
                        <a href="adminpage.php">Admin Panel</a>
                    </li>
                    <?php
                    } else {
                    ?>
                     <li>
                        <a href="adminlogin.php">Admin</a>
                    </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>

                    <?php
                    if(isset($_SESSION['id'])) {
                    ?>
                    <li>
                        <a href="logout.php">Log out</a>
                    </li>
                    <?php
                    }
                    ?>

                </ul>
</div>