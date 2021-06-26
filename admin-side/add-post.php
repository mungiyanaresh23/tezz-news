<?php include "header.php"; ?>

<script src="js/jquery-3.5.1.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>


<!-- <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script> -->

<div class="row px-2 bottom" style="background:#dc35;">
    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="nav.php">Back Dashboard</a>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:30%; margin: 1rem 0rem 0rem 0rem;">
        <h1>Add Post</h1>
    </div>

    <div class="col-sm-4 col-4 text-center" style=" width:35%; padding:2.2rem;">
        <a class="btn btn-outline-dark" href="post.php"> Back Page</a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-10 col-10" style="margin-left:auto; margin-right: auto;">

        <!-- Form -->
        <form action="save-post.php" method="POST" enctype="multipart/form-data">

            <!-- -------------------Alert Message----------------------- -->
            <?php  if(isset($_SESSION["status"])){  ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="background:#fff;">
                <strong>
                    <h5>Hey!</h5>
                </strong> <?php echo $_SESSION["status"];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php unset ($_SESSION["status"]); }  ?>

            <!-- -------------------Alert Message----------------------- -->

            <div class="form-group">

                <div class="row">
                    <div class="col-md-3 col-12">
                        <label for="post_title">Title</label>
                    </div>
                    <div class="col-md-9 col-12 text-center">
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                </div>

            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-md-3 col-12">
                        <label for="exampleInputPassword1"> Description</label>
                    </div>
                    <div class="col-md-9 col-12 text-center">
                        <textarea name="postdesc" class="form-control" id="editor1" rows="3" required></textarea>
                    </div>
                </div>

            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-md-3 col-12">
                        <label for="exampleInputPassword1">Category</label>
                    </div>
                    <div class="col-md-9 col-12 text-center">
                        <select name="category" class="form-control" id="category">
                            <option disabled selected> Select Category</option>
                            <?php
                              include 'config.php';
                              $result = mysqli_query($conn,"SELECT * FROM category Where category_status='1'");
                           
			                  while($row = mysqli_fetch_array($result)) {
			                ?>
				            <option value="<?php echo $row["category_id"];?>"><?php echo $row["category_name"];?></option>
			                <?php
			                  }
			                ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-md-3 col-12">
                        <label for="exampleInputPassword1">Sub Category</label>
                    </div>
                    <div class="col-md-9 col-12 text-center">
                        <select name="sub_category" class="form-control" id="sub_category">
                            <option disabled selected> Select Sub Category</option>
                            
                        </select>
                    </div>
                </div>

            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-sm-3 col-4">
                        <label for="exampleInputPassword1">Post image</label>
                    </div>
                    <div class="col-sm-9 col-8 text-start">
                        <input type="file" name="fileToUpload" required style="font-size:1.5rem">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12 col-12 text-center">
                    <input type="submit" name="submit" value="Save" required />
                </div>
            </div>
            <br><br>
        </form>
        <!--/Form -->
    </div>
</div>


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

<!-- --------------------------------- -->

<script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "get_sub_category.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#sub_category").html(dataResult);
				}
			});
		
		
	});
});
</script>

<!-- --------------------------------- -->


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