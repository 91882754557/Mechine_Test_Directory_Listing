<?php
include_once 'dbconfig.php';
$sql = "DELETE FROM inserfiles WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
echo "Record deleted successfully";
} else {
echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>