<?php

require 'config.php';
require 'usuarios.class.php';
$u = new Users();
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $u->removeUser($id);
}

header('Location: index.php');
?>
