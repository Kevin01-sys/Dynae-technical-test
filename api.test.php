<?php
/* $api_url="https://jsonplaceholder.typicode.com/users"; */
$api_url = "http://data-env.eba-pwemrg4q.us-east-1.elasticbeanstalk.com/data/sensorElement/8/measurement?from=2022-04-20T04:00:00.000Z&to=2022-04-23T03:59:59.000Z&timeUnit=SEC";
/* obtain API data */
$data=json_decode(file_get_contents($api_url));

/* print_r($data).'<br>'; */
/* var_dump($data).'<br>'; */

	//Print all objects fetched by the API
	/* foreach($data as $object) {
		echo 'Id: '.$object->id.'<br>';
        echo 'sensorElementId: '.$object->sensorElementId.'<br>';
        echo 'magnitude: '.$object->magnitude.'<br>';
        echo 'variation: '.$object->variation.'<br>';
        echo 'timestamp: '.$object->timestamp.'<br>';
	} */

    //Print 1 object obtained by the API
	foreach($data as $object) {
        //parameters in variables for a better order
        $id=$object->id;
        $sensorElementId=$object->sensorElementId;
        $magnitude=$object->magnitude;
        $variation=$object->variation;
        $timestamp=$object->timestamp;
        // parameter by which the object will be filtered
        $idSearch=856976249;
        if ($id===$idSearch){
            echo 'Id: '.$id.'<br>';
            echo 'sensorElementId: '.$sensorElementId.'<br>';
            echo 'magnitude: '.$magnitude.'<br>';
            echo 'variation: '.$variation.'<br>';
            echo 'timestamp: '.$timestamp.'<br>';
            break;
        }
	}

/* echo json_encode($data); */
?>