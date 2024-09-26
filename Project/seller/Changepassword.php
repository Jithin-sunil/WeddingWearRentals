<?php
include("../Assets/Connection/Connection.php");

session_start();
$selQry="select * from tbl_seller where seller_id='".$_SESSION['sid']."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc();
$dbpwd=$data['seller_password'];
if(isset($_POST['btnsubmit']))

{
	$pwd=$_POST['txtcurrent'];
	$npwd=$_POST['txtnew'];
	$cpwd=$_POST['txtreset'];
	if($dbpwd==$pwd)
	{
		if($npwd==$cpwd)
		{
			$upQry="update tbl_seller set seller_password='$npwd' where seller_id='".$_SESSION['sid']."'";
	if($con->query($upQry))
	{
		?>
        <script>
		alert("updated")
		window.location="Changepassword.php"
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
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="320" height="164" border="1" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txtcurrent"></label>
      <input type="text" name="txtcurrent" required="required" placeholder="Enter the Password" id="txtcurrent" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="txt_pass"/></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnew"></label>
      <input type="text" name="txtnew" required="required" placeholder="Enter the Password"  id="txtnew"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="txt_pass"/></td>
    </tr>
    <tr>
      <td>Reset Password</td>
      <td><label for="txtreset"></label>
      <input type="text" name="txtreset" required="required" placeholder="Enter the Password" id="txtreset"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="txt_pass"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="ChangePassword" />
        <input type="submit" name="btncancel" id="btncancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>