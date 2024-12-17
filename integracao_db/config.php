<?php

class Database {

    private $host = "localhost"; // Host do banco de dados
    private $dbname = "teste_pdo"; // Nome do banco de dados
    private $userName = "root"; // Nome do usuário
    private $password = "(Texs@)*2021"; // Senha do banco de dados

    private $conn;

    // Método para estabelecer a conexão com o banco de dados
    public function connect() {

        try {
            // Instanciar o PDO passando para ele os parâmetro de conexão.
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->userName, $this->password);

            // Configuração para exibir erros
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;

        } catch (PDOException $exception) {
            echo "Erro de conexão" . $exception->getMessage();
        }

    }
}



?>
