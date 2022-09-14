<?php
    include('autoLoad.php');
   
    if(isset($_GET["acao"]) && !empty($_GET["acao"]))
    {
    $acao = $_GET["acao"];
    if($acao == "editar"){
        if(isset($_GET["numero"]) && !empty($_GET["numero"])){

        $numero = $_GET["numero"];
         $solicitacao = new Solicitacao();
            $resgatarsolicitacao = $solicitacao->carregarsolicitacao($numero);
        }
        }      
    }

        if($acao==""){
            $resgatarsolicitacao=array("solicitante"=>"","descricao"=>"", "email"=>"", "numero"=>"", "statu"=>"", "ano"=>"", "datacadastro"=>"");
}
?>
        <form action="controlesolicitacao.php" method="POST">
            <div class="row">
                <div class="col col-lg-6">
                    <h1>Protocolo</h1>
        
                        <div class="form-group">
                        <label for="numero">Numero do Protocolo:</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="<?=$resgatarsolicitacao["numero"];?>">
                        </div>
                </div>
            </div>
                    <div class="row">
                        <div class="col col-lg-6">
                        <input type="hidden" name='operacao' value="editar">
                        <button type="submit" class="btn btnprimary">CARREGAR</button>
                        </div>
                    </div>

</form>
