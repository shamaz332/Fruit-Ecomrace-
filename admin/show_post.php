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
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>
    </section>

    <!-- Main content -->


    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Monthly Post's</h3>


                    </div>
                    <!-- /.box-header -->
                    <?php

             $query = "SELECT * FROM `delivered`";
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
                                        <th>Account</th>
                                        <th>Address</th>
                                        <th>Post Man</th>
                                        <th>DateTime</th>
                                        <th>Status</th>


                                    </tr>
                                    <?php

      while ($row = mysqli_fetch_array($run)) {
          $userid = $row['id'];
             $customer_name = $row['customer_name'];
               $customer_number = $row['customer_number'];
             $customer_account = $row['customer_account'];
                	$address = $row['address'];
          $postman = $row['postman'];
               $datetime = $row['datetime'];


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
                                                <?php echo $customer_account; ?>
                                            </td>
                                            <td>
                                                <?php echo $address; ?>
                                            </td>
                                            <td>
                                                <?php echo $postman; ?>
                                            </td>
                                            <td>
                                                <?php echo $datetime; ?>
                                            </td>
                                            <td>
                                                Delivered!
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
