<?php
require 'config.php';
require 'usuarios.class.php';
require 'header.php';

$u = new Users();
$lista = $u->getAll();

$sexo = array(
    '0' => 'Masculino',
    '1' => 'Feminino'
);



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
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
    
    <div class="container  mt-1">
    
            <a href="adicionar.php" class="btn btn-info modal_ajax" id="btn_add" >Adicionar Usuário</a>
            <h1 class="mt-3">Usuários cadastrados no sistema </h1>
            
            </form>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lista as $item): ?>
                    <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['nome']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['telefone']; ?></td>
                    <td><?php echo $sexo[$item['sexo']]; ?></td>
                    <td><a class="btn btn-info modal_ajax" id="btn_add" href="editar.php?id=<?php echo $item['id']; ?>">Editar</a></td>
                    <td><a class="btn btn-danger" href="excluir.php?id=<?php echo $item['id']; ?>">Excluir</a></td>
                    </tr>
                    
                <?php endforeach; ?>
                </tbody>
                </table>
    </div>
    <div class="modal_body">
    <button class="btn btn-danger" id="btn">Fechar</button>
    <div class="modal_content">
    
    </div>
    </div>
     
</body>
</html>


