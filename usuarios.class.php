<?php

class Users {

    public function getAll() {
        global $pdo;

        $sql = $pdo->query('SELECT * FROM usuarios');
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
            return $dados;
        } else {
            return array();
        }

    }

    
 
    public function removeUser($id) {
        global $pdo; 

        $sql = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function verifyEmail($email) {
        global $pdo;

        $sql = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addUser($nome, $senha, $email, $telefone, $sexo) {
        global $pdo;
       
        if($this->verifyEmail($email) == false) {
            $sql = $pdo->prepare('INSERT INTO usuarios SET nome = :nome, senha = :senha, email = :email, telefone = :telefone, sexo = :sexo');
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':senha', md5($senha));
            $sql->bindValue(':email', $email);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':sexo', $sexo);
            $sql->execute();

            return true;
        } else {
           return false;
        }
    }  

    public function editUser($nome, $email, $telefone, $id) {
        global $pdo;

        $sql = $pdo->prepare('UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id ');
        $sql->bindValue('nome', $nome);
        $sql->bindValue('email', $email);
        $sql->bindValue('telefone', $telefone);
        $sql->bindValue('id', $id);
        $sql->execute();
    } 

    public function getUser($id) {
        global $pdo; 

        $sql = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
        $sql->bindValue('id', $id);
        $sql->execute();

        $info = $sql->fetchAll();
        return $info;
    }

    
    
}

?>