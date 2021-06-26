<?php include "header.php"; ?>

<div class="container-fluid" style=" padding: ;">


  <div class="news-content">


    <div class="container-fluid">
      <div class="row" style="background-color: ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">

          <?php include "headline.php"; ?>

        </div>
      </div>
    </div>


    <div class="mobile">

      <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-12 col-12">
          <div id="sidebar">



            <!-- search box -->
            <div class="card">
              <h4>Search</h4>
              <hr>


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

        </div>

        <div class="col-lg-8 col-md-7 col-sm-12 col-12">
          <?php include "card-slider.php";?>
        </div>

        <div class="col-lg-4 col-md-5 col-sm-12 col-12">
          <br>
          <?php include "newslive.php";?>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-lg-8 col-md-7 col-sm-12 col-12">
        <div class="no-mobile">
          <?php include "card-slider.php";?>
        </div>


        <?php
                    include "config.php";
                    
                    /* Calculate Offset Code */
                    $limit = 10;
                    if(isset($_GET['page'])){
                      $page = $_GET['page'];
                    }else{
                      $page = 1;
                    }
                    $offset = ($page - 1) * $limit;

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

        <div class="card">
          <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">

              <div class="maxwidth200" style=" max-width: 100%;">
                <div class="imgwrapper">
                  <a href="single.php?pid=<?php echo $row['post_id']; ?>&cid=<?php echo $row['category']; ?>&id=<?php echo $row['sub_category']; ?>">
                    <img src="admin-side/upload/<?php echo $row['post_img']; ?>" alt="" style="left: 0;"></a>
                </div>
              </div>


            </div>


            <div class="col-lg-7 col-md-12 col-sm-12 col-12">

              <div class='post-info'>
                <h3 style="color:#000;">
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


                <p> <?php echo substr($row['description'],0,140) . "&#8230"; ?> </p>

                <br>
                <a class="btn btn-outline-dark"
                  href="single.php?pid=<?php echo $row['post_id']; ?>&id=<?php echo $row['sub_category']; ?>&cid=<?php echo $row['category']; ?>">Read
                  More</a>
              </div>

            </div>
          </div>
        </div>


        <?php
                          }
                        }else{
                          echo "<h2 class='card'>No Record Found.</h2>";
                        }
                ?>


        <div class="row"
          style=" background-color: #fff;  margin: 2rem 0 1rem; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);">
          <div class="col-lg-2 col-md-3 col-sm-1 col-1"></div>
          <div class="col-lg-8 col-md-6 col-sm-10 col-10">
            <nav aria-label="Page navigation example">
              <?php

include "config.php";
  $sql1 = "SELECT * FROM post";   

  $result1 = mysqli_query($conn, $sql1);


                    // show pagination
                    if(mysqli_num_rows($result1) > 0){

                      $total_records = mysqli_num_rows($result1);
  
                      $total_page = ceil($total_records / $limit);

                    echo '<ul class="pagination justify-content-center"">';
                    if($page > 1){
                      echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page - 1).'">Previous</a></li>';
                    }
                    for($i = 1; $i <= $total_page; $i++){
                      if($i == $page){
                        $active = "active";
                      }else{
                        $active = "";
                      }
                      echo '<li class="page-item"><a  class="'.$active.'" class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($total_page > $page){
                      echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page + 1).'">Next</a></li>';
                    }

                    echo '</ul>';
                  }
                else{
                  echo "<h2 class='card'>No Record Found.</h2>";
                }
                  ?>

            </nav>
          </div>
        </div>


      </div>
      <div class="col-lg-4 col-md-5 col-sm-12 col-12">


        <?php include "sidebar.php";?>

      </div>

    </div>

  </div>
</div>


<?php include "footer.php";?>


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