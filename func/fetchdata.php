<?php



function fetchZone($conn){
    $query = "SELECT * FROM zona";

    $result = $conn -> query($query);

    $items = [];


    if($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
    }

    while($row = mysqli_fetch_assoc($result)) {
        array_push($items, $row);
    }

    $ritorno = explode(', ' , $items[0]['zona']); 

    // var_dump($ritorno);
    return $ritorno;
}


function fetchTable($conn,$zona){
    $query = "SELECT * FROM rilevamenti where zona='$zona'";

    $result = $conn -> query($query);

    $items = [];


    if($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
    }

    while($row = mysqli_fetch_assoc($result)) {
        array_push($items, $row);
    }

    // var_dump($ritorno);
    return $items;
}

function fetchRilevamenti($conn){
    $query = "SELECT * FROM rilevamenti WHERE controllato=0";

    $result = $conn -> query($query);

    $items = [];


    if($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
    }

    while($row = mysqli_fetch_assoc($result)) {
        array_push($items, $row);
    }

    // var_dump($ritorno);
    return $items;
}

function fetchEccezioni($conn){
    $query = "SELECT * FROM eccezioni";

    $result = $conn -> query($query);

    $items = [];


    if($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
    }

    while($row = mysqli_fetch_assoc($result)) {
        array_push($items, $row);
    }

    $ritorno = explode(',', $items[0]['eccezioni']);

    // var_dump($ritorno);
    return $ritorno;
}
// @arary -> fetch_assoc() tabella mvcstreet.controllo_singolo
// function fetchControlliSingoli($conn) {
//     $query = "SELECT * FROM controllo_singolo";

//     $result = $conn -> query($query);

//     $items = [];


//     if($conn -> connect_errno) {
//         echo "Failed to connect to MySQL: " . $conn -> connect_error;
//     }

//     while($row = mysqli_fetch_assoc($result)) {
//         array_push($items, $row);
//     }

//     return $items;
// }

// @arary -> fetch_assoc() tabella mvcstreet.controlli_aggregati
// function fetchControlliAggregati($conn) {
//     $query = "SELECT * FROM controlli_aggregati";

//     $result = $conn -> query($query);

//     $items = [];


//     if($conn -> connect_errno) {
//         echo "Failed to connect to MySQL: " . $conn -> connect_error;
//     }

//     while($row = mysqli_fetch_assoc($result)) {
//         array_push($items, $row);
//     }

//     return $items;
// }