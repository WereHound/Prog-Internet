<?php
declare(strict_types=1);



$domain = "mysql:host=localhost;dbname=projectphp";
$user = "projetophp";
$password = "1234554321";

try {
    $pdo = new PDO($domain, $user, $password);





} catch (PDOException $e) {
    die("Erro ao conectar com o banco" . $e->getMessage());
}



?>