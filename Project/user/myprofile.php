<?php
include("../Assets/Connection/Connection.php");

session_start();
$sel="select * from tbl_user where user_id='".$_SESSION['uid']."'";
$row=$con->query($sel);
$data=$row->fetch_assoc();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td colspan="2"><img src="../Assets/Files/userDocs/<?php echo $data['user_photo']?>" width="215" height="150" /></tr>
      </td>
    </tr>
    <tr>
      <td width="120">Name</td>
      <td width="64"><?php echo $data['user_name']?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data['user_email']?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data['user_address']?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['user_contact']?></td>
    </tr>
     <tr>
      <td colspan="2"><a href="EditProfile.php">EditProfile</a>
      <a href="ChangePassword.php">ChangePassword</a></td>
    </tr>
  </table>
</form>
</body>
</html>