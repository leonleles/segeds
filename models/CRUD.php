<?php

class CRUD extends Model {

    private $pdo;
    private $banco;
    private $usuario;
    private $senha;

    /**
     * CRUD constructor.
     */
    public function __construct () {
        $this->banco = 'segeds';
        $this->usuario = 'root';
        $this->senha = '';
    }

    //exemplo de $campos para salvar no formato string 'nome, cpf', e os formatos
//    devem ser "'valor1', 'valor2'"

    public function Salvar ($tabela = null, $campos = null, $dados = null) {

        $last_id = null;

        $conn = mysqli_connect('localhost', $this->usuario, $this->senha, $this->banco);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO " . $tabela . "(" . $campos . ") VALUES (" . $dados . ")";

        if ($res = mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

        return $last_id;
    }

    public function Selecionar ($campos = null, $tabela = null, $condicao = null) {

        // A condição deve ser no formato exe: "WHERE id = $id";

        $res = [];

        $sql = "SELECT " . $campos . " FROM " . $tabela . ";";

        if ($condicao != null) {
            $sql = "SELECT " . $campos . " FROM " . $tabela ." ". $condicao . ";";
        }

        try {
            $conn = new PDO('mysql:host=localhost;dbname=' . $this->banco, $this->usuario, $this->senha);
            $stmt = $conn->query($sql);

            while ($linha = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                if (count($linha) > 0) {
                    $res = $linha;
                }
            }


        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        return $res;
    }

    public function Update ($tabela, $valores, $condicao) {

        $res = null;

        // O formato de $valores devem ser string do tipo nome = '".$nome."'

        $sql = "UPDATE " . $tabela . " SET " . $valores . $condicao;

        $conn = mysqli_connect('localhost', $this->usuario, $this->senha, $this->banco);

        if (mysqli_query($conn, $sql)) {
            $res = mysqli_affected_rows($conn);
        }
        mysqli_close($conn);

        return $res;

    }

    public function Query ($sql) {

        // A condição deve ser no formato exe: "WHERE id = $id";

        $res = [];

        try {
            $conn = new PDO('mysql:host=localhost;dbname=' . $this->banco, $this->usuario, $this->senha);
            $stmt = $conn->query($sql);

            while ($linha = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                if (count($linha) > 0) {
                    $res = $linha;
                }
            }

        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        return $res;
    }

}