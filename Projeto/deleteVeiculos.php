<?php
session_start();
if (!$_SESSION["access"]) {
    header("location: index.php?ans=login_denied");

}
?>

<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Placa"])) {
    $Placa = $_POST["Placa"];

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `ordem de servico` WHERE Placa = ?");
    $stmt->execute([$Placa]);
    $veiculoCount = $stmt->fetchColumn();

    if ($veiculoCount > 0) {

        echo "<script>alert('Nao for possivel deletar esse Veiculo! Existem Ordens de Servico associadas.');</script>";
        echo "<script>window.location.href='veiculos.php';</script>";

    } else {

        try {
            $stmt = $pdo->prepare("DELETE FROM veiculo WHERE Placa = ?");
            $stmt->execute([$Placa]);
            header("Location: veiculos.php");
            exit;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }

} else {
    echo "Invalid request.";
}
?>