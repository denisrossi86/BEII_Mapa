<?php
    abstract class Conexao
{
    protected function conectarDB()
    {
    try
    {
        return $conectar = new PDO("mysql:host=localhost;dbname=backendii", "root", "");
    }
        catch(PDOException $e)
        {
        return $e->getMessage();
         }
    }
}
?>
