<?php
/* $api_url="https://jsonplaceholder.typicode.com/users"; */
$api_url = "http://data-env.eba-pwemrg4q.us-east-1.elasticbeanstalk.com/data/sensorElement/8/measurement?from=2022-04-20T04:00:00.000Z&to=2022-04-23T03:59:59.000Z&timeUnit=SEC";
/* obtain API data */
$data=json_decode(file_get_contents($api_url));
print_r($data);
?>