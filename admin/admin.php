<?php
    require '../db_connect.php';

    if(!isset($_SESSION["admin_login"])){
        header("Location: admin_login.php");
        exit;
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

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <a class="nav-link" style="padding: 10px;" href="admin.php">Admin Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding: 10px;" href="../index.php">Customer Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" style="padding: 10px;" href="admin_logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Tabel Menu -->
        <div class="content">
            <h2 class="text-center">Menu Restoran</h2>
            <div style="margin: 0 auto; width: 90%;">
                <table class="table table-bordered text-center" id="admin_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Menu</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Admin Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0?>
                        <?php while($row = mysqli_fetch_assoc($menu)) : ?>
                            <tr>
                                <td><?php echo $row['id_menu']; ?></td>
                                <td><?php echo $row['nama_menu'] ?></td>
                                <td><img src="<?php echo '../images/'.$row['image'];?>" height="200px" width="auto"></td>
                                <td><?php echo $row['nama_kategori'] ?></td>
                                <td><?php echo "Rp. " . $row['harga_menu'] ?></td>
                                <td><?php echo $row['deskripsi'] ?></td>
                                <td>
                                    <a href="edit_menu.php?id=<?= $row["id_menu"]; ?>"><button class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button></a>
                                    <a href="delete_menu.php?id=<?= $row["id_menu"]; ?>"><button class="btn btn-danger"><i class="fa fa-trash-alt"></i>Delete</button></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <br>
                <a href="add_menu.php"><button type="button" class="btn btn-success float-right"><i class="fa fa-plus"></i>Add Menu</button></a>
            </div>
        </div>
        <!-- Tabel Menu End-->
        <script>
            $(document).ready(function() {
				$('#admin_table').DataTable();
			});
        </script>
    </body>
</html>