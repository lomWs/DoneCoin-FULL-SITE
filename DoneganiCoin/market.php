<!DOCTYPE html>
<html lang="en">
<head>
       
    <!-- META TAG -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DoneganiCoin</title>

    <!-- STYLE -->
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
    <!-- FONT AWESOME( INCLUDE LE ICONE) -->
        <script src="https://kit.fontawesome.com/fc36cca802.js" crossorigin="anonymous"></script>
     
    <!-- CHART API -->
        <script src="https://widgets.coingecko.com/coingecko-coin-list-widget.js"></script>

</head>
<body>
    <!-- NAVBAR  -->
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
                        <a class="nav-link text-secondary" href="market.php"><i class="fa-solid fa-chart-line"></i> Market</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="doneHome.php"><i class="fa-solid fa-dong-sign"></i> DoneCoin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="login.php"><i class="fa-solid fa-user"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="signUp.php"><i class="fa-solid fa-user-plus"></i> SignUp</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <!-- BANNER IMAGE  -->
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="content text-center">
                <h1 class="text-dark display-1" style="font-family:sans-serif;
                -webkit-text-stroke: 2px rgb(255, 255, 255)"><strong>Price Viewer </strong> </h1>

                <h3 class="text-white" style=" font-family:sans-serif; ">Top 34 Cryptovalute</em></h3>
                <br>
                <h1 class="text-white" ><a href="#giu" style="color: white;"><i class="fa-solid fa-angle-down" style="text-decoration: none;"></i></a></h1>
            </div>
        </div>
        <br id="giu">
    
    <!-- CONTAINER   -->
        <div   class="container">
            <!-- CRYPTOCURRENCIES WIDGET   -->
                <div class="row">
                    <coingecko-coin-list-widget  coin-ids="bitcoin,eos,ethereum,litecoin,ripple,cardano,shiba-inu,stellar,bittorrent,kusama,dogecoin,croxswap,dai,fxt-token,folk,uniswap,monero,cosmos,flow,wechain-coin,ape,eos-pow-coin,maker,axie-infinity,iota,terra-luna-2,neo,nexo,paxos-standard,dash,gala,amp-token,kava,bem" currency="usd" locale="it" background-color=" rgba(0, 0, 0, 0.05)"></coingecko-coin-list-widget>   
                </div>  
                <br>

            <!-- CAROUSEL   -->     
                <div class="row">
                    <div class="col">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./img/carusel1.jpg" class="d-block w-100 " alt="..." style="max-height:400px ; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/carusel2.jpg" class="d-block w-100" alt="..." style="max-height:400px ; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/carusel8.jpg" class="d-block w-100" alt="..."style="max-height:400px ; object-fit: cover;" >
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/carusel3.jpg" class="d-block w-100" alt="..." style="max-height:400px ;object-fit: cover;">
                                </div>
                                <div class="carousel-item ">
                                    <img src="./img/carusel4.jpg" class="d-block w-100" alt="..."style="max-height:400px ;object-fit: cover;" >
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/carusel5.jpg" class="d-block w-100" alt="..." style="max-height:400px ;object-fit: cover;">
                                </div>
                                <div class="carousel-item"> 
                                    <img src="./img/carusel7.jpg" class="d-block w-100" alt="..."style="max-height:400px ;object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/carusel6.jpg" class="d-block w-100 " alt="..." style="max-height:400px ;object-fit: cover;">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
        </div>

    <!-- FOOTER  --> 
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

                </div>

            <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2022 Copyright:
                    <a class="text-white" href="https://www.guidodonegani.edu.it/">I.T.I G.Donegani</a>
                </div>
        </footer>
    <!-- JS SCRIPT -->
    
        <script src="https://widgets.coingecko.com/coingecko-coin-list-widget.js"></script>
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