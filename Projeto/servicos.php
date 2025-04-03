<?php
require_once("header.php");
echo "<h2>User: " . $_SESSION["username"] . " </h2>";
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT idServico, Servico, Descricao FROM servico");
    $stmt->execute();

    $servicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


<div class="container mt-5">
    <h2 class="mb-4">Lista de Servicos</h2>
    <a href="newServicos.php" class="btn btn-success mb-3">Cadastrar Servico</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>idServico</th>
                <th>Servico</th>
                <th>Descricao</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($servicos): ?>
                <?php foreach ($servicos as $servico): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($servico['idServico']); ?></td>
                        <td><?php echo htmlspecialchars($servico['Servico']); ?></td>
                        <td><?php echo htmlspecialchars($servico['Descricao']); ?></td>
                        <td>
                            <a href="editServicos.php?idServico=<?php echo $servico['idServico']; ?>"
                                class="btn btn-warning btn-sm">Editar</a>

                            <form action="deleteServicos.php" method="POST" style="display:inline;">
                                <input type="hidden" name="idServico" value="<?php echo $servico['idServico']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Deletar esse Servico?');">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Nenhum Servico encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php
require_once("footer.php");
?>