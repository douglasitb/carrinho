<?php
    try{
        $conexao = new PDO("mysql:host=localhost;port=3306;dbname=produto_teste","root","12345678");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    }  catch (PDOException $e){
        echo $e->getMessage();
    }
?>
