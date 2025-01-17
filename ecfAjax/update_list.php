<?php

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $pdo = new PDO("mysql:host=localhost;dbname=likemytrottinette", "root", "1234");
    $sql = "SELECT trottinette_valid FROM trottinette WHERE trottinette_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $affichage = $stmt->fetch(PDO::FETCH_ASSOC);
    $toggle = $affichage['trottinette_valid'] ? 0 : 1;
    $sqlLike = "UPDATE trottinette SET trottinette_valid=? WHERE trottinette_id=?";
    $stmtLike = $pdo->prepare($sqlLike);
    $verif = $stmtLike->execute([$toggle, $id]);
    if ($verif) {
        $response = [
            "valid" => $toggle,
            "id" => $id
        ];
        echo json_encode($response);
    }
}
