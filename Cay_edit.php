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
    //XUAT DATA RA FORM
    $sql = "SELECT * FROM danhmuc_cayxanh";
    $danhmuc_list = executeResult($sql);
    if(isset($_GET['cayxanh_id']) && $_GET['cayxanh_id'] > 0){
        $id = $_GET['cayxanh_id'];
        $sql_cay = "SELECT * FROM cayxanh WHERE cayxanh_id = $id";
        $list = executeResult($sql_cay);
        if($list != null && count($list) > 0){
            $cay = $list[0];
            //xu li hinh anh
            extract($cay);
           
            if($img != ""){
                //$img = "./upload".$img;
                if(file_exists($img)){
                    $hinh = '<label for="img">Ảnh cây: </label><br>
                    <img src=" '.$img.'" alt="" width="120">';
                }
            }
        }
    }


?>

<?php 
//UPDATE DATA
    if(isset($_POST['save'])){
        $id = $_POST['cay_id'];
        $id_catalog = $_POST['id_catalog'];
        $cay_name = $_POST['cay_name'];
        $cay_location = $_POST['cay_location'];
        $cay_time = $_POST['cay_time'];
        $cay_grower = $_POST['cay_grower'];
        $cay_detail = $_POST['cay_detail'];

        //kiem tra img update co ton tai khong
        $ten_file_img = $_FILES['img']['name'];   //kiem tra cho chon update 
        if($ten_file_img != ""){  //update anh

            $target_dir = "./upload/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $cay_img = $target_file;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            //upload anh len host
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
           
            $sql1 = "UPDATE cayxanh SET danhmuc_id = '$id_catalog', name = '$cay_name', location = '$cay_location', grow_time = '$cay_time', grower = '$cay_grower', img = '$cay_img', chitiet_cayxanh= '$cay_detail'  WHERE cayxanh_id = '$id' ";
           
        }else if($ten_file_img == ""){    //khong update anh
            $sql1 = "UPDATE cayxanh SET danhmuc_id = '$id_catalog', name = '$cay_name', location = '$cay_location', grow_time = '$cay_time', grower = '$cay_grower', chitiet_cayxanh= '$cay_detail'  WHERE cayxanh_id = '$id' ";
        }
        

        execute($sql1);
        header('Location: Cay_list.php');
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
    .form-group{
      margin-top: 20px;
    }
    .text1{
      text-align: center;
      font-size: 30px;
      margin-top: 10px;
      width: 100%;
      font-weight: bold;
    }
    .home-item{
      text-align: center;
    }
    .home-item input{
      margin-top: 10px;
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
        <a href="Cay_list.php"><i class='bx bx-log-out' ></i></a>
        </div>

      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text1">Sửa thông tin cây xanh</span>
      <div class="home_admin">
        <div class="home_admin_img">
            <img src="#" alt="">
        </div>
        
      </div>
    </div>
    <div class="home-item" style="margin-left: 20px;">
        <div id="addContent">
            <form action="Cay_edit.php" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                    <label for="id_catalog" style="font-size:20px">Danh mục cây:</label>
                    <select class="form-control" id="id_catalog" name="id_catalog">
                        <?php foreach ($danhmuc_list as $loai) : ?>
                            <?php if ($loai['danhmuc_id'] == $cay['danhmuc_id']) : ?>
                                <option value="<?= $loai['danhmuc_id'] ?>" selected><?= $loai['loai'] ?></option>
                            <?php else : ?>
                                <option value="<?= $loai['danhmuc_id'] ?>"><?= $loai['loai'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

            <input type="hidden" name="cay_id" value="<?=$cay['cayxanh_id']?>">
            <input type="text" placeholder="Nhập tên cây" name="cay_name" value="<?=$cay['name']?>"> <br>
            <input type="text" placeholder="Nhập địa chỉ cây" name="cay_location" value="<?=$cay['location']?>"> <br>
            <input type="text" placeholder="Nhập thời gian trồng cây" name="cay_time" value="<?=$cay['grow_time']?>">  <br>
            <input type="text" placeholder="Nhập tên người trồng cây" name="cay_grower" value="<?=$cay['grower']?>"> <br><br>
            <?php 
                if(isset($hinh) && $hinh != ""){
                    echo $hinh;
                }
    
            ?><br>
            <label for="img">Chọn ảnh thay thế: </label>
            <input type="file" name="img" value="Hinh anh"> <br>
            <input type="text" placeholder="Nhập chi tiết cây" name="cay_detail" value="<?=$cay['chitiet_cayxanh']?>"> <br>
            <input type="submit" name="save" value="Lưu">

            </form>


        </div>
  </div>
  </section>
  


</body>
<script src="./assets/js/admin_js.js"></script>
</html>

