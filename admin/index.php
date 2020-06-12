<?php
session_start();
if(isset($_SESSION["login"]))
{

  header('Location: home.php');
  exit;
}
require_once 'classes/Login.php';
require_once 'include/connection.php';
if(isset($_POST['login_btn']))
{

  $login_obj = new LoginClass;
  $name = htmlspecialchars($_POST['name']);
  $password = htmlspecialchars($_POST['password']);

  $sql = "SELECT * FROM `users`";
  $run = mysqli_query($con,$sql);

  if(mysqli_num_rows($run) > 0)
  {
   while ($row = mysqli_fetch_array($run)) {
         $db_name = $row['user_name'];
         $db_pass = $row['password'];

         if (password_verify($password, $db_pass) && $db_name == $name) {


           $login_obj->setsession($db_name);
           header('Location:  home.php');
           exit;
         }



   }


   echo "<center><h3 style='color:red;padding:10px;border:5px solid red'>Invalid login, please try again</h3></center>";


}



else {
  echo "<center><h3 style='color:red'>Sorry! there is no user Exits</h3></center>";
}

}

 ?>

    <!DOCTYPE html>
    <html>

    <head>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Admin Fruit Organic</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <link rel="stylesheet" href="src/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="src/css/font-awesome/css/font-awesome.min.css">

            <link rel="stylesheet" href="src/css/Adminara.min.css">
            <link rel="stylesheet" href="src/css/style.css">
            <link rel="stylesheet" href="src/css/animate.css" type="text/css">





            <!-- Google Font -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        </head>

        <body class="hold-transition  login-page back_img">
            <div class="login-box animated shake">
                <div class="login-logo"
                    <a href="../../index2.html" style="color: white"><b>Admin</b>Fruit organic</a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body bg">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="index.php" method="post">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                            <span class="form-control-feedback"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <span class="form-control-feedback"><i class="fa fa-key" aria-hidden="true"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <div class="checkbox">
                                    <label>
              <input type="checkbox"> Remember Me
            </label>
                                </div>
                            </div>
                            <!-- /.col -->

                        </div>


                        <div class=" text-center">

                            <input type="submit" name="login_btn" style="padding:10px 50px" class="btn btn-primary" value="Sign-in">

                        </div>
                    </form>
                    <!-- /.social-auth-links -->

                    <a href="#">I forgot my password</a><br>
                    <a href="register.php" class="text-center">Register a new membership</a>
                   <br><a href="../index.html">Fruit Organic</a>
                </div>
                <!-- /.login-box-body -->
            </div>
            <!-- /.login-box -->

            <!-- jQuery 3 -->
            <script src="src/js/jquery.min.js"></script>
            <!-- Bootstrap 3.3.7 -->
            <script src="src/js/bootstrap.min.js"></script>


            <script>


            </script>
        </body>

    </html>
