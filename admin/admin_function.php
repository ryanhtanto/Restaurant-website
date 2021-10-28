<?php 
    require '../db_connect.php';

    function query($query){
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function add_menu($data){
        global $db;
        $nama = $data['nama_menu'];
        $kategori = strtolower($data['kategori']) ;
        $harga = $data['harga'];
        $deskripsi = $data['deskripsi'];
        $id_kategori;

        //cek kategori
        if($kategori === 'appetizer'){
            $id_kategori = 1;
        } else if($kategori === 'main course'){
            $id_kategori = 2;
        } else if($kategori === 'sushi'){
            $id_kategori = 3;
        } else if($kategori === 'dessert'){
            $id_kategori = 4;
        } else if ($kategori === 'drinks'){
            $id_kategori = 5;
        } else{

        }

        //proses gambar
        $nama_gambar = $_FILES['gambar']['name'];
        $ukuran_gambar = $_FILES['gambar']['size'];
        $error_gambar = $_FILES['gambar']['error'];
        $tmp_gambar = $_FILES['gambar']['tmp_name'];

        //cek error gambar
        if($error_gambar == 4){
            echo "<script>alert('Silahkan mengupload gambar menu!')</script>";
            return false;
        }

        //cek extension
        $extension_allowed = ['jpg', 'jpeg', 'png'];
        $extension_gambar = explode('.', $nama_gambar);
        $extension_gambar = strtolower(end($extension_gambar));

        if(!in_array($extension_gambar, $extension_allowed)){
            echo "<script>alert('Silahkan mengupload gambar dengan extension sesuai ketentuan!')</script>;";
            return false;
        }
        
        //cek size gambar (max 2MB)
        if($ukuran_gambar > 3000000){
            echo "<script>alert('Silahkan mengupload gambar dengan size sesuai ketentuan!')</script>;";
            return false;
        }

        move_uploaded_file($tmp_gambar, '../images/' . $nama_gambar);

        $gambar = $nama_gambar;

        $query_add = "INSERT INTO menu VALUES('', '$id_kategori', '$nama', '$harga', '$deskripsi', '$gambar')";
        mysqli_query($db, $query_add);

        return mysqli_affected_rows($db);
    }

    function hapus($id){
        global $db;
        mysqli_query($db, "DELETE FROM menu WHERE id_menu = $id");

        return mysqli_affected_rows($db);
    }

    function edit_menu($data){
        
        global $db;
        $id = $data['id_menu'];
        $nama = $data['nama_menu'];
        $kategori = strtolower($data['kategori']) ;
        $harga = $data['harga'];
        $deskripsi = $data['deskripsi'];
        $id_kategori;

        //cek kategori
        if($kategori === 'appetizer'){
            $id_kategori = 1;
        } else if($kategori === 'main course'){
            $id_kategori = 2;
        } else if($kategori === 'sushi'){
            $id_kategori = 3;
        } else if($kategori === 'dessert'){
            $id_kategori = 4;
        } else if ($kategori === 'drinks'){
            $id_kategori = 5;
        } else{

        }

        //proses gambar
        $nama_gambar = $_FILES['gambar']['name'];
        $ukuran_gambar = $_FILES['gambar']['size'];
        $error_gambar = $_FILES['gambar']['error'];
        $tmp_gambar = $_FILES['gambar']['tmp_name'];

        if($error_gambar != 4){
            //cek extension
            $extension_allowed = ['jpg', 'jpeg', 'png'];
            $extension_gambar = explode('.', $nama_gambar);
            $extension_gambar = strtolower(end($extension_gambar));

            if(!in_array($extension_gambar, $extension_allowed)){
                echo "<script>alert('Silahkan mengupload gambar dengan extension sesuai ketentuan!')</script>;";
                return false;
            }
            
            //cek size gambar (max 2MB)
            if($ukuran_gambar > 3000000){
                echo "<script>alert('Silahkan mengupload gambar dengan size sesuai ketentuan!')</script>;";
                return false;
            }
        }

        //cek error gambar
        // if($error_gambar == 4){
        //     echo "<script>alert('Silahkan mengupload gambar menu!')</script>";
        //     return false;
        // }

        // //cek extension
        // $extension_allowed = ['jpg', 'jpeg', 'png'];
        // $extension_gambar = explode('.', $nama_gambar);
        // $extension_gambar = strtolower(end($extension_gambar));

        // if(!in_array($extension_gambar, $extension_allowed)){
        //     echo "<script>alert('Silahkan mengupload gambar dengan extension sesuai ketentuan!')</script>;";
        //     return false;
        // }
        
        // //cek size gambar (max 2MB)
        // if($ukuran_gambar > 3000000){
        //     echo "<script>alert('Silahkan mengupload gambar dengan size sesuai ketentuan!')</script>;";
        //     return false;
        // }

        move_uploaded_file($tmp_gambar, '../images/' . $nama_gambar);

        $gambar = $nama_gambar;

        if($error_gambar == 4){
            $query_add = "UPDATE menu SET 
                        nama_menu = '$nama',
                        id_kategori = $id_kategori,
                        harga_menu = $harga,
                        deskripsi = '$deskripsi'
                      WHERE id_menu = $id
                    ";
        } else{
            $query_add = "UPDATE menu SET 
                        nama_menu = '$nama',
                        image = '$gambar',
                        id_kategori = $id_kategori,
                        harga_menu = $harga,
                        deskripsi = '$deskripsi'
                      WHERE id_menu = $id
                    ";
        }

        
        mysqli_query($db, $query_add);

        return mysqli_affected_rows($db);
    }
?>