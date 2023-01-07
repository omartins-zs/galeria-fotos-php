<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Galeria de fotos com PHP</title>
</head>

<body>
    <?php

    $imagens = array('./img/japan.jpg', './img/buildings.jpg', './img/japan_street.jpg');

    $indice = 0;

    $proximaImagem = 0;
    $anteriorImagem = 0;

    if (!isset($_GET['foto'])) {
        $indice = 0;
        $anteriorImagem = count($imagens) - 1;
        $proximaImagem = 1;
    } else {
        $indice = (int)$_GET["foto"];

        $anteriorImagem = (($indice - 1) < 0) ? count($imagens) - 1 : ($indice - 1);
        $proximaImagem = (($indice + 1) >= count($imagens)) ? 0 : ($indice + 1);;

        if ($indice < 0) {
            $indice = 0;
            echo '<script>window.location.href="index.php?foto=' . $indice . '"</script>';
            die();

            $anteriorImagem = count($imagens) - 1;
            $proximaImagem = 1;
        }

        if ($indice >= count($imagens)) {
            $indice = count($imagens) - 1;
            echo '<script>window.location.href="index.php?foto=' . $indice . '"</script>';
            die();

            $anteriorImagem = count($imagens) - 2;
            $proximaImagem = 0;
        }
    }

    ?>
    <div class="container">
        <div class="galeria-fotos my-5">
            <div class="col-8 my-2">
                <img class="img-fluid" src="<?= $imagens[$indice] ?>" />
            </div>
        </div>

        <div class="buttons">
            <a href="index.php?foto=<?= $anteriorImagem ?>">Voltar</a>
            <span> | </span>
            <a href="index.php?foto=<?= $proximaImagem ?>">Proxima</a>
        </div>
    </div>

</body>

</html>