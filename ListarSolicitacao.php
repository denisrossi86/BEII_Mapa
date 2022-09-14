<div class="container">
    <div class="row">
        <div class="col col-lg-12">
            <div class="table-responsive-lg">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">INDEX</th>
                        <th scope="col">PROTOCOLO</th>
                        <th scope="col">SOLICITANTE</th>
                        <th scope="col">DESCRIÇÃO</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ANO</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">DATA CADASTRO</th>
                    </tr>
                </thead>
 <?php
    include('autoLoad.php');
    $solicitante = new Solicitacao();
    $retorno = $solicitante->exibirsolicitacaos();
    $i=0;

    foreach($retorno as $linha){
 ?>
        <tr>
            <th scope="row"><?=$i++?></th>
            <td><?=$linha['numero'];?></td>
            <td><?=$linha['solicitante'];?></td>
            <td><?=$linha['descricao'];?></td>
            <td><?=$linha['email'];?></td>
            <td><?=$linha['ano'];?></td>
            <td><?=$linha['statu'];?></td>
            <td><?=$linha['dataCadastro'];?></td>
            </td>
            <td>
            <a class="btn btn-primary" 
            href="?acao=editar&numero=<?=$linha['numero']?>" role="button">EDITAR</a>
            <a class="btn btn-danger" 
            href="controleSolicitacao.php?operacao=excluir&numero=<?=$linha['numero']?>" 
            role="button">EXCLUIR</a>
            </td>
            </tr>
            <?php
        }
?>
<?php

?>

                </table>
            </div>
        </div>
    </div>
</div>
