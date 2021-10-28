<?php
    require '../db_connect.php';

    if(isset($_SESSION["login"])){
        error_reporting(0);
        $email_now = $_SESSION['email'];
    } else{
        header('location: ../login/login.php');
    }


    
    $user = mysqli_query($db, "SELECT * FROM customer WHERE email = '$email_now' ");
    
    $user_now = mysqli_fetch_assoc($user);
    
    $connect = mysqli_connect("localhost", "root", "", "restaurant");

    if(isset($_POST["add_to_cart"]))
    {
        if(!isset($_SESSION['login'])){
            header('location:../login/login.php');
            exit;
        }
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if(!in_array($_POST["hidden_id"], $item_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(

                    'item_menu_id'      =>  intval($_POST["hidden_id"]),
                    'item_name'			=>	$_POST["hidden_name"],
                    'item_price'		=>	intval($_POST["hidden_price"]),
                    'item_quantity'		=>	intval($_POST["quantity"])
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            }
            else
            {
                echo '<script>alert("Item Already Added")</script>';
            }
        }
        else
        {
            $item_array = array(

                'item_menu_id'      =>  intval($_POST["hidden_id"]),
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	intval($_POST["hidden_price"]),
                'item_quantity'		=>	intval($_POST["quantity"])
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }
    
    // remove add to cart
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                // var_dump($values["item_menu_id"]);
                if(intval($_GET["id"])===$values["item_menu_id"])
                {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                }
            }
        }
    }
    // var_dump($_GET["action"]);
    // if(isset($_GET))
?>

<!doctype html>
<html>

    <head>
        
        <title>Website : Restoran UTS IF430</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                background-color: #fefcd6;
                font-family: 'Ubuntu', sans-serif;
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
            .row{
                display: flex;
                justify-content: center;
                margin: 0 auto;
            }
            .content{
                margin-top: 100px;

            }
            .table{
                width: 80%;
                margin: 0 auto;
            }
            a:hover{
                color:#542919;
            }
            img{
                width:50px;
                height:50px;
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
    
        <!-- Tabel Pesanan -->
        <div class="container">
            <div class="content">
                <h1 class="text-center">Your Orders</h1>
                <table class="table text-center" id="example" style="margin-bottom: 2%;">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($_SESSION["shopping_cart"])){
                                $total = 0;
                                foreach($_SESSION["shopping_cart"] as $keys => $values){
                                    ?>
                                    <tr>
                                        <td><?php echo $values["item_name"]; ?></td>
                                        <td>Rp. <?php echo number_format($values["item_price"]); ?></td>
                                        <td><?php echo $values["item_quantity"]; ?></td>
                                        <td>Rp. <?php echo number_format($values["item_quantity"] * $values["item_price"]);?></td>
                                        <td><a href="order.php?action=delete&id=<?php echo $values["item_menu_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                    </tr>
                                    <?php
                                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                }
                                    ?>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a href ="../index.php" class="btn btn-primary btn-sm submit" style="background-color:#542919; color:white;">Back To Menu</a>
                <a href="InsertToDb.php?action=insert" class = "btn btn-success" name="tombol">Check Out</a>
                <div class="float-right"><h4>Total : Rp. <?= number_format($total) ?></h4></div>
            </div>
        </div>
        <!-- Tabel Pesanan End -->
         
        <script>
            AOS.init();
            $(document).ready(function() {
                var table = $('#example').DataTable();
            } );
        </script>
    </body>

</html>

