<?php
include_once 'res/conn.php';

$id = $_POST['id'];
$attivo = $_POST['attivo'];
$eccezione = $_POST['eccezione'];

$sql = "UPDATE rilevamenti SET controllato=$attivo, eccezione=$eccezione WHERE id=$id";

if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}