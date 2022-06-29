<?php 
    session_start();

    include_once "../utils/Connessione.php";
    
    $email = $_POST['email'];
    $password = $_POST['password'];



    $conn = new Connessione();

    $stmt = $conn->query("SELECT nome,cognome,email,password,data_nascita,luogo_nascita,residenza,nazionalità,salt FROM utenti WHERE email = '$email'");
    $row = $stmt->fetch();
    if($row['email'] == $email  && $row['password'] == crypt($password,$row['salt'])){ //mail è password sono corrette
        header("Location: ../private/dashboard.php?", true, 301); 
        $_SESSION['email'] = $row['email'] ;
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['cognome'] = $row['cognome'];
        $_SESSION['data_nascita'] = $row['data_nascita'];
        $_SESSION['luogo_nascita'] = $row['luogo_nascita'];
        $_SESSION['email'] = $row['email'];
        exit(); 
    }else{
        header("Location: ../login.php?credential=error", true, 301); 
        exit(); 
    }
            //chiudo la connessione con il db
            $this->conn = null;  
?> 