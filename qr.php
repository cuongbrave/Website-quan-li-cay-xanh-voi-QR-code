<?php 
  session_start();
  //var_dump($_SESSION);
  if (!isset($_SESSION["kq"]) && $_SESSION["kq" ] == false) {
    header("Location: login.php");
    die();
  }

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
   </head>
<body>
    <style>
        .wapper{
        background-color: #7fb7c9;
        padding: 30px;
        width: 450px;
        min-height: 350px;
        border-radius: 8px;
        height: auto;
        }
        .wapper h1{
            font-size: 25px;
            text-align: center;
            
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .wapper input{
            width: 100%;
            margin-block: 12px;
        }
        .wapper input,select{
            padding: 8px;
            border-radius: var(--border-radius);
            font-size: 18px;
            outline: none;
            border: 2px solid var(--border-color);
        }
        .wapper label{
            font-size: 20px;
        }
        .wapper div{
            display: flex;
            justify-content: space-between;
        }
        .footer-qr{
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        .footer-qr a{
            text-decoration: none;
            font-size: 20px;
            padding: 15px 35px;
            margin-inline: 2px;
            font-weight: 600px;
            border-radius: var(--border-radius);
        }
        .qr-body{ 
            display: grid;
            place-items: center;
            padding: 20px;
        }
        .qr-body img{
            max-width: 100%;
            max-height: 100%;
            margin-block: 10px;
            padding: 20px;
            border: solid 0.5px var(--border-color);
        }
        @media screen and (max-width:520px){
            .box{
                width: 80%;
            }
            .qr-footer a{
                padding: 12px;
                font-size: 16px;
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
  <section class="home-section" >
    <div class="home-content" >
      <i class='bx bx-menu' ></i>
      <span class="text" style="width:100%; text-align:center; margin-top:5vh;">Quản lý cây xanh bằng mã QR</span>
      <div class="home_admin">
        <div class="home_admin_img">
            <img src="#" alt="">
        </div>
      </div>
    </div>
    <div class="home-item" style="margin-left: 20px;">
        <div id="addContent" style="display: flex; align-items: center; justify-content: center;">
        <div class="wapper" style="background-color:#99FF99; margin-top: 40px">
            <h1>Tạo Mã QR Code</h1>
            <input type="text" class="qr_text" id="qr_text" placeholder="Nhập text hoặc URL" />
            <label for="sizes" style="margin-top:3vh;">Lựa chọn kích thước</label> 
            <select id="sizes" style="margin-top:3vh;">
                <option value="100">100x100</option>
                <option value="200">200x200</option>
                <option value="300">300x300</option>
                
            </select>
            <br>
            <div class="body-qr"></div>
            <div class="footer-qr" style="margin-top:10vh;">
                <a href="" id="generate">Tạo QR Code</a>
                <a href="" id="download" download="QR_Code.png">Tải về</a>
            </div>
     </div>
    </div>
  </div>
  </section>
<script >
  const qrText=document.getElementById('qr_text');
  const sizes=document.getElementById('sizes');
  const generate=document.getElementById('generate');
  const download=document.getElementById('download');
  const qrcodebox=document.querySelector('.body-qr');

  let size = sizes.value;
  generate.addEventListener('click',(e)=>{
      e.preventDefault();
      isEmptyInput();
  });
  sizes.addEventListener('change',(e)=>{
      size=e.target.value;
      isEmptyInput();
  });

  download.addEventListener('click',()=>{
      let img=document.querySelector('.body-qr img');
      if(img !== null){
          let imgAtrr=img.getAttribute('src');
          download.setAttribute("href",imgAtrr);
      }
  });

  function isEmptyInput(){
      qrText.value.length>0?generateQRCode():alert('Vui lòng nhập văn bản hoặc URL để tạo QR Code');
  }

  function generateQRCode(){
      qrcodebox.innerHTML = "";
      new QRCode(qrcodebox, {
          text:qrText.value,
          height:size,
          width:size,
          colorLight:"#fff",
          colorDark:"#000",
      });
  }
</script>
</body>
<script src="./assets/js/admin_js.js"></script>
  <!-- qr js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</html>

