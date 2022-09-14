<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denis Francisco Rossi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="background-color: #24527a;">
            <a class="navbar-brand" href="#"><img src="logo.jpg" width="50%"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <h1 class="display-6">Sistema Para Solicitação de Atendimento</h1>
            </div>
        </div>
        <?php
            $acao="";
        ?>
            <div class="row">
                <div class="col col-lg-10">
                <?php
                include('formulario.php');
                ?>
                </div>
            </div>

            <div class="row">
            <div class="col-sm-10">
                <h1 class="display-6">Sistema Para Carregar Solicitação de Atendimento</h1>
            </div>
        </div>
        <?php
            $acao="";
        ?>
            <div class="row">
                <div class="col col-lg-10">
                <?php
                include('CarregarSolicitacao.php');
                ?>
                </div>
            </div>

            <div class="row">
                <div class="col col-lg-10">
                <?php
                include('listarSolicitacao.php');
                ?>
                </div>
            </div>
       

</body>
</html>