  
  <?php
   
       $largest="";
	   if(isset($_POST["btnfind"])!=null)
	   {
		    $no1=$_POST["txtno1"];
			$no2=$_POST["txtno2"];		   
		   if($no1>$no2)
		{
			$largest=$no1;
		}
		else
		{
			$largest=$no2;
		}
	   }
	   
       $smallest="";
	   if(isset($_POST["btnfind"])!=null)
	   {
		    $no1=$_POST["txtno1"];
			$no2=$_POST["txtno2"];		   
		   if($no1<$no2)
		{
			$smallest=$no1;
		}
		else
		{
			$smallest=$no2;
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
  <table width="200" border="1">
    <tr>
      <td width="87">Number1</td>
      <td width="97"><label for="txtno1"></label>
      <input type="text" name="txtno1" id="txtno1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txtno2"></label>
      <input type="text" name="txtno2" id="txtno2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnfind" id="btnfind" value="Find" />
    <tr>
      <td>Largest</td>
      <td><?php echo $largest?></td>
    </tr>
    <tr>
      <td>Smallest</td>
      <td><?php echo $smallest?></td>
    </tr>
  </table>
</form>
</body>
</html>
