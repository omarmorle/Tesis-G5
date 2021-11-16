<?php
    $servidor="localhost";
    $usuario = "root";
    $clave="";
    $db="isw_tesis";
    $conex = mysqli_connect($servidor,$usuario,$clave,$db); 

    if(!$conex)
    {

        echo  "error";
    }
?>