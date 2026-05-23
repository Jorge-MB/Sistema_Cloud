<?php
$a=array("lunes","martes","miercoles","Jueves   ");
$stral=serialize($a);
print_r($stral);


echo password_hash("123456", PASSWORD_DEFAULT);


?>