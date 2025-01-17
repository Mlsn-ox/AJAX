<?php
include "pdo.php";

if (!empty($_POST['name'])) {
    $name = ucfirst($_POST['name']);
    $sex = $_POST['sex'];
    $birthdate = $_POST['birthdate'];
    try {
        $sql = "INSERT INTO ostrich (ostrich_name, ostrich_sex, ostrich_birthdate) 
            VALUE (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $name,
            $_POST['sex'],
            $_POST['birthdate']
        ]);
        header("Location: ../view/form.php?message=Autruche ajoutée&status=success");
    } catch (PDOException $e) {
        $message = $e->getMessage();
        header("Location: ../view/form.php?message=$message");
    }
} else {
    header("Location: ../view/form.php?message=Veuillez remplir le formulaire correctement&status=error");
}
