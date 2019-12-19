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
            	<li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
				<li><a href="my_account.php">My Account</a></li>
				<li><a href="user_register.php">Sign up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            	<div>
                	<form method="get" action="results.php" enctype="multipart/form-data">
                	  <input type="text" name="user_query" placeholder="Search a products"/>
               	      <input type="submit" name="Search" value="Search" class="btn btn-primary"/>
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
          	<?php
			
			cart();
			
			?>
            <div id="headline">
            	<div id="headline_content">
                	<b>Welcome User!</b>
                	<b style="color:#FF0;">Shopping Cart: </b>
                	<span> - Total Items: <?php items();?> - Totals Price:<?php total_price(); ?><a href="cart.php"><button class="btn btn-link">Go to Cart</button></a>
                    
                    <a href="logout.php"><button class="btn btn-link">logout</button></a>
                    </span>
                
                
                </div>
            </div>
            
            	<div id="products_box">
            		<?php 
					
					
					getPro(); 
					getCatPro();
					getBrandPro();
					
					?>
           		 </div>
        
        </div>
        <!--Content wrapper ends-->
        <div class="footer">
          <pre style="color:#FFFFFF; padding-top:30px; text-align:center; font-size:19px">Developed By Faraz Ahmed,03332318395</pre>
        
        </div>
    
    
    
    
    
    
    
    
    </div>
	<!--Main container starts-->











</body>
</html>