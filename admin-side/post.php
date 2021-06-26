<?php include "header.php"; ?>
<div class="row px-2 bottom" style="background:#dc35;">
    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
           <a  class="btn btn-outline-dark" href="nav.php">Back Dashboard</a>
       
    </div>
   
    <div class="col-sm-4 col-4 text-center" style=" width:30%; margin: 1rem 0rem 0rem 0rem;">
    <h1 >All Post</h1>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
    <a  class="btn btn-outline-dark"  href="add-post.php">Add Post</a>
    </div>
</div>
<br>

<div class="post-border" style="border: 1px solid #000; padding: 0 .8rem 0 .8rem;">
    <div class="row px-2 py-2 bg-white">
        <div class="top"></div>
        <div class="col-sm-1 col-1 left right" style="padding:0 0 0 0; width: 8%; justify-content: center">
            <h3 style="">S.No.</h3>
        </div>
        <div class="col-sm-2 col-2 right" style="padding:0 0 0 0; width: 19%; justify-content: center">
            <h3 style=";">Title</h3>
        </div>
        <div class="col-sm-2 col-2 right" style="padding:0 0 0 0; width: 15%; justify-content: center">
            <h3 style="">Category</h3>
        </div>
        <!-- <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width: 10%; justify-content: center">
            <h3 style="">Date</h3>
        </div> -->
        <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width: 15%; justify-content: center">
            <h3 style="">Sub Category</h3>
        </div>
        <div class="col-sm-2 col-2 right" style="padding:0 0 0 0; width: 25%; justify-content: center">
            <h3 style="">Author</h3>
        </div>
        <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width: 7%; justify-content: center">
            <h3 style="">Edit</h3>
        </div>
        <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width: 11%; justify-content: center">
            <h3 style="">Delete</h3>
        </div>
        <div class="bottom"></div>

    </div>

    <?php
                  include "config.php"; // database configuration
                  /* Calculate Offset Code */
                  $limit = 5;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;

                  if($_SESSION["user_role"] == '1'){
                    /* select query of post table for admin user */
                    $sql = "SELECT post.post_id, post.title, post.description,post.post_date,
                    category.category_name,sub_category.sub_category_name,user.username,post.category,post.sub_category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN sub_category ON post.sub_category = sub_category.sub_category_id
                    LEFT JOIN user ON post.author = user.user_id
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                  }elseif($_SESSION["user_role"] == '0'){
                    /* select query of post table for normal user */
                    $sql = "SELECT post.post_id, post.title, post.description,post.post_date,
                    category.category_name,sub_category.sub_category_name,user.username,post.category,post.sub_category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN sub_category ON post.sub_category = sub_category.sub_category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.author = {$_SESSION['user_id']}
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                  }

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>

    <div class="row px-2 py-2 bg-white">
        <?php
                        $serial = $offset + 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
        <div class="top"></div>
        <div class="left col-sm-1 col-1 right" style="padding:0 0 0 0; width: 8%; justify-content: center">
            <h1 class='id'><?php echo $serial; ?></h1>
        </div>
        <div class="col-sm-2 col-2 right" style="padding:0 0 0 0; width: 19%; justify-content: center">
            <h5><?php echo $row['title']; ?></h5>
        </div>
        <div class="col-sm-2 col-2 right" style="padding:0 0 0 0; width: 15%; justify-content: center">
            <h5><?php echo $row['category_name']; ?></h5>
        </div>
        <!-- <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width: 10%; justify-content: center">
            <h5><?php //echo $row['post_date']; ?></h5>
        </div> -->
        <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width: 15%; justify-content: center">
            <h5><?php echo $row['sub_category_name']; ?></h5>
        </div>
        <div class="col-sm-2 col-2 right" style="padding:0 0 0 0; width: 25%; justify-content: center">
            <h5><?php echo $row['username']; ?></h5>
        </div>
        <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width: 7%; justify-content: center">
            <h5><a href='update-post.php?id=<?php echo $row['post_id']; ?>&page=<?php echo $page; ?>' ><i class='fa fa-edit'></i></a></i></h5>
        </div>
        <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width: 11%; justify-content: center">
            <h5><a href='delete-post.php?id=<?php echo $row['post_id']; ?>&cid=<?php echo $row['category']; ?>&page=<?php echo $page; ?>'><i
                        class='fa fa-trash'></i></a></h5>
        </div>
        <div class="bottom"></div>

        <?php
                          $serial++;
                        } ?>
    </div>

    <?php
                          }
                        else{
                          echo "<h2>No Record Found.</h2>";
                        }
                ?>

</div>
    <div class="row" style=" background-color: #fff;  margin: 2rem 0 1rem; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);">
        <div class="col-sm-2 col-2" style="padding:0 0 0 0; width: 20%; justify-content: center"></div>
        <div class="col-sm-8 col-8" style="padding:0 0 0 0; width: 60%; justify-content: center">
        <div class="admin-pagination">
             <nav aria-label="Page navigation example">

                <?php
             // show pagination
             if($_SESSION["user_role"] == '1'){
                /* select query of post table for admin user */
                $sql1 = "SELECT * FROM post";
              }elseif($_SESSION["user_role"] == '0'){
                /* select query of post table for normal user */
                $sql1 = "SELECT * FROM post
                WHERE author = {$_SESSION['user_id']}";
              }
              $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

              if(mysqli_num_rows($result1) > 0){

                $total_records = mysqli_num_rows($result1);

                $total_page = ceil($total_records / $limit);
               echo '<ul class="pagination justify-content-center">';
               if($page > 1){
                 echo '<li class="page-item">
                  <a class="page-link" href="post.php?page='.($page - 1).'">Previous</a>
                </li>';
              }
              for($i = 1; $i <= $total_page; $i++){
                if($i == $page){
                  $active = "active";
                }else{
                  $active = "";
                }
                echo '<li class="page-item"><a class="'.$active.'" class="page-link" href="post.php?page='.$i.'">'.$i.'</a></li>';
              }
              if($total_page > $page){
                echo '<li class="page-item">
                <a class="page-link" href="post.php?page='.($page + 1).'">Next</a>
                </li>';
              }

              echo '</ul>';
            }
            ?>

            </nav>
        </div>
        </div>
    </div>





</div>

</div>

<?php //include "footer.php"; ?>


<style>
     .btn-outline-dark {
        font-weight: 600;
        font-size: 1.3rem;
    }

    h1,
    h3,
    h5 {

        font-weight: 600;
        text-align: center;
        padding: 1rem 0rem 1rem 0rem;
    }
</style>