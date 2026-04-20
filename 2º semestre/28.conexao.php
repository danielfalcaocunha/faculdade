<?php
/*** Conexão com o banco de dados PostgreSQL ***/
// Parâmetros de conexão
define('HOST', 'ep-shiny-shape-anldwvuu-pooler.c-6.us-east-1.aws.neon.tech');
define('PORT', '5432');
define('DBNAME', 'neondb');
define('USERNAME', 'neondb_owner');
define('PASSWORD', 'npg_YXUHgRfEB9C0');

try {
    // Criar a conexão PDO
    $dsn = new PDO("pgsql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME, USERNAME, PASSWORD);
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit; // Interrompe a execução do script em caso de erro
}
?>