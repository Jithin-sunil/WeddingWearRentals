   <option>--Select--</option>
       <?php
	   include("../Connection/Connection.php");

	$i=0;
	$selQry="select * from tbl_place where district_id = ".$_GET['did'];
	$result=$con -> Query($selQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
		?>
      <option value="<?php echo $data["place_id"]; ?>"><?php echo $data["place_name"];  ?></option>
      <?php
	}
	?>