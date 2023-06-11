<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['verifica']) && $_GET['verifica'] == 0) {

        echo '<div class="alert alert-success" role="alert">
                        Cadastro efetuado com sucesso!
                    </div>';
    } elseif (isset($_GET['verifica']) && $_GET['verifica'] == 1) {

        echo '<div class="alert alert-danger" role="alert">
                         Ocorreu um erro durante o cadastro, Tente novamente.
                    </div>';
    }
    ?>
</body>

</html>