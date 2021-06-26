<?php include "header.php"; ?>

<script src="js/jquery-3.5.1.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>


<div class="row px-2 bottom" style="background:#dc35; margin-left:0; margin-right:0;">
    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="nav.php">Back Dashboard</a>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:30%; margin: 1rem 0rem 0rem 0rem;">
        <h1>Update Post</h1>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="post.php"> Back Page</a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-10 col-10" style="margin-left:auto; margin-right: auto;">
    <?php
        include "config.php";

        $post_id = $_GET['id'];
        $sql = "SELECT post.post_id, post.title, post.description,
                    category.category_name,sub_category.sub_category_name,user.username,post.category,post.post_img,post.sub_category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN sub_category ON post.sub_category = sub_category.sub_category_id
                    LEFT JOIN user ON post.author = user.user_id
                     WHERE post.post_id = {$post_id}";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)) {
      ?>
        <!-- Form -->
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data">

 <!-- -------------------Alert Message----------------------- -->
 <?php  if(isset($_SESSION["status"])){  ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert" style="background:#fff;">
<strong><h5>Hey!</h5></strong> <?php echo $_SESSION["status"];?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  
<?php unset ($_SESSION["status"]); }  ?>

<!-- -------------------Alert Message----------------------- -->

            <div class="form-group">

              <input type="hidden" name="post_id" class="form-control" value="<?php echo $row['post_id']; ?>">
           
                <div class="row">
                    <div class="col-md-3 col-12">
                        <label for="post_title">Title</label>
                    </div>
                    <div class="col-md-9 col-12 text-center">
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required
                         value="<?php echo $row['title']; ?>">
                    </div>
                </div>

            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-md-3 col-12">
                        <label for="exampleInputPassword1"> Description</label>
                    </div>
                    <div class="col-md-9 col-12 text-center">
                        <textarea name="postdesc" class="form-control" id="editor1" rows="5" required>
                        <?php echo $row['description']; ?>
                        </textarea>
                    </div>
                </div>

            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-md-3 col-12">
                        <label for="exampleInputPassword1">Category</label>
                    </div>
                    <div class="col-md-9 col-12 text-center">
                    <select class="form-control" name="category" id="category">
                    <option disabled> Select Category</option>
                    <?php
                    include "config.php";
                    $sql1 = "SELECT * FROM category Where category_status='1'";

                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                    if(mysqli_num_rows($result1) > 0){
                      while($row1 = mysqli_fetch_assoc($result1)){
                        if($row['category'] == $row1['category_id']){
                          $selected = "selected";
                        }else{
                          $selected = "";
                        }
                        echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                       
                      }
                    }
                  ?>
                </select>
                <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
            </div>
                </div>

            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-md-3 col-12">
                        <label for="exampleInputPassword1">Sub Category</label>
                    </div>
                    <div class="col-md-9 col-12 text-center">
                     <select class="form-control" name="sub_category" id="sub_category" >
                    <!-- <option disabled> Select Sub Category</option> -->
                    <?php
                    include "config.php";
                    $category_id = $row['category'];
                    $sql1 = "SELECT * FROM sub_category WHERE category_id='$category_id' AND sub_category_status = '1'";

                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                    if(mysqli_num_rows($result1) > 0){
                      while($row1 = mysqli_fetch_assoc($result1)){
                        if($row['sub_category'] == $row1['sub_category_id']){
                          $selected = "selected";
                        }else{
                          $selected = "";
                        }
                        echo "<option {$selected} value='{$row1['sub_category_id']}'>{$row1['sub_category_name']}</option>";
                      }
                    }
                  ?>
                </select>
                        <input type="hidden" name="old_sub_category" value="<?php echo $row['sub_category']; ?>">
                    </div>
                </div>

            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-sm-3 col-4">
                        <label for="exampleInputPassword1">Post image</label>
                    </div>
                    <div class="col-sm-9 col-8 text-start">

                    <input type="hidden" name="old_image" value="<?php echo $row['post_img']; ?>">

                     <input type="file" name="new_image" style="font-size:1.5rem">
                        
                    <img src="upload/<?php echo $row['post_img']; ?>" width="180px">   
                         
                    </div>
                </div>
               <!-- ---------------------------------------- -->
                <?php   $hero = $_GET['page']; ?>
                <input type="hidden" name="hero" value="<?php echo $hero;?>">
               <!-- ---------------------------------------- -->
              </div>

            <div class="row">
                <div class="col-sm-12 col-12 text-center">
                    <input type="submit" name="submit" value="Update" required />
                </div>
            </div>
            <br><br>
        </form>
        <!--/Form -->
        <script>
    CKEDITOR.addCss('.cke_editable { font-size: 1rem;}');

    CKEDITOR.replace('editor1', {
      toolbar: [
        // {
        //   name: 'document',
        //   items: ['Print']
        // },
        {
          name: 'styles',
          items: ['Format', 'Font', 'FontSize']
        },
        {
          name: 'clipboard',
          items: ['Undo', 'Redo']
        },
        '/',
        {
          name: 'colors',
          items: ['TextColor', 'BGColor']
        },
        {
          name: 'align',
          items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        },
        
        {
          name: 'basicstyles',
          items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
        },
        {
          name: 'links',
          items: ['Link', 'Unlink']
        },
        {
          name: 'paragraph',
          items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
        },
        {
          name: 'tools',
          items: ['Maximize']
        },
      
      ],

      extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

      // Adding drag and drop image upload.
      extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
     
      height: 250,

      removeDialogTabs: 'image:advanced;link:advanced'
    });
  </script>


        <?php
          }
        }else{
          echo "Result Not Found.";
        }
        ?>
    </div>
</div>

<script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "get_sub_category.php",
				type: "POST",
				data: { category_id: category_id },
				cache: false,
				success: function(dataResult){
					$("#sub_category").html(dataResult);
				}
			});
				
	});
});
</script>


<?php include "footer.php"; ?>


<style>

.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--bs-gutter-y) * -1);
    margin-right: calc(var(--bs-gutter-x)/ 0);
    margin-left: calc(var(--bs-gutter-x)/ 0);
}
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

    .form-group {
        padding: .8rem 0;

    }

    .form-group label {
        font-size: 1.8rem;
    }

    .form-group .form-control {
        font-size: 1.4rem;
    }

    input[type="submit"] {
        width: 30%;
        background: transparent;
        border: none;
        outline: none;
        color: #fff;
        background: #000;
        padding: 0.5rem;
        margin: 5rem 0 0 0;
        border-radius: 2.5rem;
        font-size: 2rem;
        font-weight: 600;
    }

    input:hover[type="submit"] {
        /* background:  #03a9f4; */
        background: red;
        color: #fff;
    }
</style>