<div class="headline">


    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-4 text-center " style="padding:0 .1rem 0 0;">
            <div class="headline-bn-black">
                <h4><b>Breaking News</b></h4>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-8 text-start" style="padding:0 0 0 0;">
            <div class="headline-black">
                <marquee>

                    <h4>

                        <?php
        include "config.php";

        /* Calculate Offset Code */
        $limit = 5;

        $sql = "SELECT post.post_id, post.title, post.post_date,
        category.category_name,post.category,post.post_img FROM post
        LEFT JOIN category ON post.category = category.category_id
        ORDER BY post.post_id DESC LIMIT {$limit}";

        $result = mysqli_query($conn, $sql) or die("Query Failed. : Recent Post");
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)) {
      ?>

                        <a
                            href="single.php?pid=<?php echo $row['post_id']; ?>&id=<?php echo $row['sub_category']; ?>"><?php  echo ($row['title']). ".      "; ?></a>


                        <?php
      }
    }
    ?></h4>
                </marquee>
            </div>
        </div>
    </div>

</div>

<style>
    .right {
        padding: 0px 0 9px 0;
        border-left: 1px solid #000;
    }
</style>

