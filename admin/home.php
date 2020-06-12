<?php


session_start();
session_regenerate_id();

if(!isset($_SESSION["login"]))
{
  header('Location: index.php');
  exit;
}

require_once ('include/header.php');


?>

    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Here</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>Add</h3>

                        <p>New Data</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </div>
                    <a href="create_post.php" class="small-box-footer">Add New Fruits <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>SHOW</h3>

                        <p>All Cutomer</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </div>
                    <a href="show_post.php" class="small-box-footer">Show Request <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>USERS</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="user.php" class="small-box-footer">All Users <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>DETAIL</h3>

                        <p>Average</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <a href="message.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

    </section>
    <!-- /.content -->


    <?php

      if (isset($_GET['approve1'])) {
          $id = $_GET['approve1'];
              $postman=$_SESSION["name"];
          $sql = "SELECT * FROM `customers` WHERE $id";
          $run = mysqli_query($con,$sql);
           if ($row = mysqli_fetch_array($run)) {
            
          $customer_name = $row['customer_name'];
               $customer_number = $row['customer_number'];
                	$address = $row['address'];
                    $customer_account = $row['customer_account'];
                         

            $sql = "INSERT INTO `delivered`( `customer_name`, `customer_number`,`address`, `customer_account`, `postman`) VALUES ('$customer_name','$customer_number','$address','$customer_account','$postman')";
            $run = mysqli_query($con,$sql);

           if ($run) {
             $sql = "DELETE FROM `customers` WHERE id=$id";
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

 ?>


        <section class="content container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Lattest Requests!</h3>


                        </div>
                        <!-- /.box-header -->
                        <?php

             $query = "SELECT * FROM `customers";
             $run = mysqli_query($con,$query);

             if(mysqli_num_rows($run) > 0){



             ?>

                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover text-center">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Number</th>
                                            <th>Address</th>
                                            <th>DateTime</th>
                                            <th>Status</th>
                                            <th>Delivered</th>

                                        </tr>
                                        <?php

      while ($row = mysqli_fetch_array($run)) {
          $userid = $row['id'];
             $customer_name = $row['customer_name'];
               $customer_number = $row['customer_number'];
                	$address = $row['address'];
               $datetime = $row['timestamp'];


      ?>

                                            <tr>
                                                <td>
                                                    <?php echo $userid; ?> </td>
                                                <td>
                                                    <?php echo $customer_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $customer_number; ?>
                                                </td>
                                                <td>
                                                    <?php echo $address; ?>
                                                </td>
                                                <td>
                                                    <?php echo $datetime; ?>
                                                </td>
                                                <td>
                                                    In processing!
                                                </td>
                                                <td>
                                                    <a href="home.php?approve1=<?php echo $userid; ?>">
                                                        <h4> <i style="color:green" class="fa fa-check-circle-o" aria-hidden="true"></i></h4>
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
