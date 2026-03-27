<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="h4 mb-4 text-center">Bem vindo, <?php echo htmlspecialchars($_POST["name"]); ?>!</h1>
                        <p class="mb-2"><strong>Email:</strong> <?php echo htmlspecialchars($_POST["email"]); ?></p>
                        <a href="25.dadosphp.html" class="btn btn-primary w-100 mt-3">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>