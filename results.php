<?php

include("includes/db.php");
include("functions/functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Meri Dukaan</title>
<link rel="stylesheet" href="styles/bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>

	<!--Main container starts-->
    <div class="main_wrapper"> 
    
    
		<!--Header starts-->    
    	<div class="header_wrapper">
        	<a href="index.php"><img src="Images/Untitled.png" style="float:left;" /></a>
            <img src="Images/Untitled ad.png" style="float:right;"/>
        
        
        
        </div>
       <!--Header ends--> 
       <!--Nevigation bar starts-->
        <div id="navbar">        	
        	<ul id="menu">
            	<li><a href="index.php">Home</a>
                <li><a href="all_products.php">All Products</a>
				<li><a href="my_account.php">My Account</a>
				<li><a href="user_register.php">Sign up</a>
				<li><a href="cart.php">Shopping Cart</a>
                <li><a href="contact.php">Contact Us</a>
            </ul>
            	<div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                	  <input type="text" name="user_query" placeholder="Search a products"/>
               	      <input type="submit" name="Search" value="Search"/>
               	  </form>
                </div>
         </div>
        <!--Nevigation bar ends-->
        <!--Content wrapper starts-->
        <div class="content_wrapper">
        	<div id="left_contant">
            	<div id="sidebar_title">Categories</div>
                <ul id="cats">
					<?php getCats();?>
            	</ul>
            <div id="sidebar_title">Brands</div>
            
            	 <ul id="cats">
               	 	<?php getBrands();?>
           	    </ul>
        	</div>
        	<div id="right_contant">
          	
            <div id="headline">
            	<div id="headline_content">
                	<b>Welcome User!</b>
                	<b style="color:#FF0;">Shopping Cart: </b>
                	<span> - Items: - Price:</span>
                
                
                </div>
            </div>
            
            
          
            	<div id="products_box">
            		<?php 
					
					
				if(isset($_GET['search'])){
				
					$user_keyword = $_GET['user_query'];
					
				$get_products = "select * from products where product_keywords like '%$user_keyword%'";
			
					$run_products = mysqli_query($con, $get_products);
			
					while ($row_products=mysqli_fetch_array($run_products)){
				
					$pro_id = $row_products['product_id'];				
					$pro_title = $row_products['product_title'];
					$pro_cat = $row_products['cat_id'];
					$pro_brand = $row_products['brand_id'];
					$pro_desc = $row_products['product_desc'];
					$pro_price = $row_products['product_price'];
					$pro_image = $row_products['product_img1'];
				
					echo "
					<div id='single_product'>
				
				
					<h3>$pro_title</h3>
						
					<img src='admin_area/products_images/$pro_image' width='180' height='180'/><br>
					
					<p><b> Price: RS:$pro_price </b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
					
					
					</div>
					";
				
				
					}
			
				}
					
					?>
           		 </div>
         
        
        </div>
        <!--Content wrapper ends-->
        <div class="footer">
        <h1 style="color:#FFFFFF; padding-top:30px; text-align:center; font-size:24px">Developed By Faraz Ahmed , 03332318395</h1>
        
        </div>
    
    
    
    
    
    
    
    
    </div>
	<!--Main container starts-->











</body>
</html>