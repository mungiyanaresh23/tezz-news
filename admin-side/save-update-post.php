<?php
  include "config.php";  
  session_start();
  
  if(!empty($_POST['submit']))
{
   
  $title =  $_POST['post_title'];
  $description =  $_POST['postdesc'];

  // $short_description = substr($description,0,130) . "&#8230";

  $short_description = $description;

  $category = $_POST['category'];
  $sub_category = $_POST['sub_category'];
  $date = date("d M, Y");
  $author = $_SESSION['user_id'];

  $old_image = $_POST['old_image'];

  $filename = $_FILES['new_image']['name'];

  $tmp = $_FILES['new_image']['tmp_name'];

  if(!empty($filename)){
  
  move_uploaded_file($tmp,"upload/".$filename);

  if (isset($old_image) && ($old_image != $filename)) {
    unlink("upload/" . $old_image);
   
  }
     


    $sql = "UPDATE post SET title='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',short_description='{$short_description}',category={$_POST["category"]},sub_category={$_POST["sub_category"]},post_img='{$filename}'
        WHERE post_id={$_POST["post_id"]};";
       
      if($_POST['old_category'] != $_POST["category"] ){
          $sql .= "UPDATE category SET post= post - 1 WHERE category_id = {$_POST['old_category']};";
          $sql .= "UPDATE category SET post= post + 1 WHERE category_id = {$_POST["category"]};";
        }

    $result = mysqli_multi_query($conn,$sql);

    if($result){
      header("location: {$hostname}/admin-side/post.php?page={$_POST['hero']}");
    }else{
      header("location: {$hostname}/admin-side/post.php?page={$_POST['hero']}");
    }

  }
  else{
    $sql = "UPDATE post SET title='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',short_description='{$short_description}',category={$_POST["category"]},sub_category={$_POST["sub_category"]}
        WHERE post_id={$_POST["post_id"]};";

      if($_POST['old_category'] != $_POST["category"] ){
         $sql .= "UPDATE category SET post= post - 1 WHERE category_id = {$_POST['old_category']};";
         $sql .= "UPDATE category SET post= post + 1 WHERE category_id = {$_POST["category"]};";
           }
    $result = mysqli_multi_query($conn,$sql);

    if($result){
      header("location: {$hostname}/admin-side/post.php?page={$_POST['hero']}");
    }else{
      header("location: {$hostname}/admin-side/post.php?page={$_POST['hero']}");
    
    }

  }

  
 
}