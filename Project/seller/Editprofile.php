<?php
include("../Assets/Connection/Connection.php");

session_start();
$selQry="select * from tbl_seller where seller_id='".$_SESSION['sid']."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc();
if(isset($_POST['btnsubmit']))
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$address=$_POST['txtaddress'];
	$contact=$_POST['txtcontact'];
	$upQry="update tbl_seller set seller_name='$name',seller_email='$email',seller_address='$address',seller_contact='$contact' where seller_id='".$_SESSION['sid']."'";
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
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" required="required" placeholder="Enter the Name" id="txtname" value="<?php echo $data['seller_name']?>" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td> 
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" required="required" placeholder="Enter the Email" value="<?php echo $email ?>" id="txtemail"  pattern="/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" /></td> 
    </tr>
    <tr>
      <td>Address</td>
      <td><labelpatter
    </txt for="txtaddress"></label>
      <input type="text" name="txtaddress" id="txtaddress" required="required" placeholder="Enter the Address" value="<?php echo $data['seller_address']?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" required="required" placeholder="Enter the Number" value="<?php echo $data['seller_contact']?>"/>pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Edit" />
        <input type="submit" name="btncancel" id="btncancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>