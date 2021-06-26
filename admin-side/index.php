<?php
  include "config.php";
  session_start();

  if(isset($_SESSION["username"])){
    header("Location: {$hostname}/admin-side/nav.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN | Login</title>

  <link href="css/tezz_news.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font/poppins.css" rel="stylesheet">

  <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel='stylesheet'>



</head>

<body>

  <div class="main_div">

    <div class="box">



      <div class="Logobox">
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
        <hr>
      </div>
      <h1>Admin Login
        <hr>
      </h1>

      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

  <!-- -------------------Alert Message----------------------- -->
  <?php  if(isset($_SESSION["status"])){  ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert" style="background:#fff;">
<strong><h5>Hey!</h5></strong> <?php echo $_SESSION["status"];?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  
<?php unset ($_SESSION["status"]); }  ?>

<!-- -------------------Alert Message----------------------- -->

        <div class="inputBox">
          <input type="text" name="username" autocomplete="off" required>
          <label><i class="fa fa-user"></i>Username</label>
        </div>

        <div class="inputBox">
          <input type="password" name="password" autocomplete="off" required>
          <label><i class="fas fa-lock"></i>Password</label>
        </div>
        
      

        <input type="submit" name="login" value="Login">

      </form>
      <?php
                          if(isset($_POST['login'])){
                            include "config.php";
                            if(empty($_POST['username']) || empty($_POST['password'])){
                              echo '<div class="alert alert-danger">All Fields must be entered.</div>';
                              die();
                            }else{
                              $username = mysqli_real_escape_string($conn, $_POST['username']);
                              $password = md5($_POST['password']);

                              $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password= '{$password}'";

                              $result = mysqli_query($conn, $sql) or die("Query Failed.");

                              if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_assoc($result)){
                                  session_start();
                                  $_SESSION["username"] = $row['username'];
                                  $_SESSION["user_id"] = $row['user_id'];
                                  $_SESSION["user_role"] = $row['role'];

                                  header("Location: {$hostname}/admin-side/nav.php");
                                }

                              }else{
                                $_SESSION["status"]="<h4>Username and Password are not matched.</h5>";
                                header("Location: {$hostname}/admin-side/");
                            }
                          }
                          }
                          
                        ?>
    </div>
  </div>


<?php include "footer.php"; ?>