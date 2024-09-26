 <option>--select--</option>
 
        <?php
		include("../connection/connection.php");
		$sel="select * from tbl_category where type_id='".$_GET['did']."'";
		$row=$con->query($sel);
		while($data=$row->fetch_assoc())
		{
		?>
        <option value="<?php echo $data['category_id']?>"><?php echo $data['category_name']?></option>
        <?php
		}
		?>