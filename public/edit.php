<?php

use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';
accessControl($user, 'admin');

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    die('El id no es válido.');
}

$id = $_GET['id'];

$userDAO = new UserDao($conn);
$userDetail = $userDAO->get($id);

if (!$userDetail){
    die("Usuario no encontrado.");
}

$titulo ="Formulario para modificar el usuario con id = " . $id;
include '../includes/header.php';
?>
     <!-- <h1>Formulario para modificar el usuario con id = <?php echo $id; ?></h1> -->
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <p>
            <label for="name">Nombre: </label>
            <input type="text" name="name" id="name" required value="<?= $userDetail->getName() ?>">
        </p>
        <p>
            <label for="email">Correo Electrónico: </label>
            <input type="email" name="email" id="email" required value="<?= $user->getEmail() ?>">
        </p>
        <p>
            <label for="password">Nueva contraseña:</label>
            <input type="password" name="password" id="password" required>
        </p>
        <p>
            <p>Tipo usuario: </p>
            <label>
                <input type="radio" name="role" value="user" <?php if ($userDetail->getLevel() === 'user') echo 'checked'; ?>> usuario
            </label>
            <label>
                <input type="radio" name="role" value="admin" <?php if ($userDetail->getLevel() === 'admin') echo 'checked'; ?>> administrador
            </label>
        <p>
        <p>
            <button type="submit">Modificar</button>
        </p>
    </form>
</body>
</html>