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
<a href="main.php?var=2">Mostrar tareas.</a>
<br>
<br>
<form action="main.php?var=1" method="post">

    <label for="">Asignar tarea a: <br><br></label>

    <?php
    require_once ("conexion.php");
    $conect = new Conexion();
    $conect=$conect->connect();

    $sql = "SELECT * FROM users";
    $mostrar = $conect->prepare($sql);
    $mostrar->execute();

    $mostrar->setFetchMode(PDO::FETCH_ASSOC);

    echo "<select name='id_nombre'>";
    while ($row = $mostrar->fetch()) {
        echo "<option value=".$row['id'].">".$row['name']."</option>";
    }
    echo "</select>";
    ?>
    <br>
    <br>

    <label for="">Titulo: <br><br></label>
    <input type="text" name="titulo" placeholder="Titulo" required="required">

    <table>
        <tr>
            <td>
                <label for=""><br>Nueva Tarea : <br><br></label>
                <textarea name="tarea" id="area_comentarios" rows="10" cols="50"></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" value="Crear nueva tarea." id="hola">
</form>
<a href="cerrar_sesion.php">Cerrar sesion.</a>
</body>
</html>