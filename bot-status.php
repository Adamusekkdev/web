<?php
header('Content-Type: application/json');

$status = 'online'; // lub 'offline'

echo json_encode(['status' => $status]);
?>
