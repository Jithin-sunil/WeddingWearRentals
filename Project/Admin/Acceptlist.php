<?php
 include("../Assets/Connection/Connection.php");
 if(isset($_GET['Rid']))
{
	$upQry="update tbl_seller set seller_status='2' where seller_id='".$_GET['Rid']."'";
	if($con->query($upQry))
	{
		?>
        <script>
		alert("Rejected")
		window.location="Acceptlist.php"
		</script>
        <?php
	}
	
}
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="">
  <table width="544" border="1" align="center">
    <tr>
      <td width="8">#</td>
      <td width="37">Name</td>
      <td width="33">Email</td>
      <td width="48">Contact</td>
      <td width="51">Address</td>
      <td width="29">DOJ</td>
      <td width="36">Photo</td>
      <td width="34">Proof</td>
      <td width="43">District</td>
      <td width="33">Place</td>
      <td width="61">Location</td>
      <td width="55">Action</td>
    </tr>
    <?php
  $i=0;
$selQry="select * from tbl_seller s inner join  tbl_location l on s.location_id=l.location_id inner join tbl_place p on l.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where seller_status='1'";
$row=$con->query($selQry);
while($data=$row->fetch_assoc())
{
	$i++;
  ?>
   <tr>
    <td><?php echo $data['seller_name']?></td>
    <td><?php echo $data['seller_email']?></td>
    <td><?php echo $data['seller_contact']?></td>
    <td><?php echo $data['seller_address']?></td>
    <td><?php echo $data['seller_contact']?></td>
    <td><?php echo $data['seller_doj']?></td>
    <td><img src="../Assets/Files/Seller/<?php echo $data['seller_photo']?>" width="50px" height="50px"/></td>
    <td><img src="../Assets/Files/Seller/<?php echo $data['seller_proof']?>" width="50px" height="50px"/></td>
    <td><?php echo $data['district_name']?></td>
    <td><?php echo $data['place_name']?></td>
    <td><?php echo $data['location_name']?></td>
    <td>
    <a href="Acceptlist.php?Rid=<?php echo $data['seller_id']?>">Reject</a></td>
  </tr>
  <?php } ?>
  </table>
</form>
</body>
</html>