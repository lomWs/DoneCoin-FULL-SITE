<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    
    <script src="https://kit.fontawesome.com/fc36cca802.js" crossorigin="anonymous"></script>
  


</head>
<body>
    

        <!-- Banner Image  -->
        <div
        class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center"
        >


 

        <!--CONATINER CON SHADOW-->
        <div class="shadow mx-auto  rounded">



        <a href="./index.php"><img src="./img/DoneganiCoin.png" alt="" srcset="" class="img-fluid mx-auto d-block" width="250px" height="200px"></a>
            <!--------------BANNER IN CASO DI ERRORI NELLE CREDENZIALI-------> 
                <?php  
                    if(isset($_GET['credential'])){
                        $credential= $_GET['credential'];
                            if($credential == "error"){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Credenziali errate o non registrate</strong>
                    <button type="button" class="btn-close" onclick="this.parentElement.style.display='none';" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                    </div>             
                <?php } } ?>         
            <!--------------/BANNER IN CASO DI ERRORI NELLE CREDENZIALI------> 
                
        <!--FORM-->
            <form action="./validations/login_validation.php" method="post">
                <div class="mb-3 ">
                    <label for="email" class="form-label text-white">Email</label>
                    <input type="email" class="form-control text-white " id="email" name="email" required style="background: transparent;">

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Password</label>
                    <input type="password" class="form-control text-white " id="password" name="password" required style="background: transparent;">
                </div><br>
                <div class="d-grid   mx-auto ">
                <button type="submit" class="btn btn-outline-light btn-lg">Accedi</button>
            
                </div>
                
                <a href="./signUp.php" style="text-decoration: none;"><p class="gap-3 text-warning" ><em>Non hai un account?</em></p></a>
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