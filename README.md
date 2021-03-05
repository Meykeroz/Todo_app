### Todo App

* Despues de crear una tarea y al refrescar la pagina se continua insertando la misma tarea en la base de datos.
* Contrasenas deben ser guardadas en la base de datos de forma cifrada.
    `password_hash("rasmuslerdorf", PASSWORD_DEFAULT)` https://www.php.net/manual/en/function.password-hash.php
* Un usuario regular no deberia asignar tareas a un Administrador
* Un usuario regular no deberia ver las tareas de un Administrador.
