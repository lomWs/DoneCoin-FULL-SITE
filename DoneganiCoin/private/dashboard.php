<?php session_start();
if(isset($_SESSION['email'])){
    include_once "./blockchain.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <!--Link Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- FONT AWESOME( INCLUDE LE ICONE) -->
    <script src="https://kit.fontawesome.com/fc36cca802.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBackgroundColor);

        function drawBackgroundColor() {
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'X');
            data.addColumn('number', 'DoneCoin');

            data.addRows([
                [new Date(2018, 0, 1), 0], [new Date(2018, 1, 1), 10],  [new Date(2018, 2, 1), 23],  [new Date(2018, 3, 1), 17],  [new Date(2018, 4, 1), 18],  [new Date(2018, 5, 1), 9],
                [new Date(2018, 6, 1), 5],  [new Date(2018, 7, 1), 27],  [new Date(2018, 8, 1), 33],  [new Date(2018, 9, 1), 40],  [new Date(2018, 10, 1), 32], [new Date(2018, 11, 1), 35],

                
                [new Date(2019, 0, 1), 40], [new Date(2019, 1, 1), 42], [new Date(2019, 2, 1), 47], [new Date(2019, 3, 1), 44], [new Date(2019, 4, 1), 48],[new Date(2019, 5, 1), 52], 
                [new Date(2019, 6, 1), 54], [new Date(2019, 7, 1), 42], [new Date(2019, 8, 1), 55], [new Date(2019, 9, 1), 56], [new Date(2019, 10, 1), 57],[new Date(2019, 11, 1), 60], 
 
                
                [new Date(2020, 0, 1), 52], [new Date(2020, 1, 1), 51], [new Date(2020, 2, 1), 49], [new Date(2020, 3, 1), 53],[new Date(2020, 4, 1), 55], [new Date(2020, 5, 1), 60], 
                [new Date(2020, 6, 1), 100], [new Date(2020, 7, 1), 59], [new Date(2020, 8, 1), 62], [new Date(2020, 9, 1), 65],[new Date(2020, 10, 1), 62], [new Date(2020, 11, 1), 58], 
 
                
                [new Date(2021, 0, 1), 61], [new Date(2021, 1, 1), 64], [new Date(2021, 2, 1), 65],[new Date(2021, 3, 1), 63], [new Date(2021, 4, 1), 66], [new Date(2021, 5, 1), 67], 
                [new Date(2021, 7, 1), 69], [new Date(2021, 8, 1), 69],[new Date(2021, 9, 1), 12], [new Date(2021, 10, 1), 68], [new Date(2021, 11, 1), 66], 


                [new Date(2022, 0, 1), 67], [new Date(2022, 1, 1), 70],[new Date(2022, 2, 1), 71], [new Date(2022, 3, 1), 72], [new Date(2022, 4, 1), 73], [new Date(2022, 5, 1), 75], 
                [new Date(2022, 6, 1), 70], [new Date(2022, 7, 1), 68],[new Date(2022, 8, 1), 64], [new Date(2022, 9, 1), 60], [new Date(2022, 10, 1), 65], [new Date(2022, 11, 1), 67], 
            ]);

            var options = {
            hAxis: {
                title: 'Tempo',
            },
            vAxis: {
                title: 'Prezzo'
            },
            backgroundColor: '#e4e5f0',
            colors: ['black']
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

</head>
<body>
    

    <nav class="navbar navbar-dark bg-dark">
        <!-- Navbar content -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../img/DoneganiCoin.png" alt="" width="60" height="60" class="d-inline-block align-text-left">           
            <h5 class="text-white d-inline-block align-text-top">PRIVATE AREA</h5>
            </a>

            

            <div class="d-flex">
                <a class="nav-link text-white" href="userPage.php"><i class="fa-solid fa-user"></i> Profilo</a>

                <a class="nav-link text-danger" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> LogOut</a>
            </div>

        </div>
    </nav>

    <div class="container">
    <br>
        
  
<br>


    <!-- SEZIONE GRARFICO ANDAMENTO MONETA -->
    <h2>GRAFICO DONECOIN</h2>
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <div class="col">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div id="chart_div"></div>
        </div>

    </div>

    <!-- SEZIONE GRARFICO ANDAMENTO MONETA -->

    <!-- TRANSAZIONI -->
    <h2>PAGAMENTI</h2>
    <br>

    <form class="row g-6 shadow p-3 mb-5 bg-white rounded"  action="./transaction.php" method="POST">
        <!--------------BANNER IN CASO DI SUCCESSO NELLA TRANSAZIONE-------> 
            <?php  
                if(isset($_GET['transfer'])){
                    $transfer= $_GET['transfer'];
                        if($transfer == "ok"){
            ?>
            <br>
            
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Transazione effetuata e aggiunta alla blockchain!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <!--------------BANNER IN CASO DI SUCCESSO NELLA TRANSAZIONE------->


        <!--------------BANNER IN CASO DI ERRORE NELLA TRANSAZIONE-------> 
            <?php }
                } 
                if(isset($_GET['transfer'])){
                    $transfer= $_GET['transfer'];
                        if($transfer == "error"){
            ?>
            <br>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Transazione negata, riprova o contatta l'assistenza!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php   }
                }?>
        <!--------------BANNER IN CASO DI ERRORE NELLA TRANSAZIONE-------> 

        <!--------------BANNER ERRORE NELLA BLOCKCHAIN-------> 
                <?php  
                if(isset($_GET['JSON'])){
                    $transfer= $_GET['JSON'];
                        if($transfer == "fail"){
            ?>
            <br>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Violazione delle norme, blockchain errata!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php   }
                }?>
        <!--------------BANNER IN CASO DI ERRORE NELLA TRANSAZIONE-------> 
        <div class="col-md-12">
            <label class="form-label">Chiave privata</label>
            <input type="text" minlength="4" maxlength="64" class="form-control" id="fromPrivKey" name="fromPrivKey" required aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Assicurati della correttezza della tua chiave privata</div>
        </div>
        <div class="col-md-12">
            <label class="form-label">Indirizzo del ricevente</label>
            <input  type="text"  class="form-control" required id="toWallet" name="toWallet">
            <div id="emailHelp" class="form-text">Assicurati che l'indirizzo del wallet sia corretto, non avrai nessun rimborso</div>
        </div>

        <div class="col-md-6">
            <label  class="form-label">Saldo</label>
            <input  min="1" class="form-control" required id="amount" name="amount">   
        </div>

        <div class="d-grid  mt-2 col-4 md-3 p-4">
            <button type="submit" class="btn btn-dark">Invia</button>
        </div>

    </form>
    <!-- TRANSAZIONI -->

    <?php
            if(file_exists("donechain.json")){
                $file = "donechain.json";
                $upgradedChain = new BlockChain();
                $upgradedChain = $upgradedChain->JSON_to_Blockchain($file);
                if($upgradedChain->isChainValid()){
            ?>
                    <!-- BLOCKCHAIN TABLE-->
                    <h2>BLOCKCHAIN</h2>
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
  
                                <th scope="col">Hash</th>
                                <th scope="col">Hash precedente</th>
                                <th scope="col">Nonce</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <?php  for($i=0;$i<sizeof($upgradedChain->chain);$i++){?>
                            <tbody>
                                <tr>

                                    <td><?php echo $upgradedChain->chain[$i]->hash;?></td>
                                    <td><?php echo $upgradedChain->chain[$i]->prevHash;?></td>
                                    <td><?php echo $upgradedChain->chain[$i]->nonce;?></td>
                                    <td><?php echo $upgradedChain->chain[$i]->timestamp;?></td>
                                </tr>
                            </tbody>
                        <?php  }?>
                    </table>
                    </div>
                    
                    <!-- BLOCKCHAIN TABLE -->
            <?php
                }else{
                    
                    throw new Error("Blockchain Errata");
                    }
            }
            
            ?>



    <?php
            if(file_exists("donechain.json")){
                $file = "donechain.json";
                $upgradedChain = new BlockChain();
                $upgradedChain = $upgradedChain->JSON_to_Blockchain($file);
                if($upgradedChain->isChainValid()){
            ?>
    <!-- TRANSACTION TABLE-->
    <h2>TRANSAZIONI</h2>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Da</th>
                    <th scope="col">A</th>
                    <th scope="col">Saldo</th>
                </tr>
            </thead>
            <?php  for($i=1,$k=1;$i<sizeof($upgradedChain->chain);$i++){
                        for($j=0;$j<sizeof($upgradedChain->chain[$i]->transactions);$j++){    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $k++;?></th>
                            <td ><?php if($upgradedChain->chain[$i]->transactions[$j]->fromAddress == null){
                                echo "null";
                            }else{
                                echo $upgradedChain->chain[$i]->transactions[$j]->fromAddress;
                            }
                            ?></td>
                            <td><?php echo $upgradedChain->chain[$i]->transactions[$j]->toAddress;?></td>
                            <td><?php echo $upgradedChain->chain[$i]->transactions[$j]->amount;?></td>
                        </tr>
                    </tbody>
            <?php       }
                    }?>
        </table>
        </div>
    
    <!-- TRANSACTION TABLE -->
    <?php
                }else{
                    
                    throw new Error("Blockchain Errata");
                }
            }
                
        ?>
        <?php
            if(file_exists("donechain.json")){
                $file = "donechain.json";
                $upgradedChain = new BlockChain();
                $upgradedChain = $upgradedChain->JSON_to_Blockchain($file);
                if($upgradedChain->isChainValid()){
            ?>
    <!-- PENDING TRANSACTION TABLE-->
    <h2>TRANSAZIONI IN ATTESA</h2>
    <div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Numero</th>
                <th scope="col">A</th>
                <th scope="col">RICOMPENSA</th>
            </tr>
        </thead>
        <?php  for($i=0;$i<sizeof($upgradedChain->pendingTransactions);$i++){?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $i+1;?></th>
                        <td><?php echo $upgradedChain->pendingTransactions[$i]->toAddress;?></td>
                        <td><?php echo $upgradedChain->pendingTransactions[$i]->amount;?></td>
                    </tr>
                </tbody>
        <?php  }?>
    </table>
    </div>
    
    <!-- PENDING TRANSACTION TABLE -->
    <?php
                }else{
                    
                    throw new Error("Blockchain Errata");
                    }
            }
            
            ?>

    <br>
    <!-- CALCOLA AMOUNT DI UN INDIRIZZO -->
    <h2>CALCOLA SALDO WALLET</h2>
    <br>

    <form class="row g-6 shadow p-3 mb-5 bg-white rounded"  action="./getBalance.php" method="POST">

        <!--------------BANNER IN CASO DI ERRORE NELLA TRANSAZIONE-------> 
            <?php
                if(isset($_GET['JSON'])){
                    $transfer= $_GET['JSON'];
                        if($transfer == "notFound"){
            ?>
            <br>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                File Blockchain non trovato
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php   }
                }?>
        <!--------------BANNER IN CASO DI ERRORE NELLA TRANSAZIONE-------> 



        <div class="col-md-12">
            <label class="form-label">Indirizzo del Wallet</label>
            <input  type="text"  class="form-control" required id="pubKeyWallet" name="pubKeyWallet">
            <div id="emailHelp" class="form-text">Assicurati che l'indirizzo del wallet sia corretto</div>
        </div>

        <div class="d-grid  mt-2 col-4 md-3 p-4">
            <button type="submit" class="btn btn-dark">Calcola</button>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col" class="overflow-auto" ><?php 
                        if(!isset($_SESSION['balanceOf'])){echo "";}
                        else{echo $_SESSION['balanceOf'];}
                        ?></th>
                    </tr>
                </thead>
            </table>
        </div>

    </form>
    <!-- CALCOLA AMOUNT DI UN INDIRIZZO -->


    </div>










    <!--Link Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
<?php }else{
    header("Location: ../login.php");
    }

?>