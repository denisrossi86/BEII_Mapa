<?php
 require_once('autoLoad.php');
 if (!empty($_POST)) {
 if(isset($_POST['operacao']) && !empty($_POST['operacao']))
{
 $operacao = $_POST['operacao'];
 }
 if (isset($_POST['solicitante']) && isset($_POST['descricao']) && isset($_POST['email'])){
 if (!empty($_POST['solicitante']) && !empty($_POST['descricao']) && !empty($_POST['email'])) {
 $dados = json_encode($_POST);
 }

 }
 if($operacao=="inserir"){
 $solicitacao = new Solicitacao();
 $resultado = $solicitacao->adicionarSolicitacao($dados);
 if($resultado) header('location: index.php?resposta=Sucesso&mensagem=solicitacao inserido com sucesso');
 else header('location: index.php?resposta=Erro&mensagem=Ocorreu um erro ao inserir o produdo');
 }elseif($operacao=="alterar" && isset($_POST['numero']) && !empty($_POST['numero'])){
 $numero = $_POST["numero"];
 $solicitacao = new Solicitacao();
 $resultado = $solicitacao->alterarsolicitacao($numero, $dados);
 if($resultado) header('location: index.php?resposta=Sucesso&mensagem=solicitacao alterado com sucesso');
 else header('location: index.php?resposta=Erro&mensagem=Ocorreu um erro ao alterar o produdo');
 }else{
 }
 }elseif (!empty($_GET)) {
 if(isset($_GET['operacao']) && !empty($_GET['operacao']))
{
 $operacao = $_GET['operacao'];
 }
 if($operacao=="excluir" && isset($_GET['numero']) && !empty($_GET['numero'])){
 $numero = $_GET["numero"];
 $solicitacao = new solicitacao();
 $resultado = $solicitacao->excluirsolicitacao($numero);
 if($resultado) header('location: index.php?resposta=Sucesso&mensagem=solicitacao excluído com sucesso');

 else header('location: index.php?resposta=Erro&mensagem=Ocorreu um erro ao excluir o produdo');
 }
 }