   
            <?php
                    include("includes/db.php");
                    $user=$_SESSION['customer_email'];
                    $d="select * from customers where customer_email='$user'";
                    $d_f=mysqli_query($con,$d);
                    $d_f_row=mysqli_fetch_array($d_f);
                    $c_id=$d_f_row['customer_id'];
                    $c_image=$d_f_row['customer_image'];
                    $c_name=$d_f_row['customer_name'];
                    $c_email=$d_f_row['customer_email'];
                    $c_password=$d_f_row['customer_password'];
                    $c_country=$d_f_row['customer_country'];
                    $c_city=$d_f_row['customer_city'];
                    $c_address=$d_f_row['customer_address'];
                    $c_contact=$d_f_row['customer_contact'];
                                       
            ?>
     <form action="" method="post" enctype="multipart/form-data">
        <table align="center" width="750">
          <tr>
             <td colspan="6"><h2>create an account</h2></td>
          </tr>
          <tr>
             <td align="right" >Customer Name:</td>
             <td><input type="text"  style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_name" value="<?php echo $c_name ?>" required></td>
           </tr>
           <tr>
              <td align="right">Customer Email:</td>
              <td><input type="text" style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_email" value="<?php echo $c_email ?>" required></td>
           </tr>
           <tr>
              <td align="right">Customer Password:</td>
              <td><input type="text" style="border-radius:4px;background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;" name="c_password" value="<?php echo $c_password ?>" required></td>
           </tr>
           <tr>
              <td align="right">Customer Image:</td>
              <td><input type="file" style="border-radius:4px;background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_image"><img src="customer_image/<?php echo $c_image ?>" width="150" height="150" style="position:relative; left:25px;"> </td>
           </tr>
           <tr>
             <td align="right">Customer country:</td>
             <td><select style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_country" disabled>
                 <option><?php echo $c_country ?></option>
                 <option>india</option>
                 <option>russia</option>
                 <option>chile</option>
                 <option>usa</option>
                 <option>finland</option>
                 <option>germany</option>
                 <option>argentina</option>
                 <option>sri lanka</option>
                 <option>spain</option>
                 </select>
                 </td>
          </tr>
          <tr>
             <td align="right">Customer city:</td>
             <td><input type="text" style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_city" value="<?php echo $c_city ?>" required></td> 
          </tr>
          <tr>
            <td align="right">Customer Contact:</td>
            <td><input type="text" style="border-radius:4px; background:black;color:white;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_contact" value="<?php echo $c_contact ?>" required ></td>
          </tr>
          <tr>
            <td align="right">Customer Address:</td>
            <td><input type="text" style="border-radius:4px; background:black;color:white;;height:30px;width:300px;border:2px solid red;color:red;font-size:20px;"name="c_address" value="<?php echo $c_address ?>" required></td>
          </tr>
          <tr>
            <td colspan="6" align="right"><input type="submit" name="update" style="border-radius:4px; background:black;color:white;height:50px;width:150px;border:2px solid red;color:red;font-size:20px;"  value="Update Account"></td>
          </tr>
        </table>
    </form>
<?php
   if(isset($_POST['update']))
   {
       $ip=getip();
       $c_id=$c_id;
       $c_name=$_POST['c_name'];
       $c_email=$_POST['c_email'];
       $c_password=$_POST['c_password'];
       $c_image=$_FILES['c_image']['name'];
       $c_image_tmp=$_FILES['c_image']['tmp_name'];
       $c_country=$_POST['c_country'];
       $c_city=$_POST['c_city'];
       $c_address=$_POST['c_address'];   
      
       move_uploaded_file($c_image_tmp,"customer_image/$c_image");
       
       $qu="update customers set customer_name='$c_name',customer_email='$c_email', customer_password='$c_password', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' where customer_id='$c_id'"; 
       $qu_f=mysqli_query($con,$qu);
       if($qu_f)
       {
         echo "<script>alert('Your account successfully updated')</script>";
         echo "<script>window.open('myaccount.php','_self')</script>";
       }
   }
?>

