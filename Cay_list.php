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
        width: 100%;
        height: 100%;
      }
      @media(max-width: 500px){
        body{
            height: 100%;
            width: 500px;
        }
        
      }
      body{
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
        /* background: #b4d396; */
      }
      h1{
        padding-top: 20px;
        color: #04470d;
        text-align: center;
      }
      table{
        width: 100%;
      }

      table,td,th{
        border: 1px solid #333;
        border-collapse: collapse;
      }

      td, th{
        padding: 6px 10px;
      }

      table thead th{
        text-align: left;
        background: #023c09;
    }

    .table.table-list{
        background: rgb(1, 86, 1);
        color: #fff;
    }

    .table.table-hover tbody tr:hover{
        background: rgb(11, 99, 34);

    }

    .add_cay{
        width: 120px;
        height: 30px;
        font-size: 20px;
        
        margin-top: 10px;
        margin-bottom: 10px;
    }
    /* pagination */
    .pagination {
      display: inline-block;
    }

    .pagination a {
      color: black;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
    }
      td button{
        width: 70px;
      }

    /* .pagination a.active {
      background-color: red;
      color: white;
    } */
      a:active{
      color: red;
      }

      .pagination a:hover:not(.active) {background-color: #ddd;}

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
        <span class="text">Danh sách các cây xanh</span>
      </div>
      <div class="home-item" style="margin-left: 20px;">
        <div id="addContent">
          <!-- form list obj -->
          <div class="list_cay">
            
            <button class="add_cay" onclick="window.open('Cay_add.php', '_self')">Thêm cây</button> 
            <br> <br>
            <table class="table table-list table-hover">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th>Tên cây</th>
                      <th>Nơi trồng</th>
                      <th>Ngày được trồng</th>
                      <th>Người trồng cây</th>
                      <th>Chi tiết</th>
                      <th>Sửa</th>
                      <th>Xoá</th> 
                  </tr>
              </thead>
              <?php 
                  //tinh so page
                  $sql_pages  = 'SELECT COUNT(cayxanh_id) as number from cayxanh';
                  $kq = executeResult($sql_pages);
                  $number = 0;
                  if($kq != null && count($kq) > 0) {
                  $number = $kq[0]['number'];
                  }
                  $pages = ceil($number / 10);
                  $now_page = 1;
                  if(isset($_GET['page'])){
                    $now_page = $_GET['page'];

                  }
                  $index = ($now_page - 1) *10;
                  //xuat data 
                  $sql = 'SELECT * FROM cayxanh limit '.$index.', 10';
                  $Cay_list = executeResult($sql);
                  $index = 1;
                  foreach ($Cay_list as $Cay) {
                      echo 
                      '<tbody>
                          <tr>
                              <td>'.($index++).'</td>
                              <td>'.$Cay['name'].'</td>
                              <td>'.$Cay['location'].'</td>
                              <td>'.$Cay['grow_time'].'</td>
                              <td>'.$Cay['grower'].'</td>
                              <td><button onclick = \'window.open("Cay_detail.php?cayxanh_id='.$Cay["cayxanh_id"].'", "_self") \' >Chi tiết</button></td>
                              <td><button onclick = \'window.open("Cay_edit.php?cayxanh_id='.$Cay["cayxanh_id"].'", "_self") \'>Sửa</button></td>
                              <td><button onclick = \'window.open("Cay_delete.php?cayxanh_id='.$Cay["cayxanh_id"].'", "_self") \'>Xoá</button></td> 
                          </tr>
                      </tbody>';
                  }
              ?>            
            </table>
          </div>
          
          <div  class="pagination">
            <?php 
            if(isset($_GET['page'])){
              $now_page = $_GET['page'];

            }
            //pages la so trang chua tong tat ca cay xanh
              for ($i=1; $i <= $pages; $i++) { 
                if($i == $now_page) {
                  $color = '#ca1d26';
                }else{
                  $color = 'back';
                }
                echo '<a style="color: '.$color.';" class="page-link" href="?page='.$i.' ">'.$i.'</a>';
              }
            ?>
            
          
          </div>


          
      </div>
    </div>
    </section>
  </body>
<script src="./assets/js/admin_js.js"></script>
</html>