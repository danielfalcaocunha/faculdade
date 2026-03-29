<?php
/*** Conexão com o banco de dados PostgreSQL ***/
// Parametros de conexão
define('HOST', 'ep-shiny-shape-anldwvuu-pooler.c-6.us-east-1.aws.neon.tech');
define('PORT', '5432');
define('DBNAME', 'neondb');
define('USERNAME', 'neondb_owner');
define('PASSWORD', 'npg_YXUHgRfEB9C0');

try {
    // Criar a conexão
    $dsn = new PDO("pgsql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME, USERNAME, PASSWORD);
    // Mensagem de sucesso
    echo "Conexão bem-sucedida!<br>";

} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit; //Interrompe a execução do script em caso de erro
}
?>