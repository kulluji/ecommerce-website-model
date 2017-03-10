<?php
  include("includes/db.php");
?>

<div>
   <form method="post" action="">
      <table width="500" align="center" bgcolor="skyblue">
         <tr align="center">
             <td><h2>login or register to buy !!</h2></td>
         </tr>
         
          <tr>
             <td>Email:</td>
             <td><input type="text" name="email" placeholder="enter email" required></td>
         </tr>
          
         <tr>
             <td>Password:</td>
             <td><input type="password" name="password" placeholder="enter password" required></td>
         </tr>
         <tr>
           <td><a href="checkout.php?forgot_pass" style="text-decoration:none;">Forgot Password?</a></td>
         </tr>
         <tr>
            <td colspan="4" align="center"><input type="submit" name="login" value="login"></td>
         </tr>
      </table>
      <div id="sidebar" style="width=20%;float:right;" >
         <div class="fb-login-button"></div>
      </div>
       <h2 style="float:right;"><a href="customer_register.php" style="background-color:white;text-color:white;text-decoration:none;">New user? Register</a></h2>
   </form>
</div>
<?php
 if(isset($_POST['login']))
 {
     $customer_email=$_POST['email'];
     $customer_password=$_POST['password'];
     $q="select * from customers where customer_password='$customer_password' and customer_email='$customer_email'";
     $q_f = mysqli_query($con,$q);
     $q_f_rows=mysqli_num_rows($q_f);
     if($q_f_rows==0)
     {
         echo "<script>alert('Password or Email is incorrect! plz try again')</script>";
         exit();
     }
     $ip=getip();
     $d="select * from cart where ip_add='$ip'";
     $q_d=mysqli_query($con,$d);
     $q_d_rows=mysqli_num_rows($q_d);
     
     if($q_f_rows>0 and $q_d_rows==0)
     {
       $_SESSION['customer_email']=$customer_email;
         echo "<script>alert('you logged in sucessfully successfully,Thanks')</script>";
         echo "<script>window.open('customer/myaccount.php','_self')</script>";
     }
     else
     {
       $_SESSION['customer_email']=$customer_email;
         echo "<script>alert('you logged in sucessfully successfully,ThanksThanksThanksThanksThanksThanksThanksThanksThanks')</script>";
         echo "<script>window.open('checkout.php','_self')</script>";
     }
 }
?>