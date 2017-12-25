<?php 
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    $output = '';
    $conn = mysqli_connect('localhost','root','','register');
    //insert data to db
    $id = $_POST['id'];

    $date = $_POST['exp'];
    $exp = strtotime($date."+ 7 days");
    $exp =date("Y-m-d H:i:s",$exp);

    $query = "UPDATE user_item SET expired_date='$exp' WHERE id=$id;" ;
    $sql = mysqli_query($conn,$query)or die(mysqli_error($conn));

    echo '<script type="text/javascript" language="javascript"> 
                alert("Update!!");
                window.history.back();
        </script>';
?>