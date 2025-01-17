<?php

$syllabes = ["kre", "gha", "zu", "shu", "jig", "vra", "lo", "mi", "quy", "cho", "hy", "na", "va", "xox", "zy"];

$syllabeNbr = rand(2, 4);
$nom = "";

for ($i = 0; $i < $syllabeNbr; $i++) {
    // Array rand permet de générer des index aléatoire entre 0 et la taille du tableau -1
    $nom .= $syllabes[array_rand($syllabes)];
}

// On a 50% de chance d'avoir une fille et/ou un garçon
$genre = rand(0, 1) ? "M" : "F";

$pdo = new PDO("mysql:host=localhost;dbname=atelier", "root", "1234");

$image = $genre == "M" ? 'homme' . rand(0, 1) . ".png" : 'femme' . rand(0, 1) . ".png";

$sql = "INSERT INTO larbin(nom_larbin, genre_larbin, image_larbin) VALUES ('$nom', '$genre', '$image')";

$verif = $pdo->query($sql);

if ($verif) {
    $sql_tout = "SELECT * FROM larbin";
    $stmt_tout = $pdo->query($sql_tout);
    $larbins = $stmt_tout->fetchAll(PDO::FETCH_ASSOC);
    $response = [
        "message" => "Ok !",
        "contenu" => $larbins
    ];
} else {

    $response = [
        "message" => "Erreur!",
        "contenu" => null
    ];
}

echo json_encode($response);
