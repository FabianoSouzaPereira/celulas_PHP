<?php

use mobile\modulos\Usuario;

require 'init.php';
include_once '../mobile/modulos/Usuario.php';

$usu = new Usuario();
if (isset($_GET['au'])){
    $id=$_GET['id'];
    
    $usu->pastorDeletebyid($id);
    
    header( "Location: index.php?pag=site_view_userDeletedView" );
    exit();
    
}

?>
