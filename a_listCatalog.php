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
    // echo "hello";
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
    body{
      font-size: 20px;
      font-family: Arial, Helvetica, sans-serif;
    }
    .home-section{
      padding: 20px;
    }
    .addContent{
      margin-top: 20px;
      background-color: aqua;
    }
    
    .text{
      /* text-align: center; */
      width:100%;
      font-size:30px;
      /* //margin-left:10%; */
    }
    table{
      width:50%;
      text-align: center;
      margin-top: 6vh;
      /* margin-left: 20%; */
      }

    th{
      height: 35px;
      vertical-align: auto;
    }
   
    .table.table-hover tbody tr:hover{
      background:silver;
    }

    button{
      width: 60px;
      background-color: silver;
    }

    @media (max-width: 1000px){  
      table{
      width:100%;
      margin-left: 0;    }
      .text1{
        margin-left: 20%;
      }
    }
    @media (max-width: 600px){  
      table{
      width:30%;
      max-width: 30%;
      margin-left: 0;    }
      .text1{
        margin-left: 20%;
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
  <section style="max-width:100%;" class="home-section">
    <div class="home-content" style="margin-top: -20px;">
      <i class='bx bx-menu' ></i>
      <span class="text">Danh sách các loài cây</span>
    </div>
    <div class="home-item">
     <div id="addContent">
        <!-- form list obj -->
        <div class="list_cay">
       
        <table class="table table-list table-hover" style="margin-top: 10px;">
          <thead>
            <tr>
                <th>STT</th>
                <th>Tên loài cây</th>
                
                <th>Sửa</th>
                <th>Xoá</th> 
            </tr>
          </thead>
 <?php 
    $sql = 'SELECT * FROM danhmuc_cayxanh';
    $Catalog_list = executeResult($sql);
    $index = 1;
    foreach ($Catalog_list as $loai) {
        echo '<tbody>
              <tr>
                <td>'.($index++).'</td>
                <td>'.$loai['loai'].'</td>
                
                <td><button onclick = \'window.open("a_editCatalog.php?danhmuc_id='.$loai["danhmuc_id"].'", "_self") \'>Sửa</button></td>
                <td><button onclick = \'window.open("a_deleteCatalog.php?danhmuc_id='.$loai["danhmuc_id"].'", "_self") \'>Xoá</button></td> 
             </tr>
             </tbody>';
    }
 ?>           
            
        </table>
        <br>
        <button class="" onclick="window.open('a_addCatalog.php', '_self')" style="height: 40px;width: 90px; margin-left: 20px">Thêm loài cây</button> 
        

    </div>

     </div>
  </div>
  </section>
  


</body>
<script src="./assets/js/admin_js.js"></script>
</html>