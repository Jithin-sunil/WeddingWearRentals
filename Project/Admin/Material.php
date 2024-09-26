<?php
include("../Assets/connection/connection.php");
$ename="";
$eid=0;
if(isset($_POST["btnsubmit"]))
{
	$materialname=$_POST["txtname"];
	$eid=$_POST["txt_hidden"];
    if($eid==0)
    {
	  $insqry="insert into tbl_material(material_name) values ('$materialname')";
	  if( $con -> query($insqry))
	  {
		  ?>
        <script>
		alert("inserted")
		window.location="Material.php"
		</script>
        <?php
	  }
	}
	  else if($eid!=0)
	  {
		  $upqry="update tbl_material set material_name = '".$materialname."' where material_id = '".$eid."'";
		if($con -> query($upqry))
		{
			 ?>
        <script>
		alert("Updated")
		window.location="Material.php"
		</script>
        <?php
		}
    }
    else
    {
		 ?>
        <script>
		alert("failed")
		//window.location="material.php"
		</script>
        <?php
 	}
}



   if(isset($_GET['did']))
  {
	  $delqry="delete from tbl_material where material_id = ".$_GET['did'];
	 if( $con -> query($delqry))
	{
		header("location:Material.php");
	}
  }
  

if(isset($_GET['eid']))
{
	$selUpQry = "select *  from tbl_material where material_id = ".$_GET['eid'];
	  $resultUpdate = $con -> query($selUpQry);
	  $rowUpdate = $resultUpdate -> fetch_assoc();
	  $eid = $rowUpdate['material_id'];
	  $ename = $rowUpdate['material_name'];

}

?>	   

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Material</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="Material.php">
  <table width="210" border="1" align="center">
    <tr>
      <td width="54">Material Name</td>
      <td width="140"><label for="txtname"></label>
      <input name="txt_hidden" type="hidden" value="<?php echo $eid?>" />
      <input type="text" name="txtname" required placeholder="Enter the Material" id="txtname" value="<?php echo $ename?>" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <br />
  <table width="200" border="1" align="center">
    <tr>
      <td>SINO</td>
      <td>Material Name</td>
      <td>Action</td>
    </tr>
    
	  <?php
	$i=0;
	$selqry="select * from tbl_material";
	$result=$con->query($selqry);
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["material_name"]; ?></td>
      <td><a href="Material.php?did=<?php echo $data['material_id']?> ">Delete</a>
      <a href="Material.php?eid=<?php echo $data['material_id']?> ">Edit</a>
      </td>
    </tr>
      <?php
	}
	  ?>
 </table>
</form>
</body>
</html>