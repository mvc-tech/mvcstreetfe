<?php
include_once 'res/header.php';
include_once 'func/fetchdata.php';
include_once 'res/conn.php';
?>

<div class="container-fluid">
    <div class="container">
        <div class="big-spacer"></div>
    <h2>Rilevamenti</h2>            
    <table class="table table-striped tabella-rilievi">
        <thead>
        <tr>
            <th>ID</th>
            <th>TARGA</th>
            <th>Data</th>
            <th>ID Macchina</th>
            <th>Zona</th>
            <th>Eccezioni</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach(fetchRilevamenti($conn) as $res):?>
        <tr id="<?=$res['id']?>">
            <td><?=$res['id']?></td>
            <td><?=$res['targa']?></td>
            <td><?=$res['dataora']?></td>
            <td><?=$res['id_macchina']?></td>
            <td><?=$res['zona']?></td>
            <td><?php foreach(fetchEccezioni($conn) as $ecc):?>
                <span class="nopadding"><a onclick="hideElement(<?=$res['id']?>)"><img <?php 
                    switch($ecc){
                        case 'residente':
                            echo 'class="bottone iconcina" id="residente" src="assets/resident.png"';
                            break;
                        case 'disabile':
                            echo 'class="bottone iconcina" id="disabile" src="assets/disabled.png"';
                            break;
                        case 'ibrida':
                            echo 'class="bottone iconcina" id="ibrida" src="assets/hybrid.png"';
                            break;
                        case 'abbonato':
                            echo 'class="bottone iconcina" id="abbonato" src="assets/subscription.png"';
                            break;
                        case 'biglietto':
                            echo 'class="bottone iconcina" id="biglietto" src="assets/ticket.png"';
                    }
                    ?>
                /></a></span>
            <?php endforeach?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>

<script>

    function hideElement(element){
        var riga = document.getElementById(element);
        riga.style.display = 'none';
        console.log(element);
        /*dati = {'id' = element, 'attivo' = '1'};

        $.ajax({
            type="POST",
            url="b.php",
            data=dati,
            dataType:"json",
            success: function(data)
            {
                if(!data.error)
                {
                    
                }
            }
        })*/



    }



</script>