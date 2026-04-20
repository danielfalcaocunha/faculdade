<?php
require_once '28.conexao.php';

// Preparação e consulta no banco de dados
$instrucaoSQL = "SELECT * FROM cliente";
$linhas = [];
$erro = null;

try {
    $resultset = $dsn->query($instrucaoSQL);
    $linhas = $resultset->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $erro = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitura de Clientes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #edf2f7;
            margin: 0;
            padding: 24px;
            color: #2d3748;
        }
        .page {
            max-width: 980px;
            margin: 0 auto;
            background: #ffffff;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.12);
        }
        h1 {
            margin-top: 0;
            color: #1f2937;
        }
        .subtitle {
            color: #4b5563;
            margin-bottom: 24px;
        }
        .table-wrapper {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 680px;
        }
        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background: #1d4ed8;
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 0.02em;
        }
        tr:hover {
            background: #f8fafc;
        }
        .id-cell {
            width: 80px;
        }
        .cpf-cell,
        .email-cell {
            width: 180px;
        }
        .empty-state,
        .error-state {
            padding: 16px;
            border-radius: 12px;
            margin-top: 20px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            color: #334155;
        }
        .error-state {
            background: #fee2e2;
            border-color: #fecaca;
            color: #991b1b;
        }
        .actions {
            margin-top: 24px;
        }
        .actions a {
            display: inline-block;
            margin-right: 14px;
            color: #1d4ed8;
            text-decoration: none;
            font-weight: 600;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="page">
        <h1>Clientes Cadastrados</h1>
        <p class="subtitle">Veja os clientes registrados na tabela <strong>cliente</strong> do banco de dados.</p>

        <?php if ($erro !== null): ?>
            <div class="error-state">Erro na consulta: <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></div>
        <?php elseif (count($linhas) === 0): ?>
            <div class="empty-state">Nenhum cliente encontrado. Cadastre um novo cliente em <a href="28.formulario.html">28.formulario.html</a>.</div>
        <?php else: ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th class="id-cell">ID</th>
                            <th>Nome</th>
                            <th class="cpf-cell">CPF</th>
                            <th class="email-cell">E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($linhas as $row): ?>
                            <?php $cpfFormatado = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $row['cpf_cliente']); ?>
                            <tr>
                                <td class="id-cell"><?= htmlspecialchars($row['id_cliente'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($row['nome_cliente'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td class="cpf-cell"><?= htmlspecialchars($cpfFormatado, ENT_QUOTES, 'UTF-8') ?></td>
                                <td class="email-cell"><?= htmlspecialchars($row['email_cliente'], ENT_QUOTES, 'UTF-8') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <div class="actions">
            <a href="28.formulario.html">Novo cadastro</a>
            <a href="28.cadastro.php">Voltar ao processamento</a>
        </div>
    </div>
</body>
</html>
