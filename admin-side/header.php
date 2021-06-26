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

  <!-- TinyMCE File -->
  <!-- <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    
    <script>

    tinymce.init({
        selector: '#mytextarea',
        theme: "modern",
        height: 200,
        width: '100%',
    
        plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor code"
        ],

        toolba1 : "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
        toolba2 : "| link unlink anchor | image media | forecolor backcolor | print preview code | caption",

        image_caption : true,
        image_advtab: true
  });
    </script> -->
  <!-- TinyMCE File -->
  
  <!-- Bootstrap CSS -->
  <link href="css/tezz_news.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="css/bootstrap.min.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="font/poppins.css?v=<?php echo time();?>" rel="stylesheet">
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
                      echo '<a href="index.php" id="logo"><img src="images/'. $row['logo'] .'" alt=""></a>';
                                                        //images/news-logo.png
                    }

                  }
                }
                ?>
        </div>
        <div class="col-sm-6 col-6">
          <h3 class="text-white text-end" style="padding: .5rem 0 0 0;"><?php echo $_SESSION["username"]; ?>
            <a class="btn btn-outline-light" href="logout.php"><b>logout</b></a></h3>

        </div>
      </div>
    </div>

  <!-- -------------------------- -->