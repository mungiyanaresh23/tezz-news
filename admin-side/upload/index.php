<?php

  include "config.php";
  session_start();

  if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/admin-side/");
  }
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="../css/tezz_news.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="../css/bootstrap.min.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="../font/poppins.css?v=<?php echo time();?>" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">

  <link href="css/bootstrap.css.map" rel="stylesheet" />
  <link href="css/bootstrap.min.css.map" rel="stylesheet" />

  <title></title>

</head>

<body>

  <div class="container-fluid bg-dark">
    <div class="row px-5 py-2">

      <div class="col-sm-6 col-6 text-start">
        <?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                    if($row['logo'] == ""){
                      echo '<a href="index.php"><h1>'.$row['websitename'].'</h1></a>';
                    }else{
                      echo '<a href="index.php" id="logo"><img src="../images/'. $row['logo'] .'" alt=""></a>';
                                                        //images/news-logo.png
                    }

                  }
                }
                ?>
      </div>
      <div class="col-sm-6 col-6">
        <h3 class="text-white text-end" style="padding: .5rem 0 0 0;"><?php echo $_SESSION["username"]; ?>
          <a class="btn btn-outline-light" href="../logout.php"><b>logout</b></a></h3>

      </div>
    </div>
  </div>

  <div class="row px-2 bottom" style="background:#dc35;">
    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
      <a class="btn btn-outline-dark" href="../nav.php">Back Dashboard</a>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:30%; margin: 1rem 0rem 0rem 0rem;">
      <h1>All Upload Images</h1>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
      <a class="btn btn-outline-dark" href="../nav.php"> Back Page</a>
    </div>
  </div>
    <!-- -------------------------- -->


  <?php
                  include "config.php"; // database configuration
                  /* Calculate Offset Code */
                  $limit = 8;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;

                
                    $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.post_img,
                    category.category_name,sub_category.sub_category_name,user.username,post.category,post.sub_category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN sub_category ON post.sub_category = sub_category.sub_category_id
                    LEFT JOIN user ON post.author = user.user_id
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                  

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>

  <div class="album pt-4 ">
    <div class="container-fulid mx-4">

      <div class="row">

      <?php
                        $serial = $offset + 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
        <div class="col-md-3 col-sm-4 col-6">
          <div class="card mb-4 box-shadow">
          
              <div class="maxwidth200" style=" max-width: 100%;">
                  <span class="badge"><h4 ><?php echo $serial; ?></h4></span>
                    <div class="imgwrapper">
                      <img src="<?php echo $row['post_img']; ?>" alt="" style="left: 0;">     
                    </div>
              </div>

              <div class="card-body"  style=" border: 2px solid #000;">
            
              <div class="d-flex justify-content-between align-items-center">
                <h4><?php echo $row['sub_category_name']; ?></h4>
                <small class="text-muted"><h4 style=color:#000;><?php echo $row['post_date']; ?></h4></small>
              </div>
            </div>
          </div>
        </div>

  <!-- -------------------------- -->
 



        <?php
                          $serial++;
                        } ?>
    
    </div>

</div>
</div>

    <?php
                          }
                        else{
                          echo "<h2>No Record Found.</h2>";
                        }
                ?>

    <div class="row" style=" background-color: #fff;  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);">
        <div class="col-sm-2 col-2" style="padding:0 0 0 0; width: 20%; justify-content: center"></div>
        <div class="col-sm-8 col-8" style="padding:0 0 0 0; width: 60%; justify-content: center">
        <div class="admin-pagination">
             <nav aria-label="Page navigation example">

                <?php
             // show pagination
           
              $sql1 = "SELECT * FROM post";
             
              $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

              if(mysqli_num_rows($result1) > 0){

                $total_records = mysqli_num_rows($result1);

                $total_page = ceil($total_records / $limit);
               echo '<ul class="pagination justify-content-center">';
               if($page > 1){
                 echo '<li class="page-item">
                  <a class="page-link" href="index.php?page='.($page - 1).'">Previous</a>
                </li>';
              }
              for($i = 1; $i <= $total_page; $i++){
                if($i == $page){
                  $active = "active";
                }else{
                  $active = "";
                }
                echo '<li class="page-item"><a class="'.$active.'" class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
              }
              if($total_page > $page){
                echo '<li class="page-item">
                <a class="page-link" href="index.php?page='.($page + 1).'">Next</a>
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

.maxwidth200 {
    max-width: 50%;
}

.imgwrapper {
    position: relative;
    padding: 31.15%;
    height: 0;
}

.imgwrapper img {
    position: absolute;
    top: 0;
    left: 50%;
    width: 100%;
    height: 100%;

    border: 2px solid #000;
}

.badge{
  padding: 0.5rem 1rem 0rem 1rem;
  margin: .5rem;
  font-size: 1rem;
  color:#000;
  background-color:#fff;
  z-index: 1111;
  position: absolute;
  border-radius: 0rem;
  
}

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

h4 {
    font-weight: 600;
    text-align: center;
}
</style>