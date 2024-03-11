<?php 
  session_start();
  //var_dump($_SESSION);
  if (!isset($_SESSION["kq"]) && $_SESSION["kq" ] == false) {
    header("Location: login.php");
    die();
  }

?>  

<?php
    require_once("connect.php");

    if(isset($_GET['cayxanh_id']) && $_GET['cayxanh_id'] > 0){
        $id = $_GET['cayxanh_id'];
        $sql_cay = "DELETE FROM cayxanh WHERE cayxanh_id =".$id;
         execute($sql_cay);
        header("Location: Cay_list.php");
    }
   
?>