<?php
// Página de prueba. Se debe eliminar de producción.

require_once '../vendor/autoload.php';
require_once 'conexion.php';

//echo "Conexión correcta";

//Consulta SQL o manipulación de la base de datos.

if (isset($_GET['id'])) {
    //borrar el id
    $sql = "DELETE FROM user WHERE id= :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);
}

header('Location: selectall.php');
exit();