<?php
include("../Assets/Connection/Connection.php");

session_start();
if(isset($_POST['btnsubmit']))
{
	$email=$_POST['txtemail'];
	$password=$_POST['txtpass'];
	
	$selAdmin = "select * from tbl_admin where admin_email = '$email' and admin_password ='$password'";
	$resAdmin = $con -> query($selAdmin);
	
	$selUser = "select * from tbl_user where user_email = '$email' and user_password ='$password'";
	$resUser = $con -> query($selUser);
	
	$selSeller = "select * from tbl_seller where seller_email = '$email' and seller_password ='$password' ";
	$resSeller = $con -> query($selSeller);
	
	if($dataAdmin = $resAdmin -> fetch_assoc())
	{
		$_SESSION['aid']=$dataAdmin['admin_id'];
		$_SESSION['aname']=$dataAdmin['admin_name'];
		header("location:../Admin/Homepage.php");
	}
	else if($dataUser = $resUser -> fetch_assoc())
	{
		$_SESSION['uid']=$dataUser['user_id'];
		$_SESSION['uname']=$dataUser['user_name'];
		header("location:../User/Homepage.php");
	}
	
    else if($dataSeller = $resSeller -> fetch_assoc())
	{
		$_SESSION['sid']=$dataSeller['seller_id'];
		$_SESSION['sname']=$dataSeller['seller_name'];
		header("location:../Seller/Homepage.php");
	}
	else
	{
		?>
        <script>
		alert('Invalid Details');
		</script>
        <?php
	}
}
?>
		


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Email</td>
      <td>
      <input type="email" name="txtemail" required="required" placeholder="Enter the Email" id="txtemail" pattern= "/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" /></td>
    </tr>
    <tr>
      <td>Password</td>
     <td>
      <input type="password" name="txtpass" required="required" placeholder="Enter the Password" id="txtpass" /></td>  
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Login" />
      </div></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="User.php">NewUser</a>/<a href="Seller.php">NewSeller</a></td>
    </tr>
  </table>
</form>
</body>
</html>