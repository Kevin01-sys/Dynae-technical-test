
<?php
/* variables created to filter dates */
$from="2022-04-20T13:21:10";
$to="2022-04-20T13:22:01";

/* API name */
/* $api_url="https://jsonplaceholder.typicode.com/users"; */
$apiUrl = "http://data-env.eba-pwemrg4q.us-east-1.elasticbeanstalk.com";

/* FILTERS */
$filterExamplePdf = "/data/sensorElement/8/measurement?from=2022-04-20T04:00:00.000Z&to=2022-04-23T03:59:59.000Z&timeUnit=SEC";
$filter_one = "/data/sensorElement/8/measurement?from=2022-04-20T13:21:10Z&to=2022-04-20T13:21:30Z&timeUnit=SEC";
$filter_two = '/data/sensorElement/8/measurement?from='.$from.'Z&to='.$to.'Z&timeUnit=SEC';

/* ENDPOINTS */
$endPointExamplePdf = $apiUrl.$filterExamplePdf;
$endPointOne = $apiUrl.$filter_one;
$endPointTwo = $apiUrl.$filter_two;
?>