<?php
//This will preview what the POST will look like
$myfile = fopen("log.txt", "w") or die("Unable to open file!");
fwrite($myfile, json_encode($_POST));
fclose($myfile);