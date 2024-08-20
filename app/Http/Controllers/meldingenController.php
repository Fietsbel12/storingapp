<?php

$action = $_POST['action'];
if($action == 'create'){
        // Variabelen vullen
    $errors = $_POST['errors'];
    $attractie = $_POST['attractie'];

    if (empty($attractie)) {
        $errors[] = "Vul de attractie-naam in.";
    }
    $capaciteit = $_POST['capaciteit'];

    if (isset($_POST['prioriteit'])) {
        $prioriteit = true;
    } else {
        $prioriteit = false;
    }

    $melder = $_POST['melder'];
    $type = $_POST['type'];
    $gemeld_op = $_POST['gemeld_op'];
    $overige_info = $_POST['overig'];

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "INSERT INTO meldingen (attractie, capaciteit, melder, type, prioriteit, overige_info) VALUES (:attractie, :capaciteit, :melder, :type, :prioriteit, :overige_info)";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ":attractie"     => $attractie,
        ":capaciteit"    => $capaciteit,
        ":melder"        => $melder,
        ":type"          => $type,
        ":prioriteit"    => $prioriteit,
        ":overige_info"  => $overige_info // Fix variable name here
    ]);

    $msg = "Melding opgeslagen";
    header("location:../../../resources/views/meldingen/index.php?msg=$msg");
}

if($action == 'update'){
    $id = $_POST ['id'];
    $capaciteit = $_POST['capaciteit'];

    if (isset($_POST['prioriteit'])) {
        $prioriteit = true;
    } else {
        $prioriteit = false;
    }

    $melder = $_POST['melder'];
    $overige_info = $_POST['overig'];

        // 1. Verbinding
        require_once '../../../config/conn.php';

        // 2. Query
        $query = "UPDATE meldingen SET capaciteit = :capaciteit, prioriteit = :prioriteit, melder = :melder, overige_info = :overige_info WHERE id = :id";
        // 3. Prepare
        $statement = $conn->prepare($query);
    
        // 4. Execute
        $statement->execute([
            ":capaciteit"    => $capaciteit,
            ":melder"        => $melder,
            ":prioriteit"    => $prioriteit,
            ":overige_info"  => $overige_info,
            ":id"            => $id
        ]);
    
        $msg = "De melding is aangepast";
        header("location:../../../resources/views/meldingen/index.php?msg=$msg");
}

if($action == 'delete'){
    $id = $_POST['id'];

     // 1. Verbinding
     require_once '../../../config/conn.php';

     // 2. Query
     $query = "DELETE FROM meldingen WHERE id = :id";
     // 3. Prepare
     $statement = $conn->prepare($query);
 
     // 4. Execute
     $statement->execute([
         ":id"      => $id
     ]);
 
     $msg = "De melding is verwijderd";
     header("location:../../../resources/views/meldingen/index.php?msg=$msg");
}
 
