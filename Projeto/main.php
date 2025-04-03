<?php
require_once("header.php");
echo "<h2>User: " . $_SESSION["username"] . " </h2>";
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM cliente");
    $stmt->execute();
    $clienteCount = $stmt->fetchColumn();
    
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM servico");
    $stmt->execute();
    $servicoCount = $stmt->fetchColumn();
    
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM veiculo");
    $stmt->execute();
    $veiculoCount = $stmt->fetchColumn();
    
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `ordem de servico`");
    $stmt->execute();
    $ordemCount = $stmt->fetchColumn();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


<div class="container mt-5">
    <h2 class="mb-4">Numero de Cadastros</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Clientes</th>
                <th>Servicos</th>
                <th>Veiculos</th>
                <th>Ordens</th>
            </tr>
        </thead>
        <tbody>
            
                    <tr>
                        <td><?php echo $clienteCount; ?></td>
                        <td><?php echo $servicoCount; ?></td>
                        <td><?php echo $veiculoCount; ?></td>
                        <td><?php echo $ordemCount; ?></td>
                    </tr>
                
        </tbody>
    </table>
</div>


<?php
require_once("footer.php");
?>