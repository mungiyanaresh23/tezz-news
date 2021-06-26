<?php include "header.php"; ?>


<!-- ----------------------------- -->

<div class="row px-2 bottom" style="background:#dc35;">
    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
           <a  class="btn btn-outline-dark" href="nav.php">Back Dashboard</a>
       
    </div>
   
    <div class="col-sm-4 col-4 text-center" style=" width:30%; margin: 1rem 0rem 0rem 0rem;">
    <h1 >All Category</h1>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
    <a  class="btn btn-outline-dark"  href="add-category.php">Add Category</a>
    </div>
</div>
<br>

<div class="post-border" style="border: 1px solid #000; padding: 0 .8rem 0 .8rem;">
<div class="row px-2 py-2 bg-white">
            <div class="top"></div>
            <div class="col-sm-1 col-1 left right" style="padding:0 0 0 0; width:10%; justify-content: center">
                <h3 style="">S.No.</h3>
            </div>
            <div class="col-sm-2 col-2 right" style="padding:0 0 0 0; width: 30%; justify-content: center">
                <h3 style=";">CATEGORY NAME</h3>
            </div>
            <div class="col-sm-2 col-2 right" style="padding:0 0 0 0; width: 25%; justify-content: center">
                <h3 style="">NO. OF POSTS</h3>
            </div>
            <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width:13%; justify-content: center">
                <h3 style="">Status</h3>
            </div>
            <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width:10%; justify-content: center">
                <h3 style="">Edit</h3>
            </div>
            <div class="col-sm-1 col-1 right" style="padding:0 0 0 0; width: 12%; justify-content: center">
                <h3 style="">Delete</h3>
            </div>
            <div class="bottom"></div>

        </div>


    <div class="row px-2 py-2 bg-white">
    <?php
                include 'config.php';// database configuration
                 /* Calculate Offset Code */
                  $limit = 5;
                  if(isset($_GET["page"])){
                      $page = $_GET["page"];
                  }
                  else{
                      $page = 1;
                  };
                  $offset = ($page-1)* $limit;
              /* select query with offset and limit */
              $sql = "SELECT * FROM  category ORDER BY category_id DESC Limit $offset,$limit";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                $serial = $offset + 1;
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
        
        <div class="top"></div>
        <div class="left col-sm-1 col-1 right" style="padding:0 0 0 0; width: 10%; justify-content: center">
            <h1 class='id'><?php echo $serial; ?></h1>
        </div>
        <div class="col-sm-2 col-2 right" style="padding:1rem 0 0 0; width: 30%; justify-content: center">
            <h5><?php echo $row['category_name']; ?></h5>
        </div>
        <div class="col-sm-2 col-2 right" style="padding:1rem 0 0 0; width: 25%; justify-content: center">
            <h5><?php echo $row['post']; ?></h5>
        </div>

        <div class="col-sm-2 col-2 right" style="padding:1rem 0 0 0; width: 13%; justify-content: center">
            <h5>
                <?php

				if($row['category_status']==1){
                    echo'<a href="category-status.php?id='.$row['category_id'].'&page='.$page.''.'&ope=0" style="background: #198754;
                    color: #fff; padding: .5rem; border-radius: 0.25rem;">Active</a>';
                }else{
                   
                    echo'<a href="category-status.php?id='.$row['category_id'].'&page='.$page.''.'&ope=1"  style="background: #dc3545;
                    color: #fff; padding: .5rem; border-radius: 0.25rem;">Deactive</a>';
                }

                ?>
            </h5>
        </div>
            
        <div class="col-sm-1 col-1 right" style="padding:1rem 0 0 0; width: 10%; justify-content: center">
            <h5><a class="text-center" href='update-category.php?id=<?php echo $row['category_id']; ?>&page=<?php echo $page; ?>'><i class='fa fa-edit'></i></a></h5>
        </div>
        <div class="col-sm-1 col-1 right" style="padding:1rem 0 0 0; width: 12%; justify-content: center">
            <h5><a href='delete-category.php?id=<?php echo $row['category_id']; ?>&page=<?php echo $page; ?>'><i
                        class='fa fa-trash'></i></a></h5>
        </div>
        <div class="bottom"></div>

        <?php
                          $serial++;
                        } ?>
    </div>

    <?php
                          }
                        else{
                          echo "<h2>No Record Found.</h2>";
                        }
                ?>

</div>
    <div class="row" style=" background-color: #fff;  margin: 2rem 0 1rem; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);">
        <div class="col-sm-2 col-2" style="padding:0 0 0 0; width: 20%; justify-content: center"></div>
        <div class="col-sm-8 col-8" style="padding:0 0 0 0; width: 60%; justify-content: center">
        <div class="admin-pagination">
             <nav aria-label="Page navigation example">

                <?php
             // select count() query for pagination
             $sql1 = "SELECT COUNT(category_id) FROM category";
             $result_1 = mysqli_query($conn,$sql1);
             $row_db = mysqli_fetch_row($result_1);
             $total_record = $row_db[0];
             $total_page = ceil( $total_record / $limit);
             // show pagination
               echo '<ul class="pagination justify-content-center">';
               if($page > 1){
                 echo '<li class="page-item">
                  <a class="page-link" href="category.php?page='.($page - 1).'">Previous</a>
                </li>';
              } if($total_record > $limit){
              for($i = 1; $i <= $total_page; $i++){
                if($i == $page){
                  $active = "active";
                }else{
                  $active = "";
                }
                echo '<li class="page-item"><a class="'.$active.'" class="page-link" href="category.php?page='.$i.'">'.$i.'</a></li>';
                }
            
              if($total_page > $page){
                echo '<li class="page-item">
                <a class="page-link" href="category.php?page='.($page + 1).'">Next</a>
                </li>';
              }

              echo '</ul>';
            }
            ?>

            </nav>
        </div>
        </div>
    </div>


    <!-- -------------------------- -->



    <!--  -->




    <!-- <script src="js/bootstrap.bundle.min.js"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->

</body>

</html>

<style>
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
</style>