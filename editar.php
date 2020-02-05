<?php
require 'config.php';
require 'usuarios.class.php';
require 'header.php';

$u = new Users();
$lista = $u->getUser($_GET['id']);
if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $id = $_GET['id'];
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $u->editUser($nome, $email, $telefone, $id);

    header('Location: index.php');
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
            <?php foreach($lista as $info): ?>
            <label for="nome">Nome:</label> <br>
            <input type="text" name="nome" id="nome" value="<?php echo $info['nome']; ?>" class="form-control"> <br><br>
            <label for="email">E-mail: </label> <br>
            <input type="email" name="email" id="email" value="<?php echo $info['email']; ?>" class="form-control"> <br><br>
            <label for="telefone">Telefone: </label> <br>
            <input maxlength="11" type="text" name="telefone" id="telefone" value="<?php echo $info['telefone']; ?>" class="form-control"> <br><br>
            <?php endforeach; ?>
            <input type="submit" value="Confirmar" class="btn btn-success">
        </form>

    </div>
        

</body>


