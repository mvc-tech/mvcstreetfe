<?php 
include_once "res/header.php";
include_once "res/conn.php";
include_once "func/fetchdata.php";
?>

<?php 
if(isset($_POST['home'])){

    $zona = $_POST['zona'];

    var_dump(fetchTable($conn, $zona));

}else{
    die('Errore');
}