<?php
include 'Resources/Php/db_connect.php';

if (isset($_GET['station'])){
    $sql = "DELETE FROM stations WHERE id=".$_GET['station'];
    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: dashboard.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
