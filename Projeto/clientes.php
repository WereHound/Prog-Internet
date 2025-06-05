<?php
require_once("header.php");
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT CPF, Nome, Telefone FROM cliente");
    $stmt->execute();

    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


<div class="container mt-5">
    <h2 class="mb-4">Lista de Clientes</h2>
    <a href="newClientes.php" class="btn btn-success mb-3">Cadastrar Cliente</a>
    <table class="table table-bordered table-striped" id="myTable">
        <thead class="table-dark">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($clientes): ?>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cliente['CPF']); ?></td>
                        <td><?php echo htmlspecialchars($cliente['Nome']); ?></td>
                        <td><?php echo htmlspecialchars($cliente['Telefone']); ?></td>
                        <td>
                            <a href="editClientes.php?CPF=<?php echo $cliente['CPF']; ?>"
                                class="btn btn-warning btn-sm">Editar</a>

                            <form action="deleteClientes.php" method="POST" style="display:inline;">
                                <input type="hidden" name="CPF" value="<?php echo $cliente['CPF']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Deletar esse Cliente?');">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Nenhum Cliente encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php
require_once("footer.php");
?>