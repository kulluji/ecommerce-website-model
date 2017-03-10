<html>
  <head>
      <link href="style/style.css" type="text/css" rel=stylesheet ="all">
      <title>admin panel</title>
  </head>

    
<body>
    <div class="main_wrapper">
       <div id="header"></div>
       <div id="right">
           <h2 style="text-align:center">manage content</h2>
            <a href="index.php?insert_product">insert New Product</a>
            <a href="index.php?view_products">View All Product</a>
            <a href="index.php?insert_cat">insert New Category</a>
            <a href="index.php?view_cats">View All Categories</a>
            <a href="index.php?insert_brand">insert New Brand</a>
            <a href="index.php?view_brands">View All Brands</a>
           <a href="index.php?view_customers">View Customers</a>
           <a href="index.php?view_orders">View Orders</a>
           <a href="index.php?view_payments">View Payment</a>
           <a href="logout.php">Admin Logout</a>
        </div>
       <div id="left">
        <?php
         if(isset($_GET['insert_product']))
         {
           include("insert_product.php");  
         }
          if(isset($_GET['view_products']))
         {
           include("view_products.php");  
         }   
         if(isset($_GET['edit_product']))
         {
             include("edit_product.php");
         }
         if(isset($_GET['delete_product']))
         {    
             include("delete_product.php");
         }     
         if(isset($_GET['insert_cat']))
         {
            include("insert_cat.php");
         }
         if(isset($_GET['view_cats']))
         {
            include("view_cats.php");
         }
         if(isset($_GET['edit_cat']))
         {   
             include("edit_cat.php");
         }
         if(isset($_GET['insert_brand']))
         {
            include("insert_brand.php");
         }
         if(isset($_GET['view_brands']))
         {
            include("view_brands.php");
         }
         if(isset($_GET['edit_brand']))
         {
             include("edit_brand.php");
         }
         if(isset($_GET['delete_brand']))
         {    
             include("delete_brand.php");
         }       
         if(isset($_GET['delete_category']))
         {  
             include("delete_category.php");
         }     
         if(isset($_GET['view_customers']))
         {
            include("view_customers.php");
         }
         if(isset($_GET['delete_customer']))
         {    
             include("delete_customer.php");
         }       
        ?>
       </div>
    </div>
</body>

</html>