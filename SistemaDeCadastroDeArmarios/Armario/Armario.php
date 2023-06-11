<?php
include('../conexaoCRUD.php');
$conexao = new conexaoCRUD;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />

    <style>
        body {
            background-image: url('../imagens/praia4.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            min-height: 100vh;
        }

        td {
            background-color: transparent;
        }

        th {
            background-color: transparent;
        }

        .cardCustomizada {
            background-color: #e6faf0a6;
            height: 700px;
            width: 700px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            padding: 20px;
            /*opacity: 2.0;*/
        }

        .table td,
        .table th {
            background-color: transparent;
        }
    </style>
    <title>Armarios</title>
</head>

<body>

    <nav class="nav">
        <a class="nav-link active" aria-current="page" href="../Index.html">Home-Page</a>
        <a class="nav-link active" aria-current="page" href="../Pessoa/CadastroPessoa.php">Cadastre-se</a>
        <a class="nav-link" href="../Pessoa/EditarCadastroPessoa1.php">Gerenciar Cadastro</a>
        <a class="nav-link" href="../Armario/Armario.php">Veja as vagas</a>
        <a class="nav-link disabled">
            <h5>SA Armarios</h5>
        </a>
    </nav>
    <div class="cardCustomizada">
        <table class="table table-hover" id="tabelaConsulta">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Localização</th>
                    <th scope="col">Posição</th>
                    <th scope="col">Vago</th>
                    <th scope="col">Alugar</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $armarios = $conexao->procurarTodosArmarios();
                if ($armarios) {
                    foreach ($armarios as $armario) {
                        $id=$armario->getIdArmario();
                        echo "<tr>";
                        echo "<th scope='row'>" . $armario->getIdArmario() . "</th>";
                        echo "<td>" . $armario->getValorArmario() . "</td>";
                        echo "<td>" . $armario->getLocalizacaoArmario() . "</td>";
                        echo "<td>" . $armario->getLinha() . $armario->getColuna() . "</td>";
                        echo "<td>" . ($armario->isVago() ? "Vago" : "Ocupado") . "</td>";
                        echo "<td><div class='col-12'>";
                        if ($armario->isVago()) {
                            echo "<button type='submit' class='btn btn-primary' onclick='redirecionarParaPagina($id)'>Alugar</button>";
                        } else {
                            echo "<button type='submit' class='btn btn-primary' readonly>Alugado</button>";
                        }
                        echo "</div></td>";
                        echo "</tr>";

                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum armário encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        function redirecionarParaPagina(id) {
            window.location.href = 'AluguelDoArmario.php?idarmario='+id;
        }
    </script>
    <script>
        // Código JavaScript para inicializar a tabela DataTables, e ja iniciar traduzida
        $(document).ready(function () {
            $('#tabelaConsulta').DataTable({
                "ordering": true,
                "paging": true,
                "searching": true,
                "oLanguage": {
                    "sEmptyTable": "Nenhum registro encontrado na tabela",
                    "sInfo": "Mostrar _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
                    "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Proximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Ultimo"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        });
    </script>

</body>

</html>