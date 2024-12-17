<?php
include 'config.php';

$mensagem = ""; // Variável para armazenar a mensagem

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($conn) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];

        $sql = "INSERT INTO teste_pdo.produtos (nome, descricao, preco) VALUES (:nome, :descricao, :preco)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);

        if ($stmt->execute()) {
            header('Location: listar_produto.php');
        } else {
            $mensagem = "Erro ao cadastrar produto.";
        }
    } else {
        $mensagem = "Erro ao conectar ao banco de dados.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Produto</title>
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <div
            style="margin:auto; height: fit-content; display:flex; flex-direction: column; box-shadow: 0 0 5px #000; padding: 10px; border-radius: 5px;">
            <h1>Cadastro de Produto</h1>
            <form action="cadastro_produto.php" method="POST" style="display: flex; flex-direction:column; gap: 16px;">
                <div style="display:flex; flex-direction: column;justify-content: space-between; width: 100%; ">
                    <label for="nome">Nome:</label><br>
                    <input type="text" id="nome" name="nome" required><br><br>
                </div>

                <div style="display:flex; flex-direction: column;justify-content: space-between; width: 100%; ">
                    <label for="descricao">Descrição:</label><br>
                    <input type="text" id="descricao" name="descricao" required><br><br>
                </div>

                <div style="display:flex; flex-direction: column;justify-content: space-between; width: 100%; ">
                    <label for="preco">Preço:</label><br>
                    <input type="text" id="preco" name="preco" required><br><br>
                </div>

                <input type="submit" value="Cadastrar" style="padding: 4px 0px; font-size: 12pt; cursor: pointer;">
            </form>
            <div style="display:flex; justify-content: space-between; width: 100%; gap: 8px;">
                <a href="listar_produto.php">Listar produtos cadastrados</a>
                <a href="index.php">Página Principal</a>
            </div>
        </div>
    </main>
</body>

</html>
