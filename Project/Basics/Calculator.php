
<?php
       
	   $result="";
	    if(isset($_POST["btnplus"])!=null)
	{
		$number1=$_POST["txtnumber1"];
		$number2=$_POST["txtnumber2"];
		$result=$number1+$number2;
		
	}
	    if(isset($_POST["btnminus"])!=null)
	{
		$number1=$_POST["txtnumber1"];
		$number2=$_POST["txtnumber2"];
		$result=$number1-$number2;
		
	}
	 
	    if(isset($_POST["btnmul"])!=null)
	{
		$number1=$_POST["txtnumber1"];
		$number2=$_POST["txtnumber2"];
		$result=$number1*$number2;
		
	}
	  if(isset($_POST["btndiv"])!=null)
	{
		$number1=$_POST["txtnumber1"];
		$number2=$_POST["txtnumber2"];
		$result=$number1/$number2;
		
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 T
ansitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="253" border="1">
    <tr>
      <td width="58">Number1</td>
      <td width="179"><label for="txtnumber1"></label>
      <input type="text" name="txtnumber1" id="txtnumber1" /></td>
    </tr>
    <tr>
      <td>Nmuber2</td>
      <td><label for="txtnumber2"></label>
      <input type="text" name="txtnumber2" id="txtnumber2" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center"><input type="submit" name="btnplus" id="btnplus" value="+" />
      <input type="submit" name="btnminus" id="btnminus" value="-" />
      <input type="submit" name="btnmul" id="btnmul" value="*" />
      <input type="submit" name="btndiv" id="btndiv" value="/" /></td>
    </tr>
    <tr>
      <td height="64">Result</td>
      <td><?php echo $result?></td>
    </tr>
  </table>
</form>
</body>
</html>
