<?php 
    session_start();
    if(isset($_SESSION['email'])){
        include "./blockchain.php";

        $wallet = new  Wallet();
    
        $_SESSION['privKey'] = $wallet->privateKey;
        $_SESSION['pubKey'] = $wallet->publicKey;

        header("Location: ./userPage.php");
    }else{

        header("Location: ../login.php");
    }



?>