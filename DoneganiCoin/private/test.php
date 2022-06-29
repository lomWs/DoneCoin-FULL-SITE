<?php

    include "./blockchain.php";

    $doneCoin = new BlockChain();
    $specialPrivKey="a21d819fc194daa5b8ea05b7b642396a175e29c04be7997887617e613a097543";
    
    $w1 = new  Wallet($specialPrivKey);
    $w2 = new  Wallet("fd918e0b696c9dfe24e261db61340f75c763558c9d19c6cbe0af4cf3d15961ff");
    $w3 = new Wallet("cad020c3ed4754b58f4fe8d86651cbcdb4ac6c81f167b079ca7553c5a3eaa561");


    $w1->sendMoney(10000,$w2->publicKey,$doneCoin);
    $w2->sendMoney(20,$w1->publicKey,$doneCoin);
    $w2->sendMoney(10,$w1->publicKey,$doneCoin);
    echo "<br>";


    



    echo "<br> Bilancio wallet 1 : ". $doneCoin->getBalanceOfAddress($w1->publicKey) . "<br>";
    echo "<br> Indirizzo wallet 1: ". $w1->publicKey . "<br>";
    echo "<br> Chiave Privata wallet 1: ". $w1->privateKey . "<br>";

    echo "<br> Bilancio wallet 2: ". $doneCoin->getBalanceOfAddress($w2->publicKey) . "<br>";
    echo "<br> Indirizzo wallet 2: ". $w2->publicKey . "<br>";
    echo "<br> Chiave Privata wallet 2 : ". $w2->privateKey . "<br>";


    echo "<br> Bilancio wallet 3: ". $doneCoin->getBalanceOfAddress($w3->publicKey) . "<br>";
    echo "<br> Indirizzo wallet 3: ". $w3->publicKey . "<br>";
    echo "<br> Chiave Privata wallet 3 : ". $w3->privateKey . "<br>";

    echo "<br> E' valida? : ". $doneCoin->isChainValid() . "<br>"; 
    
    echo "<pre>". json_encode($doneCoin, JSON_PRETTY_PRINT) ."<pre/>";

    $json =  json_encode($doneCoin, JSON_PRETTY_PRINT);


    file_put_contents("blockchain.json", $json);
 
    
?>


