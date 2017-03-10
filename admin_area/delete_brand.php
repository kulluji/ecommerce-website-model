<?php
   include("includes/db.php");
  if(isset($_GET['delete_brand']))
  {
      $delete_id=$_GET['delete_brand'];
      $qa="delete from brands where brand_id='$delete_id'";
      $qa_f=mysqli_query($con,$qa);
      if($qa_f)
      { 
          echo "<script>alert('A brand has been successfully deleted ! !  !')</script>";
          echo "<script>window.open('index.php?view_brands','_self')</script>";
      }
  }
?>