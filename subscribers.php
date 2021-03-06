<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - ASAPHOT</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/jquery.dataTables.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        ASAPHOT
                    </a>
                </li>
                <li>
                    <a href="adminpage.php">Blog Entries</a>
                    <a href="subscribers.php">Subscribers</a>
                    <a href="index.php">Main</a>
                    <a href="logout.php">Log out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       
                         <h3> List of subscribers </h3>

                        
                        <table class="table" id="blogTable">
                            <thead>
                                <th>#</th>
                                <th>Email</th>
                            </thead>
                            <tbody>
                            <?php
                            require 'connection.php';
                            $result = $conn->query("SELECT * FROM subscribers");
                            foreach ($result as $r) {
                            ?>
                            <tr>
                                <td><?php echo $r['id']; ?></td>
                                <td><?php echo $r['email']; ?></td>
                                <td>
                               
                                 <a class="btn btn-primary btn-sm" href="deletesubscriber.php?id=<?php echo $r['id']; ?>">Delete</a></td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                            
                        </table>

                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function() {
    $('#blogTable').DataTable();
    } );
    </script>

</body>

</html>
