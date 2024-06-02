<?php
session_start();

$response = array(
    'loggedIn' => false
);

if (isset($_SESSION['Nombre'])) {
    $response['loggedIn'] = true;
    $response['user'] = $_SESSION['Nombre'];
}

header('Content-Type: application/json');
echo json_encode($response);

?>
