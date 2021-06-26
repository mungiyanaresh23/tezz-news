<?php include "header.php" ?>

 <!-- -------------------------------- -->
 <div class="container-fluid pt-4">
            <div class="row px-5">

                <div class=" col-sm-12 col-12 card  px-3 py-2 text-center" style="background:#dc35;">
                    <h1><b>Dashboard</b></h1>
                </div>

            </div>
        </div>

        <div class="container-fluid px-5 py-3 ">
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-6 col-6  px-3 py-3   text-center">
<?php
include "config.php";
?>


<?php
$sql = "SELECT COUNT(*) AS count FROM post";
$query_result = mysqli_query($conn, $sql);
 
while($row = mysqli_fetch_assoc($query_result)) 
{
$output = $row['count'];
 }
?>


                    <div class="panel panel-info">
                        <a href="post.php">
                            <div class="panel-heading">
                                <div class="row ">
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-rss fa-9x"></i>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <h3 class="announcement-heading"><?php echo $output;?></h3>
                                        <h4 class="announcement-text"><strong>Post</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="panel-footer">
                            <a href="post.php">
                                <div class="row">
                                    <div class="col-sm-6 col-6">
                                        <h3> view</h3>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-arrow-circle-right fa-2x"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <!-- ------------ -->

                <?php
                              if($_SESSION["user_role"] == '1'){
                            ?>


<?php
$sql = "SELECT COUNT(*) AS count FROM category";
$query_result = mysqli_query($conn, $sql);
 
while($row = mysqli_fetch_assoc($query_result)) 
{
$output = $row['count'];
 }
?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-6   px-3 py-3  text-center">

                    <div class="panel panel-danger">
                        <a href="category.php">
                            <div class="panel-heading">
                                <div class="row ">
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-tag fa-9x"></i>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <h3 class="announcement-heading"><?php echo $output;?></h3>
                                        <h4 class="announcement-text"><strong>Category</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="panel-footer">
                            <a href="category.php">
                                <div class="row">
                                    <div class="col-sm-6 col-6">
                                        <h3> view</h3>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-arrow-circle-right fa-2x"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <!-- ------------ -->
                <?php
$sql = "SELECT COUNT(*) AS count FROM sub_category";
$query_result = mysqli_query($conn, $sql);
 
while($row = mysqli_fetch_assoc($query_result)) 
{
$output = $row['count'];
 }
?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-6   px-3 py-3  text-center">

                    <div class="panel panel-warning">
                        <a href="sub-category.php">
                            <div class="panel-heading">
                                <div class="row ">
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-tags fa-9x"></i>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <h3 class="announcement-heading"><?php echo $output;?></h3>
                                        <h4 class="announcement-text"><strong>Sub Category</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="panel-footer">
                            <a href="sub-category.php">
                                <div class="row">
                                    <div class="col-sm-6 col-6">
                                        <h3> view</h3>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-arrow-circle-right fa-2x"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <!-- ------------ -->


                <div class="col-lg-4 col-md-4 col-sm-6 col-6   px-3 py-3  text-center">

                    <div class="panel panel-sucess">
                        <a href="settings.php">
                            <div class="panel-heading">
                                <div class="row ">
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-desktop fa-9x"></i>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <h3 class="announcement-heading">1</h3>
                                        <h4 class="announcement-text"><strong>Web Settings</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="panel-footer">
                            <a href="settings.php">
                                <div class="row">
                                    <div class="col-sm-6 col-6">
                                        <h3> view</h3>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-arrow-circle-right fa-2x"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <!-- ------------ -->
                <?php
$sql = "SELECT COUNT(*) AS count FROM user";
$query_result = mysqli_query($conn, $sql);
 
while($row = mysqli_fetch_assoc($query_result)) 
{
$output = $row['count'];
 }
?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-6  px-3 py-3 text-center">

                    <div class="panel panel-info">
                        <a href="users.php">
                            <div class="panel-heading">
                                <div class="row ">
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-user fa-9x"></i>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <h3 class="announcement-heading"> <?php echo"$output";?></h3>
                                        <h4 class="announcement-text"><strong>Admin User</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="panel-footer">
                            <a href="users.php">
                                <div class="row">
                                    <div class="col-sm-6 col-6">
                                        <h3> view</h3>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-arrow-circle-right fa-2x"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <!-- ------------ -->

                <?php
$sql = "SELECT COUNT(*) AS count FROM post";
$query_result = mysqli_query($conn, $sql);
 
while($row = mysqli_fetch_assoc($query_result)) 
{
$output = $row['count'];
 }
?>


                <div class="col-lg-4 col-md-4 col-sm-6 col-6  px-3 py-3 text-center">

                    <div class="panel panel-danger">
                        <a href="upload">
                            <div class="panel-heading">
                                <div class="row ">
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-images fa-9x"></i>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <h3 class="announcement-heading"><?php echo"$output";?></h3>
                                        <h4 class="announcement-text"><strong>Post Image</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="panel-footer">
                            <a href="upload">
                                <div class="row">
                                    <div class="col-sm-6 col-6">
                                        <h3> view</h3>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <i class="fas fa-arrow-circle-right fa-2x"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <?php
                  }
               ?>

                <!-- ------------ -->
            </div>

        </div>
