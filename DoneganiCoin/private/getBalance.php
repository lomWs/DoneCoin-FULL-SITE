<?php 

session_start();
if(isset($_SESSION['email'])){
    include "./blockchain.php";
    if(file_exists("donechain.json")){
        $file = "donechain.json";
        $upgradedChain = new BlockChain();
        $upgradedChain = $upgradedChain->JSON_to_Blockchain($file);
        if($upgradedChain->isChainValid()){
            $balance=$upgradedChain->getBalanceOfAddress($_POST['pubKeyWallet']);
    
            $_SESSION['balanceOf'] = $balance;
        }
    }else{
        
        header("Location: ./dashboard.php?JSON=notFound");
    }
    header("Location: ./dashboard.php");
}else{

    header("Location: ../login.php");
}



?>