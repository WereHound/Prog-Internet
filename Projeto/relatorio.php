<?php
require_once("header.php");
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

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Ordens</title>
    <style>
        /* Estilo normal (tela) */
        body {}

        .no-print {
            display: block;
        }

        .print-button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
        }

        /* Estilo para impressão */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                font-size: 12px;
                padding: 0;
            }

            .tabela th {
                background-color: #f0f0f0 !important;
                -webkit-print-color-adjust: exact;
            }
        }

        /* Seu CSS original */
        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .tabela {
            width: 100%;
            border-collapse: collapse;
            15px;
        }

        .tabela th,
        .tabela td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
            background-color: #f0f0f0;
        }

        .tabela th {
            background-color: rgb(160, 160, 160);
        }
    </style>
</head>

<body>

    <div style="font-family: Arial, sans-serif; font-size: 14px; padding: 20px;">
        <!-- Botão para impressão (não aparece no PDF) -->
        <button class="print-button no-print" onclick="window.print()">Imprimir / Salvar como PDF</button>
        <div class="titulo">Relatório de Ordens</div>
        <div class="row">
            <div class="col">Data: <?php echo date('d/m/Y'); ?></div>
        </div>

        <table class="tabela">
            <thead>
                <tr>
                    <th>idOrdem</th>
                    <th>Data_de_Entrega_do_Veiculo</th>
                    <th>Data_de_Devolucao_do_Veiculo</th>
                    <th>Servico_idServico</th>
                    <th>Veiculo_Placa</th>
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
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma Ordem encontrada.</td>
                    </tr>
                <?php endif; ?>
                <!-- Adicione mais linhas dinamicamente com PHP -->
            </tbody>
        </table>
    </div>

    <script>
        // Opcional: Configuração para melhor experiência de impressão
        function beforePrint() {
            console.log("Preparando para impressão...");
        }
        function afterPrint() {
            console.log("Impressão concluída");
        }
        window.addEventListener('beforeprint', beforePrint);
        window.addEventListener('afterprint', afterPrint);
    </script>
</body>

</html>