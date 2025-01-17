<?php


    if(isset($_POST['id'])){
        $pdo = new PDO("mysql:host=localhost;dbname=makeyourautruche","root","");
        $sql = "DELETE FROM autruche WHERE autruche_id=?";
        $stmt = $pdo->prepare($sql);
        $verif = $stmt->execute([$_POST['id']]);
        if ($verif){
            echo json_encode([
                "message" => "supression de la grosse poulette reussis",
                "status" => "success",
            ]);
        }
    }
