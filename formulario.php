<?php
    include('autoLoad.php');
    if ($_GET)
    {
        if(isset($_GET["resposta"]) && !empty($_GET["resposta"]) && isset($_GET["mensagem"]) && !empty($_GET["mensagem"]))
        {
            $reposta = $_GET["resposta"];
            $mensagem = $_GET["mensagem"];
        if($reposta=="Sucesso")
        {
        ?>
    <div class="alert alert-success" role="alert">
        <?=$mensagem;?>
    </div>
<?php
 }
    elseif($reposta=="Erro"){
?>
    <div class="alert alert-danger" role="alert">
    <?=$mensagem;?>
    </div>
<?php
}
 else
{
?>
    <div class="alert alert-warning" role="alert">
    Algo de errado com a Aplicação
    </div>
<?php 
 
}

}
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
        elseif($acao == "inserir"){
        $acao = $_GET["acao"];
        }
        else{
        } 
        }
        else
        {
        }
}
        if($acao==""){
            $resgatarsolicitacao=array("solicitante"=>"","descricao"=>"", "email"=>"", "numero"=>"", "statu"=>"", "ano"=>"", "datacadastro"=>"");
}
?>
        <form action="controlesolicitacao.php" method="POST">
            <div class="row">
                <div class="col col-lg-6">
                    <h1>Formulário</h1>
        
                        <div class="form-group">
                        <label for="solicitacao">Solicitante:</label>
                        <input type="text" class="form-control" id="solicitante" name="solicitante" value="<?=$resgatarsolicitacao["solicitante"];?>">
                </div>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="<?=$resgatarsolicitacao["descricao"];?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?=$resgatarsolicitacao["email"];?>">
                    </div>
                </div>
            </div>
                    <div class="row">
                        <div class="col col-lg-6">
                            <?php
                            if ($acao=="editar"){
                            ?>
                            <input type="hidden" name='numero' value="<?=$numero;?>">
                            <input type="hidden" name='operacao' value="alterar">
                            <button type="submit" class="btn btnprimary">ALTERAR</button>
                                <?php
                                }else{
                                ?>
                                    <input type="hidden" name='operacao' value="inserir">

                                        <button type="submit" class="btn btnprimary">ADICIONAR</button>
                                        <button type="reset" class="btn btn-warning">LIMPAR</button>
                                    <?php
                                    }?>
                
                        </div>
                    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
    <script>
        $(document).ready(function() {
            function limpa_formulário_cep() {
                $("#solicitante").val("");
                $("#descricao").val("");
                $("#email").val("");
            }
            $("#cep").blur(function() {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep != "") {
                    var validacep = /^[0-9]{8}$/;
                    if (validacep.test(cep)) {
                        $("#solicitante").val("...");
                        $("#descricao").val("...");
                        $("#email").val("...");
                        
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                $("#solicitante").val(dados.logradouro);
                                $("#descricao").val(dados.bairro);
                                $("#email").val(dados.localidade);
                            }
                        });
                    }
                }
            });
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>