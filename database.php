<?php
session_start();
$con=mysqli_connect("localhost","root","","fascination"); // connect to databse
// simple login whether it is  admin or someone
if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$_SESSION['login_usr']=$email;
		
		if(empty($email && $pass))
		{
			$msg3="Please fill empty field";
			header('location:login.php?re='.$msg3);
		}
		else
		{
			$flag=false;
			$role="";
			$sel2="SELECT role FROM login_detail WHERE email_id='$email' AND password='$pass'" ;
			$qry=mysqli_query($con,$sel2);
			while($row=mysqli_fetch_array($qry))
			{
				$flag=true;
				$role=$row[0];
			}
			if($flag == true)
			{	
				if($role=="admin")
					header('location: admin_header.php');
				if($role=="user")
					header('location: user_header.php');
			}
			else
			{
				header('location: login.php?err=enter valid email id or password');
			}
		}
	}
	// enter the new customer or fetching info from new customer page= "new_user.php"
elseif(isset($_POST['reg']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$cpassword = $_POST['cpass'];
	$mob_no = $_POST['mob'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$addr = $_POST['address'];
	
	if(empty($fname && $lname && $email && $password && $cpassword && $mob_no && $dob && $gender && $addr ))
		{
		 header('location:new_user.php?re=enter required field ');
		}
	elseif($password == $cpassword)
	{	
		$flag=false;
		$ins1 = "SELECT email_id FROM login_detail where email_id='$email'"; //checking whether email is already in use
		$qry1 = mysqli_query($con,$ins1);
		while($row = mysqli_fetch_array($qry1))
		{
			$flag=true;
		}
		
		if($flag)
			{
				header ('location: new_user.php?msg1=already in use');
			}	
		else
			{
				// inserting in to database
				$ins = "INSERT INTO user_detail VALUES ('$fname','$lname','$email','$password','$mob_no','$gender','$dob','$addr')";
				$qry = mysqli_query($con,$ins);
				$ins = "INSERT INTO login_detail VALUES ('$email','$password','user')";
				$qry = mysqli_query($con,$ins);
				header('location: login.php?msg2=registered');
			}	
	}
	else
		{
			header('location:new_user.php?msg3=wrong password');
		}
}	
// adding new product page name = admin_product.php
elseif(isset($_POST['add']))
{
	$code = $_POST['pc'];
	$product_name = $_POST['pname'];
	$amount  = $_POST['price'];
	$photo = $_POST['file'];
	$category = $_POST['category'];
	$descr = $_POST['desc'];
	// inserting into database
	
	$ins = "INSERT INTO product_detail VALUES ('$code','$category','$product_name','$amount','$descr')";
	$qry = mysqli_query ($con,$ins);
	// uploading file
	move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$code.".jpg");
	header('location:admin_product.php?msg=Inserted');
}
// adding new category  page name = admin_category.php
elseif(isset($_POST['cadd']))
{
	// inserting into database
	$cid = $_POST['cid'];
	$cname = $_POST['name'];
	$ins = "INSERT INTO category_detail VALUES ('$cid','$cname')";
	$qry = mysqli_query($con,$ins);
	header('location:admin_category.php?msg=new product added');
}
// order detail  table for ordering the product
elseif (isset($_POST['order']))
{
	// inserting into database
	$order_id = $_POST['oid'];
	$date = $_POST['curr_date'];
	$prod_code = $_POST['pcode'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$quantity = $_POST['quant'];
	$tprice = $_POST['total_price'];
	$email = $_SESSION['login_usr'];
	$ins = "INSERT INTO order_detail VALUES ('$order_id','$date','$prod_code','$name','$price','$quantity','$tprice','$email')";
	$qry = mysqli_query($con,$ins);
	header('location:shipping.php?id='.$order_id);
}
// shipping table for delviery address
elseif (isset($_POST['place']))
{
	//inserting in to database
	$id = $_POST['pid'];
	$name = $_POST['cust_name'];
	$mob = $_POST['mobno'];
	$dob = $_POST['dob'];
	$pin = $_POST['pin'];
	$city = $_POST['city'];
	$addr = $_POST['address'];
	$email = $_POST['email'];
	
	$ins = "INSERT INTO shipping VALUES ('$id','$name','$mob','$email','$dob','$city','$pin','$addr')";
	$qry = mysqli_query($con,$ins);
}
?>	