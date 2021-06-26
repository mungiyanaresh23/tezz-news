<div id="sidebar">

    <div class="no-mobile">

        <!-- search box -->
        <div class="card">
            <h4>Search</h4>
            <hr>
            <br>
            <div class="card">
                <form class="search-post" action="search.php" method="GET">

                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
                        </span>
                        <input type="text" name="search" class="form-control" placeholder="Search .....">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-danger">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <!-- /search box -->

        <?php include "newslive.php";?>

    </div>

    <div class="card">
        <h4>Weather Report</h4>
        <hr>
        <br>
        <?php include "weather.php";?>

    </div>

    <!-- <div class="card">
        <h4>Calender</h4>
        <?php //include "calender.php";?>
       
    </div> -->

    <div class="card">
        <h4>Daily Horoscopes</h4>
        <hr>
        <br>
        <div class="card">
            <script type="text/javascript" src="//100widgets.com/js_data.php?id=204"></script>
        </div>
    </div>

    <div class="card">
        <h4>Recent Post</h4>

        <?php
                        include "config.php";

                        /* Calculate Offset Code */
                        $limit = 4;
                        if(isset($_GET['page'])){
                          $page = $_GET['page'];
                        }else{
                          $page = 1;
                        }
                        $offset = ($page - 1) * $limit;

                        // $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.author,
                        // category.category_name,user.username,post.category,post.post_img FROM post
                        // LEFT JOIN category ON post.category = category.category_id
                        // LEFT JOIN user ON post.author = user.user_id
                        $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.post_img,post.author,
                        category.category_name,sub_category.sub_category_name,user.username,post.category,post.sub_category FROM post
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN sub_category ON post.sub_category = sub_category.sub_category_id
                        LEFT JOIN user ON post.author = user.user_id
                        ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)) {
                    ?>
        <hr><br>
        <div class="row">
            <div class="col-sm-12">

                <div class="maxwidth200" style=" max-width: 100%;">
                    <div class="imgwrapper">
                        <a href="single.php?pid=<?php echo $row['post_id']; ?>&cid=<?php echo $row['category']; ?>&id=<?php echo $row['sub_category']; ?>">
                            <img src="admin-side/upload/<?php echo $row['post_img']; ?>" alt="" style="left: 0;"></a>
                    </div>
                </div>

            </div>

            <div class="col-sm-12">

                <div class='post-info'>
                    <h3>
                        <a
                            href='single.php?pid=<?php echo $row['post_id']; ?>&id=<?php echo $row['sub_category']; ?>&cid=<?php echo $row['category']; ?>'><?php echo $row['title']; ?></a>
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
                    <p > <?php echo substr($row['description'],0,130) . "&#8230"; ?></p>

                    <br>

                    <a class="btn btn-outline-dark"
                        href="single.php?pid=<?php echo $row['post_id']; ?>&id=<?php echo $row['sub_category']; ?>&cid=<?php echo $row['category']; ?>">Read
                        More</a>
                </div>

            </div>
        </div>

        <?php
            }
               }else{
                echo "<h2>No Record Found.</h2>";
                    }
        ?>
    </div>

</div>


<style>
   .btn-outline-dark {
    font-weight: 600;
    font-size: 1.3rem;
    float: right;
}
    p {
        font-size: 1.3rem;
    }
</style>