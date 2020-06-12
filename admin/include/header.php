<!DOCTYPE html>
<?php

if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: index.php ');
  exit;
}


?>

    <?php
  require_once 'include/connection.php';

$name = $_SESSION['name'];
 $sql = "SELECT `img` FROM `users` WHERE user_name = '$name'";
 $run = mysqli_query($con,$sql);
 $img = mysqli_fetch_array($run);



 ?>
        <html>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Admin Fruitshop</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <link rel="stylesheet" href="src/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="src/css/font-awesome/css/font-awesome.min.css">

            <link rel="stylesheet" href="src/css/Adminara.min.css">

            <link rel="stylesheet" href="src/css/skin-blue.min.css">
            

            <!-- Google Font -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        </head>

        <body class="hold-transition skin-blue sidebar-mini">
            <div class="wrapper">

                <!-- Main Header -->
                <header class="main-header">

                    <!-- Logo -->
                    <a href="home.php" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b><?php echo $name; ?></b></span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>Admin</b>Fruitshop</span>
                    </a>

                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- Messages: style can be found in dropdown.less-->
                                <!-- Notifications Menu -->
                                <li class="dropdown notifications-menu">
                                    <!-- Menu toggle button -->
                                    <a href="">
                                    <i class="fa fa-home"></i>

            </a>

                                </li>
                                <li class="dropdown messages-menu">
                                    <!-- Menu toggle button -->

                                    <a href="user.php">
              <i class="fa fa-user"></i>

            </a>

                                </li>
                                <!-- /.messages-menu -->

                                
                                <!-- Tasks Menu -->
                                <li class="dropdown tasks-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="show_post.php">
            <i class="fa fa-bus"></i>
              
            </a>

                                </li>
                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <img src="upload/<?php echo $img['img']; ?>" width="128px" height="128px" class="user-image" alt="User Image">
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs"><?php echo $name;  ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <img src="upload/<?php echo $img['img'];?> " width="160px" height="160px" class="img-circle" alt="User Image">

                                            <p>
                                                Admin At - Fruitshop
                                                <small>Member since Nov. 2012</small>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <li class="user-body">

                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-right">

                                                <form class="" action="" method="post">
                                                    <input type="submit" name="logout" value="sign-out">
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Control Sidebar Toggle Button -->

                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">

                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">

                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="upload/<?php echo $img['img'];?>" width="160px" height="160px" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p>
                                    <?php echo $name;  ?>
                                </p>
                                <!-- Status -->
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>

                        <!-- search form (Optional) -->
                        <form action="#" method="get" class="sidebar-form">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                            </div>
                        </form>
                        <!-- /.search form -->

                        <!-- Sidebar Menu -->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">Menu</li>
                            <!-- Optionally, you can add icons to the links -->
                            <li class=""><a href="home.php"><i class="fa fa-home"></i> <span>Admin Home</span></a></li>
                            <li class=""><a href="show_post.php"><i class="fa fa-eye" aria-hidden="true"></i> <span>Monthly Shoping</span></a></li>
                            <li class="active"><a href="create_post.php"><i class="fa fa-columns"></i> <span>New Fruits</span></a></li>
                            <li><a href="user.php"><i class="fa fa-user"></i> <span>User's</span></a></li>
                            <li><a href="message.php"><i class="fa fa-comments"></i> <span> Details</span></a></li>
                        </ul>
                        <!-- /.sidebar-menu -->
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>

                            <a href="home.php"> <i class="fa fa-home" aria-hidden="true"></i> Home</a>

                        </h1>
