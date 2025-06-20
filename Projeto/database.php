<?php
declare(strict_types=1);

$domain = "mysql:host=127.0.0.1;port=3306;dbname=projectphp"; // 127.0.0.1 is a local connection
$user = "projetophp";
$password = "1234554321";

try {
    $pdo = new PDO($domain, $user, $password);
    echo "Conexao bem-sucedida!";
} catch (PDOException $e) {
    die("Erro ao conectar com o banco: " . $e->getMessage());
}
?>