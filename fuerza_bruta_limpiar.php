<?php
session_start();
include 'conexion.php'; // Asegúrate de que este sea el nombre de tu archivo de conexión

// 1. Limpiar Carrito en la Base de Datos (Si usas tablas)
if (isset($_SESSION['id_usuario'])) {
    $id_user = $_SESSION['id_usuario'];
    $sql = "DELETE FROM carrito WHERE id_usuario = '$id_user'";
    mysqli_query($conexion, $sql);
}

// 2. Limpiar PHP
$_SESSION['carrito'] = array();
session_unset();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Limpieza Profunda</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        // 3. Limpiar TODO el rastro en el navegador
        localStorage.clear();
        sessionStorage.clear();
        
        // Limpiar cookies de sesión por si acaso
        document.cookie.split(";").forEach(function(c) { 
            document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); 
        });

        Swal.fire({
            icon: 'success',
            title: '¡Carrito Desbloqueado!',
            text: 'Se han eliminado los productos fantasma de la base de datos y del navegador.',
            confirmButtonText: 'Ir a Inicio'
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>
</body>
</html>