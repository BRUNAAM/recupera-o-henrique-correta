<?php
// Inicia a sessão
session_start();

// Inclua o arquivo de conexão
include 'conectar.php';

// Verifica se a sessão está ativa (usuário autenticado)
if (!isset($_SESSION['usuario'])) {
    // Se não estiver, redireciona para index.php
    header("Location: index.php");
    exit(); // Encerra o script para evitar a execução do restante do código
}

// Verifica se o ID da pessoa foi passado por parâmetro na URL
if (!isset($_GET['idPessoa'])) {
    // Se não houver ID, redireciona para sistema.php
    header("Location: sistema.php");
    exit(); // Encerra o script para evitar a execução do restante do código
}

// Obtém o ID da pessoa da URL
$idPessoa = $_GET['idPessoa'];

// Consulta no banco de dados para obter os dados da pessoa com o ID específico
$sql = "SELECT * FROM pessoas WHERE idPessoa = $idPessoa";
$result = $conn->query($sql);

// Verifica se a consulta retornou alguma linha
if ($result->num_rows == 0) {
    // Se não houver registros, redireciona para sistema.php
    header("Location: sistema.php");
    exit(); // Encerra o script para evitar a execução do restante do código
}

// Obtém os dados da pessoa
$pessoa = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pessoa</title>
</head>
<body>

<h1>Editar Pessoa</h1>

<!-- Formulário para editar os dados da pessoa -->
<form action="ActionPessoa.php" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="idPessoa" value="<?php echo $pessoa['idPessoa']; ?>">
<div class="BodyCentro">
    <div class='quadrado-central'>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $pessoa['nome']; ?>" required>
    
        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="text" id="dataNascimento" name="dataNascimento" value="<?php echo $pessoa['dataNascimento']; ?>" required>
   
        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="sexo" value="<?php echo $pessoa['Sexo']; ?>" required>
   
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $pessoa['telefone']; ?>" required>
    
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $pessoa['email']; ?>" required>
  
        <button type="submit">Salvar Alteração</button>
    </div>
</div>
</form>

</body>
</html>

<?php
// fecha a conexão
$conn->close();
?>
