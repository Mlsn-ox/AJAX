<?php

    if(!empty($_POST['autruche_nom'])){

        $pdo = new PDO("mysql:host=localhost;dbname=makeyourautruche","root","");

        $sql = "INSERT INTO autruche (autruche_nom) VALUES (?)";
        $stmt = $pdo->prepare($sql);
        $isValid = $stmt->execute([$_POST['autruche_nom']]);

        if($isValid){

            $response = [
                "message" => "Ajout de l'autruche réussi",
                "status" => "success",
                "value" => $_POST['autruche_nom']
            ];

            echo json_encode($response);
        }
    }

    