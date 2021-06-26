<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin-side/nav.php");
}
?>

<div class="row px-2 bottom" style="background:#dc35;">
  <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
    <a class="btn btn-outline-dark" href="nav.php">Back Dashboard</a>
  </div>


  <div class="col-sm-4 col-4 text-center" style=" width:30%; margin: 1rem 0rem 0rem 0rem;">
    <h1>Update Sub Category</h1>
  </div>

  <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
    <a class="btn btn-outline-dark" href="sub-category.php">Back Page</a>
  </div>
</div>
<br>


<div class="main_div1">

  <div class="box1">

    <?php
        include 'config.php';
          $sub_category_id = $_GET['id'];
          /* query record for modify*/
          $sql = "SELECT * FROM sub_category LEFT JOIN category ON sub_category.category_id = category.category_id
           WHERE sub_category_id ='{$sub_category_id}'";

          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) { ?>
    <!-- Form Start -->
    <br>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

 
      <!-- <div class="form-group">
                      <input type="hidden" name="category_id"  class="form-control" value="">
                  </div> -->
      <div class="form-group">
       

        <label for="category_name"><i class="fa fa-tag"></i>Select category Name </label>
       
        <select type="text" name="select_category_id" class="inputBox" value=""  placeholder=""
          style="width: 100%;  margin-top: 5rem; outline: none;" required>
          <option class="inputBox" value="">Select Category</option>


          <?php
                    
                    $sql = "SELECT * FROM category WHERE category_status='1'";
                     $result1 = mysqli_query($conn, $sql);
                     while($data = mysqli_fetch_assoc($result1)) {
                    
                    ?>
          <option class="inputBox" value="<?php echo $data['category_id']; ?>"
          
           <?php if(in_array($row['category_name'],$data)){
             echo "selected";
           }?>>
           
           <?php echo $data['category_name']; ?>
          </option>
          <?php
                        }
                    ?>
        </select>
      </div>


<br>
<br>
      <div class="inputBox">
        <input type="hidden" name="sub_category_id" value="<?php echo $row['sub_category_id']; ?>">
      </div>
      
      <div class="inputBox">
        <label><i class="fa fa-tags"></i>Sub Category Name</label>
        <br><br>
        <input type="text" name="sub_category_name" value="<?php echo $row['sub_category_name']; ?>" placeholder=""  autocomplete="off" required>
      </div>

      <input type="submit" name="submit" value="Update" />
    </form>
    <!-- Form End-->
    <?php
              }
          }
        ?>
  </div>
</div>
</div>
</div>
<?php
  if(isset($_POST['submit'])){
    /* query for update category table */
    $sql1 = "UPDATE sub_category SET category_id='{$_POST['select_category_id']}', sub_category_name='{$_POST['sub_category_name']}'  WHERE  sub_category_id={$_POST['sub_category_id']}";

    if (mysqli_query($conn,$sql1)){
      // redirect all category page
      header("location: {$hostname}/admin-side/sub-category.php?page={$_GET['page']}");
    }
  }
  ?>

<?php //include "footer.php"; ?>







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



  .main_div1 {
    width: 100%;
    height: 100vh;
    position: relative;
  }

  .box1 {
    width: 45rem;
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 3.5rem 5rem;
    background: rgba(0, 0, 0, 0.8);
    border-radius: 1rem;
  }


  .box1 h1 {
    margin-bottom: 3rem;
    color: #fff;
    text-align: center;
    text-transform: capitalize;
  }

  .box1 h1 hr {
    width: 60%;
    margin-left: auto;
    margin-right: auto;
    padding: 0 0 0 0;
  }

  .box1 .inputBox {
    position: relative;
  }

  .box1 .inputBox input {
    width: 100%;
    padding: 1rem;
    font-size: 1.6rem;
    color: #fff;
    letter-spacing: .1rem;
    margin-bottom: 3rem;
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
  }

  .box1 .inputBox label {
    position: absolute;
    letter-spacing: .1rem;
    padding: 1rem 0rem;
    font-size: 1.6rem;
    color: #fff;
    transition: 0.5s;
    font-weight: 700;
  }



  .form-group {
    font-size: 1.5rem;
    font-weight: 600;
  }

  .box1 .form-group label {
    position: absolute;
    /* top: 0; */
    /* left: 0; */
    letter-spacing: .1rem;
    padding: 1rem 0rem;
    font-size: 1.6rem;
    color: #fff;
    transition: 0.5s;
    font-weight: 700;
  }

  .box1 .inputBox label i,
  .box1 .form-group label i {
    padding: 0rem 1rem 0rem 0rem;
  }

  .box1 .inputBox input:focus~label,
  .box1 .inputBox input:valid~label {
    top: -2rem;
    left: 0;
    color: #03a9f4;
    font-size: 1.2rem;
  }

  .box1 input[type="submit"] {
    width: 100%;
    background: transparent;
    border: none;
    outline: none;
    color: #000;
    background: #fff;
    padding: .5rem;
    border-radius: 2.5rem;
    font-size: 2rem;
    font-weight: 600;
  }

  .box1 input:hover[type="submit"] {
    background: #03a9f4;
    color: #fff;
  }
</style>