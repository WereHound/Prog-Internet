<?php
declare(strict_types=1);



$domain = "mysql:host=localhost;dbname=projectphp";
$user = "root";
$password = "";

try {
    $pdo = new PDO($domain, $user, $password);





} catch (PDOException $e) {
    die("Erro ao conectar com o banco" . $e->getMessage());
}



?>