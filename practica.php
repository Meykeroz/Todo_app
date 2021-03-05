<?php


require_once ("conexion.php");
$conect = new Conexion();
$conect=$conect->connect();

$sql = "SELECT * FROM users";
$mostrar = $conect->prepare($sql);
$mostrar->execute();

$mostrar->setFetchMode(PDO::FETCH_ASSOC);

echo "<select name='nombre'>";
while ($row = $mostrar->fetch()) {
    echo "<option value=".$row['id'].">".$row['name']."</option>";
}
echo "</select>";
?>