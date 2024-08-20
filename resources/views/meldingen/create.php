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
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
            <input type="hidden" name="action" value="create">

            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" class="form-input">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <!-- hier komt een dropdown -->
                <select id="type" name="type">
                    <option value= "">kies een type</option>
                    <option value="achtbaan">Achtbaan</option>
                    <option value= "draaiend">Draaiend</option>
                    <option value= "kinder">Kinderattractie</option>
                    <option value= "horeca">Horeca</option>
                    <option value= "show">Show</option>
                    <option value= "water">Waterattractie</option>
                    <option value= "overig">Overig</option>
                </select>
            </div>
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input">
            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input">
            </div>
            <div class="form-group">
                <label for="prioriteit">prio:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit">
                <label for="prioriteit">Melding met prioriteit</label>
            </div>
            <div class="form-group">
                <label for="overige_info">overige info:</label>
                <textarea name="overige_info" id="overige_info" class="form-input" rows="4"></textarea>
            </div>

            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>
