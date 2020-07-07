<?php
session_start();
session_regenerate_id();

if (!isset($_SESSION["login"])) {
    header('Location: index.php');
    exit;
}
require_once 'include/header.php';
require_once 'include/connection.php';
?>



    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Delete Post</li>
    </ol>
    </section>
    <?php


$query = "SELECT * FROM `fruits` where `fruit_type`= 'Fresh Fruit'";
$queryexec = mysqli_query($con, $query);

if (mysqli_num_rows($queryexec) > 0) {
    $id = 0; ?>


        <div class="container  margin-top">
            <div class="row">
                <div class="col-md-12">
                    <form action="userdetail.php" method="POST">
                        <h1>Items List</h1>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fresh Fruit</th>
                                    <th scope="col">Image</th>
                              
                                </tr>
                            </thead>
                            <tbody>

                                <?php

    while ($row = mysqli_fetch_array($queryexec)) {
        $id = $row['id'];
        $name = $row['fruit_name'];
        $img = $row['fruit_img']; ?>


                                    <tr>



                                        <th scope="row">
                                            <?php echo ++$id; ?>
                                        </th>
                                        <td>

                                            <div class="form-check">
                                                <label class="form-check-label">
    <!-- <input class="form-check-input" type="checkbox" value="<?php echo $name; ?>" name="carts[]" > -->
   <?php echo $name; ?>
  </label> </td>
                                        <td>
                                            <img src="upload/<?php echo $img; ?>" alt="image" width="40px" height="40px">
                                        </td>

                                        
                                    </tr>
                                    <?php
    } ?>

                                        <!--                           bnana-->


                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
            <!--    end of purchasing fruit-->
            <?php
}
?>


    <!-- Main content -->
    <section class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <form action="delete_post.php" method="POST" class="form-horizontal" onsubmit="return validate2();" enctype="multipart/form-data">
                        <div class="form-group">
                            <legend><b>Delete Fruit</b></legend>
                        </div>
                        <?php

if (isset($_POST['del'])) {
    $id = $_POST['heading'];

    // $admin = $_SESSION['name'];

    // $sql = "INSERT INTO `fruits`(`fruit_name`, `fruit_type`, `fruit_price`, `fruit_img`, `admin_name`) VALUES ('$heading','$type','$price','$filename','$admin')";

    // mysqli_query($db, "DELETE FROM fruits WHERE id=$id");

    $sql = "DELETE FROM `fruits` WHERE `id` = $id";
    $run = mysqli_query($con, $sql);
    if ($run) {
        echo "<center><h3 style='color:green'>Successfully Deleted!</h3></center>";
    } else {
        echo "<center><h3 style='color:red'>Sorry Error has been eccor! Please try again.</h3></center>";
    }
}

?>



                            <div class="form-group">
                                <label>Fruit Id:</label>
                                <input type="text" name="heading" id="input" class="form-control" required="required" placeholder="Fruit ID">

                            </div>



                            <div class="form-group">

                                <button type="submit" name="del" class="btn btn-primary">Submit</button>

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
        <strong>Copyright &copy; 2020 <a href="#">fruitorganic</a>.</strong> All rights reserved.
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
