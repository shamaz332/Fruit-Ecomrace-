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


    <?php

      if (isset($_GET['approve'])) {
          $id = $_GET['approve'];

          $sql = "SELECT * FROM `user_request` WHERE $id";
          $run = mysqli_query($con,$sql);
           if ($row = mysqli_fetch_array($run)) {

            $username = $row['user_name'];
            $userpass = $row['user_pass'];
            $userimg = $row['img'];


            $sql = "INSERT INTO `users`( `user_name`, `password`, `img`) VALUES ('$username','$userpass','$userimg')";
            $run = mysqli_query($con,$sql);

           if ($run) {
             $sql = "DELETE FROM `user_request` WHERE id=$id";
             $run = mysqli_query($con,$sql);
             if ($run) {
               echo "<center><h3 style='color:green'>Successfully Approved</h3></center>";

             }
             else {
               echo "<center><h3 style='color:red'>Error occor while Approving Request Pleas Try again</h3></center>";

             }
           }
    else {
    echo "<center><h3 style='color:red'>Error occor while Approving Request Pleas Try again</h3></center>";
    }

           }

           else {
             echo "<center><h3 style='color:red'>Error occor while Approving Request Pleas Try again</h3></center>";
           }





      }

      if (isset($_GET['del'])) {
        $id = $_GET['del'];
       
        $sql = "DELETE FROM `user_request` WHERE id=$id";
           $run = mysqli_query($con,$sql);
           if ($run) {
            echo "<center><h3 style='color:green;padding:10px;border:5px solid green'>Sucessfully Deleted!.</h3></center>";

           }
           else {
            echo "<center><h3 style='color:red;padding:10px;border:5px solid red'>Error occor while Delete Request Pleas Try again</h3></center>";

           }

    }

 ?>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Here</li>
        </ol>
        </section>

        <!-- Main content -->


        <section class="content container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Our User</h3>


                        </div>
                        <!-- /.box-header -->
                        <?php

             $query = "SELECT * FROM `user_request`";
             $run = mysqli_query($con,$query);

             if(mysqli_num_rows($run) > 0){



             ?>

                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover text-center">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Picture</th>
                                            <th>Approved</th>
                                            <th>Delete</th>
                                        </tr>
                                        <?php

      while ($row = mysqli_fetch_array($run)) {
          $userid = $row['id'];
             $username = $row['user_name'];
               $userimg = $row['img'];
                $date = $row['timestamp'];


      ?>

                                            <tr>
                                                <td>
                                                    <?php echo $userid; ?> </td>
                                                <td>
                                                    <?php echo $username; ?>
                                                </td>
                                                <td>
                                                    <?php echo $date; ?>
                                                </td>
                                                <td><span class="label label-warning">Pending</span></td>
                                                <td><img src="upload/<?php echo $userimg; ?>" alt="profile" class="img-circle center-block" width="40px" height="40px"></td>
                                                <td>
                                                    <a href="user.php?approve=<?php echo $userid; ?>">
                                                        <h4> <i style="color:green" class="fa fa-check-circle-o" aria-hidden="true"></i></h4>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="user.php?del=<?php echo $userid; ?>">
                                                        <h4> <i class="fa fa-trash-o" aria-hidden="true"></i></h4>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
}
                 ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        </div>

        <?php
}
  else {
    echo "<center><h3>No Pending Request available</h3></center>";
  }
   ?>
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


            </body>

            </html>
