<?php 

    $host='localhost';
    $dbname='cadastro_projeto';
    $username='root';
    $pass='';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname",$username,$pass);
    }
    catch(PDOException $e){
        die("ERRO de conexão: ".$e->getMessage());
    }

?>