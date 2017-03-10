<form action="" method="POST">
     <table>
         <tr>
           <td colspan="2"><h1>Enter the brand that you want to add</h1></td>
         </tr>
         <tr>
             <td><h3>Brand:</h3></td>
           <td><input type="text" name="new_brand"></td>
         </tr>
         <tr >
           <td colspan="2" align="center" style="margin-top:10px;"><input type="submit" name="add_brand" value="Add Brand" style="margin-top:10px;">
           </td>
         </tr>
    </table>
</form>
<?php 
  include("includes/db.php");

   if(isset($_POST['add_brand']))
   {
       $new_brand=$_POST['new_brand'];
       $qt="insert into brands (brand_title) values ('$new_brand')";
       $qt_a=mysqli_query($con,$qt);
       if($qt_a)
       {
            echo "<script>alert('A brand has been added successfully')</script>";
          echo "<script>window.open('index.php?view_brands','_self')</script>";
       }
   }
?>