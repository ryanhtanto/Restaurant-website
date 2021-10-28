<?php 
    require 'function.php';
    session_start();

    $koneksi = mysqli_connect("localhost", "root", "", "restaurant");

    if(isset($_GET["action"])){

        if($_GET["action"] == "insert"){

            if(isset($_SESSION["shopping_cart"])){
                $id_menu = [];
                
                $NamaMenu = [];
                $Price = [];
                $Quantity = [];
                $Total = [];
                foreach($_SESSION["shopping_cart"] as $data){
                   
                    $id_menu[] = $data["item_menu_id"];
                    // var_dump($id_menu);
                    $NamaMenu[] = $data["item_name"];
                    // var_dump($NamaMenu);
                    $Price[] = $data["item_price"]; 
                    $Quantity[] = $data["item_quantity"];
                    $Total[] = $data["item_price"] * $data["item_quantity"];
                    
                }
        
                for($i = 0; $i < count($NamaMenu); $i++){

                    $nama = $NamaMenu[$i];

                    $harga = $Price[$i];

                    $kuantitas = $Quantity[$i];

                    $TotalBayar = $Total[$i];

                    $query = "INSERT INTO orders VALUES ('', '$nama', $harga, $kuantitas, $TotalBayar)";

                    mysqli_query($koneksi, $query);
                }
            }
        }
    }
    
    unset($_SESSION["shopping_cart"]);

    echo"<script>alert('Pesanan anda sudah di Check Out')</script>";
    echo"<script>location='Appetizer.php'</script>";
?>