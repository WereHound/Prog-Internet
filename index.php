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

    <?php
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else
        $link = "http";

    $link .= "://";

    $link .= $_SERVER['HTTP_HOST'];

    $link .= $_SERVER['REQUEST_URI']; ?>


    <?php if (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '1')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '2')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '3')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '4')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '5')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '6')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '7')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '8')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '9')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '10')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '11')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '12')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '13')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '14')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '15')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '16')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '17')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '18')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '19')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>

    <?php elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['NExercicio'] = '20')): ?>

        <form action="<?php echo $link; ?>ex<?php echo $_POST['NExercicio']; ?>.php">
            <input type="submit" value="Ir Para Destino" />
        </form>


    <?php endif; ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>