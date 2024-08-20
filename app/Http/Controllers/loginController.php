<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

require_once '../../../config/conn.php';
$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([
    ":username" => $username
]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($statement->rowCount() < 1) {
    die("Deze gebruiker bestaat niet");
}

if (!password_verify($password, $user['password'])) {
    echo 'Het wachtwoord is onjuist';}
//} else {
//  echo 'Het wachtwoord is onjuist';
//}

$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['username'];

header("Location: ../../../resources/views/meldingen/index.php");