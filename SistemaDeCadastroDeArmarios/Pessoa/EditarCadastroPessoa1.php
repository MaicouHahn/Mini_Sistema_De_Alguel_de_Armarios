<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .cardCustomizada {
            background-color: #e6faf0a6;
            height: 250px;
            width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            padding: 20px;
            opacity: 0.8;
        }

        .custom-btn {
            background-color: rgb(81, 86, 168);
            color: white;
        }

        body {
            background-color: rgb(224, 224, 224);
            background-image: url('../imagens/praia2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            min-height: 100vh;
        }

        .nav-link {
            color: white;
        }

        .nav-link:hover {
            color: blue;

        }
    </style>
    <title>Document</title>
</head>

<body>
    <nav class="nav">
        <a class="nav-link active" aria-current="page" href="../Index.html">Home-Page</a>
        <a class="nav-link active" aria-current="page" href="CadastroPessoa.php">Cadastre-se</a>
        <a class="nav-link" href="EditarCadastroPessoa1.php">Gerenciar Cadastro</a>
        <a class="nav-link" href="../Armario/Armario.php">Veja as vagas</a>
        <a class="nav-link disabled">
            <h5>SA Armarios</h5>
        </a>
    </nav>
    <?php
    if (isset($_GET['verifica']) && $_GET['verifica'] == 0) {

        echo '<div class="alert alert-success" role="alert">
                        Cadastro Encontrado!
                    </div>';
    } elseif (isset($_GET['verifica']) && $_GET['verifica'] == 1) {

        echo '<div class="alert alert-danger" role="alert">
        Cadastro não encontrado, Tente novamente.
                    </div>';
    } elseif (isset($_GET['verifica']) && $_GET['verifica'] == 3) {

        echo '<div class="alert alert-success" role="alert">
        Cadastro Excluido!
    </div>';
    } elseif (isset($_GET['verifica']) && $_GET['verifica'] == 4) {

        echo '<div class="alert alert-danger" role="alert">
        Cadastro não encontrado, Tente novamente.
                    </div>';
    }
    ?>
    <div class="cardCustomizada">

        <table align="center">
            <tr>
                <td width="500">
                    <center>
                        <H1>Digite seu Cpf</H1>
                    </center>
                </td>
            </tr>
            <tr>
                <td width="500">
                    <form class="row g-1" action='BuscarPorCPF.php' method='post'>
                        <div class="col-md-10">
                            <label for="inputEmail4" class="form-label">CPF</label>
                            <input type="text" name='CPF' class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Procurar</button>
                        </div>
                    </form>

                </td>
            </tr>
        </table>
    </div>
    <script>
        function fecharJanela() {
            var alertDiv = document.querySelector('.alert');
            alertDiv.style.display = 'none';
        }
        setTimeout(fecharJanela, 1000);
    </script>
</body>

</html>