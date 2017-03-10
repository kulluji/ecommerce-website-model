<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if(mysqli_connect_errno())
{echo "failed to connect to database" . mysqli_connect_error();}

//getting the categories

function getCats()
{
   global $con;
   $q = "SELECT * FROM `categories`";
   $q_run = mysqli_query($con,$q);
   while($q_run_row = mysqli_fetch_array($q_run))
   {
         $cat_id=$q_run_row['cat_id'];
        $cat_tit=$q_run_row['cat_title'];
        echo "<li><a href='index.php?cat=$cat_id'>$cat_tit</a></li>";
   }
}

function getBrands()
{
     global $con;
     $q="select * from brands";
     $q_run=mysqli_query($con,$q);
     while($q_run_row=mysqli_fetch_array($q_run)) 
     {  $brand_id=$q_run_row['brand_id']; 
        $brand_tit=$q_run_row['brand_title']; 
        echo "<li><a href='index.php?brand=$brand_id'>$brand_tit</a></li>"; 
     	}
}


//getting the user ip address                                         

function getip()
{
   $ip=$_SERVER['REMOTE_ADDR'];
    
   if(!empty($_SERVER['HTTP_CLIENT_IP']))
      {
         $ip=$_SERVER['HTTP_CLIENT_IP'];
      }
    else
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    return $ip;
}

//creating the cart

function cart()
{
    global $con;
    if(isset($_GET['add_cart']))
    {
        $ip=getip();
        $pro_id=$_GET['add_cart'];
        $r="select * from cart where ip_add='$ip' AND p_id='$pro_id'"; 
        $r_f=mysqli_query($con,$r);
        if(mysqli_num_rows($r_f)>0)
        {
            echo "";
        }
        else
        {  $s=1;
          $insert_q="insert into cart(p_id,ip_add,qty) values('$pro_id','$ip','$s')";
            mysqli_query($con,$insert_q);
            echo"<script>window.open('index.php','_self')</script>";
        }
    }
}

//getting the total items

function total_items()
{
    if(isset($_GET['add_cart']))
    {
       global $con;
       $ip=getip();
       $t="select * from cart where ip_add='$ip'";
       $t_f=mysqli_query($con,$t);
       $count=mysqli_num_rows($t_f);
       echo "<b style='color:red;'>$count</b>";
    }
    else
    {
       global $con;
       $ip=getip();
       $t="select * from cart where ip_add='$ip'";
       $t_f=mysqli_query($con,$t);
       $count=mysqli_num_rows($t_f);
       echo "<b style='color:red;'>$count</b>";
    }
}

//getting the total price
function total_price()
{
        global $con;
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
                  $sum=$sum+$product_price;
                }                
        }
            echo "<b style='color:red;'>$sum</b>";
}

function getpro()
{
  if(!isset($_GET['cat']))
  {
     if(!isset($_GET['brand']))
     {
        if(!isset($_GET['search']))
        {
         global $con;
        $q="select * from products order by rand() limit 0,6";
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
                 <a href='index.php?add_cart=$product_id'><button style='float:right;margin-right:5px;margin-bottom:5px;' text-decoration='none'>Add to Cart</buttton></a>
              </div>
        ";
        }
     }
  }}}
    function getcatpro()
    {
  if(isset($_GET['cat']))
  {
     if(!isset($_GET['brand']))
     {
        if(!
            isset($_GET['search']))
        {
        $cat=$_GET['cat'];
        global $con;
        $w="select * from categories where cat_id='$cat'";
        $f_w=mysqli_query($con,$w);
        while($final_w=mysqli_fetch_array($f_w))
        {
           $cat_title=$final_w['cat_title'];
        
        $q="select * from products where product_cat='$cat_title'";
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
                 <a href='index.php?add_cart=$product_id'><button style='float:right;margin-right:5px;margin-bottom:5px;' text-decoration='none'>Add to Cart</buttton></a>
              </div>
        ";
        }}
     }
  }}}
    function getbrandpro()
    {
  if(isset($_GET['brand']))
  {
     if(!isset($_GET['cat']))
     { 
        if(!isset($_GET['search']))
        {
        $brand=$_GET['brand'];
        global $con;
        $e="select * from brands where brand_id='$brand'";
        $f_e=mysqli_query($con,$e);
        $count=mysqli_num_rows($f_e);
         echo $count;
          if($count==0)
           {
              echo "<h1>no product found</h1>";
            }
   
        while($final_e=mysqli_fetch_array($f_e))
        {
          $brand_title=$final_e['brand_title'];
          $q="select * from products where product_brand='$brand_title'";
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
                 <a href='index.php?add_cart=$product_id'><button style='float:right;margin-right:5px;margin-bottom:5px;' text-decoration='none'>Add to Cart</buttton></a>
              </div>
        ";
        }
     }
     }
  }}}
function search()
{     if(isset($_GET['search']))
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
               <a href='index.php?add_cart=$product_id'><button style='float:right;margin-right:5px;margin-bottom:5px;' text-decoration='none'>Add to Cart</buttton></a>
              </div>
        ";
        }}

}
?>
