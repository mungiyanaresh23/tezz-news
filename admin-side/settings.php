<?php include "header.php"; ?>

<div class="row px-2 bottom" style="background:#dc35;">
    <div class="col-sm-4 col-4 text-center" style=" width:30%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="nav.php">Back Dashboard</a>
    </div>


    <div class="col-sm-4 col-4 text-center" style=" width:40%; margin: 1rem 0rem 0rem 0rem;">
        <h1>Website Details Settings</h1>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:30%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="user-side/index.php">View Edit Settings</a>
    </div>
</div>
<br>




<?php
                  include "config.php";

                  $sql = "SELECT * FROM settings";

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)) {
               ?>

<div class="main_div1">

    <div class="box1">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

            <!-- <div class="inputBox">
                <input type="text" name="sub_cat_name" autocomplete="off" required>
                <label><i class="fa fa-tags"></i>Sub Category Name</label>
            </div> -->

            <div class="inputBox">

                <input type="text" name="website_name" value="<?php echo $row['websitename']; ?>" autocomplete="off"
                    required>
                <label><i class="fas fa-globe-americas"></i>Website Name</label>
            </div>


            <div class="inputBox">

                <img class="bg-dark" src="images/<?php echo $row['logo']; ?>" style="width: 80%; margin-top: 5rem;">
                <label><i class="fas fa-bolt"></i>Website Logo</label>

                <input type="file" name="logo">
                <input type="hidden" name="old_logo" value="<?php echo $row['logo']; ?>">
            </div>

            <div class="inputBox">

                <textarea name="footer_desc" style="margin-top: 5rem; font-size: 1.5rem; width:100%;" rows="3" required><?php echo $row['footerdesc']; ?></textarea>
                <label for="footer_desc"><i class="fas fa-audio-description"></i>Footer Description</label>
            </div>
<br>

            <input type="submit" name="submit" value="Save" required />


        </form>
    </div>

</div>

<?php
                      }
                     }
                    ?>






</div>
</div>

</div>

<?php// include "footer.php"; ?>



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
        width: 40rem;
        position: absolute;
        top: 22rem;
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
        margin-bottom: .5rem;
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
        color: #fff;
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