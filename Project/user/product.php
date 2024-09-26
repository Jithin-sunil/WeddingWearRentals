<?php
include("../Assets/Connection/Connection.php");
	$insqry="insert into tbl_product(material_id,color_id,size_id,category_id,product_name,product_description,product_rate,product_date,product_photo,seller_id)values('$material','$color','$size','$category','$name','$description','$rate',curdate(),'".$photo."','".$_SESSION['sid']."')";
	  if($con->query($insqry))
	  {
		  ?>
        <script>
		alert("inserted")
		window.location="Product.php"
		</script>
    <?php
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="Product.php" enctype="multipart/form-data">
  <table width="976" border="1" align="center">
    <tr>
      <td width="26" height="61">SINO</td>
      <td width="26">Product Name</td>
      <td width="26">Product Description</td>
      <td>Photo</td>
      <td width="26">Product Rate</td>
      <td width="33">Material Name</td>
      <td width="155">Product Date</td>
      <td width="155">Colour Name</td>
      <td width="155">Size Name</td>
      <td width="155">Type</td>
      <td width="155">Category Name</td>
      <td width="155">Action</td>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_product p inner join tbl_material m on p.material_id=m.material_id inner join tbl_color c on p.color_id=c.color_id inner join tbl_size s on p.size_id=s.size_id inner join tbl_category ca on p.category_id=ca.category_id inner join tbl_type t on t.type_id=ca.type_id where seller_id='".$_SESSION['sid']."'";
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td ><?php echo $i?></td>
      <td><?php echo $data['product_name']?></td>
      <td><?php echo $data['product_description']?></td>
      <td><img src="../Assets/Files/Product/<?php echo $data['product_photo']?>" width="50px" height="50px" /></td>
      <td><?php echo $data['product_rate']?></td>
      <td><?php echo $data['material_name']?></td>
      <td><?php echo $data['product_date']?></td>
      <td><?php echo $data['color_name']?></td>
      <td><?php echo $data['size_name']?></td>
      <td><?php echo $data['type_name']?></td>
      <td><?php echo $data['category_name']?></td>
      <td><a href="Product.php?id=<?php echo $data['product_id']?>">Delete</a> 
       <a href="Gallery.php?pid=<?php echo $data['product_id']?>">Add Gallery</a>
    </tr>
    <?php 
	}
	?>
  </table>
</form>
</body>
</html>