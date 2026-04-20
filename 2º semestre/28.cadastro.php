<?php
require_once '28.conexao.php';

$mensagem = '';
$mensagemTipo = 'info';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome_cliente'] ?? '');
    $email = trim($_POST['email_cliente'] ?? '');
    $cpf = preg_replace('/\D/', '', $_POST['cpf_cliente'] ?? '');

    if ($nome === '' || $email === '' || $cpf === '') {
        $mensagem = 'Preencha todos os campos antes de enviar.';
        $mensagemTipo = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagem = 'O e-mail informado não é válido.';
        $mensagemTipo = 'error';
    } elseif (!preg_match('/^\d{11}$/', $cpf)) {
        $mensagem = 'O CPF deve conter 11 dígitos numéricos.';
        $mensagemTipo = 'error';
    } else {
        try {
            $sql = 'INSERT INTO cliente (nome_cliente, cpf_cliente, email_cliente) VALUES (:nome, :cpf, :email)';
            $stmt = $dsn->prepare($sql);
            $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindValue(':cpf', $cpf, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $mensagem = 'Cliente cadastrado com sucesso!';
            $mensagemTipo = 'success';
        } catch (PDOException $e) {
            $mensagem = 'Erro ao cadastrar o cliente: ' . $e->getMessage();
            $mensagemTipo = 'error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            padding: 20px;
            color: #2c3e50;
        }
        .card {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            padding: 24px;
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.08);
        }
        h1 {
            margin-top: 0;
            color: #1f4e79;
        }
        .message {
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .message.success {
            background: #ebf8f2;
            color: #1d6b37;
            border: 1px solid #a7e2b8;
        }
        .message.error {
            background: #fff1f0;
            color: #a42b2b;
            border: 1px solid #f5c2c2;
        }
        a {
            color: #1c6fb5;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Resultado do Cadastro</h1>

        <?php if ($mensagem !== ''): ?>
            <div class="message <?= $mensagemTipo === 'success' ? 'success' : 'error' ?>">
                <?= htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <p>
            <a href="28.formulario.html">Cadastrar outro cliente</a><br>
            <a href="28.leitura.php">Ver clientes cadastrados</a>
        </p>
    </div>
</body>
</html>
