<?php
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\NestedValidationException;

$v = new Validator;


function validate_date($date_string)
{
  $date_validator = Validator::date('m-d-Y')->notEmpty();

  try {
    $date_validator->assert($date_string);
    $date_time = strtotime($date_string);
    return date('F jS Y', $date_time);
  } 
  catch(NestedValidationException $e) {
    echo '<ul>';
    foreach ($e->getMessages() as $message) {
      echo "<li>$message</li>";
    }
    echo '</ul>';
  }


//   if($date_validator->validate($date_string)){
//     $date_time = strtotime($date_string);
//     return date('F jS Y',$date_time);
//   } 
//   else {
//     return $date_string . 'is not valid. The date must be in a DD-MM-YYYY format!'; 
//   }
}
function validate_email_or_Description($string, $flag)
{
  if($flag)
    $validator = Validator::email()->notEmpty();
  else
    $validator = Validator::stringType()->length(1, 10);

  try {
    $validator->assert($string);
    return $string;
  } 
  catch(NestedValidationException $e) {
    echo '<ul>';
    foreach ($e->getMessages() as $message) {
      echo "<li>$message</li>";
    }
    echo '</ul>';
  }
}


function myown_validate_date($date_string)
  {
  if ($time = strtotime($date_string)) {
    return date('F jS Y',$time);
  } else {
    return $date_string . ' does not look valid.';
  }
}
