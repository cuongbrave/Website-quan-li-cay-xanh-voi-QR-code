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
// echo'hello';

?>

<?php 
    $sql = "SELECT `danhmuc_cayxanh`.*, COUNT(cayxanh.danhmuc_id) AS 'number_cate' FROM `cayxanh` INNER JOIN `danhmuc_cayxanh` ON cayxanh.danhmuc_id = danhmuc_cayxanh.danhmuc_id GROUP BY cayxanh.danhmuc_id";
    $list = executeResult($sql);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>ADMIN PAGE</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/admin_style.css" >
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- fontawesome ICON -->
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.2-web/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- js gg chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['loai', 'number_cate'],
          <?php 
            foreach ($list as $key ) {
                echo "['".$key['loai']."',  ".$key['number_cate']." ],";
            }
          ?>
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
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
    <div class="home-content" style="margin-top: px;">
      <i class='bx bx-menu' ></i>
      <span class="text">Thống kê</span>
      <div class="home_admin">
        <div class="home_admin_img">
            <img src="#" alt="">
        </div>
      </div>
    </div>
    <div class="home-item" style="margin-left: 20px;">
        <div id="addContent">
        <div class="list_cay" >
           
           
           
            <table style="width:20%;" class="table table-list table-hover">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th>Loài</th>
                      <th>Số lượng</th>
                  </tr>
              </thead>
              <?php 
                  
                  $index = 1;
                  foreach ($list as $key) {
                      echo 
                      '<tbody>
                          <tr>
                              <td>'.($index++).'</td>
                              <td>'.$key['loai'].'</td>
                              <td>'.$key['number_cate'].'</td>
                          </tr>
                      </tbody>';
                  }
              ?>            
            </table>
      </div>  
    <br>
    <div id="donutchart" style="width: 500px; height: 500px; "></div>
    </div>
  </div>
  </section>

</body>
<script src="./assets/js/admin_js.js"></script>

</html>

