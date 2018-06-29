<div class="box">

    <?php
    
    $session_email = $_SESSION['customer_email'];
    $select_customer = "SELECT * FROM customers WHERE customer_email='$session_email'";
    $run_customer = mysqli_query($con, $select_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];
    
    
    ?>


        <h1 class="text-center">Payment Options</h1>

        <div class="col-md-12">
            <?php
        
        if(!isset($_SESSION['customer_email'])){
        
    }
        else{
            
        
    $c_email = $_SESSION['customer_email'];
    $get_customer = "SELECT * FROM customers WHERE  customer_email = '$c_email'";
    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_confirm_code = $row_customer['customer_confirm_code'];
    if(!empty($customer_confirm_code)){
    
    ?>

                <div class="alert alert-danger">
                    <center>
                        <strong>Warning! </strong> Please Confirm Through Your Email. If you have not recieved your confirmation email
                        <a href="my_account.php?send_email" class="alert-link">Send E-mail Again</a>

                    </center>


                </div>
                <?php } }?>


        </div>

        <p class="lead text-center">
            <?php
            
            if(!empty($customer_confirm_code)){
                ?>
                <a class="isDisabled">Pay By Bkash / Offline</a>
                <?php } else{  ?>
                <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay By Bkash / Offline</a>
                <?php  }?>



        </p>

        <center>
            <p class="lead">
                <?php

                if(!empty($customer_confirm_code)){
                ?>
                    <a class="isDisabled">Pay Online By Paypal</a>
                    <?php } else{  ?>
                    <a href="#>">Pay Online By Paypal</a>
                    <?php } ?>


                    <img src="images/paypal.png" alt="Paypal" class="img-responsive" width="500" height="270">


            </p>


        </center>


</div>
