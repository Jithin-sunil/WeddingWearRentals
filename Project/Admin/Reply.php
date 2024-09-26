<?php
include('../Assets/Connection/Connection.php'); 
if(isset($_POST['btnreply'])){
    $reply = $_POST['txt_reply'];
    $cid = $_POST['cid'];
    
    $upQry = "UPDATE tbl_complaint SET complaint_reply='$reply',complaint_status='1' WHERE complaint_id=$cid";
    if($con->query($upQry)){
       
        ?>
    <script>
        alert('Reply submitted successfully');
        window.location='ReplyedComplaint.php';
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
    <title>Reply</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Reply</td>
                <td><textarea name="txt_reply"  id=""></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btnreply" value="Submit"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>