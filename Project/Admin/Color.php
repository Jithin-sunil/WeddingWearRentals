<?php
include("../Assets/connection/connection.php");
if(isset($_POST['btnSubmit']))
{
	
	$color=$_POST['txtname'];
	$insQry="insert into tbl_color(color_name)values('$color')";
	if($con->query($insQry))
	{
		?>
        <script>
		alert("inserted")
		window.location="Color.php"
		</script>
        <?php
	}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_color where color_id='".$_GET['id']."'";
	if($con->query($del))
	{
		?>
        <script>
		alert("deleted")
		window.location="Color.php"
		</script>
        <?php
	}
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Color</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="Color.php">
  <table width="196" border="1" align="center">
    <tr>
      <td width="40">Color Name</td>
      <td width="140"><label for="txtname"></label>
      <input type="text" name="txtname" required placeholder="Enter the Color" id="txtname" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <br />
  <table width="296" border="1" align="center">
    <tr>
      <td width="54">SINO</td>
      <td width="101">Color Name</td>
      <td width="119">Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_color";
	$row=$con->query($sel);
		while($data=$row->fetch_assoc())
		{
			$i++;
			?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['color_name']?></td>
      <td><a href="Color.php?id=<?php echo $data['color_id']?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>
