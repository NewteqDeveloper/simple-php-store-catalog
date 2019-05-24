<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include database connection file
    require_once "database/connection.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM SimpleProducts WHERE ID = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            if($result->num_rows == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);
                
                $name = $row["Name"];
                $description = $row["Description"];
                $price = $row["Price"];
                $category = $row["Category"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    $stmt->close();
    
    // Close connection
    $mysqli->close();
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                        <h1><?php echo $name; ?></h1>
                    </div>
                    <div class="row">
<div class='col-3'>
<div class='card'>
  <img src='https://i.ebayimg.com/images/g/w~YAAOSw8HBZHJUZ/s-l300.jpg' class='card-img-top' alt='game-image'>
  <div class='card-body'>
    <p class='card-text'><div>
    <div class="form-group">
                    <label><h6>Description</h6></label>
                        <p class="form-control-static"><?php echo $description; ?></p>
                    </div>
                    <div class="form-group">
                    <label><h6>Price</h6></label>
                        <p class="form-control-static">R <?php echo $price; ?></p>
                    </div>
                    <div class="form-group">
                    <label><h6>Category</h6></label>
                        <p class="form-control-static"><?php echo $category; ?></p>
                    </div>
    </div></p>
    <a href="index.php" class="btn btn-primary">Back</a>
  </div>
</div>
</div>
</div>              
                    <p></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>