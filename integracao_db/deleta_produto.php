<?php

require_once 'config.php';

// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Criando instância da classe Database
    $db = new Database();
    $conn = $db->connect(); // Obtendo conexão com BD

    $query = "DELETE FROM produtos WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    try {
        if ($stmt->execute()) {
            header("Location: listar_produto.php");
        } else {
            echo "Erro ao excluir o produto número: $id";
        }
    } catch (PDOException $ex) {
        echo "Erro: " . $ex->getMessage();
    }

}

?>
