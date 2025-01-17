<?php

$pdo = new PDO("mysql:host=localhost;dbname=brosseAGogo", "root", "1234");
$sql = "SELECT * FROM brosse";
$stmt = $pdo->query($sql);
$brosses = $stmt->fetchAll(PDO::FETCH_ASSOC);
$aleatoire = rand(0, (count($brosses) - 1));
if ($brosses) {
    $response = [
        "message" => "Brosse récupérée",
        "contenu" => $brosses[$aleatoire],
    ];
} else {
    $response = [
        "message" => "Erreur!",
        "contenu" => null
    ];
}
echo json_encode($response);
