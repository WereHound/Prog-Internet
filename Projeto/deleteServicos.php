<?php
session_start();
if (!$_SESSION["access"]) {
    header("location: index.php?ans=login_denied");

}
?>

<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idServico"])) {
    $idServico = $_POST["idServico"];

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `ordem de servico` WHERE Servico_idServico = ?");
    $stmt->execute([$idServico]);
    $servicoCount = $stmt->fetchColumn();

    if ($servicoCount > 0) {

        echo "<script>alert('Nao for possivel deletar esse Servico! Existem Ordens de Servico associadas.');</script>";
        echo "<script>window.location.href='servicos.php';</script>";

    } else {

        try {
            $stmt = $pdo->prepare("DELETE FROM servico WHERE idServico = ?");
            $stmt->execute([$idServico]);
            header("Location: servicos.php");
            exit;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }

} else {
    echo "Invalid request.";
}
?>
