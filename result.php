<!DOCTYPE >  
<html>
<head>
   <title>my first e-commerce website</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <?php
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
           <li><a href="all_products.php">All Products</a></li>
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
            <b style="color:yellow;">Shopping cart-</b>Total Price: Total Item:<a href="cart.php" style="color:yellow;">Go to Cart</a>
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
        <?php
        if(isset($_GET['search']))
        {
           global $con;
           $user_query=$_GET['user_query'];
           $q="select * from products where product_keywords like '%$user_query%'";
           $f_q=mysqli_query($con,$q);
           while($final_q=mysqli_fetch_array($f_q))
           {
               $product_id=$final_q['product_id'];
               $product_cat=$final_q['product_cat'];
               $product_brand=$final_q['product_brand'];
               $product_image=$final_q['product_image'];
               $product_price=$final_q['product_price'];
               $product_desc=$final_q['product_desc'];
               $product_title=$final_q['product_title'];
               $product_keywords=$final_q['product_keywords'];
               echo "<div id='single_product'>
               <h2  style='padding:0px;margin:5px;color:black;'>$product_title</h2>
               <img src='admin_area/uploaded_images/$product_image' width='180' height='180'style='border:2px solid green;' /> 
               <p style='margin:3px;'><b style='margin-left:8px;margin-bottom:8px;color:black;'>Rs $product_price.00</b></p>
               <p style='margin:3px;'><b style='float:left;margin-left:8px;margin-bottom:8px;color:black;'>$product_cat</b></p>
                <p style='margin:3px;'><b style='float:right;margin-right:8px;margin-bottom:8px;color:black;'>$product_brand</b></p>
               <a href='detail.php?prod_id=$product_id' style='clear:both;float:left;text-decoration:none;margin-left:5px;'>Details</a>
               <a href='index.php?prod_id=$product_id'><button style='float:right;margin-right:5px;margin-bottom:5px;' text-decoration='none'>Add to Cart</buttton></a>
              </div>
        ";
        }}
     ?>
  
    </div>
    <!--content area ends here-->
        
  <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy;2016 by www.akansha.com</h2></div>
<!--Main Container ends here-->
</div>
</body>    
</html>