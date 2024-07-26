<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form action="update.php" method="post">

<?php 
    
    require "config.php";

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        try{
            $sql=$pdo->prepare("SELECT * FROM cadastro WHERE id=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();

            $usuario = $sql->fetch(PDO::FETCH_ASSOC);
        
            if(!$usuario){
                die("Usuário não encontrado");
            }
        
        }

        catch(Exception $e){
            die("ERRO".$e->getMessage());
        }
    }
    else{
        die("ID não fornecido");
    }
?>

        <input type="hidden" id="id" name="id" value="<?=$usuario['id']?>"><br>
        <br>

        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" value="<?=$usuario['nome']?>" required><br>
        <br>

        <label for="email">Email: </label>
        <input type="text" id="email" name="email" value="<?=$usuario['email']?>" required><br>
        <br>

        <label for="cpf">CPF: </label>
        <input type="text" id="cpf" name="cpf" value="<?=$usuario['cpf']?>" required><br>
        <br>

        <label for="data_nascimento">Data Nascimento: </label>
        <input type="date" id="data_nascimento" name="data_nascimento" value="<?=$usuario['data_nascimento']?>" required><br>
        <br>

        <input type="submit" name="Enviar">

    </form>

   

</body>
</html>