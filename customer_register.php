<?php
session_start();

include("includes/connection.php");

include("functions/functions.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logo-small.PNG">

    <title>ShopCart ! Register</title>


    <link href="https://fonts.googleapis.com/css?family=Roboto:400, 500, 700, 300, 100" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>


</head>

<body>

    <div id="top">
        <!--top starts-->

        <div class="container">
            <!--container starts-->

            <div class="row">
                <!--row starts-->

                <div class="col-md-6 login-details">
                    <!-- col-md-6 login-details starts-->
                    <a href="#" class="btn btn-primary btn-sm">
                        <?php
                        $ip = getRealUserIp();
    
    if(!isset($_SESSION['customer_email'])){
        echo 'Welcome: '.$ip ;
    }
else
{
    echo "Hello! ".$_SESSION['customer_email']."";
}
                            ?>


                    </a>

                    <a href="#">Shopping Cart Total Price: <?php total_price();?>/=, Total Items <?php items(); ?></a>

                </div>
                <!-- col-md-6 login-details ends-->

                <div class="col-md-6">
                    <!-- col-md-6  starts-->

                    <ul class="menu">
                        <!--menu starts-->

                        <li>
                            <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='customer_register.php'>Register</a>";
                            }
                            else
                            {
                                echo "<a href='cart.php'>Shopping Cart</a>";
                            }
                            ?>

                        </li>
                        <li>
                            <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }
                            else
                            {
                                echo "<a href='customer/my_account.php?my_orders'>CheckOut</a>";
                            }
                            ?></li>
                        <li><a href="cart.php">Go to Cart</a></li>
                        <li>
                            <?php
                            if(!isset($_SESSION['customer_email'])){ echo "<a href='checkout.php'>Sign in</a>"; } else{ echo "<a href='logout.php'>Sign out</a>"; }
                            
                            ?>


                        </li>

                    </ul>
                    <!--menu ends-->
                </div>
                <!-- col-md-6 ends-->
            </div>
            <!-- row ends-->

        </div>
        <!--container ends-->

    </div>
    <!--top ends-->

    <div class="navbar navbar-default" id="navbar">

        <div class="container">


            <div class="navbar-header">


                <a class="navbar-brand home" href="index.php">
                   

                    <img src="images/logo-large.PNG"  class="hidden-xs">
                    <img src="images/logo-small.png"  class="visible-xs">

                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                <span class="sr-only" >Toggle Navigation </span>

                <i class="fa fa-align-justify"></i>

            </button>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">

                <span class="sr-only" >Toggle Search</span>

                <i class="fa fa-search" ></i>

            </button>


            </div>


            <div class="navbar-collapse collapse" id="navigation">


                <div class="padding-nav">


                    <ul class="nav navbar-nav navbar-left">


                        <li>
                            <a href="index.php"> Home </a>
                        </li>

                        <li>
                            <a href="shop.php"> Shop </a>
                        </li>

                        <li>
                            <a href="customer/my_account.php"> My Account </a>
                        </li>


                        <li>


                            <?php
                          include("additional_info.php");

                          ?>

                        </li>
                        <li>
                            <a href="contact.php"> Contact Us</a>
                        </li>


                    </ul>




                </div>

                <a class="btn btn-primary navbar-btn right" href="cart.php">
                   

                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> items in Cart</span>
                </a>

                <div class="navbar-collapse collapse right">


                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">

<span class="sr-only">Toggle Search</span>

<i class="fa fa-search"></i>

</button>

                </div>


                <div class="collapse clearfix" id="search">


                    <form class="navbar-form" method="get" action="results.php">


                        <div class="input-group">


                            <input class="form-control" type="text" placeholder="Search" name="user_query" required>

                            <span class="input-group-btn">

<button type="submit" value="Search" name="search" class="btn btn-primary">

<i class="fa fa-search"></i>

</button>
        </span>

                        </div>

                    </form>

                </div>

            </div>


        </div>
    </div>



    <div id="content">

        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">

                    <li><a href="index.php">Home</a></li>
                    <li>Register</li>

                </ul>

            </div>

            <div class="col-md-3">

                <?php
                
                include("includes/sidebar.php");
                
                ?>


            </div>







            <div class="col-md-9">



                <div class="box">

                    <div class="box-header">

                        <center>

                            <h2>Sign Up For A New Account</h2>

                            <!--  <p class="text-muted">
                                If You have any Question............................

                            </p>-->
                        </center>

                    </div>



                    <form method="post" action="customer_register.php" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" name="c_name" required>

                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="c_email" required>

                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="c_pass" required>

                        </div>
                        <?php
                        $ipn = getRealUserIp();
             
 $json  = file_get_contents("https://freegeoip.net/json/$ipn");
 $json  =  json_decode($json ,true);
 $countryip =  $json['country_name'];
$regionss= $json['region_name'];
 $cityss = $json['city'];
      ?>

                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control" name="c_country" value="<?php echo $countryip;?>" required>

                            </div>

                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" class="form-control" name="c_city" value="<?php echo $cityss; ?>" required>

                            </div>

                            <div class="form-group">
                                <label for="">Contact No</label>
                                <input type="text" class="form-control" name="c_contact" required>

                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="c_address" required>

                            </div>

                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="c_image" required>

                            </div>



                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-primary">
                             <i class="fas fa-user-plus"></i> Register Now
                             
                         </button>


                            </div>

                    </form>



                </div>





            </div>










        </div>
    </div>



    <?php
    
    include("includes/footer.php");
    
    ?>






        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>

</body>

</html>


<?php

 if(isset($_POST['register'])){ $c_name = $_POST['c_name']; $c_email = $_POST['c_email']; $c_pass = $_POST['c_pass']; $c_country = $_POST['c_country']; $c_city = $_POST['c_city']; $c_contact = $_POST['c_contact']; $c_address = $_POST['c_address']; $c_image = $_FILES['c_image']['name']; $c_image_tmp =$_FILES['c_image']['tmp_name'];

        $c_ip = getRealUserIp(); 

        move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
                               
                               $get_email = "SELECT * FROM customers WHERE customer_email='$c_email'";
                               $run_email = mysqli_query($con, $get_email);
                               $check_email = mysqli_num_rows($run_email);
                               if($check_email == 1){
                                   echo "<script>alert('This Email is already registered ! please choose another email')</script>";
                                   exit();
                                   
                               }
                               
                               $customer_confirm_code = mt_rand();
$subject = "Shopcart Email Confirmation Message";
$from = "mahbubur.riad@gmail.com";
$message = "
<h2>
Hey $c_name,
</h2>


We received a request to set your email to $c_email. If this is correct, please confirm by clicking the button below. If you don’t know why you got this email, please tell us straight away so we can fix this for you.

<p>
Information That save in our database
</p>

<table style='border:2px solid black;'>
  <tr>
    <th>Name</th>
    <th>E-mail</th> 
    <th>Pass</th>
    <th>Country</th>
    <th>City</th>
    <th>Contact</th>
    <th>Address</th>
    
  </tr>
  <tr>
    <td>$c_name</td>
    <td>$c_email</td> 
    <td>$c_pass</td> 
    <td>$c_country</td>
    <td>$c_city</td>
    <td>$c_contact</td>
    <td>$c_address</td>
 
  </tr>
  
</table>
<br>
<br>

<a style='background-color: #af0c42; text-decoration: none; padding: 10px; font-size: 130%; color: white; margin-top:20px;' href='http://blazing.cf/shopcart/shopcart/customer/my_account.php?$customer_confirm_code'>
Click Here To Confirm Email
</a>
";
$headers = "From: $from \r\n";
$headers .= "Content-type: text/html\r\n";
mail($c_email,$subject,$message,$headers);
                               

        $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip, customer_confirm_code) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip', '$customer_confirm_code')";


                $run_customer = mysqli_query($con,$insert_customer);
                $sel_cart = "select * from cart where ip_add='$c_ip'";
                $run_cart = mysqli_query($con,$sel_cart);
                $check_cart = mysqli_num_rows($run_cart);
                if($check_cart>0){
                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('You have been Registered Successfully')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";

                }else{

                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('You have been Registered Successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";


        }




        }

        ?>
