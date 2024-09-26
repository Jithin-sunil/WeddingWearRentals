
 <?php
       $largest="";
	   if(isset($_POST["btnfind"])!=null)
	   {
	   
			$num1 = $_POST["txtno1"];
			$num2 = $_POST["txtno2"];
			$num3 = $_POST["txtno3"];
			
		  	 if(($num1 >= $num2) && ($num1 > $num3))
		{
			 $largest = $num1;
		}
			if(($num2 >= $num1) && ($num2 > $num3))
		{
			$largest = $num2;
		}
			 if(($num3 >= $num1) && ($num3 > $num2))
		{
			$largest=$num3;
		}
		
	}
		
		
	   $smallest="";
	   if(isset($_POST["btnfind"])!=null)
	   {
	   
			$num1 = $_POST["txtno1"];
			$num2 = $_POST["txtno2"];
			$num3 = $_POST["txtno3"];
	  
	   		if(($num1 <= $num2) && ($num1 < $num3))
		{
			 $smallest = $num1;
		}
			if(($num2 <= $num1) && ($num2 < $num3))
		{
			$smallest = $num2;
		}
			 if(($num3 <= $num1) && ($num3 < $num2))
		{
			$smallest = $num3;
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
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td width="113">Number1</td>
      <td width="71"><label for="txtno8"></label>
      <input type="text" name="txtno1" id="txtno1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txt2"></label>
      <input type="text" name="txtno2" id="txtno2" /></td>
    </tr>
    <tr>
      <td>Number3</td>
      <td><label for="txtno9"></label>
      <input type="text" name="txtno3" id="txtno3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btnfind" id="btnfind" value="find" />
      </td>
    </tr>
    <tr>
      <td>Largest</td>
      <td><?php echo $largest ?></td>
    </tr>
    <tr>
      <td>Smallest</td>
      <td><?php  echo $smallest ?></td>
    </tr>
  </table>
</form>
</body>
</html>