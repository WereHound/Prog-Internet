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
                <label for="Codigo-1">Código</label>
                <input type="text" id="Codigo-1" name="Codigo-1" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Nome-1">Nome</label>
                <input type="text" id="Nome-1" name="Nome-1" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Preco-1">Preço</label>
                <input type="decimal" id="Preco-1" name="Preco-1" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Codigo-2">Código</label>
                <input type="text" id="Codigo-2" name="Codigo-2" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Nome-2">Nome</label>
                <input type="text" id="Nome-2" name="Nome-2" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Preco-2">Preço</label>
                <input type="decimal" id="Preco-2" name="Preco-2" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Codigo-3">Código</label>
                <input type="text" id="Codigo-3" name="Codigo-3" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Nome-3">Nome</label>
                <input type="text" id="Nome-3" name="Nome-3" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Preco-3">Preço</label>
                <input type="decimal" id="Preco-3" name="Preco-3" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Codigo-4">Código</label>
                <input type="text" id="Codigo-4" name="Codigo-4" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Nome-4">Nome</label>
                <input type="text" id="Nome-4" name="Nome-4" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Preco-4">Preço</label>
                <input type="decimal" id="Preco-4" name="Preco-4" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Codigo-5">Código</label>
                <input type="text" id="Codigo-5" name="Codigo-5" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Nome-5">Nome</label>
                <input type="text" id="Nome-5" name="Nome-5" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="Preco-5">Preço</label>
                <input type="decimal" id="Preco-5" name="Preco-5" class="form-control" placeholder="">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <?php
    /*
Crie um formulário que leia dados de 5 produtos, que são: código, nome e 
preço. Leia os dados e crie um mapa ordenado onde as chaves são os 
códigos dos produtos e os valores são também mapas ordenados com o 
nome e o preço dos produtos. Aplique um desconto de 10% em todos os 
produtos com preço acima de R$100,00 e exiba a lista ordenada pelo nome 
do produto.
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $array = [];
            for ($i = 1; $i <= 5; $i++) {

                ${"item" . $i} = ["Chave" => $_POST['Codigo-' . $i], "Valor" => ["Nome" => $_POST['Nome-' . $i], "Preco" => $_POST['Preco-' . $i]]];
                $array[] = ${"item" . $i};
            }

            foreach ($array as $value) {
                if ($value["Valor"]["Preco"] > 100) {
                    $value["Valor"]["Preco"] *= 0.9;
                }

            }
            $notas = [];

            foreach ($array as $value) {
                $notas[] = $value["Valor"]["Nome"];
            }

            sort($notas);

            array_multisort($notas, SORT_ASC, $array);




            foreach ($array as $value) {
                echo "Chave = " . $value["Chave"] . "\tNome = " . $value["Valor"]["Nome"] . "\tPreço = " . $value["Valor"]["Preco"] . "</br>";
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