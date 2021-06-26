<?php
    include 'config.php';

    $category_id = $_GET['id'];

    $ope = $_GET['ope'];

    
    $sql = "UPDATE category SET category_status=$ope
    WHERE  category_id = $category_id";

    if (mysqli_query($conn, $sql)) {
    header("location:{$hostname}/admin-side/category.php?page={$_GET['page']}");
    }

    mysqli_close($conn);


?>