<!DOCTYPE >  
<html>
<head>
   <title>my first e-commerce website</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <?php
         session_start();
         include 'functions/functions.php' ;
    ?>
</head>
 <body>
<!--Main Container starts here-->
<div class="main_wrapper">
    
    <!--header starts here-->
  <div class="header_wrapper">
    <a href="index.php"><img id="logo" src="images/logo.jpg"></a>
    <img id="banner" src="images/ad_banner.jpg">       
  </div> 
    <!--Header ends here-->
    
    <!--Navigaton bar starts here-->
  <div class="menubar">
      <ul id="menu">
           <li><a href="index.php">Home</a></li>
           <li><a href="all_product.php">All Products</a></li>
           <li><a href="customer/myaccount.php">My Account</a></li>
           <li><a href="#">Sign Up</a></li>
           <li><a href="cart.php">Shopping Cart</a></li>
           <li><a href="#">Contact Us</a></li>
           <li><div id="form">
                   <form method="get" action="" enctype="multipart/form-data">
                      <input type="text" name="user_query" placeholder="Search a Product">
                      <input type="submit" name="search" value="search">
                   </form></div></li>
      </ul> 
 </div>
    <!--Navigatation bar ends here-->
    
    
  <!--content wrapper starts -->
    <div class="content_wrapper">
         <div id="sidebar">
            <div id="sidebar_title">Categories</div>
            <ul id="cats">
                 <?php getCats(); ?>
            </ul>
            
             <div id="sidebar_title">Brands</div>
             <ul id="cats">
               <?php getBrands(); ?>
             </ul>        
        </div>

    <!--content area starts here-->
    <div id="content_area">
        <?php cart(); ?>
        <div id="shopping_cart">
        <span style="float:right;font-size:16px;line-height:40px;font-weight:bold;">
             <?php 
            if(isset($_SESSION['customer_email']))
            {
                echo "<b>Welcome:</b>" .$_SESSION['customer_email']."<b style='color:yellow;'>Your</b>";
            }
            else
            {
                echo "<b>Welcome Guest:</b>";
            }
            ?>
            <b style="color:yellow;">Shopping cart-</b>Total Price:<?php total_price(); ?> Total Item: <?php total_items(); ?> <a href="index.php" style="color:yellow;">Back to shop</a>
             <?php 
          if(!isset($_SESSION['customer_email']))
          {
              echo "<a href='checkout.php'>Login</a>";
          }
          else
          {
             echo "<a href='logout.php'>Logout</a>";
          }
        ?>
          
            </span></div>
        <div id="products_box">
           <form action="" method="post" enctype="multipart/form-data">
              <table align="center" border="2 solid black" bgcolor="pink" width="700">
                 <tr>
                   <td colspan="4" align="center"><h2>update your cart or checkout</h2></td>
                 </tr>    
                 <tr>
                   <th>remove</th>
                   <th>product(s)</th>
                   <th>quantity</th>
                   <th>total price</th>
                 </tr>
                   <?php global $con;
                    $ip=getip();
                    $y="select * from cart where ip_add='$ip'"; 
                    $y_f=mysqli_query($con,$y);
                    $sum=0;
                    while($y_run_row=mysqli_fetch_array($y_f))
                    {    
                            $p_id=$y_run_row['p_id'];
                            $u="select * from products where product_id='$p_id'";
                            $u_q=mysqli_query($con,$u);
                            while($final_u=mysqli_fetch_array($u_q))
                            {
                              $product_price=$final_u['product_price'];
                              $product_title=$final_u['product_title'];
                              $product_image=$final_u['product_image'];
                              $single_price=$final_u['product_price'];
                              ?>
                              <tr align="center">
                                <td><input type="checkbox" name="remove[]" value="<?php echo $p_id; ?>"></td>
                                <td style="font-color:black;"><?php echo $product_title ?><br><img src="admin_area/uploaded_images/<?php echo $product_image ?>" width="60" height="60"></td>
                                <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']?>"> </td>
                                  <?php 
                                     if(isset($_POST['update_cart']))
                                     {
                                         $qty=$_POST['qty'];
                                         $i="update cart set qty='$qty'";
                                         $sum=$sum+$product_price*$qty;
                                         $i_f=mysqli_query($con , $i);
                                         $_SESSION['qty']=$qty; 
                                         echo "<script>window.open('cart.php','_self')</script>";
                                     } 
                                  ?>
                                <td><?php echo "Rs $single_price"; ?></td>
                              </tr>
                          <?php  }  
                    } ?>
                   <tr>
                      <td colspan="4" align="right" style="line-height:25px;padding:5px 0 5px 0;" ><p style="margin-right:8px;"><b>Sub total:</b><?php echo "$sum"; ?></p></td>
                  </tr>
                  <tr align="center">
                     <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
                     <td colspan="1"><input type="submit" name="continue" value="continue Shopping"></td>
                      <td colspan="1"><button><a href="checkout.php" style="text-decoration:none;color:black;">Check Out</a></button></td>
                  </tr>                                    
            </table> 
            </form>        
        </div>
    </div>
    <?php 
        
            $ip=getip();
            if(isset($_POST['update_cart']))
            {
               foreach($_POST['remove'] as $remove_id)
               { 
                 $delete_product="delete from cart where ip_add='$ip' and p_id='$remove_id'";
                  $q_f= mysqli_query($con,$delete_product);
                   if($q_f)
                   {
                     echo "<script>window.open('cart.php','_self')</script>";
                   }
               }
            }
            if(isset($_POST['continue']))
            {
                echo "<script>window.open('index.php','_self')</script>";
            }
    ?>
    <!--content area ends here-->
        
  <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy;2016 by www.akansha.com</h2></div>
<!--Main Container ends here-->
</div>
     </div>
</body>    
</html>
    
    
    
    
    
    
    
    
    
    