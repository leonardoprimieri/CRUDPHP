<?php
require 'header.php';
require 'config.php';
require 'usuarios.class.php';

$u = new Users();

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $senha = addslashes($_POST['senha']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $sexo = $_POST['sexo'];

    if($u->verifyEmail($email) == false) {
        $u->addUser($nome, $senha, $email, $telefone, $sexo);
        header('Location: index.php');

    } else {
        echo 'Esse e-mail já está cadastrado no sistema, por favor tente outro!';
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form method="POST" class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control">
            <label for="password">Senha: </label> 
            <input type="password" name="senha" id="password"  class="form-control">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" class="form-control">
            <label for="telefone" >Telefone: </label>
            <input type="text" maxlength="12" name="telefone" id="telefone" class="form-control">  <br>
            <select name="sexo" id="sexo" class="form-group ">
                <option value="0">Masculino</option>
                <option value="1">Feminino</option>
            </select> <br><br>
            <input type="submit" value="Adicionar" class="btn btn-info">
        </form>

    </div>
        

</body>

