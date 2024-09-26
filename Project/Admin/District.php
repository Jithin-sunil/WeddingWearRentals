<?php
include("../Assets/connection/connection.php");
$districtname="";
$eid=0;
if(isset($_POST["btnsubmit"]))
{
	$districtname=$_POST["txtdistrictname"];
	$eid = $_POST["txteid"];
	  if($eid ==0)
   {
	   
	$insQry="insert into tbl_district(district_name) values('$districtname')";

if($con->query($insQry)) 
{
	header("location:District.php");                                            
		}
	}
	else
	{
		$upQry="update tbl_district set district_name = '".$districtname."' where district_id = ".$eid;
		if($con -> query($upQry))
	{
			header("location:District.php");
			}
		}
}
  if(isset($_GET['did']))
  {
	    $delQry = "delete from tbl_district where district_id = ".$_GET['did'];
		if($con -> query($delQry))
		 {
			 header("location:District.php");
		 }
  }

if(isset($_GET['eid']))
{
	  $selUpQry = "select *  from tbl_district where district_id = ".$_GET['eid'];
	  $resultUpdate = $con -> query($selUpQry);
	  $rowUpdate = $resultUpdate -> fetch_assoc();
	  $districtname = $rowUpdate['district_name'];
	  $eid = $rowUpdate['district_id'];
	  
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td width="103">DistrictName</td>
      <td width="81"><label for="txtdistrictname"></label>
      <input type="text" name="txtdistrictname" id="txtdistrictname" required="required" placeholder="Enter District" value="<?php echo $districtname ?>" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td> 
      <input type="hidden" name="txteid" id="txteid"  value="<?php echo $eid ?> "/></td>
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
      <td width="71">SI No</td>
      <td width="59">District</td>
      <td width="48">Action</td>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_district";
	$result=$con -> Query($selQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["district_name"]; ?></td>
      <td><a href="District.php?did=<?php echo $data['district_id']?> ">Delete</a>
      <a href="District.php?eid=<?php echo $data['district_id']?> ">Edit</a>
      </td>
    </tr>
    <?php
	}
	?>
    
  </table>
</body>
</html>