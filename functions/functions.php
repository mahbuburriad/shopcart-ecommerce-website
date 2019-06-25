<?php
$db = mysqli_connect("localhost", "root", "", "shopcart");

function getProducts(){
    global $db;
    
    $get_products = "SELECT * FROM products order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($db, $get_products);
    while($row_products = mysqli_fetch_array($run_products))
    {
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
        
        echo"
        
        
        
        <div class='col-md-4 col-sm-6 single'>

        <div class='product'>
           
           <a href='details.php?pro_id=$pro_id'>
           <img src='admin/product_images/$pro_img1' class='img-responsive'>
           </a>
           
           <div class='text'>
              
              <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
              
              <p class='price'>
                  $pro_price /=
              </p>
              
              <p class='buttons'>
              <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
              
              <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fas fa-cart-plus'></i>Add To Cart</a>
              
              
              </p>
               
           </div>
            
            
        </div>
        
        
        </div>
        
        
        
        ";
        
    }
}







function getProductCategory(){
    
    global $db;
    
    $get_p_cats = "SELECT * FROM product_categories";
    
    $run_p_cats = mysqli_query($db, $get_p_cats);
    while($row_p_cats = mysqli_fetch_array($run_p_cats))
    {
        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];
        
        echo"
        
        <li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>
        
        ";
    }
    
    
    
}


















function getCategory(){
    
    global $db;
    
    $get_cats = "SELECT * FROM categories";
    
    $run_cats = mysqli_query($db, $get_cats);
    while($row_cats = mysqli_fetch_array($run_cats))
    {
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        
        echo"
        
        <li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>
        
        ";
    }
    
    
    
}













function getpcatpro(){
    
    global $db;
    
    if(isset($_GET['p_cat'])){
        
        $p_cat_id = $_GET['p_cat'];
        $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id = '$p_cat_id'";
        $run_p_cat = mysqli_query($db, $get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
       
        
        $get_products = "select * from products where p_cat_id='$p_cat_id'";
        
        $run_products = mysqli_query($db, $get_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            echo "
            
            <div class='box'>
            
            <h1>$p_cat_title</h1>
            
            <p>$p_cat_desc</p>
            
            <h1 class='bg-danger'> No Products Founds In this product category <i class='fas fa-frown'></i></h1>
            
            
            </div>
            
            
            ";
        }
        
        else{
            
            echo "
            
            <div class='box'>
            
            <h1>$p_cat_title</h1>
            
            <p>$p_cat_desc</p>
            
            
            </div>
            
            ";
            
        }
        
        while($row_products = mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['product_id'];
                                $pro_title = $row_products['product_title'];
                                $pro_price = $row_products['product_price'];
                                $pro_img1 = $row_products['product_img1'];
                                
                                
                                echo"
                                
                                
                                <div class='col-md-4 col-sm-6 center-responsive'>

                        <div class='product'>

                            <a href='details.php?pro_id=$pro_id'>
                               <img src='admin/product_images/$pro_img1' alt='product_image' class='img-responsive'>
                               
                           </a>

                            <div class='text'>

                                <h3>
                                    <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                                </h3>

                                <p class='price'>$pro_price /=</p>
                                <p class='button'>

                                    <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                </p>
                            </div>


                        </div>

                    </div>
                                ";
            
            
        }
        
    }
    
    
}







function getcatpro(){
    
    global $db;
    
    if(isset($_GET['cat'])){
        
        $cat_id = $_GET['cat'];
        $get_cat = "SELECT * FROM categories WHERE cat_id = '$cat_id'";
        $run_cat = mysqli_query($db, $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];
        $cat_desc = $row_cat['cat_desc'];
        
       
        
        $get_products = "select * from products where cat_id='$cat_id'";
        
        $run_products = mysqli_query($db, $get_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            echo "
            
            <div class='box'>
            
            <h1>$cat_title</h1>
            
            <p>$cat_desc</p>
            
            <h1 class='bg-danger'> No Products Founds In this product category <i class='fas fa-frown'></i></h1>
            
            
            </div>
            
            
            ";
        }
        
        else{
            
            echo "
            
            <div class='box'>
            
            <h1>$cat_title</h1>
            
            <p>$cat_desc</p>
            
            
            </div>
            
            ";
            
        }
        
        while($row_products = mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['product_id'];
                                $pro_title = $row_products['product_title'];
                                $pro_price = $row_products['product_price'];
                                $pro_img1 = $row_products['product_img1'];
                                
                                
                                echo"
                                
                                
                                <div class='col-md-4 col-sm-6 center-responsive'>

                        <div class='product'>

                            <a href='details.php?pro_id=$pro_id'>
                               <img src='admin/product_images/$pro_img1' alt='product_image' class='img-responsive'>
                               
                           </a>

                            <div class='text'>

                                <h3>
                                    <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                                </h3>

                                <p class='price'>$pro_price /=</p>
                                <p class='button'>

                                    <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                </p>
                            </div>


                        </div>

                    </div>
                                ";
            
            
        }
        
    }
    
    
}





function getRealUserIp(){
    
    switch(true){
            case(!empty($_SERVER['HTTP_X_REAL_IP'])):return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])):return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
    }
    
}

function add_cart(){
    global $db;
    
    if(isset($_GET['add_cart'])){
        $ip_add = getRealUserIp();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['product_qty'];
        $product_size = $_POST['product_size'];
        $product_price = $_POST['product_price'];
        $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check=mysqli_query($db, $check_product);
        if(mysqli_num_rows($run_check)>0){
            echo "
            <script>
            alert('This product is already added in cart, Please choose another');
            </script>
            ";
            
            echo "
            <script>window.open('details.php?pro_id=$p_id', '_self')</script>
            ";
        }
        
        else{
            $query = "INSERT INTO cart(p_id, ip_add, qty, p_price, size) VALUES ('$p_id', '$ip_add',  '$product_qty', '$product_price', '$product_size')";
            
            $run_query = mysqli_query($db, $query);
            echo "
            <script>window.open('details.php?pro_id=$p_id', '_self')</script>
            ";
        }
    }
}




function items(){
    
    global $db;
    
    $ip_add = getRealUserIp();
    $get_items = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_items = mysqli_query($db, $get_items);
    $count_items = mysqli_num_rows($run_items);
    echo "
    $count_items;
    ";
    
}



function total_price(){
    
    global $db;
    
    $ip_add = getRealUserIp();
    $total = 0;
    $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_cart = mysqli_query($db, $select_cart);
    while($record = mysqli_fetch_array($run_cart)){
        $pro_id = $record['p_id'];
        $pro_qty = $record['qty'];
        $p_price = $record['p_price'];
        $get_price = "SELECT * FROM products WHERE product_id='$pro_id'";
        $run_price = mysqli_query($db, $get_price);
        while($row_price=mysqli_fetch_array($run_price)){
            $sub_total = $p_price*$pro_qty;
            $total += $sub_total;  
        }
        
        
    }
    
    echo $total;
    
}





?>
