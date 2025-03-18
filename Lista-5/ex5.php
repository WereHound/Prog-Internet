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


        <div class="row">
            <div class="col">
                <label for="Titulo-1">Título</label>
                <input type="text" id="Titulo-1" name="Titulo-1" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Quantidade-1">Quantidade em estoque</label>
                <input type="number" id="Quantidade-1" name="Quantidade-1" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Titulo-2">Título</label>
                <input type="text" id="Titulo-2" name="Titulo-2" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Quantidade-2">Quantidade em estoque</label>
                <input type="number" id="Quantidade-2" name="Quantidade-2" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Titulo-3">Título</label>
                <input type="text" id="Titulo-3" name="Titulo-3" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Quantidade-3">Quantidade em estoque</label>
                <input type="number" id="Quantidade-3" name="Quantidade-3" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Titulo-4">Título</label>
                <input type="text" id="Titulo-4" name="Titulo-4" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Quantidade-4">Quantidade em estoque</label>
                <input type="number" id="Quantidade-4" name="Quantidade-4" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Titulo-5">Título</label>
                <input type="text" id="Titulo-5" name="Titulo-5" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Quantidade-5">Quantidade em estoque</label>
                <input type="number" id="Quantidade-5" name="Quantidade-5" class="form-control" placeholder="">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <?php
    /*
Crie um formulário que leia dados de 5 livros: título e quantidade em 
estoque. Leia os dados e crie um mapa ordenado onde as chaves são os 
títulos dos livros e os valores são a quantidade em estoque. Verifique se a 
quantidade em estoque é inferior a 5 e exiba um alerta para os livros com 
baixa quantidade. Exiba a lista ordenada pelo título dos livros.
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $array = [];
            for ($i = 1; $i <= 5; $i++) {

                ${"item" . $i} = ["Chave" => $_POST['Titulo-' . $i], "Valor" => $_POST['Quantidade-' . $i]];
                $array[] = ${"item" . $i};
            }

            echo "Livros com baixa quantidade: </br>";
            foreach ($array as $value) {
                if ($value["Valor"] < 5) {
                    echo $value["Chave"] . "</br>";
                }
            }

            $notas = [];

            foreach ($array as $value) {
                $notas[] = $value["Chave"];
            }

            //sort($notas);

            array_multisort($notas, SORT_ASC, $array);




            foreach ($array as $value) {
                echo "Chave = " . $value["Chave"] . "\tQuantidade em estoque = " . $value["Valor"] . "</br>";
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