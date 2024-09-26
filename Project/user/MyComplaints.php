<?php
include("../Assets/Connection/connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">

<table width="200" border="1">
  <tr>
    <td>Sl No.</td>
    <td>Title</td>
    <td>Description</td>
    <td>Product</td>
    <td>File</td>
    <td>Reply</td>
    <td>Date</td>
  </tr>
  <?php
  $i=0;
  $selQry="select*from tbl_complaint c inner join tbl_product p on c.product_id=p.product_id where c.user_id=".$_SESSION['uid'];
  $result=$con->query($selQry);
  while($row=$result->fetch_assoc())
  {
	  $i++;
	  
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row['complaint_title'] ?></td>
    <td><?php echo $row['complaint_content'] ?></td>
    <td><?php echo $row['product_name'] ?></td>
    <td><img src="../Assets/Files/User/Complaint/<?php echo $row['complaint_file'];?>" width="200" height="200"/></td>
    <td><?php if($row['complaint_status']==0){
		echo "Your complaint is not reviewed yet  ";
	}
	else if($row['complaint_status']==1){
		echo $row['complaint_reply'];
	}
	?></td>
    <td><?php echo $row['complaint_date'] ?></td>
  </tr>
  <?php
  }
  ?>
</table>
</form>
</body>
</html>
