<?php
include("../Assets/connection/connection.php");
session_start();


if(isset($_POST["btnsubmit"]))
{ 


  $photo = $_FILES["txtphoto"]['name'];
   $tempPhoto = $_FILES["txtphoto"]['tmp_name'];
   move_uploaded_file($tempPhoto,"../Assets/Files/gallery/".$photo);
   
   
   
	  $insqry="insert into tbl_gallery(gallery_file,product_id) values ('$photo','".$_SESSION['pid']."')";
	  if( $con -> query($insqry))
	  {
		  ?>
        <script>
		alert("inserted")
		window.location="Gallery.php"
		</script>
        
     <?php
 	}
}



   if(isset($_GET['did']))
  {
	  $delqry="delete from tbl_gallery where gallery_id = ".$_GET['did'];
	 if( $con -> query($delqry))
	{
		header("location:Gallery.php");
	}
  }
  ?>	   




















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
</head>

<body>
 <a href="Homepage.php">Home</a>
<form action="Gallery.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
    <tr>
      <td><p>Gallery File</p></td>
      <td><label for="txtphoto"></label>
      <input type="file" name="txtphoto" required="required" placeholder="Enter the File" id="txtphoto" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <br />
  <table width="507" border="1" align="center">
    <tr>
      <td width="47">SINO</td>
      <td width="95">Gallery File</td>
      <td width="118">Product Name</td>
      <td width="219">Action</td>
    </tr>
    <tr>
    <?php
	$i=0;
	$selqry="select * from tbl_gallery g inner join tbl_product p on g.product_id=p.product_id where g.product_id='".$_SESSION['pid']."'";
	$result=$con->query($selqry);
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    </tr>
    <tr>
      <td><?php echo $i; ?></td>
        <td><img src="../Assets/Files/gallery/<?php echo $data['gallery_file']?>" width="50px" height="50px" /></td>

      <td><?php echo $data["product_name"]; ?></td>
      <td><a href="Gallery.php?did=<?php echo $data['gallery_id']?> ">Delete</a>
      
      </td>
    </tr>
      <?php
	}
	  ?>
</table>
</form>
</body>
</html>