<?php

include('../config.php');

$user_fun = new Userfunction();

$nombreColumnasTabla=$user_fun->loguear($_POST['user'],$_POST['pass']);

print $nombreColumnasTabla;

?>