<?php 
    require 'function.php';  
?>

<!doctype html>
</html>
<head>
    <title>Halaman Registrasi</title>

    <!-- Bootstrap -->
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@1,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            var span = document.getElementsByClassName("close")[0];
           
            span.onclick = function() {
                modal.style.display = "none";
            }
        
        </script>
    <style>
        body{
            font-family: 'Ubuntu', sans-serif;
            margin: 0;
            padding : 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .SignPage .image{
            width: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .SignPage .Content{
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .modal .form-label{
            color: white;
        }
        .Footer{
            position: absolute;
            height: 50px;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #17202A;
        }
        .modal-content{
           background-color:#de7a1c;
        }
        @media screen and (max-width: 992px){
            .modal-size{
                margin-left: 10%;
                margin-top: 10%;
                min-width: 80%;
            }
        }
        @media screen and (max-width: 720px){
            .modal-size{
                margin-left: 10%;
                margin-top: 20%;
                min-width: 80%;
            }
        }
        
        .btn {
            background-color: #542919;
            border: none;
            color: white;
            font-weight:bold;
            text-align: center;
            font-size: 16px;
            transition: 0.4s;
        }
        .btn:hover {
            background-color: #fea726;
            color: white;
        }
        .close {
            color: #542919;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .image{
            height: 95vh;
                min-height: 350px;
                background: no-repeat center center scroll;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
        }
        h1{
            
            color: #542919;
        }
        h3{
            
            color: #542919;
        }
        .SignUp{
            margin-top:15vh;
        }
        img{
            height:20vh;
            width:20vh;
        }
    </style>
</head>
<body style="background-color:#fdfbd5;">
    <div class="container-fluid">
        <div class = "row">
            <div class="col-sm-12 col-lg-6 image" style=" background-image: url('../images/sign in.png');"></div>
            <div class="col-sm-12 col-lg-6 SignUp text-center">
                <img src="../images/pemweb_logo.png">
                <h1>Welcome to Shiba Inu!!</h1>
                <h3>Sign Up, and get special offer just for you</h3>
                <br>
                <div class="controls">
                    <button type="button" class="btn btn-secondary btn-lg btn-block btn-dark" data-toggle="modal" data-target="#myModal" >Sign Up</button>
                    <br>
                    <a href="../index.php"><button type="button" class="btn btn-secondary btn-lg btn-block btn-dark" data-toggle="modal" data-target="#ModalMy" >Home Page</button></a>
                </div>
            </div>
        </div>
    </div>
    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-size">
        <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: white;">Sign Up</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="post" action="">
                         <div class="col-md-6">
                            <label for="inputFistName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputFistName" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputLastName" name="last_name">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" name="password" required>
                        </div>
                        <div class="col-md-12">
                            <label for="inputPhone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="inputPhone" name="phone_number" required> 
                        </div>
                        <div class="col-md-12">
                            <p style="color: white;"><b>Date of birth</b></p>
                        </div>
                        <div class="col-md-5">
                            <label for="inputDay" class="form-label">Day</label>
                            <input type="number" class="form-control" id="inputDay" name="birthday" required>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"  class="form-label">Month</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="birthday_month">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="inputYear" class="form-label">Year</label>
                            <input type="text" class="form-control" id="inputYear" name="birthday_year" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="register">Submit</button>
                        </div> 
                    </form>   
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->
    <!-- Modal email belum ada (masuk) -->
    <div class="modal fade modalAlert" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Congratss!!!</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Your Account Have Been Activated!
                </div>
                <div class="modal-footer">
                    <a href="../index.php"><button type="button" class="btn btn-primary">Go To Home Page</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal email udah ada (gagal)-->
    <div class="modal fade modalAlert" id="modalFalse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Oh No!!!</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Your Email Has Been Registered!
                </div>
            </div> 
        </div>
    </div>
    <?php if(isset($_POST["register"])): ?>
        <?php if(registrasi($_POST)> 0): ?>
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#exampleModal').modal('show');
                });
            </script>
            <?php else : ?>
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#modalFalse').modal('show');
                });
            </script>
        <?php endif;?>
    <?php endif;?>
</body>
</html>