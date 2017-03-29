<?php
require __DIR__ . '/vendor/autoload.php'; //this file is provided by composer download; will load the Composer class 
require __DIR__ . '/myown_validation.php'; // load my own validation file which calls the Validator class (downloaded by Composer)

//Only execute if it is a POST method 
if($_SERVER['REQUEST_METHOD'] === 'POST') {

  echo '<br>============================<br>';

  //Print out the POST array msg
  var_dump($_POST);

  echo '<br>============================<br>';

  //Take out all the beginning and trailing spaces
  $date = trim($_POST['date']);
  $email = trim($_POST['email']);
  $description = trim($_POST['desc']);

  //Proceed with validation and print out only if all fields are not empty
  if (!empty($date) && !empty($email) && !empty($description)) {

    //Call function in myown_validation.php to validate date
    echo "<p>Date: " . validate_date($date) . '</p>';
  
  
  //if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //  echo "<p>Email: $email</p>";
  //}
  //else
  //  echo "<p>Email: $email is invalid!!!</p>";
  echo "<p>Email: " . validate_email_or_Description($email, true) . "</p>";
  

  //echo '<p>Description: ' . htmlspecialchars($description) . '</p>';
  echo "<p>Description: " . validate_email_or_Description($description, false) . "</p>";
  }
  else {
    echo "ERROR : One or more of the fields is empty. Please reenter.";
  }
    
echo '<br>============================<br>';
}

