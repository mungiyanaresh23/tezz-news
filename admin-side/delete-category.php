<?php
    include 'config.php';
    // if($_SESSION["user_role"] == '0'){
    //   header("Location: {$hostname}/admin/admin_nav.php");
    // }
    $category_id = $_GET["id"];

    /*sql to delete a record*/
    $sql = "DELETE FROM category WHERE category_id ='{$category_id}'";

    if (mysqli_query($conn, $sql)) {
        header("location:{$hostname}/admin-side/category.php?page={$_GET['page']}");
    }

    mysqli_close($conn);

?>
