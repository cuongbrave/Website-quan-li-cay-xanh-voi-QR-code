<?php 
    require_once('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        *{
            margin: 0;
            padding: 0;
            margin-left: 5px;
            padding-right: 5px;
            box-sizing: border-box;
            
        }

        body{
            margin-top: 20px;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: justify;
        }


        header{
            display: flex;
            justify-content: space-between;
            padding: 0 50px;
            height: 70px;
            background:#fff;
            padding: 3px;
        }
        .logo{
            flex: 1;
            
        }
        .tt{
            padding-top: 10px;
        }
        .logo img{
            width: 100%;
            height: auto;
            max-width: 100px;
            border-radius: 50%;
        }
        .tt{
            flex:12;
        }
        h1,h2{
            text-align: center;
            color: darkgreen;
        }

        hr{
            width: 100%;
            height: 5px;
            background-color:darkgreen;
        }

        .infor{
            margin-top: 30px;
        }

        .im{
            text-align: center;
        }
        .im img{
            width: 100%;
            max-width: 600px;
            height: 100%;
            max-height: 600px;
            
        }

        .name{
            margin-top: 30px;
            margin-bottom: 30px;
        }

        h3{
            margin-top: 20px;
            margin-bottom: 20px;
            height: 30px;

            background-color: darkgreen;
            color: #fff;
        }

        .detail{
            margin-top: 10px;
        }

        /* footer */
        .footer{
            margin-top: 20px;
            background-color: darkgreen;
            color:#fff ;
            text-align: center;
        }
        .footer hr{
            height: 3px;
            background-color: #fff;
        }

        .footer img{
            width: 110px;
            height: 110px;
            text-align: center;
            border-radius: 50%;
        }

        @media(max-width:1200px){
            .logo img{
                
                height: 65px;
                width: 70px;
                object-fit: cover;
            }
        }

        @media(max-width:900px){
            h2{
                font-size: 26px;
            }
        }
        @media(max-width:600px){
            body{
                height: 100%;
                width: 600px;
                font-size: 16px;
            }
            h2{
                font-size: 25px;
            }

            .logo img{
                
                height: 60px;
                width: 60px;
                object-fit: cover;
            }

        }

    </style>
    <header>
        <div class="logo">
            <img src="./img/pngtree-green-plant-logo-vector-png-image_7101352.png">
        </div>
        <div class="tt">
            <h1>THÔNG TIN CÂY XANH TRƯỜNG ĐẠI HỌC CẦN THƠ</h2>
        </div>

    </header>
    
    <div class="wapper">
        <?php 
        $id1 = '';
        //kiem tra isset id 
        if(isset($_GET['cayxanh_id'])){
            $id1 = $_GET['cayxanh_id'];
            $sql1 = "SELECT * FROM cayxanh WHERE cayxanh_id = $id1 ";
            $sql2 = "SELECT * FROM `danhmuc_cayxanh` WHERE danhmuc_id = (SELECT danhmuc_id FROM cayxanh WHERE cayxanh_id = $id1)";
            $list1 = executeResult($sql1);
            $list2 = executeResult($sql2);

            if(($list1 != null && count($list1) > 0) && ($list2 != null && count($list2) > 0)){
                $cay = $list1[0];
                $danhmuc = $list2[0];
            }

        }


        echo
        '<div class="infor">
            <div class="im">
                <label for="img"><img src="'.$cay["img"].'" alt=""></label><br><br> 
            </div>
            <hr>
            
            <div class="name"> 
                <h1>Tên cây: '.$cay["name"].' </h1>
            </div>
            <h3>Thông tin chung</h3>

            <div class="detail">
                <li>Loài cây: '.$danhmuc["loai"].'</li>
                <li>Đặc điểm: '.$danhmuc["chitiet"].'</li>
                <li>Người trồng: '.$cay["grower"].'</li>
                <li>Ngày trồng: '.$cay["grow_time"].'</li>            
                <li>Địa điểm trồng:  '.$cay["location"].'</li>            
                <li>Thông tin chi tiết: '.$cay["chitiet_cayxanh"].'</li>
            </div>
        
        </div>';

        ?> 
        <div>
            <h3>Đơn vị quản lý</h3>
            <p>Phòng quản trị thiết bị</p>
            <p>Địa chỉ: Lầu 2, Nhà Điều hành Khu II Trường Đại học Cần Thơ</p>
            <p>Số điện thoại: 0292 383 0262</p>
            <p>Email: pqttb@ctu.edu.vn <a href="#">Gửi mail</a></p>
        
        </div>


    </div>
    <footer>
        <div class="footer"> 
            <br>
            <div class="footer_img">
                <img src="./img/pngtree-green-plant-logo-vector-png-image_7101352.png" alt="Logo">
            </div>
            <p>B2004772 - B2013507</p>
 
            <hr>

            <div class="footer__content">
                <br> ® Dự án trang web quản lý cây xanh trường Đại học Cần Thơ - Đồ án học phần CT226
            </div>
        </div>
        
    </footer>
    
</body>
</html>