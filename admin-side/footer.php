<footer>

<div class="row" style=" background-color: #000;  padding: 3rem; ">
          <div class="col-lg-2 col-md-2 col-sm-1 col-0"></div>
          <div class="col-lg-8 col-md-8 col-sm-10 col-12 text-center">
         
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
              
<script src="js/bootstrap.bundle.min.js"></script>

<script src="js/jquery-3.5.1.js"></script>

</body>

</html>


<style>

footer .text-center span {
    color: #fff;
    font-size: 1.5rem;
    font-weight: 500;
}

footer .text-center span a {
    color: #fff;
    font-size: 1.5rem;
    font-weight: 500;
}

footer .text-center span a:hover {
    color: #c43b68;
    font-size: 1.5rem;
    font-weight: 500;
}


</style>