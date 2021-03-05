<?php
session_start();

$session = $_SESSION['session'];

if ($session == null || $session = ''){
    echo 'Debe iniciar sesion para mostrar esta pagina.';
    die();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
<h1>Bienvenido: <?php echo $_SESSION['session'] ?></h1>

<a href="main.php?var=1">Nueva tarea.</a>
<a href="main.php?var=2">Mostrar tareas.</a>
<br>
<a href="cerrar_sesion.php">Cerrar sesion.</a>
</body>
</html>
