   <?php include("includes/db.php");?>
    <style>
        *{font-size:19px;font-weight:bold;}
    </style>
<body style="background:skyblue;">
    <form action="insert_product.php" method="post" enctype="multipart/form-data" >
       
        <table align="center" width="790" height="600" text-size="20" bgcolor="skyblue">
           
            <tr align="center">
               <td colspan="8"><h2>Insert new product here</h2></td>
            </tr> 
            <tr>
               <td align="right">Product Title:</td>
                <td><input type="text" name="product_title" style="border-radius:2px;"></td>
            </tr>
            <tr>
               <td align="right">Product Category:</td>
                <td><select name="product_cat" style="border-radius:4px;">
                    <option>Select a category </option>
                  <?php 
                       global $con;
                       $q = "SELECT * FROM `categories`";
                       $q_run = mysqli_query($con,$q);
                       while($q_run_row = mysqli_fetch_array($q_run))
                      {    
                         $cat_tit=$q_run_row['cat_title'];
                         echo "<option>$cat_tit</option>";
                      }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
               <td align="right">Product Brand:</td>
                <td><select name="product_brand" style="border-radius:2px;" >
                <option>select a brand</option> 
                <?php 
                    global $con;
                    $q="select * from brands";
                    $q_run=mysqli_query($con,$q);
                    while($q_run_row=mysqli_fetch_array($q_run)) 
                    {  
                        $brand_tit=$q_run_row['brand_title']; 
                        echo "<option>$brand_tit</option>"; 
             	     }
                 ?>
                    </select>
                </td>
            </tr>
            <tr>
               <td align="right">Product Image:</td>
                <td><input type="file"  name="product_image" style="border-radius:2px;"></td>
            </tr>
            <tr>
               <td align="right">Product price:</td>
                <td><input type="text" name="product_price" style="border-radius:2px;" required ></td>
            </tr>
            <tr>
               <td align="right">Product Description:</td>
                <td><textarea cols="20" rows="10" name="product_desc" style="border-radius:2px;"></textarea></td>
            </tr>
            <tr>
               <td align="right">Product Keywords:</td>
                <td><input type="text" name="product_keywords" style="border-radius:2px;" required></td>
            </tr>
        
            <tr align="center">
                <td colspan="8"><input type="submit" name="insert_post" value="Click to Submit" ></td>
            </tr>
       </table>
    </form>
</body>
<?php
if(isset($_POST['insert_post']))
{         
        //getting the text data from fields
        
        $product_title=$_POST['product_title'];
        $product_cat=$_POST['product_cat'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_desc=$_POST['product_desc'];
        $product_keywords=$_POST['product_keywords'];
        
        //getting the image data from field
        $product_image=$_FILES['product_image']['name'];
        $product_image_tmp=$_FILES['product_image']['tmp_name'];
        move_uploaded_file($product_image_tmp,"uploaded_images/$product_image");
       $q="insert into products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')"; 
       
      $f_q=mysqli_query($con,$q);
      if($f_q)
      {
       echo "<script>alert('your product has been added')</script>"; 
       echo "<script>window.open('index.php?view_products','_self')</script>";
      }
    }
?>