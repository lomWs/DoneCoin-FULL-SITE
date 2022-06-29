<?php 
    session_start();
    include_once "../utils/Connessione.php";
    include_once "../utils/generate_randomString.php";
    
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $data_nascita = $_POST['data_nascita'];
    $luogo_nascita = $_POST['luogo_nascita'];
    $nazionalita = $_POST['nazionalita'];
    $residenza = $_POST['residenza'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $salt = generateRandomString(strlen($password));

    $password = crypt($password,$salt);

    $conn = new Connessione();

    $stmt = $conn->query("SELECT email FROM utenti WHERE email = '$email'");
    
    if($stmt->fetch() != null){ //se esister gia l'email nel db
        header("Location: ../signUp.php?email=exist", true, 301); 
        
        exit(); 
    }

    $stmt = $conn->query("INSERT INTO utenti(nome,cognome,email,password,data_nascita,luogo_nascita,residenza,nazionalità,salt)
                        VALUES('$nome','$cognome','$email','$password','$data_nascita','$luogo_nascita','$residenza','$nazionalita','$salt')");
    $_SESSION['nome'] = $row['nome'];
    $_SESSION['cognome'] = $row['cognome'];
    $_SESSION['data_nascita'] = $row['data_nascita'];
    $_SESSION['luogo_nascita'] = $row['luogo_nascita'];
    $_SESSION['email'] = $row['email'];
    header("Location: ../private/dashboard.php", true, 301); 
    
    exit(); 

            //chiudo la connessione con il db
            $this->conn = null;  
?> 