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

    if(isset($_GET['danhmuc_id']) && $_GET['danhmuc_id'] > 0){
        $id = $_GET['danhmuc_id'];
        $sql_cay = "DELETE FROM danhmuc_cayxanh WHERE danhmuc_id =".$id;
         execute($sql_cay);
        header("Location: a_listCatalog.php");
    }
   
?>