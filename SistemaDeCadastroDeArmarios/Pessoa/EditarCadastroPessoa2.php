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
            height: 500px;
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
        <a class="nav-link" href="../Armario/Armario.php">Veja as vagas</a>
        <a class="nav-link disabled">
            <h5>SA Armarios</h5>
        </a>
    </nav>
    <?php
    if (isset($_GET['verifica']) && $_GET['verifica'] == 0) {

        echo '<div class="alert alert-success" role="alert">
                        Usuario Encontrado com Sucesso!
                    </div>';
    } elseif (isset($_GET['verifica']) && $_GET['verifica'] == 1) {

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
                        <H1>Editar Cadastro</H1>
                    </center>
                </td>
            </tr>
            <tr>
                <td width="500">
                    <form class="row g-3" id="editarForm" action='AtualizarPorCpf.php' method='post'>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nome</label>
                            <input type="text" name='nome' class="form-control" id="inputEmail4"
                                value="<?php echo $_GET['nome']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Sobrenome</label>
                            <input type="text" name='sobrenome' class="form-control" id="inputEmail4"
                                value="<?php echo $_GET['sobrenome']; ?>">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">CPF</label>
                            <input type="text" name='CPF' class="form-control" id="inputEmail4"
                                value="<?php echo $_GET['CPF']; ?>">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Telefone</label>
                            <input type="text" name='telefone' class="form-control" id="inputEmail4"
                                value="<?php echo $_GET['telefone']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" name='email' class="form-control" id="inputEmail4"
                                value="<?php echo $_GET['email']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Endereço</label>
                            <input type="text" name='endereco' class="form-control" id="inputEmail4"
                                value="<?php echo $_GET['endereco']; ?>">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Editar</button>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" onclick="excluirPorCpf()">Excluir</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="../Index.html" class="btn btn-primary">Voltar A paginainicial</a>
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
        setTimeout(fecharJanela, 2000);

        function excluirPorCpf() {
            var form = document.getElementById('editarForm');
            var cpf = document.querySelector('input[name="CPF"]').value;
            form.action = 'ExcluirPorCpf.php?CPF=' + cpf;
            form.submit();
        }
    </script>

</body>

</html>