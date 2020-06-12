<?php
session_start();
session_regenerate_id();

if(!isset($_SESSION["login"]))
{
  header('Location: index.php');
  exit;
}
require_once ('include/header.php');
require_once ('include/connection.php');
?>


    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">New Post</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <form action="create_post.php" method="POST" class="form-horizontal" onsubmit="return validate2();" enctype="multipart/form-data">
                        <div class="form-group">
                            <legend><b>Add New Fruit</b></legend>
                        </div>
                        <?php

    if (isset($_POST['post_submit'])) {
      if (isset($_FILES['file'])) {

      $target_dir = "upload/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);


      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

        $filename  = $_FILES["file"]["name"];
        $heading = htmlspecialchars($_POST['heading']);
        $price = htmlspecialchars($_POST['price']);
         $type = $_POST['fruittype'];
        $admin = $_SESSION['name'];

        $sql = "INSERT INTO `fruits`(`fruit_name`, `fruit_type`, `fruit_price`, `fruit_img`, `admin_name`) VALUES ('$heading','$type','$price','$filename','$admin')";
        $run = mysqli_query($con,$sql);

         if ($run) {
           echo "<center><h3 style='color:green'>Successfully Posted!</h3></center>";

         }
         else {
           echo "<center><h3 style='color:red'>Sorry Error has been eccor! Please try again.</h3></center>";
         }

      }
   else {
     echo "<center><h3 style='color:red'>Sorry Error has been eccor! Please try again.</h3></center>";

   }
        }

    }



    ?>



                            <div class="form-group">
                                <label>Fruit Name:</label>
                                <input type="text" name="heading" id="input" class="form-control" required="required" placeholder="Banana">

                            </div>
                            <div class="form-group">
                                <label>Fruit Type:</label>
                                <div class="form-check">
                                    <label class="form-check-label">
    <input class="form-check-input" type="radio" name="fruittype" id="exampleRadios1" value="Fresh Fruit" checked>
    Fresh Fruit
  </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
    <input class="form-check-input" type="radio" name="fruittype" id="exampleRadios1" value="Dry Fruit" checked>
    Dry Fruit
  </label>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="text" name="price" id="price" class="form-control" required="required" placeholder="Rs 152/kg">

                            </div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" id="pics" name="file">

                                <span id="error" style="color:red"></span>

                            </div>


                            <div class="form-group">

                                <button type="submit" name="post_submit" class="btn btn-primary">Submit</button>

                            </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>

        </div>
    </section>
    <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer text-center">
        <!-- To the right -->

        <!-- Default to the left -->
        <strong>Copyright &copy; 2017 <a href="#">fruitorganic</a>.</strong> All rights reserved.
    </footer>



    <!-- /.tab-pane -->
    </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="src/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="src/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="src/js/adminlte.min.js"></script>
    <script type="text/javascript">
        function validate2() {

            var pic = document.getElementById("pics").value;
            var res = pic.split(".");
            var ex = res[1].toLowerCase();

            if (ex !== "jpg" && ex !== "jpeg" && ex !== "png") {

                document.getElementById("error").innerHTML = "This type of file is not Allowd, Make sure! You have been selected a image";
                return false;
            }

            return true;
        }

    </script>


    </body>

    </html>
