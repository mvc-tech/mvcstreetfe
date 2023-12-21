<?php
include_once 'res/conn.php';

$sql = "UPDATE rilevamenti SET attivo=$attivo WHERE id=$id";

if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($con));
}