<?php
    define('servername', 'localhost');
    define('username', 'root');
    define('password', '');
    define('database', 'dbcx');

    /**
    *  insert, update, delete, detail --> su dung function
    */

    function execute($sql){
        //create conn toi database 
        $conn = mysqli_connect(servername, username, password, database);

        //xu li
        mysqli_query($conn, $sql);
        //dong conn
        mysqli_close($conn);
    }

    /**
     * SELECT
     */

    function executeResult($sql){
        //create conn toi database 
        $conn = mysqli_connect(servername, username, password, database);

        //xu li
        $resultset= mysqli_query($conn, $sql);
        $list = [];
        while($row = mysqli_fetch_array($resultset, 1) ){
            $list[] = $row; 
        }


        //dong conn
        mysqli_close($conn);

        return $list;
    }

    //check user
    function checkUser($username, $password){
        $conn = mysqli_connect(servername, username, password, database);

        // Xử lý tên người dùng và mật khẩu để tránh lỗ hổng bảo mật SQL injection
        $name = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);  
        //sql
        $sql = "SELECT * FROM user WHERE user_name = '$username' AND password = '$password'";
        $resultset= mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultset) > 0) {
            // Tồn tại name và password trong cơ sở dữ liệu
            mysqli_close($conn); 
            return true;
        } else {
            // Không tồn tại name và password trong cơ sở dữ liệu
            mysqli_close($conn); 
            return false;
        }



    }   
      


?>