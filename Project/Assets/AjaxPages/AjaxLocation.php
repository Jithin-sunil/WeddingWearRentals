 <option>--Select--</option>
       <?php
	   include("../Connection/Connection.php");

	$i=0;
	$selQry="select * from tbl_location where place_id = ".$_GET['did'];
	$result=$con -> Query($selQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
		?>
      <option value="<?php echo $data["location_id"]; ?>"><?php echo $data["location_name"];  ?></option>
      <?php
	}
	?>