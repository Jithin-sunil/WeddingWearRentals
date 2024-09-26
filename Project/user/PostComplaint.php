<?php
include("../Assets/Connection/connection.php");
session_start();
if(isset($_POST['btn_submit']))
{
	$title=$_POST['txt_title'];
	$des=$_POST['txt_des'];
	$file=$_FILES['file_complaint']['name'];
	$tempfile=$_FILES['file_complaint']['tmp_name'];
	move_uploaded_file($tempfile, '../Assets/Files/User/Complaint/'.$file);
	$pid=$_GET['pid'];
	$uid=$_SESSION['uid'];
	$insQry="insert into tbl_complaint(complaint_title,complaint_content,complaint_date,user_id,product_id,complaint_file) values('$title','$des',curdate(),'$uid','$pid','$file')";
	if($con->query($insQry))
	{
	}
	else{
		echo "ERROR";
	}
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Title</td>
      <td><label for="txt_title"></label>
      <input required type="text" name="txt_title" id="txt_title" /></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><label for="txt_des"></label>
      <textarea required name="txt_des" id="txt_des" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>File</td>
      <td><label for="file_complaint"></label>
      <input required type="file" name="file_complaint" id="file_complaint" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>