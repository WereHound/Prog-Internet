<?php
require_once("header.php");
echo "<h2>User: " . $_SESSION["username"] . " </h2>";
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT Placa, Marca, Modelo, Cor, Cliente_CPF FROM veiculo");
    $stmt->execute();

    $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


<div class="container mt-5">
    <h2 class="mb-4">Lista de Veiculos</h2>
    <a href="newVeiculos.php" class="btn btn-success mb-3">Cadastrar Veiculo</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Cor</th>
                <th>Cliente_CPF</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($veiculos): ?>
                <?php foreach ($veiculos as $veiculo): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($veiculo['Placa']); ?></td>
                        <td><?php echo htmlspecialchars($veiculo['Marca']); ?></td>
                        <td><?php echo htmlspecialchars($veiculo['Modelo']); ?></td>
                        <td><?php echo htmlspecialchars($veiculo['Cor']); ?></td>
                        <td><?php echo htmlspecialchars($veiculo['Cliente_CPF']); ?></td>
                        <td>

                            <a href="editVeiculos.php?Placa=<?php echo $veiculo['Placa']; ?>"
                                class="btn btn-warning btn-sm">Editar</a>

                            <form action="deleteVeiculos.php" method="POST" style="display:inline;">
                                <input type="hidden" name="Placa" value="<?php echo $veiculo['Placa']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Deletar essa Ordem?');">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Nenhum Veiculo encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php
require_once("footer.php");
?>