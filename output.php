<?php
require_once "php/db_connection.php";
//This will preview what the POST will look like
if(isset($_POST)){
    //js trigger: sendDataToServer(survey);
    $DB = new db_connection();
    $myfile = fopen("log.txt", "w") or die("Unable to open file!");
    fwrite($myfile, json_encode($_POST));
    fclose($myfile);
    echo "<pre>";
    var_dump($_POST);
    foreach($_POST as $key => $surveyDataEntity){
        $queryData = [
            $key,
            $surveyDataEntity
        ];
        var_dump($key);
        var_dump($surveyDataEntity);
        $res = $DB->query("INSERT INTO `statistics_data` (`question_id`, `answer`) VALUES ( ? , ? )",$queryData);
    }
    echo "</pre>";
}