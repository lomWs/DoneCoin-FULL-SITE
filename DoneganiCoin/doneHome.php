<!DOCTYPE html>
<html lang="en">
<head>

  <!-- META TAG -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DoneganiCoin</title>


  <link rel="stylesheet" href="css/bootstrap.min.css" />
  
  <style>
            .banner-image {
                background-image: url('img/sfondoHome.jpg');
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
    <!-- Navbar  -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
            <div class="container">
              <a class="navbar-brand" href="#"><img src="./img/DoneganiCoin.png" width="100" height="100" class="d-inline-block align-text-top" ></a>
                <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item ">
                    <a class="nav-link text-white" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="market.php"><i class="fa-solid fa-chart-line"></i> Market</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-secondary" href="doneHome.php"><i class="fa-solid fa-dong-sign"></i> DoneCoin</a>
                    </li>

                </ul>
                </div>
            </div>
        </nav>

    <!-- Banner Image  -->
        <div
        class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center"
        >
        <div class="container">
        <div class="row">
            <div class="col">
            <div class="content text-center">
                
                <h1 class="text-dark display-1" style="font-family:sans-serif;
                -webkit-text-stroke: 2px rgb(255, 255, 255)"><strong>DoneCoin BlockChain </strong> </h1>
                
                <h4 class="text-white" style=" font-family:sans-serif; "><em>La nuova criptovaluta basata su una tecnologia decentralizzata,la  blockchain.</em></h4>
                <h4 class="text-white" style=" font-family:sans-serif; "><em>    Investi nel tuo futuro entra ora nel nostro mondo</em></h4>
                

            </div>
            </div>
            <div class="col mx-auto">
            <div class="d-grid gap-3 col-6 mx-auto">
                <img src="./img/scuolaICON.png" alt="" width="320" height="140" class="img-fluid " style="border-radius: 25%; max-height: 90% ;">
                <button onclick="window.location.href='./login.php'" type="button" class="btn btn-outline-light btn-lg">Accedi</button>
                <button onclick="window.location.href='./signUp.php'" type="button" class="btn btn-outline-light btn-lg">Entra Ora</button>
                </div>
            </div>
        </div>
        </div>





      
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

   
        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
          var nav = document.querySelector('nav');
    
          window.addEventListener('scroll', function () {
            if (window.pageYOffset > 150 || window.innerWidth <=990 ) {
              nav.classList.add('bg-dark', 'shadow');
            }else if(window.pageYOffset < 150 && window.innerWidth > 990) {
              nav.classList.remove('bg-dark', 'shadow');
            }

          
          });


        </script>
</body>
</html>