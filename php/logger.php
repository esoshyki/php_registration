<?php
function logger($var) {
  $type = gettype($var);
    echo $type;
    if ($type == "array" || $type == "object") {
      echo $type;
      $str = "";
      foreach ($var as $key => $value) {
        $str = $str . "$key : $value" . "\n";
      };
      echo $str;
      file_put_contents("./log.log", $str);

    }
    file_put_contents("./log.log", $var);
  }
  ?>
