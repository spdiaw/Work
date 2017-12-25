<?php
session_start();
$username = $_SESSION['username'];
//fetch.php
    $conn = mysqli_connect("localhost", "root", "", "register");
    $output = '';


if(isset($_POST["sql_query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["sql_query"]);
 $query = "SELECT * FROM user_item WHERE item_name LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM user_item ORDER BY ID";
}
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
//echo $result;

if(mysqli_num_rows($result) !=0)
    {
        $output .= '
            <div class="table-responsive">
                <table class="table table bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>username</th>
                        <th>Date Rent</th>
                        <th>Date Expired</th>
                        <th>item ID</th>
                        <th>Item name</th>
                        <th>Renew Item</th>
                    </tr>
                    </thead>';

        while($row = mysqli_fetch_array($result))
            {
                if($row["username"]==$username){
                 $output .= '
                    <tr>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["datedata"].'</td>
                        <td>'.$row["expired_date"].'</td>
                        <td>'.$row["item_id"].'</td>
                        <td>'.$row["item_name"].'</td>
                        <td><form action="renew_item.php" method="post">
                        <button name="submit"><span class="fas fa-retweet">
                        <input type="hidden" name="id" value="'.$row["ID"].'">
                        <input type="hidden" name="exp" value="'.$row["expired_date"].'">
                        </span></button></form>
                        </td>
                    </tr>';
                }
        }
            echo $output;
    }
    else
        {
            echo 'Data Not Found';
        }

?>