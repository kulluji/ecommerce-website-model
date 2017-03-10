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
        <b style="color:yellow;">Shopping cart-</b> Total Price:<?php total_price(); ?> Total Item: <?php total_items(); ?> <a href="cart.php" style="color:yellow;">Go to Cart</a>
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
            <?php getpro(); ?>
            <?php getcatpro(); ?>
            <?php getbrandpro(); ?>
            <?php search(); ?>
    </div>
    <!--content area ends here-->
        
  <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy;2016 by www.akansha.com</h2></div>
<!--Main Container ends here-->
</div>
     </div>
</body>    
</html>