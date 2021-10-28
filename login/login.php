<?php
session_start();
require 'login_function.php';

if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT email FROM user WHERE id =$id");
    $row = mysqli_fetch_assoc($result);

    if( $key === hash('sha256',$row['email']) ){
        $_SESSION['login'] = true;
    }
}


if(isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}

if (isset($_POST["login"]) ) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $email = strip_tags(mysqli_real_escape_string($koneksi, trim($email)));
        $password =  strip_tags(mysqli_real_escape_string($koneksi, trim($password)));

        $captcha = $_POST['g-recaptcha-response'];

        $str = "https://www.google.com/recaptcha/api/siteverify?secret=6LcVT1gaAAAAAD2FLnPTA3tA4r37EFH3OKS8AOrD" . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR'];

        $response = file_get_contents($str);
        $response_arr = (array) json_decode($response);

        $query = "SELECT *FROM customer WHERE email= '" .$email. "'";
        $tbl = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($tbl)>0){
          $row = mysqli_fetch_array($tbl);
          $password_hash = $row['password'];
          if(password_verify($password,$password_hash)){
            $msg = '';
          }
          else{
            $msg = ' Incorrect Password - Login failed';
          }
        } 
        else {
          $msg = 'Email is not valid';
        }

        $result = mysqli_query($koneksi, "SELECT *FROM customer WHERE email = '$email'" );
        

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"]) ){
                if($response_arr["success"]==false){
                    $captcha_msg ="Please check the captcha form!";
                } else{
                    $_SESSION["login"] = true;
                
                    if( isset($_POST['remember-me'])){
                        setcookie('id', $row['id'], time() + 600);
                        setcookie('key', hash('sha256',$row['email']), time() +600);
                    }
                    
                    $_SESSION['email'] = $email;

                    header("Location: ../index.php");
                    exit; 
                }
                
            }
        }
        $error = true;
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">    

        <script src="https://www.google.com/recaptcha/api.js"></script> 

        <link rel="stylesheet" href="../style/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .wrapper{
            width: 400px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
            margin: 0 auto;
            margin-top: 50px;
        }
        .title{
            font-size: 55px;
            font-weight: 600;
            
            line-height: 100px;
            color: #fff;
            user-select: none;
            border-radius: 15px 15px 0 0;
            background: linear-gradient(-135deg, #de7a1c, #fdfbd5);
        }
        form{
            width: 80%;
            margin: 0 auto;
        }
        input[type=email]{
            margin-top : 50px;
            height: 50px;
        }
        input[type=password]{
            margin-top : 20px;
            height: 50px;
        }
        .field{
            height: 100%;
            width: 100%;
            outline: none;
            font-size: 17px;
            padding-left: 20px;
            border: 1px solid lightgrey;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        form .signup-link{
            color: #262626;
            margin-top: 20px;
            text-align: center;
        }
        form .pass-link a,
        form .signup-link a{
            color: #4158d0;
            text-decoration: none;
        }
        form .pass-link a:hover,
        form .signup-link a:hover{
            text-decoration: underline;
        }
        .btn-login{
            font-size: 17px;
            height: 50px;
            width: 80%;
            border: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            background: linear-gradient(-135deg, #de7a1c, #fdfbd5);
            color: #fff;
            margin-left: 10%;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        @media screen and (max-width: 400px){
            body{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
        }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="title text-center">Login</div>

            <form action="login.php" method="post">
                <input class="form-control field" type="email" name="email" id="email" placeholder="Email" required>
                <input class="form-control field" type="password" name="password" id="password" placeholder="Password"  required>
                
                <input type="checkbox" id="remember-me">
                <label for="remember-me">Remember me</label>
                
                <?php if (isset($_POST["login"]) ) : ?>
                    <br><span style="color: red;"><?php echo $msg ?></span>
                <?php endif; ?>

                <div class="signup-link">Not a member? <a href="../regis/registrasi.php">Sign up now!</a></div>

                
                <div id="recaptcha" class="g-recaptcha" data-sitekey="6LcVT1gaAAAAAFCX2wOzNzrnq7M54oBZ1PvdGwyH"></div>
                
                <span style="color: red; marin: 0 auto;"><?php if(isset($captcha_msg)){echo $captcha_msg;} ?></span>
                <button id="btn-login" class="btn-login" type="submit" name="login">Login</button>
                
            </form>
        </div>
        <script>
            
        </script>
    </body>
</html>