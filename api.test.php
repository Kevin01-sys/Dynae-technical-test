<?php
	require_once "./api/end_points.php";
    /* obtain API data */
    $data=json_decode(file_get_contents($endPointTwo));

    /* Array in which API data will be manipulated */
    $arrayData = [];

    /* print_r($data).'<br>'; */
    /* var_dump($data).'<br>'; */

	// all temperatures found in a range of dates are left in an array
	foreach($data as $object) {
        $arrayData['magnitude'][] = $object->magnitude;
	}

    /* start: obtain max and min temperatures */
        $maxMagnitude = max($arrayData['magnitude']);
        $minMagnitude = min($arrayData['magnitude']);
        echo 'Temperatura máxima entre esas fechas: '.$maxMagnitude.'<br>';
        echo 'Temperatura mínima entre esas fechas: '.$minMagnitude.'<br>';
        echo 'Temperatura máxima desde '.$from.' hasta '.$to.' : '.$maxMagnitude.'<br>';
        echo 'Temperatura mínima desde '.$from.' hasta '.$to.' : '.$minMagnitude.'<br>';
        print_r($arrayData).'<br>';
        //echo $arrayData['magnitude'][0];

    /* end: obtain max and min temperatures */

    /* echo json_encode($data); */
?>