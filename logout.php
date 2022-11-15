<?php

    // Deconecta o banco de dados e 
    // retorna para a pagina de acesso
    session_start();
    session_unset();
    session_destroy();
    header('location:index.php');

?>