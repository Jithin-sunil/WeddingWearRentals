<?php
include("../Assets/Connection/Connection.php");

session_start();
$sel="select * from tbl_user where user_id='".$_SESSION['uid']."'";
$row=$con->query($sel);
$data=$row->fetch_assoc();
if(isset($_POST['btnSubmit']))
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$address=$_POST['txtaddress'];
	$contact=$_POST['txtcontact'];
	$upQry="update tbl_user set user_name='$name', user_email='$email', user_address='$address', user_contact='$contact' where user_id='".$_SESSION['uid']."'";
	if($con->query($upQry))
	{
		?>
        <script>
		alert("updated")
		window.location="myprofile.php"
		</script>
        <?php
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EditProfile</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" required="required" placeholder="Enter the Name" id="txtname" value="<?php echo $data['user_name']?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" required="required" placeholder="Enter the Email" id="txtemail" value="<?php echo $data['user_email']?>"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <input type="text" name="txtaddress" required="required" placeholder="Enter the Address" id="txtaddress"  value="<?php echo $data['user_address']?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" required="required" placeholder="Enter the Number" id="txtcontact" value="<?php echo $data['user_contact']?>"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Edit" />
        <input type="submit" name="btnCancel" id="btnCancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>