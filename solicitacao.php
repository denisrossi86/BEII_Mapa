<?php
include('Conexao.php');

class Solicitacao extends Conexao{
    private $numero, $solicitante, $descricao, $email;
    private $conn;
    public function __construct(){
    $this->conn = $this->conectarDB();
 }
    private function setDados($dados){
    $dados = json_decode($dados);
    $this->solicitante = $dados->solicitante;
    $this->descricao = $dados->descricao;
    $this->email = $dados->email;

}
    public function adicionarSolicitacao($dados):bool{
    $this->setDados($dados);
 try{
   $stmt = $this->conn->prepare("INSERT INTO protocolo (solicitante, descricao, email, ano, statu, dataCadastro) 
   VALUES (:SOLICITANTE,:DESCRICAO,:EMAIL,:ANO, :STATU, :DATACADASTRO)");
   $stmt->execute(
      array(

        ':SOLICITANTE'=>$this->solicitante,
        ':DESCRICAO'=>$this->descricao,
        ':EMAIL'=>$this->email,
        ':ANO'=>$this->ano=date("Y"),
        ':STATU'=>$this->statu="1",
        ':DATACADASTRO'=>$this->dataCadastro=date("Y-n-j h:m:s"))
      );
   $count = $stmt->rowCount();
   return $count ? true: false;
   }catch(PDOException $e) {
   echo 'Error: ' . $e->getMessage();
   }
 }
   public function alterarsolicitacao($numero, $dados):bool{
   $this->numero = $numero;
   $this->setDados($dados);
 
      try{
         $stmt = $this->conn->prepare("UPDATE protocolo SET solicitante = :SOLICITANTE, descricao = :DESCRICAO, email = :EMAIL WHERE numero = :NUMERO");
         $stmt->execute(
         array(
         ':SOLICITANTE'=>$this->solicitante,
         ':DESCRICAO'=>$this->descricao,
         ':EMAIL'=>$this->email,
         ':NUMERO'=>$this->numero)
        
         );
         $count = $stmt->rowCount();
         return $count ? true: false;
         }catch(PDOException $e) {
         echo 'Error: ' . $e->getMessage();
         }
 }
         public function excluirsolicitacao($numero):bool{
         $this->numero = $numero;
         try{
         $stmt = $this->conn->prepare("DELETE FROM protocolo WHERE numero = :NUMERO");
         $stmt->bindParam(':NUMERO', $this->numero);
         $stmt->execute();
         $count = $stmt->rowCount();
         return $count ? true: false;
         }catch(PDOException $e) {
         echo 'Error: ' . $e->getMessage();
         }
 }
         public function exibirsolicitacaos(){
         try{
         $stmt = $this->conn->prepare("SELECT * FROM protocolo ORDER BY numero ASC");
         $stmt->execute();
         
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
         return $results;
         }catch(PDOException $e) {
         echo 'Error: ' . $e->getMessage();
         }
 }
         public function carregarsolicitacao($numero){
         $this->numero = $numero;
         try{
         $stmt = $this->conn->prepare("SELECT * FROM protocolo WHERE numero = :NUMERO");

         $stmt->bindParam(':NUMERO', $this->numero);
         $stmt->execute();
         
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $results[0];
         }catch(PDOException $e) {
         echo 'Error: ' . $e->getMessage();
 }
 }
}