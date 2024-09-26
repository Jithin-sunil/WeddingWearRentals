<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST["btnsubmit"]))
{
   $name=$_POST["txtname"];
   $email=$_POST["txtemail"];
   $password=$_POST["txtpass"];
   $address=$_POST["txtaddress"];
   $contact=$_POST["txtcontact"];
   
   
   $photo = $_FILES["txtphoto"]['name'];
   $tempPhoto = $_FILES["txtphoto"]['tmp_name'];
   move_uploaded_file($tempPhoto,"../Assets/Files/Seller/".$photo);
   
      $proof=$_FILES["txtproof"]['name'];
	  $tempproof = $_FILES["txtproof"]['tmp_name'];
	  move_uploaded_file($tempProof,"../Assets/Files/Seller/".$proof);
	  
	  $location=$_POST['selLocation'];
	  
	  {
		  $insqry="insert into tbl_seller(seller_name,seller_email,seller_address,seller_contact,seller_photo,seller_proof,seller_password,location_id,seller_doj) values('$name','$email','$address','$contact','$photo','$proof','$password',' $location',curdate())";
		  
		  if($con->query($insqry))
		  {
			  
			  header("location:Seller.php");
	
		  }
	  }
}







?>




	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NewSeller</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="216" border="1" align="center">
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
      <td>Place</td>
      <td><label for="selplace"></label>
           <select name="sel_place" id="sel_place" onchange="getLocation(this.value)">
           <option>----Select-----</option>
       </select></td>
       </tr>
        <tr>
      <td width="60"><p>Location Name</p></td>
      <td width="140"><label for="selname"></label>
        <select name="selLocation" id="selLocation">
      </select></td>
    </tr>
         <tr>
      <td> Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" required="required" placeholder="Enter the Name" id="txtname" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td> /></td>
    </tr>
    <tr>
      <td> Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" required="required" placeholder="Enter the email" id="txtemail" pattern= "/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" /></td> /></td>
    </tr>
    <tr>
      <td> Address</td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress" cols="22" rows="2" required="required" placeholder="Enter the Address" id="txtaddress"></textarea></td>
    </tr>
    <tr>
      <td> Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" required="required" placeholder="Enter the Number" id="txtcontact" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9" /></td>
    </tr>
    <tr>
      <td> Photo</td>
      <td><label for="txtphoto"></label>
      <input type="file" name="txtphoto" required="required" placeholder="Enter the Photo" id="txtphoto" /></td>
    </tr>
     
    <tr>
      <td> Proof</td>
      <td><label for="txtproof"></label>
      <input type="file" name="txtproof" required="required" placeholder="Enter the Proof" id="txtproof" /></td>
    </tr>
    <tr>
      <td> Password</td>
      <td><label for="txtpass"></label>
          <input type="text" name="txtpass" required="required" placeholder="Enter the Password" id="txtpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="txt_pass"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </div></td>
    </tr>
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


function getLocation(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxLocation.php?did=" + did,
      success: function (result) {

        $("#selLocation").html(result);
      }
    });
  }

</script>
</html>