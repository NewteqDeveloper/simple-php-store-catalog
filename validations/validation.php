<?php

function validateName($input) {
  $value = $error = "";
  if(empty($input)){
      $error = "Please enter a name.";
  } elseif(!filter_var($input, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      $error = "Please enter a valid name.";
    } elseif(strlen($input) > 500) {
      $error = "can't be more than 500";
    } else{
      $value = $input;
  }

  return array($value, $error);
}

function validateDescription($input) {
  $value = $error = "";
  if(empty($input)){
      $error = "Please enter description.";     
    } elseif(strlen($input) > 500) {
      $error = "can't be more than 500";
    } else{
      $value = $input;
  }

  return array($value, $error);
}

function validateCategory($input) {
  $value = $error = "";
  if(empty($input)){
      $error = "Please enter a name.";
  } elseif(!filter_var($input, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^\S*$/")))){
      $error = "Please enter a valid name. (No spaces allowed)";
  } elseif(strlen($input) > 100) {
    $error = "can't be more than 100";
  } else{
      $value = $input;
  }

  return array($value, $error);
}

function validatePrice($input) {
  $value = $error = "";
  if(empty($input)){
      $error = "Please enter a price.";
  } elseif(!is_numeric($input)){
      $error = "Please enter valid number";
  } else{
      $value = $input;
  }

  return array($value, $error);
}

?>