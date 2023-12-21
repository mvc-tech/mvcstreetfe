<?php 
include_once "res/header.php";
include_once "res/conn.php";
include_once "func/fetchdata.php";
?>

<?php 
if(isset($_POST['home'])){

    $zona = $_POST['zona'];

    ?>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">targa</th>
                    <th scope="col">eccezione</th>
                    <th scope="col">dataora</th>
                    <th scope="col">ID Macchina</th>
                    <th scope="col">Zona</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach(fetchTable($conn, $zona) as $controllo) :?>
                        <tr class='tr'>
                        <td><?=$controllo['id']?></td>
                        <td><?=$controllo['targa']?></td>
                        <td><?=$controllo['eccezione']?></td>
                        <td><?=$controllo['dataora']?></td>
                        <td><?=$controllo['id_macchina']?></td>
                        <td><?=$controllo['zona']?></td>
                        </tr>

                    <?php endforeach; ?>
            </tbody>
        </table>
    <?php
}else{
    die('Errore');
}
?>

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
            setInterval(updateTable, 5000);
        });
</script>