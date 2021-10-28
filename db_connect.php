<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "restaurant");

    $menu = mysqli_query($db, "SELECT * FROM menu JOIN kategori USING(id_kategori)");
    
?>