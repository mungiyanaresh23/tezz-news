<!-- slider -->
<div class="slider">
  <div class="carousel owl-carousel" style="margin-bottom: -2rem;">

    <?php
        include "config.php";

        /* Calculate Offset Code */
        $limit = 6;

$sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.post_img,post.author,
category.category_name,sub_category.sub_category_name,user.username,post.category,post.sub_category FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN sub_category ON post.sub_category = sub_category.sub_category_id
LEFT JOIN user ON post.author = user.user_id
 ORDER BY post.post_id DESC LIMIT {$limit}";


        $result = mysqli_query($conn, $sql) or die("Query Failed. : Recent Post");
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)) {
      ?>



    <div class="card card-1">
      <div class="row">

        <div class="col-sm-12">

          <div class="maxwidth200" style=" max-width: 100%;">
            <div class="imgwrapper">
              <a href="single.php?pid=<?php echo $row['post_id']; ?>&cid=<?php echo $row['category']; ?>&id=<?php echo $row['sub_category']; ?>">
                <img src="admin-side/upload/<?php echo $row['post_img']; ?>" alt="" style="left: 0;">
              </a>
            </div>
          </div>

        </div>
        <div class="col-sm-12">

          <div class="post-info">
            <h4 class="abc">
              <a
                href="single.php?pid=<?php echo $row['post_id']; ?>&cid=<?php echo $row['category']; ?>&id=<?php echo $row['sub_category']; ?>"><?php  echo substr($row['title'],0,130) . "&#8230"; ?></a>
            </h4>

            <div class="post-meta">

              <div class="no-mobile">

                <div class="no-meta">

                  <span class="post-tags">
                    <a href='sub_category.php?id=<?php echo $row['sub_category']; ?>'>
                      <i class="fa fa-tags" aria-hidden="true"></i>
                      <?php  echo $row['sub_category_name']; ?>
                    </a>
                  </span>

                  <span class="post-date published">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['post_date']; ?>
                  </span>

                </div>

                <div class="meta">
                  
                      <span class="post-tags">
                        <a href='category.php?id=<?php echo $row['category']; ?>'>
                          <i class="fa fa-tag" aria-hidden="true"></i>
                          <?php  echo $row['category_name']; ?>
                        </a>
                      </span>
                    <br>
                      <span class="post-tags">
                        <a href='sub_category.php?id=<?php echo $row['sub_category']; ?>'>
                          <i class="fa fa-tags" aria-hidden="true"></i>
                          <?php  echo $row['sub_category_name']; ?>
                        </a>
                      </span>
                    <br>
                      <span class="post-date published">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <?php echo $row['post_date']; ?>
                      </span>
                   
                </div>
              </div>



              <div class="mobile">



                <div class="meta">

                  <span class="post-tags">
                    <a href='category.php?id=<?php echo $row['category']; ?>'>
                      <i class="fa fa-tag" aria-hidden="true"></i>
                      <?php  echo $row['category_name']; ?>
                    </a>
                  </span>

                </div>


                <span class="post-tags">
                  <a href='sub_category.php?id=<?php echo $row['sub_category']; ?>'>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <?php  echo $row['sub_category_name']; ?>
                  </a>
                </span>

                <div class="meta">

                  <span class='post-author'>

                    <a href='author.php?aid=<?php echo $row['author']; ?>'>
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <?php echo $row['username']; ?></a>
                  </span>

                </div>

                <span class="post-date published">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  <?php echo $row['post_date']; ?>
                </span>
              </div>

            </div>
            <div class="col-container-1">
              <div class="col">
                <p class="post-snippet"><?php echo substr($row['description'],0,130) . "&#8230"; ?></p>
          </div>
            </div>    
           
            <a class="btn btn-outline-dark"
              href="single.php?pid=<?php echo $row['post_id']; ?>&id=<?php echo $row['sub_category']; ?>&cid=<?php echo $row['category']; ?>">Read More</a>


          </div>

        </div>

      </div>
    </div>

    <?php
      }
    }
    ?>

  </div>
</div>
<!-- slider -->

<style>

  .btn-outline-dark {
    font-weight: 600;
    font-size: 1.3rem;
    float: right;
  }
</style>

<script>
  $(".carousel").owlCarousel({
    margin: 8,
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        nav: false
      },
      600: {
        items: 2,
        nav: false
      },
      1000: {
        items: 3,
        nav: false
      }
    }
  });
</script>

<style>
  p {
    font-size: 1.3rem;

  }
</style>