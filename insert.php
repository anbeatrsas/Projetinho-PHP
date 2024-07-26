<?php 

    include "config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];

        try{

            $sql=$pdo->prepare("INSERT INTO cadastro(nome,email,cpf,data_nascimento)VALUES(:nome,:email,:cpf,:data_nascimento)");
            $sql->bindParam(":nome",$nome);
            $sql->bindParam(":email",$email);
            $sql->bindParam(":cpf",$cpf);
            $sql->bindParam(":data_nascimento",$data_nascimento);
            
            if($sql->execute()){
                echo("Usuário cadastrado com sucesso!");
            }else{
                echo("ERRO ao cadastrar novo usuário");
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