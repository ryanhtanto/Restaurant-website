<?php
    require '../db_connect.php';
    require 'admin_function.php';
    require 'admin.php';

    $id = $_GET['id'];

    if( hapus($id) > 0){
        echo 
        "<script>
            alert('Berhasil dihapus');
            document.location.href ='admin.php';
        </script> ";
    }
   
?>