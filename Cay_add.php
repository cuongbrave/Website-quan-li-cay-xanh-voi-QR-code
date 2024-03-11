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
    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="./assets/css/admin_style.css" >
    <!-- fontawesome ICON -->
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.2-web/css/all.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <style>
    html, body{
      margin-right: 0px;
      font-size: 20px;
    }
    .home-item{
      margin-left: 25%;
      margin-right:25%;
      margin-top: 6vh;
    }
    .home-item input{
      margin-top: 2vh;
      width:100%;
    }
    @media(max-width:1000px){
      .home-item{
      margin-left: 15%;
      margin-right:15%; 
    }
    .home-item input{
      width:100%;
    }
    }
    @media(max-width:700px){
      .home-item{
      margin-left: 5%;
      margin-right:5%; 
    }
    .home-item input{
      width:100%;
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
      <span class="text" style="width:100%; text-align:center; font-size: 30px; margin-top:5vh">Thêm cây xanh vào hệ thống</span>
    </div>
    <div class="home-item">
     <div id="addContent">
        <!-- form add obj -->
     <form action="Cay_add.php" enctype="multipart/form-data" method="post"> <br>
        <div class="form-group" style="text-align:center;">
            <label for="id_catalog">Danh mục cây:</label>
            <select style="height: 35px; font-size:20px;"class="form-control" id="id_catalog" name="id_catalog">
                <?php foreach ($danhmuc_list as $loai) : ?>
                    <option value="<?= $loai['danhmuc_id'] ?>"><?= $loai['loai'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="text" placeholder="Nhập tên cây" name="cay_name"> <br>
        <input type="text" placeholder="Nhập địa chỉ cây" name="cay_location"> <br>
        <input type="text" placeholder="Nhập thời gian trồng cây: yyyy-mm-dd" name="cay_time"> <br>
        <input style="margin-bottom: 3vh;"type="text" placeholder="Nhập tên người trồng cây" name="cay_grower"> <br>
        <label for="img" >Chọn ảnh của cây: </label>
        <input type="file" name="img" value="Hinh anh" name="cay_img"> <br>
        <!-- <input type="text" placeholder="Nhập họ cây" name="cay_ho"> <br> -->
        <input  type="text" placeholder="Nhập chi tiết cây" name="cay_detail"> <br>
        <div style="text-align: center;">
           <input type="submit" name="save" value="Lưu" style="width: 65px;">
        </div>
       
        
      </form>
      <?php 
          if(isset($_POST['save']) ){
              //khoi tao
              $id_catalog = $_POST['id_catalog'];
              $cay_name = $_POST['cay_name'];
              $cay_location = $_POST['cay_location'];
              $cay_time = $_POST['cay_time'];
              $cay_grower = $_POST['cay_grower'];
              $cay_detail = $_POST['cay_detail'];

              //img
              $target_dir = "./upload/";
              $target_file = $target_dir . basename($_FILES["img"]["name"]);
              $cay_img = $target_file;
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
             
              //name, location, time khong duoc null
              if($cay_name != "" && $cay_location != "" && $cay_time != ""){
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                $sql = "INSERT INTO cayxanh(name, location, grow_time, grower, img, chitiet_cayxanh, danhmuc_id) 
                VALUE ('$cay_name', '$cay_location', '$cay_time', '$cay_grower', '$cay_img', '$cay_detail', '$id_catalog')";
                execute($sql);
                echo'Cây được thêm thành công.';
              }
              else
                  echo"Thêm cây không thành công. Kiểm tra lại tên cây, địa chỉ hoặc thời gian trồng."; 
             
            
          }
      ?>

     </div>
  </div>
  </section>
  


</body>

<script src="./assets/js/admin_js.js"></script>

</html>