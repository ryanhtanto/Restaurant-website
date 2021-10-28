<?php
require 'function.php';
require '../db_connect.php';

if(isset($_SESSION["login"])){
    error_reporting(0);
    $email_now = $_SESSION['email'];
}

$user = mysqli_query($db, "SELECT * FROM customer WHERE email = '$email_now' ");

$user_now = mysqli_fetch_assoc($user);

//ambil data dari tabel appetizer
$result = mysqli_query($koneksi, "SELECT * FROM menu JOIN kategori USING(id_kategori) WHERE nama_kategori ='appetizer'");

if(isset($_POST['detailMenu'])){
    $id = $_POST['id_menu'];
    $query = "SELECT * FROM menu WHERE id_menu = $id";
    $resultModal = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($resultModal);
    // var_dump($data);
    
    $_SESSION['modalInfo'] = $data;
    
}
if(isset($_POST['unset'])){
    unset($_SESSION['modalInfo']);
}
?>

<!Doctype html>
<html>
    <head>
        <title>Website : Restoran UTS IF430</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                font-family: 'Ubuntu', sans-serif;
                background-color:#fdfbd5;
            }
            .nav-color{
                background-color: #de7a1c;
                color: red;
            }
            a{
                color: white;
            }
            .navbar{
                height: 80px;
                box-shadow: 3px 3px 7px 2px rgba(0, 0, 0, 0.2);
            }
            .content_category{
                height: 115vh;
                background-color: #fefcd6;
            }
            .content_info{
                height: 150vh;
                background-color: #efe2bf;
            }
            .category{
                height: 589px;
                width: 190px;
                margin-top: 10vh;
                margin-left: 2vh;
                margin-right: 2vh;
                background: no-repeat;
                transition: transform .2s;
            }
            .category:hover{
                transform: scale(1.2);
            }
            .container{
                width: 100%;
            }
            .row{
                display: flex;
                justify-content: center;
                margin: 0 auto;
            }
            .image{
                width:100%;
                height:250px;
            }
            input{
                width:45px;
            }
            .modalInfo{
                border-radius: 50px;
            }
            .label-container{
                position:fixed;
                bottom:48px;
                right:105px;
                display:table;
                visibility: hidden;
            }
            .label-text{
                color:#FFF;
                background:rgba(51,51,51,0.5);
                display:table-cell;
                vertical-align:middle;
                padding:10px;
                border-radius:3px;
            }

            .label-arrow{
                display:table-cell;
                vertical-align:middle;
                color:#333;
                opacity:0.5;
            }

            .float{
                position:fixed;
                width:60px;
                height:60px;
                bottom:40px;
                right:40px;
                background-color:#de7a1c;
                color:#FFF;
                border-radius:50px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;
            }

            .my-float{
                font-size:24px;
                margin-top:18px;
            }

            a.float + div.label-container {
                visibility: hidden;
                opacity: 0;
                transition: visibility 0s, opacity 0.5s ease;
            }

            a.float:hover + div.label-container{
                visibility: visible;
                opacity: 1;
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg nav-color navbar-dark fixed-top">
            <a class="navbar-brand" href="#">
                <img src="../images/pemweb_logo.png" width="70" height="70" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse navbar-dark" style="width: 40%; background-color: #de7a1c; border-radius: 10px;" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" style="padding: 10px;" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="padding: 10px;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="Appetizer.php">Appetizer</a>
                        <a class="dropdown-item" href="MainCourse.php">Main Course</a>
                        <a class="dropdown-item" href="Sushi.php">Sushi</a>
                        <a class="dropdown-item" href="Dessert.php">Dessert</a>
                        <a class="dropdown-item" href="Drinks.php">Drinks</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding: 10px;" href="../about_us/about_us.php">About Us</a>
                    </li>
                </ul>
                <?php if(!isset($_SESSION['login'])) : ?>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" style="padding: 10px;" href="../login/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding: 10px;" href="../regis/registrasi.php">Sign Up</a>
                    </li>
                </ul>
                <?php else : ?>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="user-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 10px;">
                            Welcome, <?php echo $user_now['first_name'] . ' ' . $user_now['last_name']; ?>!
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-info">
                            <a class="nav-link dropdown-item" style="color: black;" href="../login/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </nav>
        <!-- Navbar End -->
        
        <!-- menu -->
        <section class = "Content" style="margin-top: 100px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                    <h2>Appetizer List</h2>
                    <hr>
                    </div>
                </div>
                <div class="row">
                    <?php while($info = mysqli_fetch_assoc($result) ) : ?>
                            <div class="card" style="width: 18rem; margin-right:20px; margin-bottom:20px;background-color:white;border-radius: 15px;box-shadow: 0px 15px 20px rgba(0,0,0,0.1);">
                                <form method="post" action="order.php">
                                    <a ><img class="card-img-top image view_info" src="../images/<?php echo $info["image"]; ?>" alt="Card image cap"></a>
                                    <div class="card-body text-center">
                                        <h4 class="card-title" name="menu_nama"><?php echo $info["nama_menu"]; ?></h4>
                                        <!-- <button class = "btn btn-info view_btn">Details</button> -->
                                        
                                        <p class="card-text">Rp.<?=  number_format($info["harga_menu"]); ?></p>
                                        
                                        <!-- hidden item to push add to card -->
                                        <input type="hidden" name="hidden_id" value="<?php echo $info["id_menu"]; ?>" />
                                        <input type="hidden" name="hidden_name" value="<?php echo $info["nama_menu"]; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $info["harga_menu"]; ?>" />
                                        <!-- hidden item end -->
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="submit" name="add_to_cart" class="btn btn-primary" style="background-color:#fea726;width:150px; color:white;border:none;" value="Add To cart"></input>
                                            </div>
                                            <div class="col-4">
                                                <input type="number" name="quantity"  min="1" class="form-control" style="width:70px; boder:#d4d6d9;" required/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <form action="" method="post">
                                        <input type="hidden" name="id_menu" value="<?= $info['id_menu'];?>">
                                        <input type="submit" class="btn btn-warning" value="Info" name="detailMenu" href="modal.php?id=<?= $info["id_menu"]; ?>" style="width:70px; margin-bottom: 15px;">
                                    </form>
                                </div>
                            </div>
                    <?php endwhile;?>
                </div>
            </div>   
        </section>
        <!-- menu end -->
        

        <!-- Modal -->
        <?php if(isset($_SESSION['modalInfo'])) : ?>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog" >
                    <!-- Modal content-->
                    <div class="modal-content modalInfo">
                        <div class="modal-header" style="background-color: #de7a1c; border-radius: 30px 30px 0 0; width: 100%">
                            <h4 class="modal-title" style="padding: 10px;"><?= $_SESSION['modalInfo']['nama_menu']?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="container text-center" style="padding-bottom: 20px;">
                                <div class="row">
                                    <div class="col">
                                        <img src="../images/<?= $_SESSION['modalInfo']['image']?>" style="width: 250px;height:250px;"></img>
                                    </div>
                                    <div class="col">
                                        <h3><?= $_SESSION['modalInfo']['nama_menu']?></h3>
                                        <p><?= $_SESSION['modalInfo']['deskripsi']?></p>
                                        <p>Rp. <?= number_format($_SESSION['modalInfo']['harga_menu']);?></p>
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <form action="" method="post">
                                <div class="row">
                                    <input type="submit" class="btn btn-danger" value="Close" name="unset" style="width:100px;" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <!-- end modal -->
        <!-- Floating Button Pesanan -->
        <?php if(!isset($_SESSION['login'])) : ?>
            <a href="../login/login.php" class="float">
                <i class="fa fa-clipboard my-float"></i>
            </a>
            <div class="label-container">
                <div class="label-text">Login to order!</div>
                <i class="fa fa-play label-arrow"></i>
            </div>
        <?php else : ?>
            <a href="order.php" class="float">
                <i class="fa fa-clipboard my-float"></i>
            </a>
            <div class="label-container">
                <div class="label-text">Check your orders here!</div>
                <i class="fa fa-play label-arrow"></i>
            </div>
        <?php endif; ?>
        <!-- Floating Button Pesanan End-->
        <script>
            $(document).ready(function() {
                $('#myModal').modal({
                    keyboard: false,
                    show: true,
                    backdrop: 'static'
                });
            });
        </script>
    </body>
</html>