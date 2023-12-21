<?php
include_once 'res/header.php';
include_once 'func/fetchdata.php';
include_once 'res/conn.php';
?>

<div class="container-fluid">
<div class="container">
  <h2>Rilevamenti</h2>            
  <table class="table table-striped tabella-rilievi">
    <thead>
      <tr>
        <th>ID</th>
        <th>TARGA</th>
        <th>Data</th>
        <th>ID Macchina</th>
        <th>Zona</th>
        <th>Eccezione</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach(fetchRilevamenti($conn) as $res):?>
      <tr>
        <td><?=$res['id']?></td>
        <td><?=$res['targa']?></td>
        <td><?=$res['dataora']?></td>
        <td><?=$res['id_macchina']?></td>
        <td><?=$res['zona']?></td>
        <td><?php foreach(fetchEccezioni($conn) as $ecc):?>
            <span class="bottone"><a onclick="funzione()"><img class="iconcina" src="<?php 
                switch($ecc){
                    case 'residente':
                        echo 'assets/resident.png';
                        break;
                    case 'disabile':
                        echo 'assets/disabled.png';
                        break;
                    case 'ibrida':
                        echo 'assets/hybrid.png';
                        break;
                    case 'abbonato':
                        echo 'assets/subscription.png';
                        break;
                    case 'biglietto':
                        echo 'assets/ticket.png';
                }
                ?>
            "/></a></span>
        <?php endforeach?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
</div>