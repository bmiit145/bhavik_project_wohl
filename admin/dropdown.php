<?php
require '../include/connection.php';

#sub category Selection
if (isset($_POST['cid'])) {
    $catid = $_POST['cid'];
    $sql = "SELECT * FROM tbl_subcategory WHERE categoryid = $catid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<option value=''>-- Select a Subcategory --</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['subcategoryid'] . "'>" . $row['sname'] . "</option>";
        }
    } else {
        echo "<option value=''>-- No Categories Found --</option>";
    }
}
?>