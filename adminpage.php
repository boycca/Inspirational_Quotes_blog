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
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
                          New Entry
                        </button> <br /> <br />
                        
                        <table class="table" id="blogTable">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Post By</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            require 'connection.php';
                            $result = $conn->query("SELECT * FROM posts LEFT JOIN accounts ON accounts.id = posts.accountID");
                            foreach ($result as $r) {
                            ?>
                            <tr>
                                <td><?php echo $r['postID']; ?></td>
                                <td><?php echo $r['postTitle']; ?></td>
                                <td><?php echo $r['email']; ?></td>
                                <td><?php echo $r['postDate']; ?></td>
                                <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $r['postID']; ?>">
                                  Edit
                                </button>
                                 <a class="btn btn-primary btn-sm" href="delete.php?id=<?php echo $r['postID']; ?>">Delete</a></td>
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

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Entry</h4>
      </div>
      <div class="modal-body">
        
    <form action="addentry.php" method="POST">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Body</label>
    <textarea class="form-control" name="body"></textarea>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
require 'connection.php';
$data = $conn->query("SELECT * FROM posts");
foreach($data as $row) {
?>
<div class="modal fade" id="editModal<?php echo $row['postID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Entry # <?php echo $row['postID']; ?></h4>
      </div>
      <div class="modal-body">
        
    <form action="editentry.php" method="POST">
    <input type="hidden" value="<?php echo $row['postID']; ?>" name="id">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" value="<?php echo $row['postTitle']; ?>" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" name="body" id="body"><?php echo $row['postContent']; ?></textarea>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
}
?>
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
