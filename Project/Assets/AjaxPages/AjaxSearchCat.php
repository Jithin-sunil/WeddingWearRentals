<?php
include('../connection/connection.php');

$type = $_GET['type'];
if (!empty($type)) {
    
    $selQry = "SELECT * FROM tbl_category WHERE type_id IN ($type)";
    $result = $con->query($selQry);

    while ($data = $result->fetch_assoc()) {
        echo '<div class="form-check">
                <input class="form-check-input" type="checkbox" value="' . $data['category_id'] . '" id="category' . $data['category_id'] . '" name="category" onchange="getSearch()">
                <label class="form-check-label" for="category' . $data['category_id'] . '">' . $data['category_name'] . '</label>
              </div>';
    }
} else {
    echo '<p>No categories Available</p>';
}

?>