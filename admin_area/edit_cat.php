<!DOCTYPE>
<?php 
     include("includes/db.php");
       if(isset($_GET['edit_cat']))
       {
         $cat_id=$_GET['edit_cat'];
         $qc="select * from categories where cat_id='$cat_id'"; 
         $f_qc=mysqli_query($con,$qc);
         while($f_qcf=mysqli_fetch_array($f_qc))
         {
             $cat_title=$f_qcf['cat_title'];   
         }
       }
    ?>    
<body style="background:skyblue;">
    <form action="" method="post" enctype="multipart/form-data" >
        <table align="center" text-size="20" bgcolor="skyblue">
            <tr align="center">
               <td colspan="2"><h1>Edit & update the category</h1></td>
            </tr> 
            <tr>
               <td align="right">category Title:</td>
                <td><input type="text" name="cat_title" value="<?php echo $cat_title; ?>"style="border-radius:2px;"></td>
            </tr>  
            <tr align="center">
                <td colspan="8"><input type="submit" name="update_cat" value="Update Category" ></td>
            </tr>
       </table>
    </form>
</body>
<?php
if(isset($_POST['update_cat']))
{      
       $cat_title=$_POST['cat_title'];
       $qqq="UPDATE `categories` SET `cat_title`='$cat_title' WHERE `cat_id`='$cat_id'";
       $f_qqq=mysqli_query($con,$qqq);
       if($f_qqq)
       {
         echo "<script>alert('your category has been updated successfully')</script>"; 
         echo "<script>window.open('index.php?view_cats','_self')</script>";
       }
}
?>