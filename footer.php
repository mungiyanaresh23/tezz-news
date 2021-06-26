<footer>

<div class="row" style=" background-color: #000;  padding: 3rem; ">
          <div class="col-lg-2 col-md-2 col-sm-1 col-0"></div>
          <div class="col-lg-8 col-md-8 col-sm-10 col-12 text-center">
         
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


<?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
              ?>
                <span style="">
                <?php echo $row['footerdesc']; ?>
                </span>
              <?php
                }
              }
              ?>

          </div>
        </div>
        

</div>

</footer>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60af380b1b9f4ca0"></script>
                        

<!-- Bootstrap Bundle with Popper -->
<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="js/bootstrap.bundle.min.js.map.js"></script> -->
<script src="js/bootstrap.min.js"></script> 
<!-- <script src="js/bootstrap.min.js.map.js"></script> -->

<!-- <script src="js/calender.js"></script> -->

<!-- Separate Popper and Bootstrap JS -->

<!-- <script src="js/popper.min.js"></script>-->
         