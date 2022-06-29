<?php 

    session_start();

    //ELIMINA LA SESSIONE CORRENTE
        session_unset();
        session_destroy();

    //RIPORTA ALLA PAGINA INIZIALE DI LOGINs
        header("Location: ../doneHome.php");

?>