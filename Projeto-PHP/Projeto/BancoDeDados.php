<?php require_once __DIR__ . "/Sessoes.php"; ?>

<?php

class BancoDeDados
{
    private $pdo;

    function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=banco_de_eventos;", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Meu Erro De Conexão " . $e->getMessage();
        }
    }

    function procura($palavra)
    {//Método para Pesquisa
        $sql = " SELECT * FROM eventos WHERE nome LIKE  ? ";
        $params = array("%$palavra");
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function selectId($id)
    {//Método para Retornar Tudo De Um Evento Especifico
        $sql = " SELECT * FROM eventos WHERE id = :ID  ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ":ID" => $id
        ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function select()
    {//Método para Retornar Tudo De Uma Tabela
        $sql = " SELECT * FROM eventos ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function insertUser($email, $senha)
    {//Método para Criar Usuário

        $sql = " SELECT * FROM usuario WHERE email = :EMAIL  ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ":EMAIL" => $email
        ));

        if ($stmt->rowCount() == 0) {//Se Retornar Nenhuma Linha o Usuário e Criado
            $sql = " INSERT INTO usuario (email,senha) VALUES (:EMAIL,:SENHA) ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(
                ":EMAIL" => $email,
                ":SENHA" => $senha
            ));
            $_SESSION["idUsuario"] = $email;
            header("Location:index.php");
            die();
        } else {//Se Retornar Alguma Linha o Usuário Ja Existe
            $_SESSION["erro"] = "<h5>Este Usuário Ja Existe</h5>";
            header("Location:Form-CriarConta.php");
            die();
        }

    }

    function loginUser($email, $senha)
    {//Método para Logar Usuário
        $sql = " SELECT * FROM usuario WHERE email = :EMAIL AND senha = :SENHA ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ":EMAIL" => $email,
            ":SENHA" => md5($senha)
        ));
        if ($stmt->rowCount() > 0) {// Usuário Logado Com Sucesso
            $_SESSION["idUsuario"] = $email;
            header("Location:index.php");
            die();
        } else { // Usuário Errou Algum Dado
            $_SESSION["erro"] = "<h5>Senha ou Email Errados</h5>";
            header("Location:Form-Login.php");
            die();
        }
    }

    function insert($nome, $localizacao, $data, $horario)
    {//Método para Inserir Dados
        $sql = " INSERT INTO eventos (nome,localizacao,data,horario) 
        VALUES (:NOME,:LOCALIZACAO,:DATA,:HORARIO) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ":NOME" => $nome,
            ":LOCALIZACAO" => $localizacao,
            ":DATA" => $data,
            ":HORARIO" => $horario
        ));
        header("Location:index.php");
        die();
    }

    function update($id, $nome, $localizacao, $data, $horario)
    {//Método para Atualizar Dados
        $sql = "  UPDATE eventos SET nome = :NOME  , localizacao = :LOCALIZACAO ,
        data = :DATA , horario = :HORARIO WHERE id = :ID ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ":NOME" => $nome,
            ":LOCALIZACAO" => $localizacao,
            ":DATA" => $data,
            ":HORARIO" => $horario,
            ":ID" => $id
        ));
        header("Location:index.php");
        die();
    }

    function delete($id)
    {//Método para Deletar
        $sql = " DELETE FROM eventos WHERE id = :ID  ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ":ID" => $id
        ));
        header("Location:index.php");
        die();
    }

}

$banco = new BancoDeDados;

