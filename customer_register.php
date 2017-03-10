<!DOCTYPE >  
<html>
<head>
   <title>my first e-commerce website</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <?php
         session_start();
         include 'functions/functions.php' ;
         include 'includes/db.php';
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
                    <b style="color:yellow;">Shopping cart-</b>Total Price:<?php total_price(); ?> Total Item: <?php total_items(); ?> <a href="cart.php" style="color:yellow;">Go to Cart</a></span>
                        </div>
                        <form action="customer_register.php" method="post" enctype="multipart/form-data">
                           <table align="center" width="750">
                              <tr>
                                 <td colspan="6"><h2>create an account</h2></td>
                              </tr>
                              <tr>
                                  <td align="right" >Customer Name:</td>
                                  <td><input type="text"  style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_name" required></td>
                              </tr>

                              <tr>
                                  <td align="right">Customer Email:</td>
                                  <td><input type="text" style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_email" required></td>
                              </tr>
                              <tr>
                                  <td align="right">Customer Password:</td>
                                  <td><input type="text" style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;" name="c_password" required></td>
                              </tr>
                               <tr>
                                   <td align="right">Customer Image:</td>
                                  <td><input type="file" style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_image"></td>
                              </tr>
                              <tr>
                                  <td align="right">Customer country:</td>
                                  <td><select style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_country">
                                      <option>india</option><option>russia</option><option>chile</option><option>usa</option><option>finland</option><option>germany</option><option>argentina</option><option>sri lanka</option><option>spain</option></select>
                                  </td>
                              </tr>
                              <tr>
                                  <td align="right">Customer city:</td>
                                  <td><input type="text" style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_city" required></td>
                              </tr>
                              <tr>
                                  <td align="right">Customer Contact:</td>
                                  <td><input type="text" style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_contact" required ></td>
                              </tr>
                              <tr>
                                  <td align="right">Customer Address:</td>
                                  <td><input type="text" style="border-radius:4px; background:black;color:white;;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_address" required></td>
                              </tr>
                               <tr><td colspan="6" align="right"><input type="submit" name="register" style="border-radius:4px; background:black;color:white;height:50px;width:150px;border:2px solid red;color:red;font-size:20px;"  value="Create Account"></td>
                               </tr>
                            </table>
                        </form>

                    </div>
                    <!--content area ends here-->

                    <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy;2016 by www.akansha.com</h2></div>
                    <!--Main Container ends here-->
    </div>
     </div>
    </body>
</html>
<?php
   if(isset($_POST['register']))
   {
       $ip=getip();
       $c_name=$_POST['c_name'];
       $c_email=$_POST['c_email'];
       $c_password=$_POST['c_password'];
       $c_image=$_FILES['c_image']['name'];
       $c_image_tmp=$_FILES['c_image']['tmp_name'];
       $c_country=$_POST['c_country'];
       $c_city=$_POST['c_city'];
       $c_contact=$_POST['c_contact'];
       $c_address=$_POST['c_address'];   
       move_uploaded_file($c_image_tmp,"customer/customer_image/$c_image");
       $qu="insert into customers (customer_ip,customer_name,customer_email,customer_password,customer_country,customer_city,customer_address,customer_image,customer_contact) values('$ip','$c_name','$c_email','$c_password','$c_country','$c_city','$c_address','$c_image','$c_contact')";
       $qu_f=mysqli_query($con,$qu);
       
       $a="select * from cart where ip_add='$ip'";
       $q_a=mysqli_query($con,$a);
       $q_a_rows=mysqli_num_rows($q_a);
       if($q_a_rows==0)
       {
           $_SESSION['customer_email']=$c_email;
           echo "<script>alert('Account has been created successfully, Thanks!')</script>";
           echo "<script>window.open('customer/my_account.php','_self')</script>";
       }
       else
       {
           $_SESSION['customer_email']=$c_email;
           echo "<script>alert('Account has been created successfully, Thanks!')</script>";
           echo "<script>window.open('checkout.php','_self')</script>";
       }
   }
?>