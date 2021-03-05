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
<br>
<?php
    $id=$_GET["id"];
    $titulo=$_GET["titulo"];
    $tarea=$_GET["tarea"];

?>
<h1>Actualizacion</h1>
<form class="" action="main.php?var=4" method="post">

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

    <input type="hidden" name="id"  value="<?php echo $id?>">
    <label for="">Titulo: <br><br></label>
    <input type="text" name="titulo" value="<?php echo $titulo ?>">
    <table>
        <tr>
            <td>
                <label for=""><br>Tarea : <br><br></label>
                <textarea name="tarea" id="area_comentarios" rows="10" cols="50" ><?php echo $tarea?></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" name="actualizar" value="Actualizar">
</form>

<a href="cerrar_sesion.php">Cerrar sesion.</a>
</body>
</html>
