<?php
include("../Assets/connection/connection.php");
$typename="";
$eid=0;
if(isset($_POST["btn_submit"]))
{
	$typename=$_POST["txt_name"];
	$eid=$_POST["txteid"];
    if($eid==0)
    {
	  $insqry="insert into tbl_type(type_name,category_id) values ('$typename','".$_POST['']."')";
	  if( $con -> query($insqry))
	  {
		  header("location:Type.php");
	  }
    }
    else
    {
		$upqry="update tbl_type set type_name = '".$typename."' where type_id = '".$eid."'";
		if($con -> query($upqry))
		{
			header("location:Type.php");
		}
 	}
}



   if(isset($_GET['did']))
  {
	  $delqry="delete from tbl_type where type_id = ".$_GET['did'];
	 if( $con -> query($delqry))
	{
		header("location:Type.php");
	}
  }
  

if(isset($_GET['eid']))
{
	$selUpQry = "select *  from tbl_type where type_id = ".$_GET['eid'];
	  $resultUpdate = $con -> query($selUpQry);
	  $rowUpdate = $resultUpdate -> fetch_assoc();
	  $eid = $rowUpdate['type_id'];
	  $typename = $rowUpdate['type_name'];

}

?>	   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Type</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="">
  <table width="233" border="1" align="center">
    
    <tr>
      <td>Type Name</td>
      <td><input name="txteid" type="hidden" value="<?php echo $eid;  ?>" />
      <input name="txt_name" type="text" required="required"  placeholder="Enter the Type" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
 </td>
    </tr>

    
    <tr>
    <td><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit"  value="Submit" />
    </td>
    </tr>
      </table>
  <br />
  <table width="229" border="1" align="center">
    <tr>
      <td width="63">SINO</td>
      <td width="96">Type Name</td>
      <td width="48">Action</td>
    </tr>
    <?php
	$i=0;
	$selqry="select * from tbl_type";
	$result=$con->query($selqry);
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["type_name"]; ?></td>
      <td><a href="Type.php?did=<?php echo $data['type_id']?> ">Delete</a>
      <a href="Type.php?eid=<?php echo $data['type_id']?> ">Edit</a>
      </td>
    </tr>
      <?php
	}
	  ?>
  </table>
</form>
</body>
</html>