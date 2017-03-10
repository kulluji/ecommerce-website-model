<!DOCTYPE>

    <?php include("includes/db.php"); ?>
    <style>
        *{font-size:19px;font-weight:bold;}
    </style>
    <?php
       if(isset($_GET['edit_product']))
       {
         $product_id=$_GET['edit_product'];
         $qc="select * from products where product_id='$product_id'"; 
         $f_qc=mysqli_query($con,$qc);
         while($f_qcf=mysqli_fetch_array($f_qc))
         {
             $product_title=$f_qcf['product_title'];
             $product_cat=$f_qcf['product_cat'];
             $product_brand=$f_qcf['product_brand'];
             $product_price=$f_qcf['product_price'];
             $product_desc=$f_qcf['product_desc'];
             $product_keywords=$f_qcf['product_keywords'];
             $product_image=$f_qcf['product_image'];    
         }
       }
    ?>
    
    
<body style="background:skyblue;">
    <form action="" method="post" enctype="multipart/form-data" >
       
        <table align="center" width="790" height="600" text-size="20" bgcolor="skyblue">
           
            <tr align="center">
               <td colspan="2"><h1>Edit & update the product</h1></td>
            </tr> 
            <tr>
               <td align="right">Product Title:</td>
                <td><input type="text" name="product_title" value="<?php echo $product_title; ?>"style="border-radius:2px;"></td>
            </tr>
            <tr>
               <td align="right">Product Category:</td>
                <td><select name="product_cat" style="border-radius:4px;">
                    <option><?php echo $product_cat; ?></option>
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
                <option><?php echo $product_brand; ?></option> 
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
                <td><input type="file"  name="product_image" style="border-radius:2px;" value="<?php echo $product_image; ?>"><img src="uploaded_images/<?php echo $product_image ?>" width="120" height="120"></td>
            </tr>
            <tr>
               <td align="right">Product price:</td>
                <td><input type="text" name="product_price" style="border-radius:2px;" value="<?php echo $product_price; ?>" required ></td>
            </tr>
            <tr>
               <td align="right">Product Description:</td>
                <td><textarea cols="20" rows="10" name="product_desc" style="border-radius:2px;"><?php echo $product_desc; ?></textarea></td>
            </tr>
            <tr>
               <td align="right">Product Keywords:</td>
                <td><input type="text" name="product_keywords" style="border-radius:2px;" value="<?php echo $product_keywords; ?>"required></td>
            </tr>
        
            <tr align="center">
                <td colspan="8"><input type="submit" name="update_product" value="Update Product" ></td>
            </tr>
       </table>
    </form>
</body>
<?php
if(isset($_POST['update_product']))
{         
        
        $product_id=$_GET['edit_product'];
     
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
       $qq="UPDATE `products` SET `product_cat`='$product_cat',`product_brand`='$product_brand',`product_title`='$product_title',`product_price`='$product_price',`product_desc`='$product_desc',`product_image`='$product_image',`product_keywords`='$product_keywords' WHERE `product_id`='$product_id'"; 
       
      $f_qq=mysqli_query($con,$qq);
      if($f_qq)
      {
       echo "<script>alert('your product has been updated')</script>"; 
       echo "<script>window.open('index.php?view_products','_self')</script>";
      }
    }
?>






























