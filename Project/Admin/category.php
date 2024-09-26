<?php
include("../assets/connection/connection.php");
$categoryname="";
$eid=0;
if(isset($_GET['did']))
{
	$delQry="delete from tbl_category where category_id=".$_GET['did'];
	if($con->query($delQry))
	{
		header("location:Category.php");
	}
}
if(isset($_GET['eid']))
{
	$selupQry ="select * from tbl_category where category_id =".$_GET['eid'];
	$resulup=$con->query($selupQry);
	$rowup=$resulup->fetch_assoc();
	$categoryname = $rowup['category_name'];
	$eid = $rowup['category_id'];
}
		
	if(isset($_POST["btnsubmit"]))
{
	$categoryname=$_POST["txtcategoryname"];
	$type=$_POST['seltype'];
	$eid=$_POST["txteid"];
	if($eid==0)
	{
		$insQry="insert into tbl_category(category_name,type_id) values('$categoryname','$type')";
		if($con -> query($insQry))
		{
			header("location:Category.php");
		}
	}
 	else
	{
		$upQry="update tbl_category  set category_name='".$categoryname."'  where category_id=".$eid;
		if($con -> query($upQry))
		{
			header("location:Category.php");
		}
	}
}		
	
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>
<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" >
  <table width="200" border="1" align="center">
  <tr>
      <td>Type</td>
      <td><select name="seltype" id="">
        <option value="">--Select--</option>
        <?php
        $sel="select * from tbl_type";
        $res=$con->query($sel);
        while($row = $res->fetch_assoc())
        {
          ?>
          <option value="<?php echo $row['type_id']?>"><?php echo $row['type_name']?></option>
          <?php
        }
        ?>
      </select></td>
    </tr>
    <tr>
      <td height="40">Category</td>
      <td><label for="txtcategory"></label>
      <input type="text" name="txtcategoryname" id="txtcategoryname" required="required" placeholder="Enter the Category"value="<?php echo $categoryname ?>" />
      <input type="hidden" name="txteid" id="txteid"  value="<?php echo $eid ?> "/></td>
    </tr>
    <tr>
      <td colspan="2" align="center" ><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btnsubmit2" id="btnsubmit2" value="clear" /></td>
    </tr>
  </table>
  <br />
  <table width="221" border="1" align="center">
    <tr>
      <td width="68" height="55">SI.NO</td>
      <td width="75">Category</td>
      <td >Action</td>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_category";
	$result=$con -> Query($selQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td height="24"><?php echo $i; ?> </td>
      <td> <?php echo $data['category_name'];?> </td>
      <td><a href="Category.php?did=<?php echo $data['category_id'] ?>">Delete</a>
      <a href="Category.php?eid=<?php echo $data['category_id'] ?>">Edit</a>
      </td>
         </tr>
    <?php
	}
	?>
   
  </table>
</form>
</body>
</html>