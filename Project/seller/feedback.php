<?php
$insQry="insert into tbl_feedback";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form2" name="form2" method="post" action="">
  
<table width="200" border="1" align="center">
<tr>
    <td width="93">content</td>
    <td width="91">
      <label for="txt_content"></label>
      <input type="text" name="txt_content" required="required" placeholder="Enter the Content" id="txt_content" />
   </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </div>
    </td>
  </tr>
</table>
 </form>
<p>&nbsp;</p>
</body>
</html>