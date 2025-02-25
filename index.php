<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    
        <form method="post" action="">

            <label for="NExercicio" class="">Numero do Exercicio: </label>
            <select class="form-select" name="NExercicio" id="NExercicio">
                <option value="0">Selecione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>


    <?php if (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '1')): ?>

        <form method="post" action="Ans.php">

            <div class="mb-3">
                <label for="V1-1" class="form-label">Valor 1</label>
                <input type="number" id="V1-1" name="V1-1" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="V2-1" class="form-label">Valor 2</label>
                <input type="number" id="V2-1" name="V2-1" class="form-control" required="">
            </div>

            <input type="hidden" name="NExercicio" value="1">
            
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '2')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '3')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '4')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '5')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '6')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '7')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '8')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '9')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '10')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '11')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '12')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '13')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '14')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '15')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '16')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '17')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '18')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '19')): ?>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '20')): ?>


    <?php endif; ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>