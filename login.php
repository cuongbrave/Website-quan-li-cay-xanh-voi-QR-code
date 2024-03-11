<?php
    session_start();
    require_once("connect.php");

    if(isset($_POST['submit']) && $_POST['submit'] ){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $kq = checkUser($username,$password);
        $_SESSION['kq'] = $kq; //SESSION
        if($kq == true){
            header('Location: admin.php');
        }else{
           $echo = "Username hoặc Password không tồn tại! Vui lòng nhập lại.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
<div id="login">
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <!-- form -->
                        <form id="login-form" class="form" action="login.php" method="post">
                            <h3 class="text-center text-info">Đăng nhập</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Tên đăng nhập</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mật khẩu</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Đăng nhập"> 
                                
                                <br>
                                <?php 
                                    if(isset($echo) && $echo != "")
                                        echo "<font color='black'>".$echo."</font>";
                                ?>
                                
                            </div>
                        </form><br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>