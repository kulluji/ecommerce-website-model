<?php
   include("includes/db.php");
  if(isset($_GET['delete_customer']))
  {
      $delete_id=$_GET['delete_customer'];
      $qa="delete from customers where customer_id='$delete_id'";
      $qa_f=mysqli_query($con,$qa);
      if($qa_f)
      { 
          echo "<script>alert('A customer record  has been successfully deleted ! !  !')</script>";
          echo "<script>window.open('index.php?view_customers','_self')</script>";
      }
  }
?>