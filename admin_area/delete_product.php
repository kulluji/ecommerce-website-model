<?php
   include("includes/db.php");
  if(isset($_GET['delete_product']))
  {
      $delete_id=$_GET['delete_product'];
      $qa="delete from products where product_id='$delete_id'";
      $qa_f=mysqli_query($con,$qa);
      if($qa_f)
      { 
          echo "<script>alert('A product has been successfully deleted ! !  !')</script>";
          echo "<script>window.open('index.php?view_products','_self')</script>";
      }
  }
?>