<?php 

    include "config.php";

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        
        try{

            $sql=$pdo->prepare("DELETE FROM cadastro WHERE id=:id");
            $sql->bindParam(":id", $id);

            if($sql->execute()){
                echo("Usuário deletado com sucesso!");
            }
            else{
                echo("ERRO ao deletar cliente.");
            }

        }
        catch(Exception $e){

            echo("ERRO: ".$e->getMessage());

        }

    }
    else{
        echo("ERRO id não fornecido!");
    }

?>