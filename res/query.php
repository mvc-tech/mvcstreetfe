<?php
$conn = mysqli_connect("localhost", "UTENTE", "PASSWORD", "mvc-technology");

function getUsername($username) {
    

    if($result = mysqli_query($conn, "SELECT * FROM customers WHERE id=38 AND username=$username")) {
        $res = mysqli_fetch_assoc($result);
    }

    if($res['username'] == "StreetControl") {
        return true;
    }
}