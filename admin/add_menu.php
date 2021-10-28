<?php 
    require 'admin_function.php';

    if(isset($_POST['submit_add'])){
        if( add_menu($_POST) > 0){ 
            echo "<script>alert('Menu berhasil ditambah!')</script>";
            header('location: admin.php');
        }
    }
?>

<!Doctype html>
<html>
    <head>
        <title>Website : Restoran UTS IF430</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <!-- aos -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="../style/style.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">    

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

    </head>
    <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg nav-color fixed-top">
            <a class="navbar-brand" href="#">
                <img src="../images/pemweb_logo.png" width="70" height="70" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Admin Page</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout <i class="fa fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navbar End -->
        <div style="width: 80%; margin: 0 auto; margin-top: 100px;">
            <h2 class="text-center">Add Menu</h2>
            <form id="add_menu" action="" method="post" enctype="multipart/form-data">
                <label for="nama_menu">Nama Menu</label>
                <input type="text" class="form-control" name="nama_menu" placeholder="Masukkan nama menu..." required>
                <br>
                <label for="gambar">Gambar(jpg/jpeg/png max 3MB)</label><br>
                <input type="file" name="gambar"><br>
                <br>
                <label for="kategori">Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="appetizer">Appetizer</option>
                    <option value="main course">Main Course</option>
                    <option value="sushi">Sushi</option>
                    <option value="dessert">Dessert</option>
                    <option value="drinks">Drinks</option>
                </select>
                <br>
                <label for="harga">Harga</label>
                <input type="text" class="form-control" name="harga" placeholder="Masukkan harga..." required>
                <br>
                <label for="deskripsi"></label>
                <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan deskripsi..." required>
                <br>
                <a href="admin.php"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i>Cancel</button></a>
                <button type="submit" name="submit_add" class="btn btn-success float-right"><i class="fa fa-plus"></i>Add Menu</button>
            </form>
        </div> 
    </body>
</html>

                        