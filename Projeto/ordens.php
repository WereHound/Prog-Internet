<?php
require_once("header.php");
echo "<h2>User: " . $_SESSION["username"] . " </h2>";
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT idOrdem, Data_de_Entrega_do_Veiculo, Data_de_Devolucao_do_Veiculo, Servico_idServico, Veiculo_Placa  FROM `ordem de servico`");
    $stmt->execute();

    $ordens = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


<div class="container mt-5">
    <h2 class="mb-4">Lista de Ordens</h2>
    <a href="newOrdens.php" class="btn btn-success mb-3">Cadastrar Ordem</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>idOrdem</th>
                <th>Data_de_Entrega_do_Veiculo</th>
                <th>Data_de_Devolucao_do_Veiculo</th>
                <th>Servico_idServico</th>
                <th>Veiculo_Placa</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($ordens): ?>
                <?php foreach ($ordens as $ordem): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($ordem['idOrdem']); ?></td>
                        <td><?php echo htmlspecialchars($ordem['Data_de_Entrega_do_Veiculo']); ?></td>
                        <td><?php echo htmlspecialchars($ordem['Data_de_Devolucao_do_Veiculo']); ?></td>
                        <td><?php echo htmlspecialchars($ordem['Servico_idServico']); ?></td>
                        <td><?php echo htmlspecialchars($ordem['Veiculo_Placa']); ?></td>
                        <td>
                            <a href="editOrdens.php?idOrdem=<?php echo $ordem['idOrdem']; ?>"
                                class="btn btn-warning btn-sm">Editar</a>

                            <form action="deleteOrdens.php" method="POST" style="display:inline;">
                                <input type="hidden" name="idOrdem" value="<?php echo $ordem['idOrdem']; ?>">
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
                    <td colspan="6" class="text-center">Nenhuma Ordem encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php
require_once("footer.php");
?>