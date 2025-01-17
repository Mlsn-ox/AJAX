<?php

if (isset($_POST["materiau"])) {
    $materiau = $_POST["materiau"];
    $pdo = new PDO("mysql:host=localhost;dbname=protheseus", "root", "1234");
    if ($materiau) {
        $sql = "SELECT * FROM protheses WHERE materiau=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$materiau]);
    } else {
        $sql = "SELECT * FROM protheses";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
    $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($liste) {
        $response = [
            "contenu" => $liste
        ];
        echo json_encode($response);
    }
}
