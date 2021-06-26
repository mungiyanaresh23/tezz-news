<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin-side/nav.php");
}
if(isset($_POST['submit'])){
  include "config.php";

  $userid =mysqli_real_escape_string($conn,$_POST['user_id']);
  $fname =mysqli_real_escape_string($conn,$_POST['f_name']);
  $lname = mysqli_real_escape_string($conn,$_POST['l_name']);
  $user = mysqli_real_escape_string($conn,$_POST['username']);
  $role = mysqli_real_escape_string($conn,$_POST['role']);

  $sql = "UPDATE user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}', role = '{$role}' WHERE user_id = {$userid}";

    if(mysqli_query($conn,$sql)){
      header("Location: {$hostname}/admin-side/users.php?page={$_GET['page']}");
    }
}
?>
     <div class="row px-2 bottom" style="background:#dc35;">
    <div class="col-sm-4 col-4 text-center" style=" width:33.5%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="nav.php">Back Dashboard</a>
    </div>


    <div class="col-sm-4 col-4 text-center" style=" width:33%; margin: 1rem 0rem 0rem 0rem;">
        <h1> Modify User Details</h1>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:33.5%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="users.php">Back Page</a>
    </div>
</div>
<br>


<div class="main_div1">

    <div class="box1">
                <?php
                include "config.php";
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM user WHERE user_id = {$user_id}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="inputBox">
                          <input type="hidden" name="user_id"  value="<?php echo $row['user_id'];  ?>">
                      </div>
                          <div class="inputBox">
                          <input type="text" name="f_name"  value="<?php echo $row['first_name'];  ?>" autocomplete="off" required>
                          <label><i class="fas fa-user-circle"></i>First Name</label>
                           </div>
                      <div class="inputBox">
                          <input type="text" name="l_name"  value="<?php echo $row['last_name'];  ?>" autocomplete="off" required>
                           <label><i class="far fa-user-circle"></i>Last Name</label>
                          </div>
                      <div class="inputBox">
                          <input type="text" name="username"  value="<?php echo $row['username'];  ?>" autocomplete="off" required>
                          <label><i class="fas fa-user"></i>User Name</label>
                          </div>
                      <div class="inputBox">
                          <label style="padding: 0 0 0 0;"><i class="fas fa-user-tag"></i>User Role</label>
                          <br>
                          <select class="inputBox" name="role" value="<?php echo $row['role']; ?>" style=" font-size:1.3rem; width: 100%; margin-top: 2rem; outline: none;">
                            <?php
                              if($row['role'] == 1){
                                echo "<option class='inputBox' style='font-size:1.3rem;' value='0'>normal User</option>
                                      <option class='inputBox' style='font-size:1.3rem;' value='1' selected>Admin</option>";
                              }else{
                                echo "<option class='inputBox' style='font-size:1.3rem;' value='0' selected>normal User</option>
                                      <option class='inputBox' style='font-size:1.3rem;' value='1'>Admin</option>";
                              }
                            ?>
                          </select>
                      </div>
                      <br>
                      <input type="submit" name="submit"  value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?php
                }
              }
                   ?>
              </div>
          </div>
      
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
        height: 100%;
        position: relative;
    }

    .box1 {
        width: 45rem;
        position: absolute;
        top: 21rem;
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
        margin-bottom: 1.5rem;
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline: none;
    }

    .box1 .inputBox label {
        position: absolute;
        top: 0;
        left: 0;
        letter-spacing: .1rem;
        padding: 1rem 0rem;
        font-size: 1.6rem;
        color: #fff;
        transition: 0.5s;
        font-weight: 700;
        font-style: normal;
    }

    .box1 .inputBox label i {
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