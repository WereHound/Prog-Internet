<?php
session_start();
if (!$_SESSION["access"]) {
    header("location: index.php?ans=login_denied");

}
?>

<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["CPF"])) {
    $CPF = $_POST["CPF"];

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM veiculo WHERE Cliente_CPF = ?");
    $stmt->execute([$CPF]);
    $veiculoCount = $stmt->fetchColumn();

    if ($veiculoCount > 0) {
        echo "<script>alert('Nao for possivel deletar esse Cliente! Existe veiculos associados.');</script>";
        echo "<script>window.location.href='clientes.php';</script>";
    } else {
        try {
            $stmt = $pdo->prepare("DELETE FROM cliente WHERE CPF = ?");
            $stmt->execute([$CPF]);
            header("Location: clientes.php");
            exit;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
