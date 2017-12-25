<?php 
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    $output = '';
    $conn = mysqli_connect('localhost','root','','register');
    //insert data to db
    $username1 = $_SESSION['username'];
    $id = $_POST['id'];
    $name = $_POST['name'];

    $date = date("Y-m-d H:i:s");
    $exp = strtotime($date."+ 7 days");
    $exp =date("Y-m-d H:i:s",$exp);

    $query = "INSERT INTO user_item (username, datedata, expired_date, item_id,item_name) VALUE('".$username1."', '$date', '$exp', $id, '".$name."');" ;
    $sql = mysqli_query($conn,$query)or die(mysqli_error($conn));

    //query
    $sql_qr ="SELECT  `username`, `datedata`, `item_id` FROM `user_item` WHERE `username`=$username1";
    $sqli_query = mysqli_query($conn,$sql_qr);

    echo '<script type="text/javascript" language="javascript"> 
                alert("Item Added");
                window.history.back();
        </script>';
?>