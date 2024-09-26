<?php
include("../Assets/connection/connection.php");
if(isset($_POST["btnsubmit"]))
{
	$locationname=$_POST["txtname"];
	$placeid=$_POST["sel_place"];
	$insQry="insert into tbl_location(location_name,place_id)values('".$locationname."','".$placeid."')";
    if($con->query($insQry))
		  {
				header("location:Location.php");
	

		  }
	  }

 if(isset($_GET['did']))
  {
	    $delQry = "delete from tbl_location where location_id = ".$_GET['did'];
		if($con -> query($delQry))
		 {
			 header("location:Location.php");
		 }
  }




?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Location</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="">
  <table width="213" border="1" align="center">
   <tr>
      <td>District</td>
      <td><label for="seldistrict"></label>
           <select name="selname" id="selname" onchange="getPlace(this.value)">
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
      <td width="57">Place Name</td>
      <td width="140"><label for="selplace"></label>
        <select name="sel_place" id="sel_place">
      </select></td>
    </tr>
    <tr>
      <td>Location Name</td>
      <td><label for="txtname">
        <input type="text" name="txtname" required="required" placeholder="Enter the Location" id="txtname" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td> 
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <br />
  <table width="255" border="1" align="center">
    <tr>
      <td width="46">SINO</td>
      <td width="100">Location Name</td>
      <td width="18">Place Name</td>
      <td width="63">Action</td>
    </tr>
    <tr>
   <?php
	$i=0;
	$selQry="select * from tbl_location p inner join tbl_place d on p.place_id=d.place_id";
	$result=$con -> Query($selQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
		?>
        <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["location_name"]; ?></td> 
      <td><?php echo $data["place_name"]; ?></td>
      <td><a href="location.php?did=<?php echo $data['location_id']?> ">delete</a>
      </td>
    </tr>
    <?php
	}
	?>   
    
   
  </table>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }

</script>


</html>