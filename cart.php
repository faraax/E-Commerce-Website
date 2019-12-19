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
                     &nbsp;<a href="logout.php"><button class="btn btn-link">logout</button></a></span>
                
                
                </div>
            </div>
            
            	<div id="products_box">
                <form action="cart.php" method="post" enctype="multipart/form-data">
                <div class="container">
 				<h2>Products in your cart</h2>
  					<p></p><br>           
  						<table class="table table-striped" bgcolor="#FFFFFF" align="center">
    						<thead>
      							<tr>
        						<th align="center"><b>Remove from cart</b></th>
        						<th align="center"><b>Product title</b></th>
        						<th align="center"><b>Image</b></th>
        						<th align="center"><b>Quantity</b></th>
                                <th align="center"><b>Product price</b></th>
  							    </tr>	
   							 </thead>
    				<tbody>
    <?php               
    $ip_add = getRealIpAddr();
	
	$total = 0;
	
	$sel_price = "select * from cart where ip_add = '$ip_add'";
	
	$run_price = mysqli_query ($con, $sel_price);
	
	while ($record=mysqli_fetch_array($run_price)){
		
		$pro_id = $record['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id' ";
		
		$run_pro_price = mysqli_query($db,$pro_price);
		
		while($p_price=mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($p_price['product_price']);
			
			$values = array_sum($product_price);
			$product_title = $p_price['product_title'];
			$product_image = $p_price['product_img1'];
			$only_price = $p_price['product_price'];
			
			$total +=$values;
		
		
	
?>
      							<tr>
                                	<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"/></td>
                                	<td align="center"><?php echo $product_title; ?></td> 
                                	<td align="center"><img src="admin_area/products_images/<?php echo $product_image; ?>" height="80" width="80"</td></td>
                                	<td><input type="number" name="qty" value="1"size="3"/></td
                                    ><?php
										if(isset($_POST['update']))
										{
											$qty = $_POST['qty'];
										
											$insert_qty = "update cart set qty='$qty' where ip_add='$ip_add'";
										
											$run_qty = mysqli_query ($con , $insert_qty);
										
											$total = $total*$qty;	
										
										
									}
									
									
									?>
									                             
                                    <td align="center"><?php echo "RS . " . $only_price;?></td>
                                </tr>
                                <?php } } ?>
               					<tr>
                                <td colspan="4" align="right"><b>Sub Total:</b>
                                <td colspan="3" align="right"><b><?php echo "RS . " . $total; ?></td>
                                </tr>
                                <tr align="center">
                                	<td colspan="1"> <input type="submit" name="update" value="Update Cart" class="btn btn-info" /></td>
                                	<td colspan="2"><input type="submit" name="continue" value="Continue Shopping" class="btn btn-info" /></td>
                                	<td colspan="3"><button class="btn btn-info"><a href="checkout.php" style="text-decoration:none; color:white">Checkout</a></button></td>
                                
                                
                                </tr>
                                
    							</tbody>
  								</table>
                                </form>
                                
                                <?php
								
								function updatecart(){
									
									global $con;
								
								if(isset($_POST['update']))
								{
									foreach($_POST['remove'] as $remove_id)
									{
									
										$delete_products = "delete from cart where p_id='$remove_id'";
										$run_delete = mysqli_query($con , $delete_products);
										if($run_delete)
										{
												echo "<script>window.open('cart.php','
												_self')</script>";		
											}
									}
										
									}
												if(isset($_POST['continue']))
									
									{
										echo "<script>window.open('index.php','_self')</script>";
									}
								
								}
								
								echo @$up_cart = updatecart();
								
								?>
                                
</div>
                
                
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