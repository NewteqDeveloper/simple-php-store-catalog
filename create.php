<?php
// Include database connection file
require_once "database/connection.php";
require_once "validations/validation.php";

// Define variables and initialize with empty values
$name = $description = $category = $price = "";
$name_err = $description_err = $category_err = $price_err = $img_err = "";
$image;
$img_err = "start";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_name = trim($_POST["name"]);
    list($name, $name_err) = validateName($input_name);
    
    $input_description = trim($_POST["description"]);
    list($description, $description_err) = validateDescription($input_description);

    $category = trim($_POST["category"]);
    list($category, $category_err) = validateCategory($category);

    $price = trim($_POST["price"]);
    list($price, $price_err) = validatePrice($price);

    // $allowTypes = array('jpg','png','jpeg','gif');
    // $img_err = $img_err . $_FILES["imgfile"]["name"];
    // $img_err = $img_err . $_FILES['imgfile']['size'];
    // $fileType = pathinfo(basename($_FILES["imgfile"]["name"]), PATHINFO_EXTENSION);
    // $img_err = $img_err . $fileType;
    // if (!isset($_REQUEST['check']) && empty($_FILES["imgfile"]["tmp_name"])) {
    //   $img_err = $img_err . 'File required';
    // } elseif ($_FILES['imgfile']['size'] > 1024000) {
    //   $img_err = 'File too big';
    // } elseif (!in_array($fileType, $allowTypes)) {
    //   $img_err =  $img_err . 'Not allowed type';
    // } else {
    //   $img_err = '';
    // }
    
    // Check input errors before inserting in database
    // if(empty($name_err) && empty($description_err) && empty($category_err) && empty($price_err) && empty($img_err)){
      if(empty($name_err) && empty($description_err) && empty($category_err) && empty($price_err)){
      require_once "mysql/update.php";
      insertDb($mysqli, $name, $description, $price, $category);
      //$image = addslashes(file_get_contents($_FILES['imgfile']['tmp_name']));
      //insertDbWithFile($mysqli, $name, $description, $price, $category, $image);
      // if ($_FILES['imgfile']['tmp_name']!='') {
      //   insertDbWithFile($mysqli, $name, $description, $price, $category, $image);
      // } else {
      //   // insertDb($mysqli, $name, $description, $price, $category);
      // }
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Add Game</h2>
                    </div>
                    <p>Please fill this form and submit to add a new game record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($category_err)) ? 'has-error' : ''; ?>">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control" value="<?php echo $category; ?>">
                            <span class="help-block"><?php echo $category_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="number" min="0" max="200" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <!-- <div class="form-group <?php echo (!empty($img_err)) ? 'has-error' : ''; ?>">
                            <label>Image</label>
                            <input type="file" name="imgFile" class="form-control"/>
                            <span class="help-block"><?php echo $img_err;?></span>
                            <input type = "hidden" name = "check">
                        </div> -->
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>