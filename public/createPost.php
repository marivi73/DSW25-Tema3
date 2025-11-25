<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
?>
<?php 
$titulo = "Crear Artículo";
include '../includes/header.php';
?>
    <form action="storePost.php?user_id=<?= $id ?>" method="post">
        <p>
            <label for="title">Título: </label>
            <input type="text" name="title" id="title" required>
        </p>
        <p>
            <label for="body">Contenido: </label>
            <textarea name="body" id="body"></textarea>
        </p>
        <p>
            <button type="submit">Crear</button>
        </p>
    </form>
<?php 
include '../includes/footer.php';
?>
<?php
}else{
    die("Id de status no válido");
}
?>