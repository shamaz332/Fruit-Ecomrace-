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
                            <li class="nav-item active">
                                <a class="nav-link" id="actives" href="shopnow.php">Fresh Fruit <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dryfruit.php">Dry Fruit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Categories</a>
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
                                <a class="nav-link" href="shopnow.php">Order Now</a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>


            <div class="col-md-1"></div>

        </div>
    </div>
    <!--end of nav bar-->


    <div class="container text-center headings">
        <h1>Fresh Fruit List</h1>

    </div>
    <!--fruits-->
    <?php
    $con = mysqli_connect("127.0.0.1", "root", "", "fruitshop")or die('error 404');

  $query = "SELECT * FROM `fruits` where `fruit_type`= 'Fresh Fruit'";
  $run = mysqli_query($con,$query);

  if(mysqli_num_rows($run) > 0){
   $id = 0;


  ?>


        <div class="container  margin-top">
            <div class="row">
                <div class="col-md-12">
                    <form action="userdetail.php" method="POST">
                        <h1>Please Select Items</h1>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fresh Fruit</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">How Much</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                         while ($row = mysqli_fetch_array($run)) {
                                            
                                                $name = $row['fruit_name'];
                                                  $price = $row['fruit_price'];
                                                    $img =  $row['fruit_img'];



                                         ?>


                                    <tr>



                                        <th scope="row">
                                            <?php echo ++$id; ?>
                                        </th>
                                        <td>

                                            <div class="form-check">
                                                <label class="form-check-label">
    <input class="form-check-input" type="checkbox" value="<?php echo $name; ?>" name="carts[]" >
   <?php echo $name; ?>
  </label> </td>
                                        <td>
                                            <img src="admin/upload/<?php echo $img; ?>" alt="image" width="40px" height="40px">
                                        </td>
                                        <td>


                                            <input class="form-check-input" type="text" name="<?php echo $name; ?>" value="20" placeholder="20kg/5Dozen">



                                        </td>
                                        <td>RS
                                            <?php echo $price; ?>/kg</td>
                                    </tr>
                                    <?php
         }
                          ?>

                                        <!--                           bnana-->


                            </tbody>
                        </table>
                        <input class="form-control btn btn--blue" type="submit" name="submit" value="Order Now">
                    </form>
                    </div>
                </div>
            </div>
            <!--    end of purchasing fruit-->
            <?php
             }
               else {
                 echo "<center><h3>No More Post Available!</h3></center>";
               }
                ?>




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
