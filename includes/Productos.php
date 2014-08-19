<?php

/*Incluimos el fichero de la clase*/
require 'Db.class.php';

/*Creamos la instancia del objeto. Ya estamos conectados*/
$bd=Db::getInstance();

/*Creamos una query sencilla*/
$sql='SELECT ID,Title FROM Productos LIMIT 1,10';

/*Ejecutamos la query*/
$stmt=$bd->ejecutar($sql);

/*Realizamos un bucle para ir obteniendo los resultados*/
while ($x=$bd->obtener_fila($stmt,0)){
   echo $x['ID'].'-'.$x['Title'].'<br />';
}

?>