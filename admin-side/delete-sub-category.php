<?php
    include 'config.php';
    // if($_SESSION["user_role"] == '0'){
    //   header("Location: {$hostname}/admin/admin_nav.php");
    // }
    $sub_category_id = $_GET["id"];

    /*sql to delete a record*/
    $sql = "DELETE FROM sub_category WHERE sub_category_id ='{$sub_category_id}'";

    if (mysqli_query($conn, $sql)) {
        header("location:{$hostname}/admin-side/sub-category.php?page={$_GET['page']}");
    }

    mysqli_close($conn);

?>
