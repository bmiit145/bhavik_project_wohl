<?php
require_once '../include/db_conn.php';

if(isset($_POST['categoryid'])) {
    $catid = intval($_POST['categoryid']);

    $sql = "SELECT subcategoryid, sname FROM tbl_subcategory WHERE categoryid = $catid ORDER BY sname ASC";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        echo '<option value="">Select Subcategory</option>';
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['subcategoryid'].'">'.htmlspecialchars($row['sname']).'</option>';
        }
    } else {
        echo '<option value="">No Subcategories Available</option>';
    }
} else {
    echo '<option value="">Invalid Category</option>';
}
?>
