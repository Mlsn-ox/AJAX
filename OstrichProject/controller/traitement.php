<?php
include "pdo.php";
$sql_all = "SELECT * FROM ostrich ORDER BY ostrich_name";
$stmt_all = $pdo->query($sql_all);
$ostriches = $stmt_all->fetchAll(PDO::FETCH_ASSOC);
$response = [
    "message" => "Ok !",
    "contenu" => $ostriches
];
echo json_encode($response);
