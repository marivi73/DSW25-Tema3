<?php

use Dsw\Blog\DAO\PostDao;

require_once '../bootstrap.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('El id no es válido.');
}

$id = $_GET['id'];

$postDAO = new PostDao($conn);
$post = $postDAO->delete($id);

// Vuelve a mostrar la tabla
header('Location: posts.php');
exit();