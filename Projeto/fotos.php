<?php
require_once("header.php");
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT idFoto, NomeDaFoto, CaminhoDaFoto FROM Foto");
    $stmt->execute();

    $Fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


<div class="container mt-5">
    <h2 class="mb-4">Lista de Fotos</h2>
    <a href="newFoto.php" class="btn btn-success mb-3">Cadastrar Foto</a>
    <table class="table table-bordered table-striped" id="myTable">
        <thead class="table-dark">
            <tr>
                <th>idFoto</th>
                <th>NomeDaFoto</th>
                <th>CaminhoDaFoto</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($Fotos): ?>
                <?php foreach ($Fotos as $Foto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($Foto['idFoto']); ?></td>
                        <td><?php echo htmlspecialchars($Foto['NomeDaFoto']); ?></td>
                        <td><?php echo htmlspecialchars($Foto['CaminhoDaFoto']); ?></td>
                        <td><img src="http://<?php echo htmlspecialchars($Foto['CaminhoDaFoto']); ?>" alt="<?php echo htmlspecialchars($Foto['NomeDaFoto']); ?>"></td>
                        
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