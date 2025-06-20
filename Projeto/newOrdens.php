<?php
require_once("header.php");
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT idServico FROM servico");
    $stmt->execute();

    $idServicoList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

try {

    $stmt = $pdo->prepare("SELECT Placa FROM veiculo");
    $stmt->execute();

    $PlacaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        $Data_de_Entrada_do_Veiculo = $_POST['Data_de_Entrada_do_Veiculo'];
        $Data_de_Devolucao_do_Veiculo = $_POST['Data_de_Devolucao_do_Veiculo'];
        $idServico = $_POST['idServico'];
        $Placa = $_POST['Placa'];

            $stmt = $pdo->prepare("INSERT INTO `ordem de servico` (Data_de_Entrada_do_Veiculo, Data_de_Devolucao_do_Veiculo, idServico, Placa) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$Data_de_Entrada_do_Veiculo, $Data_de_Devolucao_do_Veiculo, $idServico, $Placa])) {
                header("Location: ordens.php");
                exit;
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
                <label for="Data_de_Entrada_do_Veiculo" class="form-label">Data de Entrada do Veiculo</label>
                <input type="date" id="Data_de_Entrada_do_Veiculo" name="Data_de_Entrada_do_Veiculo"
                    class="form-control" placeholder="" required>
            </div>

            <div class="mb-3">
                <label for="Data_de_Devolucao_do_Veiculo" class="form-label">Data de Devolucao do Veiculo
                    (Optional)</label>
                <input type="date" id="Data_de_Devolucao_do_Veiculo" name="Data_de_Devolucao_do_Veiculo"
                    class="form-control" placeholder="">
            </div>

            <div class="mb-3">

                <label for="idServico" class="form-label">idServico</label>
                <select name="idServico">
                    <?php foreach ($idServicoList as $idServicoItem): ?>

                        <option value="<?php echo htmlspecialchars($idServicoItem['idServico']); ?>">
                            <?php echo htmlspecialchars($idServicoItem['idServico']); ?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>

            <div class="mb-3">

                <label for="Placa" class="form-label">Placa</label>
                <select name="Placa">
                    <?php foreach ($PlacaList as $PlacaItem): ?>

                        <option value="<?php echo htmlspecialchars($PlacaItem['Placa']); ?>">
                            <?php echo htmlspecialchars($PlacaItem['Placa']); ?>
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