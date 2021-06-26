<?php
    include 'config.php';

  
    $sub_category_id = $_GET['id'];

    $ope = $_GET['ope'];

    
    $sql = "UPDATE sub_category SET sub_category_status=$ope
    WHERE  sub_category_id = $sub_category_id";

    if (mysqli_query($conn, $sql)) {
    header("location:{$hostname}/admin-side/sub-category.php?page={$_GET['page']}");
    }

    mysqli_close($conn);


?>