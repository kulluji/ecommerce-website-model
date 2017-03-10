<!DOCTYPE>
<?php 
     include("includes/db.php");
       if(isset($_GET['edit_brand']))
       {
         $brand_id=$_GET['edit_brand'];
         $qc="select * from brands where brand_id='$brand_id'"; 
         $f_qc=mysqli_query($con,$qc);
         while($f_qcf=mysqli_fetch_array($f_qc))
         {
             $brand_title=$f_qcf['brand_title'];   
         }
       }
    ?>    
<body style="background:skyblue;">
    <form action="" method="post" enctype="multipart/form-data" >
        <table align="center" text-size="20" bgcolor="skyblue">
            <tr align="center">
               <td colspan="2"><h1>Edit & update the brand</h1></td>
            </tr> 
            <tr>
               <td align="right">category brand:</td>
                <td><input type="text" name="brand_title" value="<?php echo $brand_title; ?>"style="border-radius:2px;"></td>
            </tr>  
            <tr align="center">
                <td colspan="8"><input type="submit" name="update_brand" value="Update Brand" ></td>
            </tr>
       </table>
    </form>
</body>
<?php
if(isset($_POST['update_brand']))
{      
       $brand_title=$_POST['brand_title'];
       $qqq="UPDATE `brands` SET `brand_title`='$brand_title' WHERE `brand_id`='$brand_id'";
       $f_qqq=mysqli_query($con,$qqq);
       if($f_qqq)
       {
         echo "<script>alert('your brand has been updated successfully')</script>"; 
         echo "<script>window.open('index.php?view_brands','_self')</script>";
       }
}
?>