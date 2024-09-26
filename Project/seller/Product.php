<?php
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST["btnadd"]))
{
	$name=$_POST['txtname'];
	$description=$_POST['txtname2'];
	$rate=$_POST['txtname3'];
	$material=$_POST['selname'];
	$size=$_POST['selsize'];
	$category=$_POST['selcategory'];
	
	 $photo = $_FILES["txt_photo"]['name'];
   $tempPhoto = $_FILES["txt_photo"]['tmp_name'];
   move_uploaded_file($tempPhoto,"../Assets/Files/Product/".$photo);
	$color=$_POST['selcolor'];

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
}
if(isset($_GET['id']))
{
	$del="delete from tbl_product where product_id='".$_GET['id']."'";
	if($con->query($del))
	{
		?>
        <script>
		alert("deleted")
		window.location="Product.php"
		</script>
        <?php
	}
}



if(isset($_GET['pid']))
{
	$_SESSION['pid']=$_GET['pid'];
	header("location:Gallery.php");
}



if(isset($_GET['prID']))
{
	$_SESSION['prID']=$_GET['prID'];
	header("location:Stock.php");
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="Product.php" enctype="multipart/form-data">
  <table width="200" border="1" align="center">
    <tr>
      <td>Material </td>
      <td><label for="selname"></label>
        <select name="selname" id="selname">
        <option>--select</option>
        <?php
		$sel1="select * from tbl_material";
		$row=$con->query($sel1);
		while($data1=$row->fetch_assoc())
		{
		?>
        <option value="<?php echo $data1['material_id']?>"><?php echo $data1['material_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Color </td>
      <td><label for="selcolor"></label>
        <select name="selcolor" id="selcolor">
         <option>--select</option>
        <?php
		$sel2="select * from tbl_color";
		$row2=$con->query($sel2);
		while($data2=$row2->fetch_assoc())
		{
		?>
        <option value="<?php echo $data2['color_id']?>"><?php echo $data2['color_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Size </td>
      <td><select name="selsize" id="selsize">
        <option>--select</option>
        <?php
		$sel3="select * from tbl_size";
		$row3=$con->query($sel3);
		while($data3=$row3->fetch_assoc())
		{
		?>
        <option value="<?php echo $data3['size_id']?>"><?php echo $data3['size_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Type</td>
      <td><label for="sel_type"></label>
        <select name="sel_type" id="sel_type" onChange="getCategory(this.value)">
        <option>--select--</option>
        <?php
		$sel4="select * from tbl_type";
		$row4=$con->query($sel4);
		while($data4=$row4->fetch_assoc())
		{
		?>
        <option value="<?php echo $data4['type_id']?>"><?php echo $data4['type_name']?></option>
        <?php
		}
		?>
      </select>        </td>
    </tr>
    <tr>
      <td>Category </td>
      <td><label for="selcategory"></label>
        <select name="selcategory" id="selcategory">
         <option>--select</option>
        
      </select></td>
    </tr>
    <tr>
      <td>Product Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" required placeholder="Enter the Name" id="txtname" /></td>
    </tr>
    <tr>
      <td>Product Description</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname2" required placeholder="Enter the Details" id="txtname" /></td>
    </tr>
     <tr>
      <td>Photo</td>
      <td><label for="txt_photo"></label>
      <input type="file" name="txt_photo" required placeholder="Enter the Photo" id="txt_photo" /></td>
    </tr>
    <tr>
      <td>Product Rate</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname3" required placeholder="Enter the Rate" id="txtname" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnadd" id="btnadd" value="Submit" />
      </div></td>
    </tr>
  </table>
  <br />
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
     
      <td><a href="Product.php?id=<?php echo $data['product_id']?>">Delete</a>/
      <a href="Product.php?pid=<?php echo $data['product_id']?>">Add Gallery</a>/
         <a href="Product.php?prID=<?php echo $data['product_id']?>">Add STOCK</a>
      </td>
    </tr>
    <?php 
	}
	?>
  </table>
</form>
</body>
</html>
 <script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getCategory(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxCategory.php?did=" + did,
      success: function (result) {

        $("#selcategory").html(result);
      }
    });
  }

</script>