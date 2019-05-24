<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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
                <?php
                // Include database connection file
                require_once "database/connection.php";
                    
                echo "<div class='page-header clearfix'>";
                echo "<h2 class='pull-left'>Store Catalog</h2>";
                // check if we can add
                $sql = "select * from SimpleProducts";
                if($result = $mysqli->query($sql)){
                    if($result->num_rows < 5){
                      echo "<a href='create.php' class='btn btn-success mb-3'>Add New Game</a>";
                    }
                  }
                echo "</div>";
                ?>    
                    <?php
                    // Include config file
                    require_once "database/connection.php";
                    
                    // get products
                    $sql = "select * from SimpleProducts";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<div class='row'>";      
                                while($row = $result->fetch_array()){
                                  echo "<div class='col-md-3 col-sm-6 col-12'>";
                                  echo "<div class='card'>";
                                  echo $row['Image'];
                                  if ($row['Image']) {
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Image'] ).'"/>';
                                  } else {
                                    echo "  <img src='https://i.ebayimg.com/images/g/w~YAAOSw8HBZHJUZ/s-l300.jpg' class='card-img-top' alt='game-image'>";
                                  }
                                  echo "  <div class='card-body'>";
                                  echo "    <h5 class='card-title'>" . $row["Name"] . "</h5>";
                                  echo "    <p class='card-text'>" . $row["Description"] . "</p>";
                                  echo "    <a href='read.php?id=". $row['ID'] ."' class='btn btn-primary m-2'>View More</a>";
                                  echo "    <a href='update.php?id=". $row['ID'] ."' class='btn btn-secondary m-2'>Update</a>";
                                  echo "    <a href='delete.php?id=". $row['ID'] ."' class='btn btn-danger m-2' onclick='return confirm('Are you SURE you want to delete " . $row['Name'] . "'?')'>Remove</a>";
                                  echo "  </div>";
                                  echo "</div>";
                                  echo "</div>";
                                }
                            echo "</div>";
                            // Free result set
                            $result->free();
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "There was a database problem " . $mysqli->error;
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>