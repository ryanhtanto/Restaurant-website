<?php
     $koneksi = mysqli_connect("localhost", "root", "", "restaurant");

     function query($query){
         global $koneksi;
         $result = mysqli_query($koneksi, $query);
         $rows = [];
         while($row = mysqli_fetch_assoc($result)){
             $rows[] = $row;
         }
         return $rows;
     }
     

         function registrasi($dataRegis){
            global $koneksi;
    
            $firstname= $dataRegis["first_name"];
            $lastname= $dataRegis["last_name"];
            $password= mysqli_real_escape_string($koneksi, $dataRegis["password"]);
            $email =  $dataRegis["email"];
            $phoneNum =  $dataRegis["phone_number"];
            $day =  $dataRegis["birthday"];
            $month =  $dataRegis["birthday_month"];
            $year =  $dataRegis["birthday_year"];
            
            //pengecekan username
            $check = mysqli_query($koneksi, "SELECT email FROM customer WHERE email = '$email'");
            if(mysqli_fetch_assoc($check)){
                return false;
            }
             
            
            //enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);
    
            //tambah user kedalam database
            mysqli_query($koneksi, "INSERT INTO customer VALUES('', '$firstname','$lastname','$email','$password','$phoneNum','$day','$month','$year')");
            return mysqli_affected_rows($koneksi);
            
        }
?>