<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <form method="post" action="" class="m-5">

        <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="row">
                <div class="col">
                    <label for="Nome-<?= $i ?>">Nome</label>
                    <input type="text" id="Nome-<?= $i ?>" name="Nome-<?= $i ?>" class="form-control" placeholder="Mark">
                </div>
                <div class="col">
                    <label for="Nota1-<?= $i ?>">Nota 1</label>
                    <input type="decimal" id="Nota1-<?= $i ?>" name="Nota1-<?= $i ?>" class="form-control"
                        placeholder="0-10">
                </div>
                <div class="col">
                    <label for="Nota2-<?= $i ?>">Nota 2</label>
                    <input type="decimal" id="Nota2-<?= $i ?>" name="Nota2-<?= $i ?>" class="form-control"
                        placeholder="0-10">
                </div>
                <div class="col">
                    <label for="Nota3-<?= $i ?>">Nota 3</label>
                    <input type="decimal" id="Nota3-<?= $i ?>" name="Nota3-<?= $i ?>" class="form-control"
                        placeholder="0-10">
                </div>
            </div>
        <?php endfor; ?>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>


    <?php
    /*
Crie um formulário que leia dados de 5 alunos: nome e três notas. Leia os 
dados e crie um mapa ordenado onde as chaves são os nomes dos alunos 
e os valores são as médias das notas. Exiba a lista de alunos ordenada pela 
média das notas (do maior para o menor).
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {


            $array = [];
            for ($i = 1; $i <= 5; $i++) {

                ${"item" . $i} = ["Chave" => $_POST['Nome-' . $i], "Valor" => (($_POST['Nota1-' . $i] + $_POST['Nota2-' . $i] + $_POST['Nota3-' . $i]) / 3)];
                $array[] = ${"item" . $i};
            }
            
            var_dump($array);

            $notas = [];

            foreach ($array as $value) {
                $notas[] = $value["Valor"];
            }

            //sort($notas);

            array_multisort($notas, SORT_DESC, $array);

            foreach ($array as $value) {
                echo "Chave = " . $value["Chave"] . "\tValor = " . $value["Valor"] . "</br>";
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>