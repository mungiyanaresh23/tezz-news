<?php include "header.php"; ?>

<div class="row px-2 bottom" style="background:#dc35;">
    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="nav.php">Back Dashboard</a>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:30%; margin: 1rem 0rem 0rem 0rem;">
        <h1>Add Category</h1>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="category.php"> Back Page</a>
    </div>
</div>
<br>



<div class="main_div1">

    <div class="box1">
        <!-- Form Start -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">

            <div class="inputBox">
                <input type="text" name="category" autocomplete="off" required>
                <label><i class="fa fa-tag"></i>Category Name</label>
            </div>

             <input type="submit" name="save" value="Save">

        </form>
        <!-- /Form End -->
    </div>
</div>

<?php
    if( isset($_POST['save']) ){
        // database configuration
        $conn = mysqli_connect("localhost","root","","tezz-news") or die("Connection failed : " . mysqli_connect_error());

        $category =mysqli_real_escape_string($conn, $_POST['category']);
        /* query for check input value exists in category table or not*/
        $sql = "SELECT category_name FROM category where category_name='{$category}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)> 0) {
            // if input value exists
            echo "<p style = 'color:red;text-align:center;margin: 10px 0';> Category already exists.</p>";
        }else{
            // if input value not exists
             /* query for insert record in category name */
            $sql = "INSERT INTO category (category_name,category_status)
                    VALUES ('{$category}','1')";

            if (mysqli_query($conn, $sql)){
                header("location: {$hostname}/admin-side/category.php");
            }else{
              echo "<p style = 'color:red;text-align:center;margin: 10px 0';>Query Failed.</p>";
            }
        }
    }
    //mysqli_close($conn);

    
  ?>


<?php include "footer.php"; ?>


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



.main_div1{
    width:100%;
    height: 100vh;
    position: relative;
}

.box1{
    width: 45rem;
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%,-50%);
    padding: 3.5rem 5rem;
    background: rgba(0, 0, 0, 0.8);    
    border-radius: 1rem;
}


.box1 h1{
    margin-bottom: 3rem;
    color: #fff;
    text-align: center;
    text-transform: capitalize;
}

.box1 h1 hr{
    width: 60%;
    margin-left: auto;
    margin-right: auto;
    padding: 0 0 0 0;
}

.box1 .inputBox{
    position: relative;
}

.box1 .inputBox input{
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

.box1 .inputBox label{
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

.box1 .inputBox label i{
    padding: 0rem 1rem 0rem 0rem;
}

.box1 .inputBox input:focus ~ label,
.box1 .inputBox input:valid ~ label{
    top: -2rem;
    left: 0;
    color: #03a9f4;
    font-size: 1.2rem;
}

.box1 input[type="submit"]{
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

.box1 input:hover[type="submit"]{
    background:  #03a9f4;
    color: #fff;
}

</style>