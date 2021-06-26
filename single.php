<?php include "header.php"; ?>

<div class="container-fluid">


    <div class="news-content">


        <div class="container-fluid">
            <div class="row" style="background-color: ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php include "headline.php"; ?>

                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 col-12">

                <div class="row card">




                    <?php
                 $post_id = $_GET['pid'];
              

                     $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.post_img,post.author,
                          category.category_name,sub_category.sub_category_name,user.username,post.category,post.sub_category FROM post
                          LEFT JOIN category ON post.category = category.category_id
                          LEFT JOIN sub_category ON post.sub_category = sub_category.sub_category_id
                          LEFT JOIN user ON post.author = user.user_id
                          WHERE post.post_id = {$post_id}";

                 $result = mysqli_query($conn, $sql) or die("Query Failed.");
                 if(mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_assoc($result)) {
                 ?>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class='post-info'>
                            <h3 class='post-title'>
                                <?php echo $row['title']; ?>
                            </h3>
                            <div class='post-meta'>

                                <span class="post-tags">
                                    <a href='category.php?id=<?php echo $row['category']; ?>'>
                                        <i class="fa fa-tag" aria-hidden="true"></i>
                                        <?php echo $row['category_name']; ?>
                                    </a>
                                </span>

                                <span class="post-tags">
                                    <a href='sub_category.php?id=<?php echo $row['sub_category']; ?>'>
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <?php echo $row['sub_category_name']; ?>
                                    </a>
                                </span>

                                <span class='post-author'>

                                    <a href='author.php?aid=<?php echo $row['author']; ?>'>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <?php echo $row['username']; ?></a>
                                </span>

                                <span class='post-date published'><i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']; ?>
                                </span>
                            </div>



                        </div>



                        <div class="maxwidth200" style=" max-width: 50%;">
                            <div class="imgwrapper">
                                <a class="text-center"><img style="border: 2px solid #000;"
                                        src="admin-side/upload/<?php echo $row['post_img']; ?>" alt=""></a>

                            </div>
                        </div>
                        <br>

                        <p>
                            <h4><?php echo $row['description']; ?></h4>
                        </p>
                        <hr>
                        <div class='post-info'>
                            <h1>Share News
                                <hr style="width:20%;">
                            </h1>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <!-- <div class="addthis_inline_share_toolbox"></div>
                       -->
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox_tdl6"></div>


                        </div>
                        <hr>

                    </div>

                    <?php
                  }
                  }else{
                  echo "<h2>No Record Found.</h2>";
                      }

                  ?>

                </div>



                <!-- ------------------------------------------ -->



                <div id="sidebar">
                    <!-- search box -->
                    <div class="card">
                        <h4>Related News</h4>
                      
                    </div>
                    <?php
                  include "config.php";
                  if(isset($_GET['cid'])){
                  $category_id = $_GET['cid'];

                 


                    /* Calculate Offset Code */
                    $limit = 3;
                    if(isset($_GET['page'])){
                      $page = $_GET['page'];
                    }else{
                      $page = 1;
                    }
                    $offset = ($page - 1) * $limit;

                    $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.author,post.post_img,
                    category.category_name,sub_category.sub_category_name,user.username,post.category,post.sub_category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN sub_category ON post.sub_category = sub_category.sub_category_id
                    LEFT JOIN user ON post.author = user.user_id

                    WHERE post.category = {$category_id}
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)) {
                  ?>

                   
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="maxwidth200" style=" max-width: 100%;">
                                    <div class="imgwrapper">
                                        <a
                                            href="single.php?pid=<?php echo $row['post_id']; ?>&cid=<?php echo $row['category']; ?>&id=<?php echo $row['sub_category']; ?>">
                                            <img src="admin-side/upload/<?php echo $row['post_img']; ?>" alt=""
                                                style="left: 0;"></a>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-7 col-md-12 col-sm-12 col-12">

                                <div class='post-info'>
                                    <h3 class='post-title'>
                                        <a
                                            href='single.php?pid=<?php echo $row['post_id']; ?>&cid=<?php echo $row['category']; ?>&id=<?php echo $row['sub_category']; ?>'><?php echo $row['title']; ?></a>
                                    </h3>
                                    <div class='post-meta'>

                                        <span class="post-tags">
                                            <a href='category.php?id=<?php echo $row['category']; ?>'>
                                                <i class="fa fa-tag" aria-hidden="true"></i>
                                                <?php echo $row['category_name']; ?>
                                            </a>
                                        </span>

                                        <span class="post-tags">
                                            <a href='sub_category.php?pid=<?php echo $row['sub_category']; ?>'>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <?php echo $row['sub_category_name']; ?>
                                            </a>
                                        </span>

                                        <span class='post-author'>

                                            <a href='author.php?aid=<?php echo $row['author']; ?>'>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <?php echo $row['username']; ?></a>
                                        </span>

                                        <span class='post-date published'><i class="fa fa-calendar"
                                                aria-hidden="true"></i>
                                            <?php echo $row['post_date']; ?>
                                        </span>
                                    </div>
                                    <p class='post-snippet'>
                                        <?php echo substr($row['description'],0,130) . "&#8230"; ?></p>

                                    <br>
                                    <!-- <button class="btn btn-outline-primary" ><a href="single.php?id=<?php// echo $row['post_id']; ?>"></a>Share News</button> -->
                                    <a class="btn btn-outline-dark"
                                        href="single.php?pid=<?php echo $row['post_id']; ?>&id=<?php echo $row['sub_category']; ?>&cid=<?php echo $row['category']; ?>">Read
                                        More</a>
                                </div>

                            </div>
                        </div>
                      
</div>

                        <?php
                          }
                        }
                    }
                   ?>
                    

                </div>
            </div>

            <!-- ---------------------------- -->

            <div class="mobile">

                <div class="row">

                    <div class="col-lg-4 col-md-5 col-sm-12 col-12">
                        <br>
                        <?php include "newslive.php";?>
                    </div>
                </div>

            </div>

            <!-- </div> -->



            <div class="col-lg-4 col-md-5 col-sm-12 col-12">

                <?php include "sidebar.php";?>

            </div>

        </div>


    </div>


    <?php include "footer.php";?>

</div>

<style>
    p {
        font-size: 1.6rem;
    }

    .post-info .post-title a:hover {
        color: #000;
    }
</style>