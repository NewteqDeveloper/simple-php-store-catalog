<?php

function insertDb($mysqli, $name, $description, $price, $category) {
  // Prepare an insert statement
  $sql = "INSERT INTO SimpleProducts (Name, Description, Price, Category) VALUES (?, ?, ?, ?)";
 
  if($stmt = $mysqli->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bind_param("ssds", $param_name, $param_description, $param_price, $param_cateogry);
      
      // Set parameters
      $param_name = $name;
      $param_description = $description;
      $param_price = $price;
      $param_cateogry = $category;
      
      // Attempt to execute the prepared statement
      if($stmt->execute()){
          // Records created successfully. Redirect to landing page
          header("location: index.php");
          exit();
      } else{
        echo "Something went wrong. Please try again later.";
      }
  }
   
  // Close statement
  $stmt->close();
}

function insertDbWithFile($mysqli, $name, $description, $price, $category, $file) {
  // Prepare an insert statement
  $sql = "INSERT INTO SimpleProducts (Name, Description, Price, Category, Image) VALUES (?, ?, ?, ?, ?)";
 
  if($stmt = $mysqli->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bind_param("ssdsb", $param_name, $param_description, $param_price, $param_cateogry, $param_file);
      
      // Set parameters
      $param_name = $name;
      $param_description = $description;
      $param_price = $price;
      $param_cateogry = $category;
      $param_file = $file;
      
      // Attempt to execute the prepared statement
      if($stmt->execute()){
          // Records created successfully. Redirect to landing page
          header("location: index.php");
          exit();
      } else{
        echo "Something went wrong. Please try again later.";
      }
  }
   
  // Close statement
  $stmt->close();
}

function updateDb($mysqli, $name, $description, $price, $category, $id) {
  // Prepare an insert statement
  $sql = "UPDATE SimpleProducts SET Name=?, Description=?, Price=?, Category=? WHERE ID=?";
 
  if($stmt = $mysqli->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bind_param("ssdsi", $param_name, $param_description, $param_price, $param_cateogry, $param_id);

      // Set parameters
      $param_name = $name;
      $param_description = $description;
      $param_price = $price;
      $param_cateogry = $category;
      $param_id = $id;
      
      // Attempt to execute the prepared statement
      if($stmt->execute()){
          // Records created successfully. Redirect to landing page
          header("location: index.php");
          exit();
      } else{
        echo "Something went wrong. Please try again later.";
      }
  }
   
  // Close statement
  $stmt->close();
}

?>