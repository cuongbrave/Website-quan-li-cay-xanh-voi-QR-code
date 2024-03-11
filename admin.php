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
    #Slider{
      padding-bottom: 30px;
      border-bottom: 2px solid #000;
      overflow: hidden;
    }
    .aspect-ratio-169{
      display: block;
      position: relative;
      padding-top: 56.25%;
      transition: 0.3s;}
    .aspect-ratio-169 img{ 
      display: block;
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left:10%;}
    .dot-container{
      position:absolute;
      height: 30px;
      width: 100%;
      display: flex;
      align-items: center;
      text-align: center;
      justify-content: center;}
    .dot{
      height: 16px;
      width: 16px;
      background-color: #CCC;
      border-radius: 50%;
      margin-right: 12px;
      cursor: pointer;}
    .dot.active{
      background-color: #333;}
      
  </style>
    
    
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
  <section style="height: 20%"class="home-section">
    <div class="home-content" >
      <i class='bx bx-menu' ></i>
      <h1 class="text"style="margin-top:10px; font-size:30px;margin-bottom: 10px; width:100%; text-align:center">Cây xanh Đại học Cần Thơ</h1>
    </div>
    </section>

    <section id="Slider">
    <div class="aspect-ratio-169">
      <img src="./img/slide2.jpg">
      <img src="./img/slide3.jpg">
      <img src="./img/slide4.jpg">
      <img src="./img/slide5.jpg">
      <img src="./img/slide6.jpg">
    </div>
    <div class="dot-container">
      <div class="dot active"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
    </section>
 
</body>
<script>
const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
  const imgContainer = document.querySelector('.aspect-ratio-169')
  const dotItem = document.querySelectorAll(".dot")
  let imgNuber = imgPosition.length
  let index =0
  imgPosition.forEach(function(image,index){
    image.style.left = index*100 + "%"
    dotItem[index].addEventListener("click", function(){
      slider(index)
    })
  })
  function imgSlide(){
    index++;
    console.log(index)
    if(index >=imgNuber){
      index=0}
    slider(index)
    
  }
  function slider(index){
    imgContainer.style.left = "-"+index*100+"%"
    const dotActive = document.querySelector('.active')
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active")
  }
  setInterval(imgSlide,5000)

  
</script>
<script src="./assets/js/admin_js.js"></script>
</html>

