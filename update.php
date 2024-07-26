<?php 

    include "config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];

        try{

            $sql=$pdo->prepare("UPDATE cadastro SET nome=:nome,email=:email,cpf=:cpf,data_nascimento=:data_nascimento WHERE id=:id");
            $sql->bindParam(":id",$id);
            $sql->bindParam(":nome",$nome);
            $sql->bindParam(":email",$email);
            $sql->bindParam(":cpf",$cpf);
            $sql->bindParam(":data_nascimento",$data_nascimento);
            
            if($sql->execute()){
                echo("Usuário alterado com sucesso!");
            }else{
                echo("ERRO ao alterar o usuário");
            }
        }
        catch(Exception $e){
            die("ERRO ".$e->getMessage());
        }

    }
    else{
        echo("ERRO método de requisição!");
    }

?>