<?php

  include "config.php";
  $page = basename($_SERVER['PHP_SELF']);
  switch($page){
    case "single.php":
      if(isset($_GET['pid'])){
        $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['pid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['title'];
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "category.php":
      if(isset($_GET['id'])){
        $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['id']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['category_name'] . " News";
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "sub_category.php":
      if(isset($_GET['id'])){
        $sql_title = "SELECT * FROM sub_category WHERE sub_category_id = {$_GET['id']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['sub_category_name'] . " News";
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "author.php":
      if(isset($_GET['aid'])){
        $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = "News By " .$row_title['first_name'] . " " . $row_title['last_name'];
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "search.php":
      if(isset($_GET['search'])){

        $page_title = $_GET['search'];
      }else{
        $page_title = "No Search Result Found";
      }
      break;
    default :
      $sql_title = "SELECT websitename FROM settings";
      $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
      $row_title = mysqli_fetch_assoc($result_title);
      $page_title = $row_title['websitename'];
      break;
  }

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <title><?php echo $page_title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--  CSS  File-->
  <link href="css/tezz-news.css?v=<?php echo time();?>" rel="stylesheet">
  <!-- <link href="css/calender.css?v=<?php //echo time();?>" rel="stylesheet"> -->

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="icon/font-awesome.css" rel='stylesheet'>
  <link href="css/owl.carousel.min.css" rel="stylesheet">

  <!--  Icon CSS  File-->
  <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel='stylesheet'>

  <!--  Font CSS  File-->
  <link href="font/poppins.css" rel="stylesheet">

  <!--  Js  File-->
  <script src="js/jquery-3.5.1.js"></script>

  <script src="js/owl.carousel.min.js"></script>

  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en'
      }, 'google_translate_elememt');
    }
  </script>

  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
  </script>

</head>

<body>

  <div class="fixed">
    <div class="container-fluid">
      <div class="row" style="padding: 0 2.5rem; background:#000;">
        <div class="col-lg-5 col-md-5 col-sm-5 col-5" style="text-align: center;">
          <div id="google_translate_elememt"></div>
        </div>


        <div class="col-lg-2 col-md-2 col-sm-2 col-2" style="text-align: center;">
          <div class="date-no-mobile" style=" margin-top: 3px; margin-bottom: -6px;">
            <h12 style="font-size:1.6rem; color:#fff; margin: .6rem 0 0 0;">Date</h12>

            <script>
              window.addEventListener('load', function () {
                var lat, lng;

                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function (pos) {
                    console.log(pos);
                    lat = pos.coords.latitude;
                    lng = pos.coords.longitude;

                    api =
                      `http://api.weatherapi.com/v1/current.json?key=36a9b23e1d544cbfa5d180736211404&q=+${lat-2.1386486},${lng-1.36048}`;

                    fetch(api).then(function (res) {
                      return res.json();
                    }).then(function (data) {
                      console.log(data);
                      console.log(data.current.last_updated);

                      document.getElementsByTagName('h12')[0].innerHTML = data.current
                        .last_updated;
                    })

                  });


                } else {
                  console.log("Geolocation does not supported by this browser.");
                }



              })
            </script>
          </div>

          <div class="date-mobile">

            <h13 style="font-size:1rem; color:#fff; margin: .6rem 0 0 0;">Date</h13>

            <script>
              window.addEventListener('load', function () {
                var lat, lng;

                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function (pos) {
                    console.log(pos);
                    lat = pos.coords.latitude;
                    lng = pos.coords.longitude;

                    api =
                      `http://api.weatherapi.com/v1/current.json?key=36a9b23e1d544cbfa5d180736211404&q=+${lat-2.1386486},${lng-1.36048}`;

                    fetch(api).then(function (res) {
                      return res.json();
                    }).then(function (data) {
                      console.log(data);
                      console.log(data.current.last_updated);

                      document.getElementsByTagName('h13')[0].innerHTML = data.current
                        .last_updated;
                    })

                  });


                } else {
                  console.log("Geolocation does not supported by this browser.");
                }



              })
            </script>

          </div>

        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-5" style="text-align: center;">
          <div class="social-icon">
            <a href="">

              <i class="fab fa-twitter"></i></a>
            <a href="">
              <i class="fab fa-facebook"></i></a>
            <a href="">
              <i class="fab fa-google"></i></a>
            <a href="">
              <i class="fab fa-instagram"></i></a>
          </div>

        </div>
      </div>




      <div class="large-device">

        <nav class="navbar navbar-expand-lg" style="padding: 0.8rem 2.2rem; margin: -16px -8px;">
          <?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                    if($row['logo'] == ""){
                      echo '<a href="index.php"><h1>'.$row['websitename'].'</h1></a>';
                    }else{
                      echo '<a href="index.php" id="logo"><img src="admin-side/images/'. $row['logo'] .'" alt=""></a>';
                                                        //images/news-logo.png
                    }

                  }
                }
                ?>


          <div class="scrollmenu">

            <div class="collapse navbar-collapse" id="navbarNav">



              <ul class="navbar-nav">
                <li class="nav-item"><a class="<?php 
           $page1 = "/"."tezz/";
           if(isset($_GET['page'])){
           $page5 = $_GET['page'];
           
           $page1 = "/"."tezz/index.php?page="."$page5";
          }
         
          echo ($_SERVER['REQUEST_URI'] == $page1) ? 'active':'' ?>" href='<?php echo $hostname; ?>'>Home</a></li>



                <?php
          include "config.php";

        

           $sql="SELECT * FROM category WHERE category_status='1' ORDER BY category_id ASC";
           $category_result=mysqli_query($conn,$sql);

          
           while($row = mysqli_fetch_assoc($category_result))
             {
               	 
           
             ?>



                <li class="nav-item">
                  <a class="

              //  ------------------------------------------

             <?php 

            if(isset($_GET['id'])){
            $category_id = $_GET['id'];

             $page = $category_id;
              }

            echo ($row['category_id'] == $page) ? 'active':'';

            //  ------------------------------------------

            $category_id = $row['category_id'];

            if(isset($_GET['id'])){
              $sub_category_id = $_GET['id'];
            }

            $sql="SELECT * FROM sub_category WHERE sub_category_status='1' AND category_id='$category_id' ORDER BY sub_category_id ASC";
               $sub_category_result=mysqli_query($conn,$sql);
               
               if(mysqli_num_rows($sub_category_result)>0)
               $active = "";

           while($sub_category_rows=mysqli_fetch_assoc($sub_category_result)){

                           if(isset($_GET['id'])){
                              if($sub_category_rows['sub_category_id'] == $sub_category_id){
                                $active = "active";
                              }else{
                                $active = "";
                              }
    
                  echo $active;

           }        }

             //  ------------------------------------------ 

                 ?>" aria-expanded="false"
                    href="category.php?id=<?php echo $row['category_id']?>"><?php echo $row['category_name']?></a>

                  <?php
                    
                    $category_id = $row['category_id'];
                   
                    if(isset($_GET['id'])){
                      $sub_category_id = $_GET['id'];
                
                    }

                      $sql="SELECT * FROM sub_category WHERE sub_category_status='1' AND category_id='$category_id' ORDER BY sub_category_id ASC";
                                     $sub_category_result=mysqli_query($conn,$sql);
                                     
                                     if(mysqli_num_rows($sub_category_result)>0)

                                     $active = "";
                  ?>

                  <ul>
                    <?php


                        while($sub_category_rows=mysqli_fetch_assoc($sub_category_result)){

                            if(isset($_GET['id'])){
                              if($sub_category_rows['sub_category_id'] == $sub_category_id){
                                $active = "active";
                              }else{
                                $active = "";
                              }                             
                            }
                      
                          echo '<li>
                         <a class="'.$active.'" href="sub_category.php?id='.$sub_category_rows['sub_category_id'].'">'.$sub_category_rows['sub_category_name'].'</a></li>';
                         
                       } 
                       ?>

                  </ul>


                </li>
                <?php } ?>
              </ul>

            </div>

          </div>

        </nav>
      </div>


      <!-- <script>
        $(document).ready(function () {

            /* $(selector).hover( inFunction, outFunction ) */
            $('.nav-item').hover(
                function () {
                    $(this).find('ul').css({
                        "display": "block",
                        "margin-top": 0
                     
                    });
                },
                function () {
                    $(this).find('ul').css({
                        "display": "none",
                        "margin-top": 0
                    });
                }
            );

        });
    </script> -->


      <div class="small-device">



        <nav class="navbar navbar-expand-lg" style="padding: 0.8rem 2.2rem; margin: -16px -8px;">

          <?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                    if($row['logo'] == ""){
                      echo '<a href="index.php"><h1>'.$row['websitename'].'</h1></a>';
                    }else{
                      echo '<a href="index.php" id="logo"><img src="admin-side/images/'. $row['logo'] .'" alt=""></a>';
                                                        //images/news-logo.png
                    }

                  }
                }
                ?>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <div class="animated-icon">
              <span></span>
            </div>
            <div class="animated-icon1">
              <span></span>
            </div>
            <div class="animated-icon2">
              <span></span>
            </div>
          </button>



          <div class="collapse navbar-collapse" id="navbarNav">



            <ul class="navbar-nav">
              <li class="nav-item"><a class="<?php 
           $page1 = "/"."tezz/";
           if(isset($_GET['page'])){
           $page5 = $_GET['page'];
           
           $page1 = "/"."tezz/index.php?page="."$page5";
          }
         
          echo ($_SERVER['REQUEST_URI'] == $page1) ? 'active':'' ?>" href='<?php echo $hostname; ?>'>Home</a></li>



              <?php
          include "config.php";

        

           $sql="SELECT * FROM category WHERE category_status='1' ORDER BY category_id ASC";
           $category_result=mysqli_query($conn,$sql);

          
           while($row = mysqli_fetch_assoc($category_result))
             {
               	 
           
       ?>



              <li class="nav-item">
                <a class="

//  ------------------------------------------

<?php 

    if(isset($_GET['id'])){
    $category_id = $_GET['id'];

             $page = $category_id;
       }

 echo ($row['category_id'] == $page) ? 'active':'';

//  ------------------------------------------

$category_id = $row['category_id'];

if(isset($_GET['id'])){
  $sub_category_id = $_GET['id'];
}

$sql="SELECT * FROM sub_category WHERE sub_category_status='1' AND category_id='$category_id' ORDER BY sub_category_id ASC";
               $sub_category_result=mysqli_query($conn,$sql);
               
               if(mysqli_num_rows($sub_category_result)>0)
               $active = "";

           while($sub_category_rows=mysqli_fetch_assoc($sub_category_result)){

                           if(isset($_GET['id'])){
                              if($sub_category_rows['sub_category_id'] == $sub_category_id){
                                $active = "active";
                              }else{
                                $active = "";
                              }
    
                  echo $active;

           }        }

//  ------------------------------------------ 

?>" aria-expanded="false"
                  href="category.php?id=<?php echo $row['category_id']?>"><?php echo $row['category_name']?></a>

                <?php
                    
                    $category_id = $row['category_id'];
                   
                    if(isset($_GET['id'])){
                      $sub_category_id = $_GET['id'];
                
                    }

                      $sql="SELECT * FROM sub_category WHERE sub_category_status='1' AND category_id='$category_id' ORDER BY sub_category_id ASC";
                                     $sub_category_result=mysqli_query($conn,$sql);
                                     
                                     if(mysqli_num_rows($sub_category_result)>0)

                                     $active = "";
                  ?>

                <ul>
                  <?php


                        while($sub_category_rows=mysqli_fetch_assoc($sub_category_result)){

                            if(isset($_GET['id'])){
                              if($sub_category_rows['sub_category_id'] == $sub_category_id){
                                $active = "active";
                              }else{
                                $active = "";
                              }                             
                            }
                      
                          echo '<li>
                         <a class="'.$active.'" href="sub_category.php?id='.$sub_category_rows['sub_category_id'].'">'.$sub_category_rows['sub_category_name'].'</a></li>';
                         
                       } 
                       ?>

                </ul>


              </li>
              <?php } ?>
            </ul>



          </div>

        </nav>



      </div>

    </div>
  </div>