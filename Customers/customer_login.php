<?php

@session_start();

include ("includes/db.php");
include ("functions/functions.php");

?>


<link rel="stylesheet" href="styles/bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/style.css" media="all" />

<div>
		<form action="checkout.php" method="post">
        	<table width="400" align="center">
            <tr align="center">
            	<td colspan="4"><h2>Login or Register</h2><br></td>
            </tr>
            <tr>
            <td align="right"><b>Your Email:</b></td>
            <td><input type="text" class="form-control" name="c_email"/></td>			</tr>
            <tr>
            <td align="right"><b>Your Password:</b></td>
            <td >
            <input type="password" class="form-control" name="c_pass"/><br>
            </td>
            <tr align="center"><td colspan="3"><a href="forgot_pass.php">Forgot Password</a></td></tr>
            <tr align="center">
            <td colspan="4">
            <input type="submit" class="btn btn-info" name="c_login" value="Login"/><br>
        	</td>
            </tr>
             </table>

        </form>
                  
            <h1 style="float:right"><a href="customer_register.php" class="btn btn-link">Sign up</a></h1>
 
        
</div>

<?php

if(isset($_POST['c_login'])){

	$customer_email = $_POST['c_email'];
	$customer_pass = $_POST['c_pass'];
	
	$sel_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
	
	$run_customer = mysqli_query($con , $sel_customer);
	
	$check_customer = mysqli_num_rows($run_customer);
	
	$get_ip = getRealIpAddr();
	
	$sel_cart = "select * from cart where ip_add='$get_ip'";
	
	$run_cart = mysqli_query($con, $sel_cart);
	
	$check_cart = mysqli_num_rows($run_cart);
	
	if($check_customer==0){
		
		echo "<script>alert('Password or E-mail id is incorrect, try again!')</script>";
		exit();
		
		}
		if($check_customer==1 AND $check_cart ==0){
			
				$_SESSION['customer_email']=$customer_email;
		
			echo "<script>window.open('customer/my_account.php'.'_self')</script>";
			
			}
			
			else {
				
				$_SESSION['customer_email']=$customer_email;
				
				echo"<script>window.open('payment_option.php'.'_self')</script>";
				
				}
			 
			}

?>