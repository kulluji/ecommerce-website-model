<form action="" method="post" style="align:center;">
 <table style="align:center;margin-top:10px">  
  
  <tr>
    <td style="align:left;">enter current password</td>
    <td align="right"><input type="text" name="current_password"></td>
  </tr>
  <tr>
    <td style="align:left;">enter new password</td>
    <td align="right" style="align:right;"><input type="text" name="new_password"></td>
  </tr>
  <tr>
    <td style="align:left;">enter new password again</td>
    <td align="right" style="align:right;"><input align="right" style="margin-left:20px;" type="text" name="new_password_again"></td>
      
  </tr>
     <tr >
    <td colspan="2"  align="center"><input type="submit" value="change Password" name="change"></td>
  </tr>
 </table>
</form>

<?php
include("includes/db.php");
if(isset($_POST['change']))
{
    $user=$_SESSION['customer_email'];
    $current_password=$_POST['current_password'];
    $new_password=$_POST['new_password'];
    $new_password_again=$_POST['new_password_again'];
    $qwe="select * from customers where customer_email='$user' AND customer_password='$current_password'";
    $qwe_f=mysqli_query($con,$qwe);
     $row_counts=mysqli_num_rows($qwe_f);
        if($row_counts==0)
        {
            echo "<script>alert('your current password is wrong')</script>"; 
            exit();
        }
        if($new_password!=$new_password_again)
        {
                echo "<script>alert('botn password doesnt match')</script>";
                exit();
        }
        else
        {
           $qwew="update customers set customer_password='$new_password' where customer_email='$user'";
           $qwew_f=mysqli_query($con,$qwew);
           if($qwew_f)
           { 
              echo "<script>alert('your current password is changed successfully and you need to login agaibn with new password')</script>"; 
              echo "<script>window.open('../checkout.php','_self')</script>";
               session_destroy();
           }
        }
        
}
?>