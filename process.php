<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die($mysqli_error($mysqli));

// To check if the save button is pressed

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    // To inset the above records into a database table  
    $mysqli->query("INSERT INTO data (name,location) VALUES('$name','$location')") or
        die($mysqli->error);

    $_SESSION['message'] = " Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}
if (isset($_GET['delete'])) { // check if variable exists
    $id = $_GET['delete']; // Asignning grabbed id in index.php?delete



    $mysqli->query("DELETE FROM data WHERE id = $id") or die($mysqli->error);

    $_SESSION['message'] = " Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}