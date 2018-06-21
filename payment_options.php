<div class="box">

    <?php
    
    $session_email = $_SESSION['customer_email'];
    $select_customer = "SELECT * FROM customers WHERE customer_email='$session_email'";
    $run_customer = mysqli_query($con, $select_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];
    
    
    ?>
        <h1 class="text-center">Payment Options</h1>
        <p class="lead text-center">

            <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay By Bkash / Offline</a>

        </p>

        <center>
            <p class="lead">
                <a href="#">Pay Online By PayPal</a>

                <img src="images/paypal.png" alt="Paypal" class="img-responsive" width="500" height="270">


            </p>


        </center>


</div>
