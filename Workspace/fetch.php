<?php
//fetch.php
$conn = mysqli_connect("localhost", "root", "", "register");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM `item` WHERE item_name LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM item ORDER BY ID";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) !=0)
    {
        $output .= '
            <div class="table-responsive">
                <table class="table table bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Item Number</th>
                        <th>Add to cart</th>
                    </tr>
                    </thead>';

        while($row = mysqli_fetch_array($result))
            {
                 $output .= '
                    <tr>
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["description"].'</td>
                        <td>'.$row["price"].'</td>
                        <td>'.$row["item_num"].'</td>
                        <td><form action="fetch2.php" method="post">
                        <button name="submit"><span class="fas fa-plus-square">
                        <input type="hidden" name="id" value="'.$row["ID"].'">
                        <input type="hidden" name="name" value="'.$row["item_name"].'">
                        </span></button></form>
                        </td>
                    </tr>';
        }
            echo $output;
    }
    else
        {
            echo 'Data Not Found';
        }

?>