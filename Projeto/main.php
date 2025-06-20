<?php
require_once("header.php");
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

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `foto`");
    $stmt->execute();
    $fotoCount = $stmt->fetchColumn();

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
                <th>Fotos</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td><?php echo $clienteCount; ?></td>
                <td><?php echo $servicoCount; ?></td>
                <td><?php echo $veiculoCount; ?></td>
                <td><?php echo $ordemCount; ?></td>
                <td><?php echo $fotoCount; ?></td>
                
            </tr>

        </tbody>
    </table>
</div>



<?php
    $maxValue = max($clienteCount, $servicoCount, $veiculoCount, $ordemCount, $fotoCount);
    $ticks = range(0, $maxValue); // increments of 1
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div" style="padding-right: 5%; padding-left: 5%;"></div>
<script>
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['Cadastros', 'Quantia'],
            ['Clientes', <?php echo $clienteCount ?>],
            ['Servicos', <?php echo $servicoCount ?>],
            ['Veiculos', <?php echo $veiculoCount ?>],
            ['Ordens', <?php echo $ordemCount ?>],
            ['Fotos', <?php echo $fotoCount ?>]
        ]);

        var options = {
            title: 'Quantidade de Cadastros',
            hAxis: {
                title: 'Qtd Cadastros',
                minValue: 0,
                ticks: <?php echo json_encode($ticks); ?>
            },
            vAxis: {
                title: 'Tipo de Cadastro'
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>



<?php
require_once("footer.php");
?>