<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
  
    <style>
            .banner-image {
                background-image: url('img/BackGroundScuolan.jpg');
                background-size: cover;
                background-size: 110% 110%;
                background-position: center center;
                animation: shrink 7s infinite alternate;
            }
            @keyframes shrink {
                0% {
                    background-size: 150% 150%;
                }
                100% {
                    background-size: 100% 100%;
                }
            }
            nav a.nav-link{
                font-size: 20px;
                
            }
    </style>
    <!-- FONT AWESOME -->
    <script>
        var controlla_psw = function() {
                if (document.getElementById('password').value ==
                    document.getElementById('conferma_password').value) {
                    document.getElementById('messaggio').style.color = 'green';
                    document.getElementById('messaggio').innerHTML = 'corrisponde';
                } else {
                    document.getElementById('messaggio').style.color = 'red';
                    document.getElementById('messaggio').innerHTML = 'mancante o non corrispondente';
                }
            }
    </script>
    <script src="https://kit.fontawesome.com/fc36cca802.js" crossorigin="anonymous"></script>
  


</head>
<body>
    

        <!-- Banner Image  -->
        <div
        class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center"
        >


 

        <!--CONATINER CON SHADOW-->
        <div class="container mx-auto  rounded">
            
        <a href="./index.php"><img src="./img/DoneganiCoin.png" alt="" srcset="" class="img-fluid mx-auto d-block" width="100px" height="100px"></a>
            <!--------------BANNER IN CASO DI ERRORI NELLE CREDENZIALI-------> 
                <?php  
                        if(isset($_GET['email'])){
                            $email= $_GET['email'];
                                if($email == "exist"){
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email gia registrata</strong>
                        <button type="button" class="btn-close" onclick="this.parentElement.style.display='none';" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                        </div>             
                <?php } } ?>         
            <!--------------/BANNER IN CASO DI ERRORI NELLE CREDENZIALI------>         
        <!--FORM-->
            <form class="row g-6" action="./validations/signUp_validation.php" method="post">
                
                <div class="col-md-6 ">
                    <label for="nome" class="form-label text-white">Nome</label>
                    <input type="text" class="form-control text-white " id="nome" name="nome" required style="background: transparent;">
                </div>
                <div class="col-md-6 ">
                    <label for="cognome" class="form-label text-white">Cogome</label>
                    <input type="text" class="form-control text-white " id="cognome" name="cognome" required style="background: transparent;">
                </div>

                <div class="col-md-6 ">
                    <label for="data_nascita" class="form-label text-white">Data di nascita</label>
                    <input type="date" class="form-control text-white " id="data_nascita" name="data_nascita" required style="background: transparent;">
                </div>
                <div class="col-md-3 ">
                    <label for="luogo_nascita" class="form-label text-white">Luogo di nascita</label>
                    <input type="text" class="form-control text-white " id="luogo_nascita" name="luogo_nascita" required style="background: transparent;">
                </div>
                <div class="col-md-3 ">
                    <label for="cittadinanza" class="form-label text-white">Nazionalità</label>
                    <input type="text" class="form-control text-white " id="nazionalita" name="nazionalita" required style="background: transparent;">
                </div>
                <div class="col-md-12  ">
                    <label for="residenza" class="form-label text-white">   Residenza</label>
                    <input type="text" class="form-control text-white " id="residenza" name="residenza" required placeholder="via 'nome via',n.'numero civico' 'nome citta','nome stato'" style="background: transparent;">
                </div>
                <div class="col-md-12  ">
                    <label for="email" class="form-label text-white">   Email</label>
                    <input type="email" class="form-control text-white " id="email" name="email" required style="background: transparent;">
                </div>
                <div class="col-md-6 ">
                    <label for="password" class="form-label text-white">Password</label>
                    <input type="password" class="form-control text-white " id="password" name="password" required onkeyup='controlla_psw();' style="background: transparent;">
                </div>
                <div class="col-md-6">
                    <label for="conferma_password" class="form-label text-white">Conferma password </label>
                    <span id='messaggio'></span>
                    <input type="password" class="form-control text-white " id="conferma_password" name="conferma_password" required  onkeyup='controlla_psw();' style="background: transparent;">
                </div>

                <div class="d-grid gap-2 col-4 mx-auto p-3">
                <button type="submit" class="btn btn-outline-light ">Crea</button>
                <a href="./login.php" style="text-decoration: none;"><p class="gap-3 text-warning" ><em>Hai già un account?Accedi</em></p></a>
                <br>
                <br>
                </div>

            </form>
        <!--/FORM-->

        </div>
        <!--/CONATINER CON SHADOW-->




      
     </div>
   
     <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
 
            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/lomWs" role="button"
              ><i class="fa-brands fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 Copyright:
          <a class="text-white" href="https://www.guidodonegani.edu.it/">I.T.I G.Donegani</a>
        </div>
        <!-- Copyright -->
      </footer>    
</body>
</html>