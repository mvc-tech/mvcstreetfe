<?php
include_once "res/header.php";
include_once "res/conn.php";
include_once "func/fetchdata.php";
?>

<div class='container-fluid'>
    <div class='container-flex'>
        <div class='container-img'>
            <img src='assets/streetcontrol.jpg'>
        </div>
        <form class='container-flex' method='POST' action='visual.php'>
            <label>Scegli la zona:</label>
            <select class='select' name='zona'>
                <option value=''>Seleziona</option>

                <?php foreach(fetchZone($conn) as $res) :?>
                <option><?=$res?></option>
                <?php endforeach; ?>
            </select>
            <div class='small-spacer'></div>
            <button type='submit' class="btn btn-primary" id='btn-home' name='home'>Avanti</button>
        </form>
    </div>
</div>
