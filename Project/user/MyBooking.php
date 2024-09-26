<?php
include("../Assets/Connection/connection.php");
session_start();
if(isset($_GET['cid']))
{
    $upQry="update tbl_cart set cart_status='5' where cart_id=".$_GET['cid'];
    if($con->query($upQry))
    {
        ?>
        <script>
            alert("Return Requested")
            window.location="MyBooking.php"
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
<form id="form1" name="form1" method="post" action="">
  <table width="640" border="1">
    <tr>
      <td width="46">SINo</td>
      <td width="74">Photo</td>
      <td width="57">Name</td>
      <td width="66">Quantity</td>
      <td width="70">Foredate</td>
      <td width="57">Return Date</td>
      <td width="47">Price</td>
      <td width="57"><p>Total Price</p></td>
      <td width="47">Status</td>
      <td width="55">Action</td>
    </tr>
    <?php
	$i=0;
	 $selQry="select * from tbl_booking b 
	         inner join tbl_cart c on b.booking_id = c.booking_id 
	         inner join tbl_product p on p.product_id = c.product_id 
	         where b.booking_status >= '2' and b.user_id = ".$_SESSION['uid'];
	$result = $con->query($selQry);
	while ($row = $result->fetch_assoc()) {
		$i++;
		?>
    <tr>
      <td><?php echo $i; ?> </td>
      <td><img src="../Assets/Files/Product/<?php echo $row['product_photo']; ?>" width="200" height="200" /></td>
      <td><?php echo $row['product_name']; ?></td>
      <td><?php echo $row['cart_quantity']; ?></td>
      <td><?php echo $row['booking_fordate']; ?></td>
      <td><?php echo $row['booking_returndate']; ?></td>
      <td><?php echo $row['product_rate']; ?></td>
      <td><?php echo $row['cart_quantity'] * $row['product_rate']; ?></td>
      <td>
        <?php 
        if ($row['cart_status'] == 1) {
            echo "Order is being packed";
        } else if ($row['cart_status'] == 2) {
            echo "Order packed";
        } else if ($row['cart_status'] == 3) {
            echo "Order Shipped";
        } else if ($row['cart_status'] == 4) {
            echo "Delivered";
            ?>
            <a href="MyBooking.php?cid=<?php echo $row['cart_id']; ?>&stat=5">Request Return</a>
            <?php
        } else if ($row['cart_status'] == 5) {
            // Calculate date difference from booking_fordate to current date
            $selDate = "SELECT 
                DATEDIFF(CURDATE(), STR_TO_DATE(booking_fordate, '%Y-%m-%d')) AS date_difference 
                FROM tbl_booking 
                WHERE booking_id = " . $row['booking_id'];
                
            $date = $con->query($selDate);
            $data = $date->fetch_assoc();
            $days = $data['date_difference'] > 1 ? $data['date_difference'] - 1 : 0; // Subtract one day
            echo $days . ' days' . "<br>";
            
            // Calculate total rent minus one day's rent
            $totalRent = $days * $row['product_rate'];
            echo "Total Rent (after 1 day deduction): " . $totalRent . "<br>";

           ?>
           <a href="Payment.php?cid=<?php echo $row['cart_id']; ?>" >Proceed to pay</a>
           <?php
        } else if ($row['cart_status'] == 6) {
            echo "Return Completed";
        }
        ?>
      </td>
      <td>
        <a href="PostComplaint.php?pid=<?php echo $row['product_id']; ?>">Complaint</a>
        <a href="Rating.php?pid=<?php echo $row['product_id']; ?>">Rating</a>
      </td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>