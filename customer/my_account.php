<?php
session_start();

if(!isset($_SESSION['customer_email'])){
    echo "<script>alert('Please Login to go to your account. If you have not user account Please register and it is more fun to buy here. Thank you!')</script>";
    echo "<script>window.open('../checkout.php', '_self')</script>";
}
else{
    

include("../includes/connection.php");

include("../functions/functions.php");
    /*include("includes/config.php");
    $redirectURL = "http://localhost/shopcart/customer/fb-callback.php"
        $permissions = ['email'];
    $loginURL = $helper->getLoginUrl($redirectURL, $permissions);*/

    
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="images/logo-small.PNG">

        <title>ShopCart ! E-Commerce Store</title>


        <link href="https://fonts.googleapis.com/css?family=Roboto:400, 500, 700, 300, 100" rel="stylesheet">
        <link rel="stylesheet" href="../styles/bootstrap.min.css">
        <link rel="stylesheet" href="../font-awesome/css/fontawesome-all.min.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.min.js"></script>


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
    
    if(!isset($_SESSION['customer_email'])){
        echo "Welcome:Guest";
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

                            <li><a href="../customer_register.php">Registers</a></li>
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
                            <li><a href="../cart.php">Go to Cart</a></li>
                            <li>
                                <?php
                            if(!isset($_SESSION['customer_email'])){ echo "<a href='../checkout.php'>Sign in</a>"; } else{ echo "<a href='../logout.php'>Sign out</a>"; }
                            
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


                    <a class="navbar-brand home" href="../index.php">
                   

                    <img src="../images/logo-large.PNG" class="hidden-xs">
                    <img src="../images/logo-small.png" class="visible-xs">

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
                                <a href="../index.php"> Home </a>
                            </li>

                            <li>
                                <a href="../shop.php"> Shop </a>
                            </li>

                            <li class="active">
                                <a href="my_account.php"> My Account </a>
                            </li>
                            <li>
                                <a href="../cart.php"> Shopping Cart </a>
                            </li>
                            <li>
                                <a href="../contact.php"> Contact Us</a>
                            </li>
                            <li>
                                <a href="../app/shopcart.apk">Site APP</a>
                            </li>

                        </ul>




                    </div>

                    <a class="btn btn-primary navbar-btn right" href="../cart.php">
                   

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
                        <li>My Account</li>

                    </ul>

                </div>

                <div class="col-md-12">
                    <?php
    $c_email = $_SESSION['customer_email'];
    $get_customer = "SELECT * FROM customers WHERE  customer_email = '$c_email'";
    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_confirm_code = $row_customer['customer_confirm_code'];
    if(!empty($customer_confirm_code)){
    
    ?>

                        <div class="alert alert-danger">
                            <strong>Warning! </strong> Please Confirm Through Your Email. If you have not recieved your confirmation email
                            <a href="my_account.php?send_email" class="alert-link">Send E-mail Again</a>

                        </div>
                        <?php } ?>


                </div>


                <div class="col-md-3">

                    <?php
                
                include("includes/sidebar.php");
                
                ?>


                </div>



                <div class="col-md-9">

                    <div class="box">
                        
          
                        
                        

                        <?php
    
    if(isset($_GET[$customer_confirm_code])){
        $update_customer = "update customers set customer_confirm_code='' where customer_confirm_code = '$customer_confirm_code'";
        $run_confirm = mysqli_query($con, $update_customer);
        echo "<script>alert('Your Email has been confirm')</script>";
        echo "<script>window.open('my_account.php?my_orders', '_self')</script>";
    }
    
    if(isset($_GET['send_email'])){
        
        $subject = "Shopcart Email Confirmation Message";
$from = "mahbubur.riad@gmail.com";
$message = "
<h2>
Email Confirmation By Shopcart $c_name
</h2>
<a href='localhost/shopcart/customer/my_account.php?$customer_confirm_code'>
Click Here To Confirm Email
</a>
";
$headers = "From: $from \r\n";
$headers .= "Content-type: text/html\r\n";
mail($c_email,$subject,$message,$headers);
        
        echo "<script>alert('Your Confirmation Email Has Been sent to you, check your inbox')</script>";
echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    
                   
                   if(isset($_GET['my_orders'])){
                       
                       include("my_orders.php");
                       
                   }
                    
                    
                    if(isset($_GET['edit_account'])){
                       
                       include("edit_account.php");
                       
                   }
                    
                     if(isset($_GET['pay_offline'])){
                       
                       include("pay_offline.php");
                       
                   }
                    
                    if(isset($_GET['change_pass'])){
                       
                       include("change_pass.php");
                       
                   }
                    
                    if(isset($_GET['delete_account'])){
                       
                       include("delete_account.php");
                       
                   }
                   
                   
                   
                   
                   ?>


                    </div>

                </div>

            </div>
        </div>



        <?php
    
    include("../includes/footer.php");
    
    ?>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/jquery.min.js"></script>

    </body>

    </html>

    <?php } ?>
