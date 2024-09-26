<?php 
include('../Assets/connection/connection.php');
session_start();
if(isset($_POST['submit'])){
    $fromDate = $_POST['txtfdate'];
    $toDate = $_POST['txttdate'];
    $ins=" update tbl_booking  set booking_fordate='".$fromDate."' ,booking_returndate = '".$toDate."'  where booking_id=".$_SESSION['bid'];
    if($con->query($ins))
    {
        ?>
        <script>
            alert("Booking Date updated successfully")
            window.location="Payment.php"
        </script>
        <?php
    }    
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>FromDate</td>
                <td><input type="date" name="txtfdate" min="<?php echo date('Y-m-d')?>" id=""></td>
            </tr>
            <tr>
                <td>ToDate</td>
                <td><input type="date" name="txttdate" min="<?php echo date('Y-m-d')?>" id=""></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
                
            </tr>
        </table>
    </form>
</body>
</html>