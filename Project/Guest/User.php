<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST["btnsubmit"]))
{
   $name=$_POST["txtname"];
   $email=$_POST["txtemail"];
   $contact=$_POST["txtcontact"];
   $address=$_POST["txtaddress"];
   $password=$_POST["txt_pass"];
       $photo = $_FILES["filephoto"]['name'];
      $tempPhoto = $_FILES["filephoto"]['tmp_name'];
      move_uploaded_file($tempPhoto,"../Assets/Files/UserDocs/".$photo);
	$location=$_POST['sellocation'];
	$insqry="insert into tbl_user(user_name,user_email,user_contact,user_address,user_photo,user_password,location_id)values('$name','$email','$contact','$address','$photo','$password','$location')";
	 if($con->query($insqry))
	{
		echo "inserted";
		header("location:User.php");
	}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NewUser</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="290" border="1" align="center">
    <tr>
      <td width="60"> Name</td>
      <td width="214"><label for="txtname"></label>
      <input type="text" name="txtname" required="required" placeholder="Enter the Name" id="txtname" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td> Email</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" required="required" placeholder="Enter the Email" id="txtemail"  pattern="/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" />
    </tr></td>
    <tr>
      <td> Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" required="required" placeholder="Enter the Number" id="txtcontact"  pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9" /></td>
    </tr>
    <tr>
      <td> Address</td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress" cols="25" rows="2"  required="required" placeholder="Enter the Address" id="txtaddress"></textarea></td>
    </tr>
     <tr>
      <td>District</td>
      <td><label for="seldistrict"></label>
        <select name="seldistrict" id="seldistrict" onchange="getPlace(this.value)">
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
	?>      </select></td>
    </tr>
     <tr>
      <td>Place</td>
      <td><label for="selplace"></label>
        <select name="selplace" id="selplace" 
        onchange="getLocation(this.value)">
      </select></td>
    </tr>
    <tr>
      <td>Location</td>
      <td><label for="sellocation"></label>
        <select name="sellocation" id="sellocation">
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" required="required" placeholder="Enter the Photo" id="filephoto" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="txt_pass" required="required" placeholder="Enter the Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="txt_pass"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
        <input type="submit" name="btncancel" id="btncancel" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
 <script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#selplace").html(result);
      }
    });
  }
  
  function getLocation(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxLocation.php?did=" + did,
      success: function (result) {

        $("#sellocation").html(result);
      }
    });
  }


</script>
      