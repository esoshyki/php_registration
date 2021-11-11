<?php
  session_start();
  $headers = getallheaders();

  if (!($headers['Sec-Fetch-Mode'] === 'no-cors')) {
    exit;
  }
  print_r($headers['Sec-Fetch-Mode']);
  $_SESSION=[];
  http_response_code(200);

?>