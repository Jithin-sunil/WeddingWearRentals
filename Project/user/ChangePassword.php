<?php
include("../Assets/Connection/Connection.php");

session_start();
$sel="select * from tbl_user where user_id='".$_SESSION['uid']."'";
$row=$con->query($sel);
$data=$row->fetch_assoc();
$dbpwd=$data['user_password'];
if(isset($_POST['btnSubmit']))
{
	$password=$_POST['txtcurrent'];
	$newpassword=$_POST['txtnew'];
	$confirmpassword=$_POST['txtreset'];
	if($dbpwd==$password)
	{
		if($newpassword==$confirmpassword)
		
		{
			$upQry="update tbl_user set user_password='".$newpassword."' where user_id='".$_SESSION['uid']."'";
			if($con->query($upQry))
			{
				?>
				<script>
				alert("updated")
				window.location="changepassword.php"
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed")
				window.location="changepassword.php"
				</script>
				<?php
			}
		}
	}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ChangePassword</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txtcurrent"></label>
      <input type="text" name="txtcurrent" required="required" placeholder="Enter the Password" id="txtcurrent" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnew"></label>
      <input type="text" name="txtnew" required="required" placeholder="Enter the Password" id="txtnew" /></td>
    </tr>
    <tr>
      <td>Reset Password</td>
      <td><label for="txtreset"></label>
      <input type="text" name="txtreset" required="required" placeholder="Enter the password" id="txtreset" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name=" btnSubmit" id=" btnSubmit" value="ChangePassword" />
        <input type="submit" name="btncancel" id="btncancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>