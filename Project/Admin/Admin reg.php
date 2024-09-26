<?php
include("../Assets/connection/connection.php");
$name = "";
$email = "";
$password = "";
$eid = 0;
if(isset($_POST["btnsubmit"]))
{
	$name=$_POST["txtname"];
	$email=$_POST["txtemail"];
	$password=$_POST["txtpassword"];
	$eid = $_POST["txteid"];
	
   if($eid ==0)
   {
	   
	$insQry="insert into tbl_admin(admin_name,admin_email,admin_password) values('$name','$email','$password')";

if($con->query($insQry)) 
{
	header("location:Admin reg.php");                                            
		}
	}
	else
	{
		$upQry="update tbl_admin set admin_name = '".$name."',admin_email = '".$email."',admin_password = '".$password."' where admin_id = ".$eid;
		if($con -> query($upQry))
	{
			header("location:Admin reg.php");
			}
		}
}
  if(isset($_GET['did']))
  {
	    $delQry = "delete from tbl_admin where admin_id = ".$_GET['did'];
		if($con -> query($delQry))
		 {
			 header("location:Admin reg.php");
		 }
  }

if(isset($_GET['eid']))
{
	  $selUpQry = "select *  from tbl_admin where admin_id = ".$_GET['eid'];
	  $resultUpdate = $con -> query($selUpQry);
	  $rowUpdate = $resultUpdate -> fetch_assoc();
	  $name = $rowUpdate['admin_name'];
	  $email = $rowUpdate['admin_email'];
	  $password = $rowUpdate['admin_password'];
	  $eid = $rowUpdate['admin_id'];
	  
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminRegistration</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input Type="text" name="txtname" required="required" placeholder="Enter the Name" value="<?php echo $name ?>" id="txtname" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td> 
      <input Type="hidden" name="txteid"  value="<?php echo $eid ?>" id="txteid" />
      </td>
       </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" required="required" placeholder="Enter the Email" value="<?php echo $email ?>" id="txtemail"  pattern="/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" /></td>
      <input Type="hidden" name="txteid"  value="<?php echo $eid ?>" id="txteid" />
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" required="required" placeholder="Enter the Password" value="<?php echo $password ?>" id="txtpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="txt_pass"/></td> 
        <input Type="hidden" name="txteid"  value="<?php echo $eid ?>" id="txteid" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />        
      </td>
    </tr>
  </table>
  <br />
  <table border="1" align="center">
    <tr>
      <td>SI.NO</td>
      <td>Name</td>
      <td>Email</td>
      <td>Password</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_admin";
	$result=$con->query($selQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i;  ?></td>
      
      <td><?php echo $data["admin_name"]; ?></td>
      <td><?php echo $data["admin_email"]; ?></td>
      <td><?php echo $data["admin_password"]; ?></td>
      <td><a href="Admin reg.php?did=<?php echo $data['admin_id'] ?>">Delete</a>
      <a href="Admin reg.php?eid=<?php echo $data['admin_id'] ?>">Edit</a></td>
    </tr>
    <?php
	  }  
	  ?>
  </table>
</body>
</html>