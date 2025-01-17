<?php
include "pdo.php";
if (isset($_GET['ostrich_id'])) {
    $id = $_GET['ostrich_id'];
    $sql = "DELETE FROM ostrich WHERE ostrich_id=?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        header("Location: ../view/form.php");
    }
}
