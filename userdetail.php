<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/animate.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

</head>

<body>
    <!--this is top bar-->
    <div class="container">
        <div class="row pad-normal">
            <div class="col-md-6 text-left languages">
                <span><a href="#"><i class="fa fa-language"></i>English</a></span>
                <span><a href="#"><i class="fa fa-money"></i>Rupee</a></span>
            </div>
            <div class="col-md-6 text-right Accounts">
                <span><a href="admin/index.php"><i class="fa fa-user"></i>Admin account</a></span>
                <span><a href="admin/register.php"><i class="fa fa-sign-in"></i>Register</a></span>
                <span><a href=""><i class="fa fa-check-square-o"></i>Checkout</a></span>
            </div>
        </div>
    </div>
    <!--end of top bar-->
    <div class="container-fluid logo_bar">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="search">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search">
                            <a href=""><i class="fa fa-search"></i></a>

                        </div>
                    </form>
                </div>
                <div class="col-md-4 text-center ">
                    <div class="logo_img">
                        <img src="src/logo.png" alt="">
                    </div>
                </div>
                <div class="col-md-4 pull-right">
                    <div class="card_details">
                        <a href=""><i class="fa fa-credit-card"></i>Cart-Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    start of nav bar -->
    <div class="container margin-nav">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11 text-uppercase">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
                    <a class="navbar-brand " href="index.html">Fruit Organic</a>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="shopnow.php">Fresh Fruit <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="dryfruit.php">Dry Fruit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dryfruit.php">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#locate">Locate Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#aboutus">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contactus">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="actives" href="shopnow.php">Order Now</a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>




        </div>
    </div>



    <?php
    $con = mysqli_connect("127.0.0.1", "root", "", "fruitshop")or die('error 404');
            $total = 0;
           if( isset($_POST['carts'])){
               $carts = $_POST['carts'];
            foreach ($carts as $fruit) {

                $amount = $_POST[$fruit];
                $sql = "SELECT  * FROM `fruits` WHERE fruit_name='$fruit'";
                $run = mysqli_query ($con,$sql);
                if($run){
                   if($row = mysqli_fetch_array($run))
                {
                    $price = $row['fruit_price'];
                    $total = $total + ($price * $amount);
                }

            }

            }

           }
   


  ?>


        <div class="container margin-top">
            <?php
            if (isset($_POST['submit1'])) {



                $name = htmlspecialchars($_POST['name']);
                $number = htmlspecialchars($_POST['number']);
                 $address = htmlspecialchars($_POST['address']);
                $account = htmlspecialchars($_POST['account']);
                $paid = htmlspecialchars($_POST['paid']);


                $sql = "INSERT INTO `customers`(`customer_name`, `customer_number`, `address`, `customer_account`,`paid`) VALUES ('$name','$number','$address','$account','$paid')";
                $run = mysqli_query($con,$sql);

                 if ($run) {
                   echo "<center><h3 style='color:#66CC33;'>Thankyou Successfully Ordered , we call you as soon as possible!</h3></center>";

                 }
                 else {
                   echo "<center><h3 style='color:red'>Sorry Error has been eccor! Please try again.</h3></center>";
                 }

              }

            ?>
        </div>


        <div class="container text-center">
            <?php 
            if($total == 0) 
            {
               
                    echo "<p style='color:red'>please select at least one item!</p>";
              
                
               echo '<h1 style=" margin-top: 20px;
    padding: 20px;
    background-color: aqua;"><b><a style="color:white;" href="shopnow.php">Shop Now</a>
               
        <b>    </h1>';
            }
           
         else{   
          echo '<h1 style=" margin-top: 20px;
    padding: 20px;
    background-color: aqua;"><b>Total Amount:
               ';
             echo $total;
             echo 'Rs Only
            <b>    </h1>';
         ?>
        </div>

        <div class="container margin-top">
            <form action="userdetail.php" method="POST" role="form">
                <legend>PLease Enter Details:</legend>

                <div class="form-group">
                    <label for="">Name:</label>
                    <input type="text" class="form-control" id="" placeholder="Name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="">Number:</label>
                    <input type="text" class="form-control" id="" placeholder="e.g 03034766669" name="number" required>
                </div>
                <div class="form-group">
                    <label for="">Address:</label>
                    <input type="text" class="form-control" id="" placeholder="e.g uaf faislabad" name="address" required>
                </div>
                <div class="form-group">
                    <label for="">Account:</label>
                    <input type="text" class="form-control" id="" placeholder="e.g 23256865946551" name="account" required>
                </div>
                <div class="form-group">
                    <label for="">Total Paid:</label>
                    <input type="text" class="form-control" id="" value="<?php echo $total?>" name="paid" readonly>
                </div>



                <button type="submit" name="submit1" class="btn btn--green">Purchase Now</button>
            </form>


        </div>
    
         <?php } ?>
         </div>

        <!--    footer of the web-->
        <div class="container-fluid  bg-color">
            <div class="container">
                <div class="row margin1">
                    <div class="col-md-4">
                        <h1 id="aboutus">ABOUT US</h1> <br>
                        <img src="src/about.png" class="img-fluid" alt="">
                        <p>Our products are freshly harvested, washed ready for box and finally.</p>

                    </div>
                    <div class="col-md-4">
                        <h1>INFORMMATION</h1>
                        <ul>
                            <li><a href="">New Products</a></li>
                            <li><a href="">Top Sellers</a></li>
                            <li><a href="">Our Blog</a></li>
                            <li><a href="">About Our Shop</a></li>
                            <li><a href="">About us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h1 id="contactus">CONTACT US</h1>

                        <p> <i class="fa fa-home"></i>Our business address is fruit organic shop,Main Market university of agriculture Faisalabad.</p>
                        <p><i class="fa fa-mobile"></i>+923034766669</p>
                        <p><i class="fa fa-envelope"></i>rana.naveed812@gmail.com</p>
                        <p>For Product Registration and general enquires please <a href="mailto:rana.naveed812@gmail.com" style="color: #66CC33;">contact us</a>.</p>
                    </div>

                </div>
                <hr>
                <div class="row margin1 img">
                    <div class="col-md-6">
                        <span>FOLLOW US</span>
                        <a href=""> <img src="src/fa.svg" alt=""></a>
                        <a href="">  <img src="src/Twitter-icon.png" alt=""></a>
                        <a href=""><img src="src/insta.png" alt=""></a>
                        <a href=""> <img src="src/2000px-Google_plus_icon.svg.png" alt=""></a>

                    </div>
                    <div class="col-md-6 text-right">
                        <span>PAYMENT METHOD</span>
                        <a href="">
                        <img src="src/pay1.png" alt="">
                        <img src="src/pay2.png" alt="">
                        <img src="src/pay3.png" alt="">
                        <img src="src/pay4.png" alt="">
                    </a>
                    </div>

                </div>

            </div>
        </div>

        <div class="container margin ">
            <div class="row text-center">
                <div class="col-md-12">
                    <p> Copyright © 2017 Fruit Store - All Rights Reserved.</p>
                    <a href=""><span style="border-right:2px solid #66CC33;padding: 5px;">Privacy Policy</span> Term  Conditions</a>
                </div>
            </div>
        </div>
        <!--    footer of the web-->

        <script src="js/jquery.min.js"></script>
        <script src="proper.js"></script>
        <script src="js/bootstrap.min.js"></script>

</body>


</html>
