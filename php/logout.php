<?php
  session_start();
  require('./security/disableGetRequest.php');

  $_SESSION=[];
  http_response_code(200);

?>