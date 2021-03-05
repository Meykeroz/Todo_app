<?php

require("crud.php");
session_start();

$session = $_SESSION['session'];
if ($_SESSION['id_rol'] != 2){
    $rol="Administrador";
}else{
    $rol="Usuario";
}

if ($session == null || $session = ''){
    echo 'Debe iniciar sesion para mostrar esta pagina.';
    die();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Todo_app</title>
</head>
<body>
<h1>Bienvenido: <?php echo $_SESSION['session']." ". $rol;?></h1>

<a href="main.php?var=1">Nueva tarea.</a>
<a href="main.php?var=2">Mostrar todas las tareas.</a>
<a href="main.php?var=5">Mis tareas.</a>

<?php
    $obj_crud = new Tareas();

    if (!empty($_GET["var"])) {
        $var=$_GET["var"];
        switch ($var) {

            case 1:
                if (empty($_POST["titulo"]) && empty($_POST["tarea"])){
                    header("Location:crear_tarea.php");
                }else {
                    $titulo = $_POST["titulo"];
                    $tarea = $_POST["tarea"];
                    $id_nombre = $_POST["id_nombre"];

                    $obj_crud->nueva_tarea($titulo, $tarea,$id_nombre);
                }
                break;
            case 2:
                $obj_crud->mostrar_tareas();
                break;
            case 3:
                if (!empty($_GET["id"])) {

                    $id = $_GET["id"];
                    $obj_crud->eliminar_tarea($id);
                }
                break;
            case 4:
                if (!empty($_POST["id"])) {
                    $id = $_POST["id"];
                    $titulo = $_POST["titulo"];
                    $tarea = $_POST["tarea"];
                    $id_nombre = $_POST["id_nombre"];
                    $obj_crud->actualizar_tarea($id, $titulo, $tarea,$id_nombre);
                }
                break;
            case 5:

                $obj_crud->tareas_usuario();
                break;
        }
    }

?>
<br>
<br>
<a href="cerrar_sesion.php">Cerrar sesion.</a>
</body>
</html>

