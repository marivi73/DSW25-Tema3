<?php
// Crear un articulo

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\Models\Post;

require_once '../bootstrap.php';

if (isset($_GET['user_id'], $_POST['title'], $_POST['body'])){
    //Crear un post.
    $post = new Post(null, $_POST['title'], $_POST['body'], null, $_GET['user_id']);
    $postDAO = new PostDao($conn);
    $postDAO->create($post);
}

header('Location: posts.php');
exit();