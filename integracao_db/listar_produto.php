<?php

require_once 'config.php';

// Criando instância da classe Database
$db = new Database();
$conn = $db->connect(); // Obtendo conexão com BD

// Criando a consulta para recuperar todos os usuários
$query = "SELECT id, nome, descricao, preco FROM produtos";

// Preparando a declaração (stmt) com a conexão (PDO)
$stmt = $conn->prepare($query);

// Executa a consulta (resultados ficam armazenados
// dentro do objeto $stmt)
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de produtos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <div
            style="margin:auto; height: fit-content; display:flex; flex-direction: column; gap: 16px; box-shadow: 0 0 5px #000; padding: 10px; border-radius: 5px;">
            <h2>Produtos Cadastrados</h2>
            <table border='1'>
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    <?php while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td style="padding: 8px;"> <?= $linha['id'] ?> </td>
                            <td style="padding: 8px;"> <?= $linha['nome'] ?> </td>
                            <td style="padding: 8px;"> <?= $linha['descricao'] ?> </td>
                            <td style="padding: 8px;"> <?= $linha['preco'] ?> </td>
                            <td style="padding: 8px;"> <a href="deleta_produto.php?id=<?= $linha['id'] ?>">Excluir</a></td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>

            <!-- Link para voltar ao cadastro de usuarios-->
            <p><a href="index.php">Voltar</a></p>
        </div>
    </main>
</body>

</html>
