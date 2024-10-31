<?php
include "../DataBase.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM futebol WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: /capoeira?page=listar");
        exit;
    } else {
        echo "Erro ao deletar o registro";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: /danca?page=novo");
    exit;
}
