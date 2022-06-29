<?php

class Connessione extends PDO{
    //classe warpping di PDO, con maggiore portabilità
    
    //COSTRUTTORE 
    function __construct() {
        //php non supporta il polimorfismo del costruttore 
        //cosi facendo in base al numero di argomenti passati alle funzioni
        //riconosce il tipo di costruttore
        $argomenti = func_get_args();
        $numeroDiArgomenti = func_num_args();

        if (method_exists($this, $metodo = '__construct'.$numeroDiArgomenti)) {
            call_user_func_array(array($this, $metodo), $argomenti);
        }
        //il costruttore viene scelto in base al numero di argomenti,
        //ed al nome, nel costruttore avviene la gestione della sola connessione
        //al db inclusi eventuali errori

    }

    //COSTRUTTORE  CON PARAMETRI DI DEFAULT
    private function __construct0() { //0 argomenti passati
        $this->servername = "127.0.0.1";
        $this->db_username = "root";
        $this->db_password = "";
        $this->db_name = "done_coin";

        parent::__construct("mysql:host=$this->servername;dbname=$this->db_name",$this->db_username,$this->db_password);
        try{
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Errore nella connessione: " . $e->getMessage();
        }
      }

    //COSTRUTTORE PARAMETRIZATO
    private function __construct4($servername,$db_username,$db_password,$db_name) {
        //4 argomenti passati
        $this->servername = $servername;
        $this->db_username = $db_username;
        $this->db_password = $db_password;
        $this->db_name = $db_name;

        parent::__construct("mysql:host=$this->servername;dbname=$this->db_name",$this->db_username,$this->db_password);
        try{
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Errore nella connessione: " . $e->getMessage();
        }
    }

}
?>