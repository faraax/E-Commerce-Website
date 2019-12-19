<?php

include("includes/db.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea'});</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="styles\styles.css" media="all" />
<link href="styles/styles.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#999999">

<form method="post"action="insert_product.php" enctype="multipart/form-data">
	<table width="700" align="center" border="1" bgcolor="#FF9966" class="input" >
    
    
    	<tr align="center">
        <td colspan="2"><h1>INSERT A NEW PRODUCT</h1></td>
        </tr>
    
    
    	<tr>
        	<td><b>Product Title</b></td>
            <td><input type="text" name="product_title" size="50" class="input"/></td>
        </tr>
    
    	<tr>
        	<td><b>Product Category</b></td>
            <td><select name="product_cat" class="input">
            	<option>select a category</option>
                <?php
                    
					$get_cats = "select * from categories";
					$run_cats = mysqli_query($con , $get_cats);
					
					while ($row_cats=mysqli_fetch_array($run_cats)){
                    	$cat_id = $row_cats['cat_id'];
						$cat_title = $row_cats['cat_title'];
					
					echo"<option value='$cat_id'>$cat_title</option>";
					
					}
					?>
                
                
                </select>
            </td>
        </tr>
        
        <tr>
        	<td><b>Product Brand</b></td>
            <td>
            <select name="product_cat" class="input">
            	<option>select a brand</option>
            
			
			<?php
                    
					$get_brands = "select * from brands";
					$run_brands = mysqli_query($con , $get_brands);
					
					while ($row_brands=mysqli_fetch_array($run_brands)){
                    	$brand_id = $row_brands['brand_id'];
						$brand_title = $row_brands['brand_title'];
					
					echo"<option value='$brand_id'>$brand_title</option>";
					
					}
					?>
            
            
            
            
            </td>
        </tr>
        
        <tr>
        	<td><b>Insert first Image</b></td>
            <td><input type="file" name="product_img1"/></td>
        </tr>
        
        <tr>
             <td><b>Insert second Image</b></td>
        	<td><input type="file" name="product_img2"/></td>
        </tr>
        
        <tr>
        	<td><b>Insert third Image</b></td>
            <td><input type="file" name="product_img3"/></td>
        </tr>
        
        <tr>
        	<td><b>Product's Price</b></td>
            <td><input type="text" name="product_price" class="input"/></td>
        </tr>
        
        <tr>
        	<td><b>Product's discription</b></td>
            <td><textarea name="product_'desc" cols="50" rows="10"></textarea></td>
        </tr>
        
        <tr>
        	<td><b>Product's keywords</b></td>
            <td><input type="text" name="product_keywords" class="input" size="50"/></td>
        </tr>
        
        <tr align="center">
        	<td colspan="2" ><input type="submit" name="insert_product" value="Upload product" /></td>
        </tr>
        
    </table>



</form>
</body>
</html>



<?php
 
	if(isset($_POST['insert_product'])){
		
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$status = 'on';
		$product_keywords = $_POST['product_keywords'];
		
		$product_img1 = $_FILES['product_img1']['name'];
		$product_img2 = $_FILES['product_img2']['name'];
		$product_img3 = $_FILES['product_img3']['name'];
		
		
		$temp_img1 = $_FILES['product_img1']['tmp_name'];
		$temp_img2 = $_FILES['product_img2']['tmp_name'];
		$temp_img3 = $_FILES['product_img3']['tmp_name'];
		
		
		if($product_title=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' OR $product_keywords=='' OR $product_img1==''){
			
			
			echo "<script>alert('fill all the boxes!')</script>";
			exit();
			
			
			}
		
		
	
		
		
		$insert_product = "insert into products () values ()";
		
		
	}












?>