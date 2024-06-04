<?php
session_start();

$response = array(
    'loggedIn' => false
);

if (isset($_SESSION['Nombre'])) {
    $response['loggedIn'] = true;
    $response['user'] = $_SESSION['Nombre'];
    $response['id'] = $_SESSION['idUsuarios'];
}

header('Content-Type: application/json');
echo json_encode($response);

?>
