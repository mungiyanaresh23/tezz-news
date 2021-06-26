<?php
  include "config.php";  
  session_start();
  
  if(!empty($_POST['submit'])){
    
  
  $title =  $_POST['post_title']; 
  $description =  $_POST['postdesc'];
  
  // $short_description = substr($description,0,130) . "&#8230";

  $short_description = $description;

  $category = $_POST['category'];
  $sub_category = $_POST['sub_category'];
  $date = date("d M, Y");
  $author = $_SESSION['user_id'];

    $filename = $_FILES['fileToUpload']['name'];

    $tmp = $_FILES['fileToUpload']['tmp_name'];
    
    move_uploaded_file($tmp,"upload/".$filename);
 
  }

  $sql = "INSERT INTO post(title, description, short_description,category,sub_category,post_date,author,post_img)
          VALUES('{$title}','{$description}','{$short_description}',{$category},{$sub_category},'{$date}',{$author},'{$filename}');";
  $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin-side/post.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
