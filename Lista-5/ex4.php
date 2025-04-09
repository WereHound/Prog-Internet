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
Crie um formulário que leia dados de 5 itens: nome e preço. Leia os dados 
e crie um mapa ordenado onde as chaves são os nomes dos itens e os 
valores são os preços após aplicação de um imposto de 15%. Exiba a lista 
ordenada pelos preços após a aplicação do imposto.
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $array = [];
            for ($i = 1; $i <= 5; $i++) {

                ${"item" . $i} = ["Chave" => $_POST['Nome-' . $i], "Valor" => ($_POST['Preco-' . $i] * 1.15)];
                $array[] = ${"item" . $i};
            }
            
            $notas = [];

            foreach ($array as $value) {
                $notas[] = $value["Valor"];
            }

            //sort($notas);

            array_multisort($notas, SORT_ASC, $array);




            foreach ($array as $value) {
                echo "Chave = " . $value["Chave"] . "\tPreço = " . $value["Valor"] . "\n";
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