<?php 
    session_start();
    if(isset($_SESSION['email'])){
        require "./blockchain.php";

        
        try{
            $doneChain = new BlockChain();
        }catch(Error $e){
            echo $e;
            header("Location: ./dashboard.php?JSON=fail");
        }
        $doneChain = new BlockChain();
        

        $wallet = new Wallet($_POST['fromPrivKey']);

        
        try{
            $wallet->sendMoney((double)$_POST['amount'],$_POST['toWallet'],$doneChain);

            
           //echo "<br> E' valida? : ". $doneChain->isChainValid() . "<br>"; 

    
           // echo "<pre>". json_encode($doneChain, JSON_PRETTY_PRINT) ."<pre/>";


            header("Location: ./dashboard.php?transfer=ok");
        }catch(Error $e){
            echo $e;
            

            header("Location: ./dashboard.php?transfer=error");
        }
    }else{

        header("Location: ../login.php");
    }




?>