<?php session_start();
if(isset($_SESSION['email'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo</title>

    <!--Link Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- FONT AWESOME( INCLUDE LE ICONE) -->
    <script src="https://kit.fontawesome.com/fc36cca802.js" crossorigin="anonymous"></script>

</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <!-- Navbar content -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../img/DoneganiCoin.png" alt="" width="60" height="60" class="d-inline-block align-text-left">
            <h53 class="text-white d-inline-block align-text-top">PRIVATE AREA</h5>
            </a>

            

            <div class="d-flex">
                <a class="nav-link text-white" href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>

                <a class="nav-link text-danger" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> LogOut</a>
            </div>

        </div>
    </nav>

    <div class="container">
        <br>
        <h2>KEYS GENERATOR</h2>
        <form class="row g-6 shadow p-3 mb-5 bg-white rounded"  action="generateWallet.php" method="POST">
            <div class="col-md-12">
                <label class="form-label">Chiave privata</label>
                <div class="table-responsive">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col" class="overflow-auto" name="privkey" id="privkey"><?php 
                                if(!isset($_SESSION['privKey'])){echo "";}
                                else{echo $_SESSION['privKey'];}
                                ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div id="emailHelp" class="form-text">Utilizza la chiave privata per mandare DoneCoin ad altri wallet,
                    non perdere , dimenticare o diffondere per nessun motivo la tua chiave
                </div>
                
            </div>
            <div class="col-md-12">
                <label class="form-label">Chiave Publica</label>
                <div class="table-responsive">
                    <table class="table able-striped table-dark overflow-hidden">
                        <thead>
                            <tr>
                                <th scope="col"  name="pubKey" id="pubKey"><?php
                                if(!isset($_SESSION['pubKey'])){echo "";}
                                else{echo $_SESSION['pubKey'];}
                                ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div id="emailHelp" class="form-text">Usa la tua chiave publica per ricevere DoneCoin</div>
            </div>

            <div class="d-grid  mt-2 col-4 md-3 p-4">
                <button type="submit" class="btn btn-dark">Genera nuovo Wallet</button>
            </div>
        </form>
    
    <h2>INFORMZIONI PROFILO</h2>
    <div class="row g-6 shadow p-3 mb-5 bg-white rounded">
        <div class="card text-white bg-dark mb-3">
        
        <div class="card-body">
        <h5 class="card-title">Nome</h5>
        <p class="card-text"><?php echo $_SESSION['nome'] ?></p>

        <h5 class="card-title">Cognome</h5>
        <p class="card-text"><?php echo $_SESSION['cognome'] ?></p>

        <h5 class="card-title">Data di nascita</h5>
        <p class="card-text"><?php echo $_SESSION['data_nascita'] ?></p>

        <h5 class="card-title">Luogo di nascita</h5>
        <p class="card-text"><?php echo $_SESSION['luogo_nascita']?></p>

        <h5 class="card-title">Email</h5>
        <p class="card-text"><?php echo $_SESSION['email'] ?></p>
        </div>



    </div>

    
    
    
    
    
    
    
    
    
    
    
    
    </div>








    <!--Link Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php }else{
    header("Location: ../login.php");
}
?>