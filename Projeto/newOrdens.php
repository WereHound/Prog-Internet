<?php
require_once("header.php");
echo "<h2>User: " . $_SESSION["username"] . " </h2>";
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT idServico FROM servico");
    $stmt->execute();

    $servicosidServico = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

try {

    $stmt = $pdo->prepare("SELECT Placa FROM veiculo");
    $stmt->execute();

    $veiculosPlaca = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $idOrdem = $_POST['idOrdem'];
        $Data_de_Entrega_do_Veiculo = $_POST['Data_de_Entrega_do_Veiculo'];
        $Data_de_Devolucao_do_Veiculo = $_POST['Data_de_Devolucao_do_Veiculo'];
        $Servico_idServico = $_POST['Servico_idServico'];
        $Veiculo_Placa = $_POST['Veiculo_Placa'];

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM `ordem de servico` WHERE idOrdem = ?");
        $stmt->execute([$idOrdem]);
        $idOrdemExists = $stmt->fetchColumn();

        if ($idOrdemExists > 0) {
            echo "<div class='alert alert-danger'>Erro: idOrdem ja existe!</div>";
        } else {

            $stmt = $pdo->prepare("INSERT INTO `ordem de servico` (idOrdem, Data_de_Entrega_do_Veiculo, Data_de_Devolucao_do_Veiculo, Servico_idServico, Veiculo_Placa) VALUES (?, ?, ?, ?, ?)");
            if ($stmt->execute([$idOrdem, $Data_de_Entrega_do_Veiculo, $Data_de_Devolucao_do_Veiculo, $Servico_idServico, $Veiculo_Placa])) {
                header("Location: ordens.php");
                exit;
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Ordem de Servico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Cadastrar Ordem de Servico</h2>

        <form method="post" action="">
            <div class="mb-3">
                <label for="idOrdem" class="form-label">idOrdem</label>
                <input type="text" id="idOrdem" name="idOrdem" class="form-control" placeholder="0000-00" required>
            </div>

            <div class="mb-3">
                <label for="Data_de_Entrega_do_Veiculo" class="form-label">Data_de_Entrega_do_Veiculo</label>
                <input type="text" id="Data_de_Entrega_do_Veiculo" name="Data_de_Entrega_do_Veiculo"
                    class="form-control" placeholder="YYYY-MM-DD HH-MM-SS" required>
            </div>

            <div class="mb-3">
                <label for="Data_de_Devolucao_do_Veiculo" class="form-label">Data_de_Devolucao_do_Veiculo
                    (Optional)</label>
                <input type="text" id="Data_de_Devolucao_do_Veiculo" name="Data_de_Devolucao_do_Veiculo"
                    class="form-control" placeholder="YYYY-MM-DD HH-MM-SS" required>
            </div>

            <div class="mb-3">

                <label for="Servico_idServico" class="form-label">Servico_idServico</label>
                <select name="Servico_idServico">
                    <?php foreach ($servicosidServico as $idServico): ?>

                        <option value="<?php echo htmlspecialchars($idServico['idServico']); ?>">
                            <?php echo htmlspecialchars($idServico['idServico']); ?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>

            <div class="mb-3">

                <label for="Veiculo_Placa" class="form-label">Veiculo_Placa</label>
                <select name="Veiculo_Placa">
                    <?php foreach ($veiculosPlaca as $Placa): ?>

                        <option value="<?php echo htmlspecialchars($Placa['Placa']); ?>">
                            <?php echo htmlspecialchars($Placa['Placa']); ?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="ordens.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>