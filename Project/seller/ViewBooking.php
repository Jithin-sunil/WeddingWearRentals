<?php
include("../Assets/Connection/connection.php");
session_start();
if(isset($_GET['cid']))
{
    $upQry="update tbl_cart set cart_status='".$_GET['stat']."' where cart_id='".$_GET['cid']."'";
	if($con->query($upQry)){
        ?>
        <script>
            alert("Status Changed")
            window.location="ViewBooking.php"
        </script>
        <?php
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Seller Orders</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="800" border="1">
    <tr>
      <td width="24">SI No</td>
      <td width="45">Photo</td>
      <td width="120">Product Name</td>
      <td width="66">Quantity</td>
      <td width="70">Foredate</td>
      <td width="52">Return Date</td>
      <td width="67">Price</td>
      <td width="80">Total Price</td>
      <td width="70">Status</td>
      <td width="120">Action</td>
    </tr>
    <?php
	$i = 0;
	$selQry = "SELECT * FROM tbl_booking b 
	           INNER JOIN tbl_cart c ON c.booking_id = b.booking_id 
	           INNER JOIN tbl_product p ON p.product_id = c.product_id 
	           INNER JOIN tbl_seller s ON s.seller_id = p.seller_id 
	           WHERE p.seller_id = " . $_SESSION['sid'];
	$result = $con->query($selQry);
	while ($row = $result->fetch_assoc()) {
		$i++;
		?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><img src="../Assets/Files/Product/<?php echo $row['product_photo']; ?>" width="100" height="100" /></td>
      <td><?php echo $row['product_name']; ?></td>
      <td><?php echo $row['cart_quantity']; ?></td>
      <td><?php echo $row['booking_fordate']; ?></td>
      <td><?php echo $row['booking_returndate']; ?></td>
      <td><?php echo $row['product_rate']; ?></td>
      <td><?php echo $row['cart_quantity'] * $row['product_rate']; ?></td>
      <td>
        <?php
        if ($row['cart_status'] == 1) {
            echo "Payment Received";
        } elseif ($row['cart_status'] == 2) {
            echo "Order Packed";
        } elseif ($row['cart_status'] == 3) {
            echo "Order Shipped";
        } elseif ($row['cart_status'] == 4) {
            echo "Delivered";
        } elseif ($row['cart_status'] == 5) {
            
            $selDate = "SELECT 
                DATEDIFF(CURDATE(), STR_TO_DATE(booking_fordate, '%Y-%m-%d')) AS date_difference 
                FROM tbl_booking 
                WHERE booking_id = " . $row['booking_id'];
            $date = $con->query($selDate);
            $data = $date->fetch_assoc();
            $days = $data['date_difference'] > 1 ? $data['date_difference'] - 1 : 0; 
            
           
            $totalRent = $days * $row['product_rate'];
            
            echo $days . ' days used' . "<br>";
            echo "Total Rent (after 1 day deduction): " . $totalRent . "<br>";
            echo "Return Requested";
        } elseif ($row['cart_status'] == 6) {
            echo "Return Completed";
        }
        ?>
      </td>
      <td>
        <?php
       
        if ($row['cart_status'] == 1) {
            ?>
            <a href="ViewBooking.php?cid=<?php echo $row['cart_id']; ?>&stat=2">Packed</a>
            <?php
        } elseif ($row['cart_status'] == 2) {
            ?>
            <a href="ViewBooking.php?cid=<?php echo $row['cart_id']; ?>&stat=3">Shipped</a>
            <?php
        } elseif ($row['cart_status'] == 3) {
            ?>
            <a href="ViewBooking.php?cid=<?php echo $row['cart_id']; ?>&stat=4">Delivered</a>
            <?php
        } elseif ($row['cart_status'] == 4) {
            ?>
            <a href="ViewBooking.php?cid=<?php echo $row['cart_id']; ?>&stat=5">Return Requested</a>
            <?php
        } elseif ($row['cart_status'] == 5) {
            echo "Return Requested";
            ?>
            
            <!-- <a href="ViewBooking.php?cid=<?php echo $row['cart_id']; ?>&stat=6">Return Completed</a> -->
            <?php
        }
        ?>
      </td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>