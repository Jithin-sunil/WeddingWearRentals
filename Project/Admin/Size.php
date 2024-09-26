<?php
include("../Assets/connection/connection.php");
if(isset($_POST['btnsubmit']))
{
	
	$size=$_POST['txtname'];
	$insQry="insert into tbl_size(size_name)values('".$size."')";
	if($con->query($insQry))
	{
		?>
        <script>
		alert("inserted")
		window.location="Size.php"
		</script>
        <?php
	}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_size where size_id='".$_GET['id']."'";
	if($con->query($del))
	{
		?>
        <script>
		alert("deleted")
		window.location="Size.php"
		</script>
        <?php
	}
}
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Size</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="Size.php">
  <table width="200" border="1" align="center">
    <tr>
      <td>Size Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" required placeholder="Enter the Size" id="txtname"  title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
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
      <td>Size Name</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_size";
	$row=$con->query($sel);
		while($data=$row->fetch_assoc())
		{
			$i++;
			?>
    <tr>
      <td><?php echo $i  ?></td>
      <td><?php echo $data['size_name']?></td>
      <td><a href="Size.php?id=<?php echo $data['size_id']?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>