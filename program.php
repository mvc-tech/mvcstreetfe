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
        <tr class="tr" id="<?=$res['id']?>">
            <td><?=$res['id']?></td>
            <td><?=$res['targa']?></td>
            <td><?=$res['dataora']?></td>
            <td><?=$res['id_macchina']?></td>
            <td><?=$res['zona']?></td>
            <td><?php foreach(fetchEccezioni($conn) as $ecc):?>
                <span class="nopadding"><a><img <?php 
                $residente = ", 'residente'";
                $disabile = ", 'disabile'";
                $ibrida = ", 'ibrida'";
                $abbonato = ", 'abbonato'";
                $biglietto = ", 'biglietto'";
                    switch($ecc){
                        case 'residente':
                            echo 'class="bottone iconcina" id="residente" onclick="hideElement('.$res['id'].$residente.')" src="assets/resident.png"';
                            break;
                        case 'disabile':
                            echo 'class="bottone iconcina" id="disabile" onclick="hideElement(' . $res['id'].$disabile.')" src="assets/disabled.png"';
                            break;
                        case 'ibrida':
                            echo 'class="bottone iconcina" id="ibrida" onclick="hideElement(' . $res['id'].$ibrida.')" src="assets/hybrid.png"';
                            break;
                        case 'abbonato':
                            echo 'class="bottone iconcina" id="abbonato" onclick="hideElement(' . $res['id'].$abbonato.')" src="assets/subscription.png"';
                            break;
                        case 'biglietto':
                            echo 'class="bottone iconcina" id="biglietto" onclick="hideElement(' . $res['id'].$biglietto.')" src="assets/ticket.png"';
                    }
                    ?>
                /></a></span>
            <?php endforeach;?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>

<script>

    function hideElement(element, eccezione){
        var riga = document.getElementById(element);
        var atti = 1;
        console.log(eccezione);
        //var dati = {'id':element, 'attivo':atti};
        $.ajax({
            type: "POST",
            data: {'id':element, 'attivo':atti, 'eccezione':eccezione},
            url: "b.php",
            success: function(element, atti) {
                riga.style.display = 'none';
                console.log(element);
            }
        })
    }
    </script>

    <script>

    $(document).ready(function() {
            // Funzione per aggiornare la tabella


            function updateTable() {
                tr = document.getElementsByClassName('tr');

                num= tr.length;

                $.ajax({
                    url: 'a.php', 
                    type: 'POST',
                    success: function(data) {
                        if(data == num)
                        {
                            console.log('nulla')
                        }else if(data > num){
                            location.reload();
                        }
                    }
                });
            }
        // Aggiorna la tabella ogni 5 secondi (modificabile a seconda delle esigenze)
        setInterval(updateTable, 10000);
    });



</script>