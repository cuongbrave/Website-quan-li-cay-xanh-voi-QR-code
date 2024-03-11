<?php 
  session_start();
  //var_dump($_SESSION);
  if (!isset($_SESSION["kq"]) && $_SESSION["kq" ] == false) {
    header("Location: login.php");
    die();
  }

?>  


<?php 
require_once('connect.php');
//kiem tra ton tai nut send
$kq='';
if(isset($_POST['submit']) && $_POST['submit']){
    if( ($_POST['username' ] !="") && ($_POST['password'] !="") && ($_POST['password_again'] !="") ){
        $name = $_POST['username' ];
        $pass = $_POST['password'];
        $pass_again = $_POST['password_again'];
        if($pass === $pass_again){
            
            $sql = "INSERT INTO user(user_name, password) 
                            VALUE ('$name', '$pass')";
            
            execute($sql);
            
            $kq ="Tạo tài khoản mới thành công";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>ADMIN PAGE</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="./assets/css/admin_style.css" >
    <!-- fontawesome ICON -->
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.2-web/css/all.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BT4 -->
   
   </head>
<body>
  <style>
    body{
      font-size: 20px;
      height: 100%;
      color: darkgreen;
      font-weight: bold;
    }
      .home-content{
        padding-top: 5vh;
        padding-bottom: 5vh;
      }
    .home-item{
      margin-left: 23%;
      margin-right: 20%;
    }
    
    input{
      margin-top: 10px;
      max-width:100%;
      font-size: 20px;
    }
    .form{
      padding-top: 5vh;
      width: 100%;
      text-align: center;
      background-color: #EEEEEE;
    }
    .text{
      width: 100%;
      text-align: center;
    }
    @media(max-width: 1500px){
      .form{
        width: 100%;
      }
      .home-item{
        margin-left: 10%;
        margin-right: 10%;
    }
    }
    @media(max-width: 1000px){
      .form{
        width: 100%;
        
        
      }
      .home-item{
        
        margin-left: 5%;
        margin-right: 5%;
    }
    input{
      max-width: 80%;
    }
    }
  </style>
  <div class="sidebar close">
    <div class="logo-details">
    <i class="fa-solid fa-user"></i>
      <span class="logo_name">Admin|<a href="logout.php">Đăng xuất</a></span>
    </div>
    <ul class="nav-links">
      <li>
        <div class="iocn-link">
          <a href="a_listCatalog.php">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Loài cây</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
        <li><a class="link_name" href="a_listCatalog.php">Loài cây</a></li>
          <li><a id="addButton" href="a_addCatalog.php">Thêm loài cây</a></li>
          <li><a id="listButton" href="a_listCatalog.php">Danh sách loài cây</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="Cay_list.php">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Cây</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="Cay_list.php">Cây</a></li>
          <li><a href="Cay_add.php">Thêm cây</a></li>
          <li><a href="Cay_list.php">Danh sách cây</a></li>
        </ul>
      </li>
      <!-- li QR -->
      <li>
        <a href="qr.php">
       
        <i class="fa-solid fa-qrcode"></i>
          <span class="link_name">Mã QR</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="qr.php">Mã QR</a></li>
        </ul>
      </li>
      <li>
        <a href="thongke.php">
       
        <i class="fa-solid fa-chart-pie"></i>
          
          <span class="link_name">Thống kê</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="thongke.php">Thống kê</a></li>
        </ul>
      </li>

      <li>
        <a href="register.php">
       
        <i class="fa-solid fa-user-plus"></i>
          
          <span class="link_name">Tạo tài khoản mới</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="register.php">Tạo tài khoản mới</a></li>
        </ul>
      </li>
      
      <li>
        <div class="profile-details">
        <a href="admin.php"><i class='bx bx-log-out' ></i></a>
        </div>

      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text" style="font-size: 30px; color:darkgreen;">Tạo tài khoản mới</span>
    </div>
    <div class="home-item">
     <div id="addContent">
        <!-- form add obj -->
        <form name="Form" id="login-form" class="form" action="register.php" method="post" onsubmit="return check()" >
            
                <div class="form-group">
                    <label for="username" >Tên đăng nhập:</label><br>
                    <input type="text" name="username" id="name" class="form-control" style="width: 600px;">
                </div>
                <br>
                <div class="form-group">
                    <label for="password" class="text-info">Mật khẩu:</label><br>
                     <input type="password" name="password" id="pass" class="form-control" style="width: 600px; height: 39.2px;">
                </div>
                <br>
                <div class="form-group">
                    <label for="password" class="text-info">Nhập lại mật khẩu:</label><br>
                    <input type="password" name="password_again" id="pass_again" class="form-control"  style="width: 600px; height: 39.2px;">
                </div>
                <br>
                <div class="form-group" >
                    <input   type="submit" name="submit" class="btn btn-info btn-md" value="Chấp nhận" style=" width: 200px; height: 41px; color:darkolivegreen; font-weight:bold; font-size:20px" > 
                               
                </div>
                <br>
        </form>
        <br>
                <?php 
                  if(isset($kq) && $kq != ""){
                    echo $kq;
                  }
                ?>

     </div>
  </div>
  </section>
  


</body>
<script>
    function check(){
        var name = document.getElementById('name').value
        var pass = document.getElementById('pass').value
        var pass_again = document.getElementById('pass_again').value
        if(name === "" || pass === ""){
            if(name === ""){
                alert("Vui lòng nhập tên của bạn");
                document.forms["Form"]["name"].focus();
                return false;
            }
            if(pass === ""){
                alert("Vui lòng nhập mật khẩu của bạn");
                document.forms["Form"]["pass"].focus();
                return false;
            }
            
        }

        if(!(pass_again === pass)){
                alert("Xác thực mật khẩu không khớp! Vui lòng nhập lại.");
                document.forms["Form"]["pass_again"].focus();
                return false;
            }
    }
</script>
<script src="./assets/js/admin_js.js"></script>
</html>