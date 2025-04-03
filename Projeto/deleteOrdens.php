<?php
session_start();
if (!$_SESSION["access"]) {
    header("location: index.php?ans=login_denied");

}
?>

<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idOrdem"])) {
    $idOrdem = $_POST["idOrdem"];

    try {
        $stmt = $pdo->prepare("DELETE FROM `ordem de servico` WHERE idOrdem = ?");
        $stmt->execute([$idOrdem]);

        header("Location: ordens.php");
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
