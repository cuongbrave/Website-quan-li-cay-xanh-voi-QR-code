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
    $sql = "SELECT * FROM danhmuc_cayxanh";
    $danhmuc_list = executeResult($sql);

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
   </head>
<body>
  <style>
    .home-content{
      height: 200%;
    }
    input{
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .text{
      font-size: 40px; 
      height: 100%;
      width:100%; 
      text-align:center; 
      margin-top:10px;
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
      <span class="text" style="width:100%; text-align:center; font-size: 30px; margin-top:5vh">Thêm loài cây</span>
    </div>
    <div class="home-item" style="margin-left: 20px;">
     <div id="addContent">
        <!-- form add obj -->
        
     <form style="width:100%; text-align:center;" action="a_addCatalog.php" enctype="multipart/form-data" method="post"> <br>

        <input style=" max-width:100%" type="text" placeholder="Nhập loài cây muốn thêm" name="cay_loai"> <br>
        <input type="text" style=" max-width:100%" placeholder="Nhập thông tin loài cây muốn thêm" name="chitiet_loai"> <br>
        <input type="submit" name="save" value="Lưu">
        

      </form>
      <?php 
          if(isset($_POST['save']) ){
            $cay_loai = $_POST['cay_loai'];
            $chitiet_loai = $_POST['chitiet_loai'];
              if($cay_loai != "" && $chitiet_loai != ""){
                $sql = "INSERT INTO danhmuc_cayxanh(loai, chitiet)
                        VALUE('$cay_loai', '$chitiet_loai') ";  
                execute($sql);
                echo'<p style="text-align: center;">Đã thêm loài cây mới thành công</p>';
              }else{
                echo '<p style="text-align: center;">Thêm loài cây mới không thành công</p>';
              }
            
            
          }
      ?>

     </div>
     
  </div>
  </section>
  


</body>
<script src="./assets/js/admin_js.js"></script>
</html>