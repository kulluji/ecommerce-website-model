<?php
   include("includes/db.php");
  if(isset($_GET['delete_category']))
  {
      $delete_id=$_GET['delete_category'];
      $qa="delete from categories where cat_id='$delete_id'";
      $qa_f=mysqli_query($con,$qa);
      if($qa_f)
      { 
          echo "<script>alert('A category has been successfully deleted ! !  !')</script>";
          echo "<script>window.open('index.php?view_cats','_self')</script>";
      }
  }
?>