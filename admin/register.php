<?php

session_start();
session_regenerate_id();


if(isset($_SESSION["login"]))
{
  header('Location: home.php');
  exit;
}
 require_once 'include/connection.php';

  $moved = false;
  if (isset($_POST['reg_btn'])) {
    if (isset($_FILES['file'])) {

    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
      

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

      $moved = true;
      $filename  = $_FILES["file"]["name"];
      $username = htmlspecialchars($_POST['name']);
      $userpass = htmlspecialchars($_POST['password']);
      $userpass =  password_hash($userpass, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `user_request`( `user_name`, `user_pass`, `img` ) VALUES ('$username','$userpass','$filename')";
      $run = mysqli_query($con,$sql);



      }
      }

}



 ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin fruitshop</title>
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

    <body class="hold-transition register-page bg_img">
        <div class="register-box animated shake">
            <div class="register-logo">
                <a href="index.php" style="color: white"><b>Admin</b>Fruit Organic</a>
            </div>
            <div style="background:green;color:white;pading:10px;">
                <h3>
                    <?php

  if (isset($_POST['reg_btn'])) {
    if ($moved && $run) {
      echo "<center><h3 style='color:green;padding:10px;border:5px solid green'>Your Account Request has been send out to Our Admin thank You!</h3></center>";
    }
  }


    ?>
                </h3>
            </div>
            <div style="background:red;color:white;pading:10px">
                <h3>
                    <?php
  if (isset($_POST['reg_btn'])) {
    if (!$moved || !$run) {
      echo "Error occor! server has been down please try again";
    }
  }


    ?>
                </h3>
            </div>
            <div class="register-box-body bg">
                <p class="login-box-msg">Register a new membership</p>

                <form action="" method="post" onsubmit="return validate1();" enctype="multipart/form-data">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="name" placeholder="Full name" required>
                        <span class=" form-control-feedback"><i class="fa fa-user"></i></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="pass" name="password" placeholder="Password" required>
                        <span class=" form-control-feedback"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="repass" name="repasword" placeholder="Retype password" required>
                        <span class=" form-control-feedback"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label>Profile Picture</label>

                        <input type="file" class="form-control" id="pic" name="file" required>
                        <span class=" form-control-feedback"><i class="fa fa-file-image-o" aria-hidden="true"></i></span>
                        <label id="error" style="color:red;"></label>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox ">
                                <label>
              <input type="checkbox" required> I agree to the <a href="#">terms</a>
            </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <input type="submit" name="reg_btn" class="btn btn-primary btn-block btn-flat" value="Register">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>

                </div>

                <a href="index.php" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->

        <!-- jQuery 3 -->
        <script src="src/js/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="src/js/bootstrap.min.js"></script>

        <script>
            function validate1() {
                var pass = document.getElementById("pass");
                var repass = document.getElementById("repass");
                var pic = document.getElementById("pic").value;
                var res = pic.split(".");
                var ex = res[1].toLowerCase();

                if (pass.value != repass.value) {
                    pass.style.background = "red";
                    repass.style.background = "red";
                    return false;
                } else if (ex !== "jpg" && ex !== "jpeg" && ex !== "png") {
                    document.getElementById("error").innerHTML = "This type of file is not Allowd, Make sure! You are selected a image";
                    return false;
                }

                return true;
            }

        </script>
    </body>

    </html>
