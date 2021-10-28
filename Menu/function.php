<?php
    //koneksi database
    $koneksi = mysqli_connect("localhost","root","","restaurant");
    
    
    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $koneksi;
        $id = htmlspecialchars($data["id"]);
        $name = htmlspecialchars($data["name"]);
        $nim = htmlspecialchars($data["nim"]);
        $angkatan = htmlspecialchars($data["angkatan"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $query = "INSERT INTO student VALUES ('$name','$angkatan','$jurusan','$nim','$id')";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

?>