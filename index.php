<?php
    require 'db_connect.php';

    if(isset($_SESSION["login"])){
        error_reporting(0);
        $email_now = $_SESSION['email'];
    }

    $user = mysqli_query($db, "SELECT * FROM customer WHERE email = '$email_now' ");

    $user_now = mysqli_fetch_assoc($user);
?>

<!Doctype html>
<html>
    <head>
        <title>Website : Restoran UTS IF430</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">    

        <link rel="stylesheet" href="style/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg nav-color navbar-dark fixed-top">
            <a class="navbar-brand" href="#">
                <img src="images/pemweb_logo.png" width="70" height="70" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse navbar-dark" style="width: 40%; background-color: #de7a1c; border-radius: 10px;" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" style="padding: 10px;" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="padding: 10px;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="Menu/Appetizer.php">Appetizer</a>
                        <a class="dropdown-item" href="Menu/MainCourse.php">Main Course</a>
                        <a class="dropdown-item" href="Menu/Sushi.php">Sushi</a>
                        <a class="dropdown-item" href="Menu/Dessert.php">Dessert</a>
                        <a class="dropdown-item" href="Menu/Appetizer.php">Drinks</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding: 10px;" href="about_us/about_us.php">About Us</a>
                    </li>
                </ul>
                <?php if(!isset($_SESSION['login'])) : ?>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" style="padding: 10px;" href="login/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding: 10px;" href="regis/registrasi.php">Sign Up</a>
                    </li>
                </ul>
                <?php else : ?>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="user-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 10px;">
                            Welcome, <?php echo $user_now['first_name'] . ' ' . $user_now['last_name']; ?>!
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-info">
                            <a class="nav-link dropdown-item" style="color: black;" href="login/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Carousel -->
        <div class="carousel-size">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active " style="background-image: url('images/katsu_curry.jpg')">
                        <!-- <img src="Yakiniku-1.jpg" class="img-fluid img-carousel"> -->
                    </div>
                    <div class="carousel-item" style="background-image: url('images/sushi_carousel.jpg')">
                        <!-- <img src="Yakiniku-2.jpg" class="img-fluid img-carousel"> -->
                    </div>
                    <div class="carousel-item" style="background-image: url('images/takoyaki_carousel.jpg')">
                        <!-- <img src="Yakiniku-3.jpg" class="img-fluid img-carousel"> -->
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Category -->
        <div class="container-fluid content_category">
            <div style="padding-top: 5%">
                <h1 class="text-center">Menu's Category</h1>
            </div>
            <div class="row col-xl-10">
                <div class="col-5 col-sm-3 col-lg-2 category" style="background-image: url('images/appetizer.png'); cursor: pointer;" onclick="location.href='Menu/Appetizer.php'"></div>
                <div class="col-5 col-sm-3 col-lg-2 category" style="background-image: url('images/main_course.png'); cursor: pointer;" onclick="location.href='Menu/MainCourse.php'"></div>
                <div class="col-5 col-sm-3 col-lg-2 category" style="background-image: url('images/sushi.png'); cursor: pointer;"onclick="location.href='Menu/Sushi.php'"></div>
                <div class="col-5 col-sm-3 col-lg-2 category" style="background-image: url('images/dessert.png'); cursor: pointer;" onclick="location.href='Menu/Dessert.php'"></div>
                <div class="col-5 col-sm-3 col-lg-2 category" style="background-image: url('images/drinks.png'); cursor: pointer;" onclick="location.href='Menu/Drinks.php'"></div>
            </div>
        </div>
        <!-- Category End -->

        <!-- Restaurant Info -->
        <div class="content_info" style="overflow-x: hidden;">
            <div class="row">
                <div class="doge-margin col-10 col-md-6 col-lg-7 d-flex align-items-center justify-content-center">
                    <div class="text-center" data-aos="zoom-in" data-aos-duration="2000">
                        <h1>Meet our mascot, the cute Japanese "Shiba Inu" dog, Chef DOGE!!!</h1>
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-5 d-flex align-items-center justify-content-center">
                    <img class="doge-chef" width="auto" height="auto" src="images/doge_chef.png" data-aos="fade-left" data-aos-duration="1500" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-md-6 col-lg-5 d-flex align-items-center justify-content-center" data-aos="flip-left" data-aos-duration="1000">
                    <img src="images/dogecoin.svg" width="300px" height="300px" alt="">
                </div>
                <div class="doge-margin col-10 col-md-6 col-lg-7 d-flex align-items-center justify-content-center">
                    <div class="text-center" data-aos="zoom-in" data-aos-duration="2000">
                        <h1>Pay with DOGECOIN and get 15% discount for any purchase!!!</h1>
                    </div>    
                </div>
            </div>
        </div>
        <!-- Restaurant Info End -->

        <!-- Floating Button Pesanan -->
        <?php if(!isset($_SESSION['login'])) : ?>
            <a href="login/login.php" class="float">
                <i class="fa fa-clipboard my-float"></i>
            </a>
            <div class="label-container">
                <div class="label-text">Login to order!</div>
                <i class="fa fa-play label-arrow"></i>
            </div>
        <?php else : ?>
            <a href="Menu/order.php" class="float">
                <i class="fa fa-clipboard my-float"></i>
            </a>
            <div class="label-container">
                <div class="label-text">Check your orders here!</div>
                <i class="fa fa-play label-arrow"></i>
            </div>
        <?php endif; ?>
        <!-- Floating Button Pesanan End-->
        <script>
            AOS.init();
        </script>
    </body>
</html>