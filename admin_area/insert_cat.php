<form action="" method="POST">
     <table>
         <tr>
           <td colspan="2"><h1>Enter the Category that you want to add</h1></td>
         </tr>
         <tr>
             <td><h3>Category:</h3></td>
           <td><input type="text" name="new_cat"></td>
         </tr>
         <tr></tr>
         <tr >
           <td colspan="2" align="center" style="margin-top:10px;"><input type="submit" name="add_cat" value="Add Category" style="margin-top:10px;">
           </td>
         </tr>
    </table>
</form>
<?php 
  include("includes/db.php");

   if(isset($_POST['add_cat']))
   {
       $new_cat=$_POST['new_cat'];
       $qt="insert into categories (cat_title) values ('$new_cat')";
       $qt_a=mysqli_query($con,$qt);
       if($qt_a)
       {
            echo "<script>alert('A category has been added successfully')</script>";
          echo "<script>window.open('index.php?view_cats','_self')</script>";
       }
   }
?>