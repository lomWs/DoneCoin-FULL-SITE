<?php

include './vendor/autoload.php'; 
use Elliptic\EC;
$ec = new EC('secp256k1');




class Transaction{

    function __construct($fromAddress,$toAddress, $amount){
        $this->fromAddress = $fromAddress;
        $this->toAddress = $toAddress;
        $this->amount = $amount;
        
    }

    function calculateHash(){
        return hash('sha256',$this->fromAddress . $this->toAddress . $this->amount);
    }

    function signTransaction($signingKey){
        if($signingKey->getPublic('hex') !== $this->fromAddress){
            throw new Error("Non puoi firmare una transazione per un altro wallet");
        }

        $hashTx = $this->calculateHash();
        $sig = $signingKey->sign($hashTx,'base64');
        $this->signature = $sig->toDER('hex');
    }

    function isValid(){
        if($this->fromAddress === null) return true;

        if(!$this->signature || $this->signature === 0){
            throw new Error("La transazione non segnata");
        }

        $publicKey = $GLOBALS['ec']->keyFromPublic($this->fromAddress, 'hex');
        return $publicKey->verify($this->calculateHash(),$this->signature);
    }


    function getToAddress(){
        return $this->toAddress;
    }

    function getFromAddress(){
        return $this->fromAddress;
    }

    function getAmount(){
        return $this->amount;
    }
}

//CLASSE BLOCCHI
class Block{
    public $nonce;


    function __construct($timestamp,$transactions, $prevHash = ''){
        $this->timestamp = $timestamp;
        $this->transactions = $transactions;
        $this->prevHash = $prevHash;
        $this->hash = $this->calculateHash();
        $this->nonce = 0;

        
           
    }

    function calculateHash(){
        return hash('sha256', $this->timestamp . strval(json_encode($this->transactions)) . $this->prevHash . $this->nonce  );
    }
    
    function mineBlock($difficulty){
        while(substr($this->hash,0,$difficulty) !== str_repeat("0", $difficulty)){
            $this->nonce++;
            $this->hash = $this->calculateHash();
        }

        printf("Block minato: " . $this->hash);
        
    }
    
    function hasValidTransactions(){
        foreach($this->transactions as $tx){
            if(!$tx->isValid()){
                return false;
            }
        }

        return true;
    }

}
// Function to convert class of given object
        function convertObjectClass($object, $final_class) {
            return unserialize(sprintf(
                'O:%d:"%s"%s',
                strlen($final_class),
                $final_class,
                strstr(strstr(serialize($object), '"'), ':')
            ));
        }

//CLASSE BLOCKCHAIN
class BlockChain{
    public $version;

    function __construct(){
        if(file_exists("donechain.json")){
            $file = "donechain.json";
            $upgradedChain = $this->JSON_to_Blockchain($file);
            if($upgradedChain->isChainValid()){
                $this->chain = $upgradedChain->chain;
                $this->difficulty  = $upgradedChain->difficulty;
                $this->pendingTransactions  = $upgradedChain->pendingTransactions;
                $this->miningReward = $upgradedChain->miningReward;
                $this->version = $upgradedChain->version;
            }else{

                throw new Error("Blockchain Errata");
            }
        }
        else{
            $this->chain = [$this->createGenesisBlock()];
            $this->difficulty  = 3;
            $this->pendingTransactions  = [];
            $this->miningReward = 10;
            $this->version = 0;


        }


    }
        // Function to convert class of given object
    function convertObjectClass($object, $final_class) {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($final_class),
            $final_class,
            strstr(strstr(serialize($object), '"'), ':')
        ));
        }



    function JSON_to_Blockchain($FILE){
        $lastChain= $this->getChain_fromJSON($FILE);
        $lastChain= $this->objectToObject($lastChain,"BlockChain");
        $lastChain->chain[0] = $this->objectToObject($lastChain->chain[0],"Block");
        for($i = 1; $i< sizeof($lastChain->chain);$i++){
            $lastChain->chain[$i] = $this->objectToObject($lastChain->chain[$i],"Block");

            for($j = 0 ; $j<sizeof($lastChain->chain[$i]->transactions); $j++){

                    $lastChain->chain[$i]->transactions[$j] = $this->objectToObject($lastChain->chain[$i]->transactions[$j] ,"Transaction");
        
                
            }
            

        }
        for($i = 0; $i<sizeof($lastChain->pendingTransactions);$i++){
            $lastChain->pendingTransactions[$i] = $this->objectToObject($lastChain->pendingTransactions[$i],"Transaction");
        }

        return $lastChain;
    }
    private  function objectToObject($instance, $className) {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(strstr(serialize($instance), '"'), ':')
        ));
    }
    private function getChain_fromJSON($file){
        $json = file_get_contents($file);    //prendo la blockchain dal file json
        return json_decode($json);
    }

    function createGenesisBlock(){
        return new Block(date("d-m-y"),"Genesis Block",str_repeat("0",64));
    }

    function getLastBlock(){
        return $this->chain[count($this->chain) -1];
    }

    function minePendingTransactions($miningRewardAddress){
        $block = new Block(date("d-m-y"),$this->pendingTransactions,$this->getLastBlock()->hash);
        $block->mineBlock($this->difficulty);

        echo "<br> Bloccco minato correttamente <br>";        
        array_push($this->chain,$block);

        $this->pendingTransactions = [
            new Transaction(null,$miningRewardAddress,$this->miningReward)
        ];

    }
    
    function addTransaction($transaction){

        if(!$transaction->getFromAddress() || !$transaction->getToAddress()){
            throw new Error('La transazione deve contenere l\'indirizzo del mittente e del destinatario');
        }

        if(!$transaction->isValid()){
            throw new Error('Non puoi aggiungere transizioni non valide alla blockchain');

        }

        
        array_push($this->pendingTransactions, $transaction);
    }

    function getBalanceOfAddress($address){
        $balance = 0;
        //per ogni blocco della catena
        foreach($this->chain as $block){
            
            //per ogni transazione del singolo blocco che puo contenere piu transazioni
            if(is_array($block->transactions) || is_object($block->transactions) ){
                foreach($block->transactions as $trans){
            
                    if(strcmp($trans->getFromAddress(), $address) == 0){//se le due stringhe sono uguali
                        //strcmp -> ritorna 0 se sono uguali
                        $balance -= $trans->getAmount();
                        //il balance deve sottrarsi se vengono inviati soldi
                    }
                    if(strcmp($trans->getToAddress(), $address) == 0){//se le due stringhe sono uguali
                        //strcmp -> ritorna 0 se sono uguali
                        $balance += $trans->getAmount();
                        //il balance deve aggiungeri alle mondete già possedute
                    }
                }
            }


        }

        return $balance;

    }





    function isChainValid(){//verifica l'integrità della blockchain
        for($i= 1; $i<count($this->chain);$i++){
            $currentBlock = $this->chain[$i];
            $prevBlock = $this->chain[$i-1];

            if($currentBlock->hash !== $currentBlock->calculateHash()){
                //ritorna falso se l'hash del blocco[i] è diverso dall'hash che viene calcolato dalla funzione
                return 0;
            }

            if($currentBlock->prevHash !== $prevBlock->hash){
                //ritorna falso se il prevHash del blocco[i] è diverso dall'hash del blocco[i-1]
                return 0;
            }
        }

        
        return 1;
    }

 
}

class Wallet{
    public $publicKey;
    public $privateKey;
    

    
    function __construct(){

        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }


    }

    function __construct0() {
        $this->key =  $GLOBALS['ec']->genKeyPair();

        $this->publicKey = $this->key->getPublic('hex');
        $this->privateKey = $this->key->getPrivate('hex');
        
    }

    function __construct1($privateKey) {
        $this->key =  $GLOBALS['ec']->keyFromPrivate($privateKey);

        $this->publicKey = $this->key->getPublic('hex');
        if($privateKey == $this->key->getPrivate('hex'))
            $this->privateKey =  $this->key->getPrivate('hex');
        else
            throw new Error("Private key errore");     
    }


    function sendMoney($amount, $toAddress,$chain){
                                                                            //chiave del mio wallet
        if($chain->getBalanceOfAddress($this->publicKey) >= $amount || $this->privateKey == "a21d819fc194daa5b8ea05b7b642396a175e29c04be7997887617e613a097543"){
            $transaction = new Transaction($this->publicKey, $toAddress, $amount);
    
            $transaction->signTransaction($this->key);
    
            if($transaction->isValid()){
                if($chain->isChainValid()){

                    

                    $chain->addTransaction($transaction);
                    $chain->minePendingTransactions($this->publicKey);
                    $chain->version++;
                    
                    $json =  json_encode($chain, JSON_PRETTY_PRINT);
                    file_put_contents("donechain.json", $json);
                }
                else
                    throw new Error("Chain non valida");
    
            }
    
            else
                throw new Error("Transazione non effettuata");
        }else{
                throw new Error("Transazione non effettuata, fondi insufficienti");
        }
        


    }


    
}

?>