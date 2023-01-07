<?php
  $dateOfBirth = "15-06-1995";
  $today = date("Y-m-d");
  $diff = date_diff(date_create($dateOfBirth), date_create($today));
  //echo 'Your age is '.$diff->format('%y %m %d');
  $time_in_24_hour_format  = date("H:i", strtotime("1:30 PM"));
  //echo$time_in_24_hour_format;
  $mm=date("m");
  $int_cast = (int)$mm;
  echo $int_cast;

// $to_email = "sakibdob@gmail.com";
// $subject = "Simple Email Test via PHP";
// $body = "Hi, This is test email send by PHP Script";
// $headers = "From: sender email";

// if (mail($to_email, $subject, $body, $headers)) {
//     echo "Email successfully sent to $to_email...";
// } else {
//     echo "Email sending failed...";
// }

?>