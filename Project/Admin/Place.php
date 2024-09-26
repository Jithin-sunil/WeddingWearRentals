
<?php
include("../Assets/connection/connection.php");
if(isset($_POST["btnsubmit"]))
{
	$placename=$_POST["txtplace"];
	$district=$_POST['seldistrict'];
	$insQry="insert into tbl_place(place_name,district_id) values('$placename','$district')";
	if($con -> query($insQry))
	{
		echo"inserted";
	}
}
	if(isset($_GET['did']))
		{
			$delQry="delete from tbl_place where place_id=". $_GET['did'];
		if($con->query($delQry))
		{
			header("location:Place.php");
		}
		}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>District Name</td>
      <td><label for="txtdistrict2"></label>
        <label for="seldistrict"></label>
      <select name="seldistrict" id="seldistrict">
      <option>--Select--</option>
       <?php
	$i=0;
	$selQry="select * from tbl_district";
	$result=$con -> Query($selQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
		?>
      <option value="<?php echo $data["district_id"]; ?>"><?php echo $data["district_name"];  ?></option>
      <?php
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td>Place Name</td>
      <td><label for="txtplace"></label>
      <input type="text" name="txtplace" required="required" placeholder="Enter the Place" id="txtplace" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <br />
  <table width="372" border="1" align="center">
    <tr>
      <td width="43">SINO</td>
      <td width="105">District Name</td>
      <td width="83">Place Name</td>
      <td width="113">Actions</td>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$result=$con -> query($selQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["district_name"]; ?></td>
      <td><?php echo $data["place_name"]; ?></td>
      <td><a href="Place.php?did=<?php echo $data['place_id']?> ">Delete</a>
      <a href="Place.php?eid=<?php echo $data['place_id'] ?>">Edit</a>
      </td>
    </tr>
    <?php } ?>
</table>
</form>
</body>
</html>