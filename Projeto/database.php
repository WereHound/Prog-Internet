<?php
declare(strict_types=1);

$domain = "mysql:host=192.168.145.102;port=3306;dbname=projectphp";
$user = "projetophp";
$password = "1234554321";

try {
    $pdo = new PDO($domain, $user, $password);
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    die("Erro ao conectar com o banco: " . $e->getMessage());
}
?>