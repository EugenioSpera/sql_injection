<?php

if(!empty($_POST['usuario']) && !empty($_POST['senha'])){

    $dsn = 'mysql:host=localhost;dbname=bd_tii01';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO($dsn, $usuario, $senha);

    // $query = '

    //  para criar um a tabela usando o visualcode 
    // create table tb_usuarios(
    //     id int not null primary key auto_increment,
    //     nome varchar (50) not null,
    //     email varchar (100) not null,
    //     senha varchar (32) not null
    //     )
    // ';



    $nome=$_POST['nome'];
    $email=$_POST['usuario'];
    $senha=$_POST['senha'];
    $query = " select * from tb_usuarios where ";
    $query .= "email = '{$_POST['usuario']}' ";
    $query .= " AND senha = '{$_POST['senha']}'";

    //comando para mostrar a parte da tabela onde tenha usuario e senha
     $stmt = $conexao->prepare($query);
     $stmt->bindValue( ':usuario',$_POST['usuario']);
     $stmt->bindValue( ':senha',$_POST['senha']);
     $stmt->execute();

     $usuario=$stmt->fetch();
     print_r($user);
    
    //comando para inserir dados na tabela via Visual Code
    // $query = "
    // insert into tb_usuarios(nome, email, senha) values ('$nome', '$email', '$senha')
    // "
    // ;

    $retorno = $conexao->exec($query);

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method= "post" action="index.php">

<input type="text" placeholder="nome" name="nome"/>
<br>
<input type="text" placeholder="usuário" name="usuario"/>
<br>
<input type="password" placeholder="senha" name="senha"/>
<br>
<button type="submit">Entrar</button>


</form>





</body>
</html>