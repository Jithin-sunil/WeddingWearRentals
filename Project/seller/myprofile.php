<?php
include("../Assets/Connection/Connection.php");

session_start();
$selQry="select * from tbl_seller where seller_id='".$_SESSION['sid']."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc();
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="429" border="1" align="center">
    <tr>
      <td colspan="2"><img src="../Assets/Files/Seller/<?php echo $data['seller_photo']?>" width="215" height="150" /></tr>
    <tr>
      <td width="290">Name</td>
      <td width="123"><?php echo $data['seller_name']?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data['seller_email']?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data['seller_address']?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['seller_contact']?></td>
    </tr>
     <tr>
      <td colspan="2" align="center"><a href="Editprofile.php">Editprofile</a>
      <a href="Changepassword.php">Changepassword</a></td>
    </tr>
  </table>
</form>
</body>
</html>