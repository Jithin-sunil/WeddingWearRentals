<?php
include("../Assets/connection/connection.php");
session_start();


if(isset($_POST["btnSubmit"]))
{ 
  
	  $insqry="insert into tbl_stock(stock_quantity,product_id) values ('".$_POST["txtquantity"]."','".$_SESSION['prID']."')";
	  if( $con -> query($insqry))
	  {
		  ?>
        <script>
		alert("inserted")
		window.location="Stock.php"
		</script>
        
     <?php
 	}
}



   if(isset($_GET['did']))
  {
	  $delqry="delete from tbl_stock where stock_id = ".$_GET['did'];
	 if( $con -> query($delqry))
	{
		header("location:Stock.php");
	}
  }
  ?>	   








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock</title>
</head>

<body>
<a href="HomePage.php">HomePage</a>
<form id="form1" name="form1" method="post" action="Stock.php">
  <table width="200" border="1" align="center">
    <tr>
      <td>Quantity</td>
      <td><label for="txtquantity"></label>
      <input type="text" name="txtquantity" required="required" placeholder="Enter the Quantity" id="txtquantity" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <br />
  <table width="507" border="1" align="center">
    <tr>
      <td width="47">SINO</td>
      <td width="95">Stock</td>
      <td width="118">ProductName</td>
      <td width="219">Action</td>
    </tr>
    <tr>
    <?php
	$i=0;
	$selqry="select * from tbl_stock g inner join tbl_product p on g.product_id=p.product_id where g.product_id='".$_SESSION['prID']."'";
	$result=$con->query($selqry);
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    </tr>
    <tr>
      <td><?php echo $i; ?></td>
       <td><?php echo $data["stock_quantity"]; ?></td>

      <td><?php echo $data["product_name"]; ?></td>
      <td><a href="Stock.php?did=<?php echo $data['stock_id']?> ">Delete</a>
      
      </td>
    </tr>
      <?php
	}
	  ?>
</table>
</form>
</body>
</html>
