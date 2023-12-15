<?php
session_start();

include ('conectar.php');

if ( $_SESSION['logado'] != 1 ){
    header("Location: index.php");
    exit(); 
}

// Verifica se a ação é definida
if (isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];

    // Lógica para cadastrar uma nova pessoa
    if ($acao == 'cadastrar') {
        $nome = $_POST['nome'];
        $dataNascimento = $_POST['dataNascimento'];
        $sexo = $_POST['sexo'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $sql = "INSERT INTO pessoas (nome, dataNascimento, Sexo, telefone, email) VALUES ('$nome', '$dataNascimento', '$sexo', '$telefone', '$email')";
    }

    // Lógica para editar uma pessoa existente
    elseif ($acao == 'editar') {
        $idPessoa = $_POST['idPessoa'];
        $nome = $_POST['nome'];
        $dataNascimento = $_POST['dataNascimento'];
        $sexo = $_POST['sexo'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $sql = "UPDATE pessoas SET nome = '$nome', dataNascimento = '$dataNascimento', Sexo = '$sexo', telefone = '$telefone', email = '$email' WHERE idPessoa = $idPessoa";
    }

    // Lógica para excluir uma pessoa
    elseif ($acao == 'excluir') {
        $idPessoa = $_GET['idPessoa'];
        $sql = "DELETE FROM pessoas WHERE idPessoa = $idPessoa";
    }

    // Caso a ação seja desconhecida
    else {
        echo "Ação desconhecida.";
        exit();
    }

    // Executa a consulta no banco de dados
    if ($conn->query($sql) === TRUE) {
        header("Location: sistema.php");

    } else {
        echo "Erro ao executar a operação: " . $conn->error;
    }
} 
// Fecha a conexão
$conn->close();
?>
