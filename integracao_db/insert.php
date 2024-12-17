<?php

require_once 'config.php';

// Verificar se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $db = new Database();
    $conn = $db->connect();

    if ($conn) {
        // Preparando a query para inserir os dados
        $query = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";

        // Preparando declaração com o PDO
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);

        try {
            if ($stmt->execute()) {
                header('Location: listar_usuario.php');
            } else {
                echo "Erro ao cadastrar usuário.";
            }
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    } else {
        echo "Erro ao conectar ao banco de dados.";
    }
}

?>
