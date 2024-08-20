<?php require_once __DIR__.'/../../../config/config.php'; ?> 
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $msg = "Je moet eerst inloggen!";
    header("Location: ../../../login.php?msg=$msg");
    exit;
}
?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <?php
            require_once '../../../config/conn.php';
            $query = "SELECT * FROM meldingen ORDER BY gemeld_op DESC";
            $statment = $conn->prepare($query);
            $statment->execute();
            $meldingen = $statment->fetchAll(PDO:: FETCH_ASSOC);
        ?>
        
        <table>
            <tr>
                <th>Attractie</th>
                <th>Melder</th>
                <th>Type</th>
                <th>capaciteit</th>
                <th>Prio</th>
                <th>Gemeld op</th>
                <th>Overige info</th>
                <th>aanpassen</th>
            </tr>
            <?php foreach($meldingen as $melding):?>
                <tr>
                    <td><p><?php echo $melding['attractie'];?></p></td>
                    <td><p><?php echo $melding['melder'];?></p></td>
                    <td><p><?php echo $melding['type'];?></p></td>
                    <td><p><?php echo $melding['capaciteit'];?></p></td>
                    <td><p><?php echo ($melding['prioriteit'] == 1) ? 'Ja' : 'Nee'; ?></p></td>
                    <td><p><?php echo $melding['gemeld_op'];?></p></td>
                    <td><p><?php echo $melding['overige_info'];?></p></td>
                    <td><a href="edit.php?id=<?php echo $melding['id'];?>">Aanpassen</a></td>
                    
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>
