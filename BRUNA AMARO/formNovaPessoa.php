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
<form action="FormNovaPessoa.php" method="POST">
<div class="BodyCentro">
    <div class='quadrado-central'>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="text" id="dataNascimento" name="dataNascimento" required>

        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="sexo" required>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <button class="buttonForm input-next" type="submit">Salvar</button>
    </div>
</div>
</form>

</body>
</html>

<?php
// Lembre-se de fechar a conexão
$conn->close();
?>