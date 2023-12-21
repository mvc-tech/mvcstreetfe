<?php 
// include_once "res/header.php";
include_once "res/conn.php";

    $query = "SELECT * FROM rilevamenti where zona='A1'";

    $result = $conn -> query($query);

    $items = [];

    if($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
    }

    while($row = mysqli_fetch_assoc($result)) {
        array_push($items, $row);
    }

    echo sizeof($items);
?>