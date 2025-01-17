<?php


    $pdo = new PDO("mysql:host=localhost;dbname=makeyourautruche","root","");

    $sql = "SELECT * FROM autruche ORDER BY autruche_id DESC";
    $stmt = $pdo->query($sql);
    $autruches = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($autruches);