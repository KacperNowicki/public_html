<?php
require_once('conn/connection.php');
$id = (isset($_GET['user'])) ? intval($_GET['user']) : null;

// User resigns from the waiting list
if(!empty($id)) {
// sql to delete a record
    $sql = "DELETE FROM waitlist WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['deleted'] = "Zostałeś usunięty z kolejki";
        header('Location:/enter.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    header('Location:/enter.php');
}