<?php
include("../Assets/Connection/Connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HomePage</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
    <td>HELLO SELLER :: </td>
    </tr>
        <td><a href="MyProfile.php">MyProfile</a></td>
    </tr>
    <tr>
      <td><a href="EditProfile.php">EditProfile</a></td>
    </tr>
    <tr>
      <td><a href="ChangePassword.php">ChangePassword</a></td>
    </tr>
    <tr>
      <td><a href="Product.php">Product</a></td>
    </tr>
    <tr>
      <td><a href="Stock.php">Stock</a></td>
    </tr>
    <tr>
      <td><a href="Gallery.php">ChangePassword</a></td>
    </tr>
     <tr>
      <td><a href="Feedback.php">Feedback</a></td>
    </tr>
     <tr>
      <td><a href="Complaint.php">Complaint</a> </td>
    </tr>
    <tr>
      <td></td>
    </tr>
  </table>
</form>
</body>
</html>