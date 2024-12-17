<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <title>Cadastrar Usuário</title>
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <div
            style="margin:auto; height: fit-content; display:flex; flex-direction: column; box-shadow: 0 0 5px #000; padding: 10px; border-radius: 5px;">
            <h1>Inserir dados de Usuário</h1>
            <form action="insert.php" method="post" style="display: flex; flex-direction:column; gap: 16px;">
                <div style="display:flex; flex-direction: column;justify-content: space-between; width: 100%; ">
                    <label for="nome">Nome:</label><br>
                    <input type="text" name="nome" required>
                </div>
                <div style="display:flex; flex-direction: column; justify-content: space-between; width: 100%; ">
                    <label for="email">E-mail:</label><br>
                    <input type="email" name="email" required><br><br>
                </div>

                <input type="submit" value="Cadastrar" style="padding: 4px 0px; font-size: 12pt; cursor: pointer;">
            </form>

            <div style="display:flex; justify-content: space-between; width: 100%; gap: 8px;">
                <a href="listar_usuario.php">Listar usuários cadastrados</a>
                <a href="index.php">Página Principal</a>
            </div>
        </div>
    </main>
</body>

</html>
