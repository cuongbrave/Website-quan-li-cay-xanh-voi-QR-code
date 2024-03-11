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
    if(isset($_GET['danhmuc_id']) && $_GET['danhmuc_id'] > 0){
        $id = $_GET['danhmuc_id'];
        $sql_cay = "SELECT * FROM danhmuc_cayxanh WHERE danhmuc_id = $id";
        $list = executeResult($sql_cay);
        if($list != null && count($list) > 0){
            $loai = $list[0];           
        }
    }


?>

<?php 
//UPDATE DATA
    if(isset($_POST['save'])){
        $id = $_POST['loai_id'];
        $loai_name = $_POST['loai_name'];
        $loai_detail = $_POST['loai_detail'];
 
        if($loai_name != '' && $loai_detail != ''){
          $sql1 = "UPDATE danhmuc_cayxanh SET loai = '$loai_name', chitiet = '$loai_detail' WHERE danhmuc_id = $id";

        }

        execute($sql1);
        header('Location: a_listCatalog.php');
        exit;
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
   </head>
<body>
  <style>
    input{
      margin-top: 10px;
      max-width: 100%;
    }
    .text{
      text-align: center;
      font-size: 30px;
      margin-top: 10px;
      width: 100%;
      font-weight: bold;
    }
    .home-item{
      text-align: center;
      margin-top: 5vh;
    }
    @media(max-width:700px){
      .home-item{
        margin-left: 2vh;
        margin-right: 3vh;
    }
    }
  </style>
  <div class="sidebar close">
    <div class="logo-details">
    <i class="fa-solid fa-user"></i>
      <!-- <i class="ion-ios-person-outline"> -->
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
        <a href="a_listCatalog.php"><i class='bx bx-log-out' ></i></a>
        </div>

      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Sửa thông tin loài cây</span>
      <div class="home_admin">
        <div class="home_admin_img">
            <img src="#" alt="">
        </div>
        
      </div>
    </div>
    <div class="home-item" style="margin-left: 20px;">
        <div id="addContent">
            <!-- <h2>Sửa thông tin danh mục</h2> -->
            <form action="a_editCatalog.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="loai_id" value="<?=$loai['danhmuc_id']?>">
              <input type="text" placeholder="Nhập tên cây" name="loai_name" value="<?=$loai['loai']?>"> <br>
              <input type="text" placeholder="Nhập chi tiết cây" name="loai_detail" value="<?=$loai['chitiet']?>"> <br>
              <input type="submit" name="save" value="Lưu">
            
            </form>
        </div>
  </div>
  </section>
  


</body>
<script src="./assets/js/admin_js.js"></script>
</html>

