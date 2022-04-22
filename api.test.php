<?php
	require_once "./api/end_points.php";
    /* obtain API data */
    $data=json_decode(file_get_contents($endPointTwo));
    $tempUser=10.83342; // user-specified temperature
    $arrayData = []; // Array in which API data will be manipulated
    $test=0;
    $resultado = 0;

    /* print_r($data).'<br>'; */
    /* var_dump($data).'<br>'; */

	// all temperatures found in a range of dates are left in an array
	foreach($data as $object) {
        $magnitude=$object->magnitude;
        $timestamp=$object->timestamp;
        $arrayData['magnitude'][] = $magnitude;

        $segtimestamp=strtotime($timestamp);
        $finalSegundos=$segtimestamp-$dateFrom;
        $arrayData['over']['date'][] = $finalSegundos;
	}

    for ($i=1; $i <count($arrayData['over']['date']) ; $i++) {
        $float = abs($arrayData['over']['date'][$i-1]-$arrayData['over']['date'][$i]);
        if ($arrayData['magnitude'][$i-1]>$tempUser){
            $resultado += $float;
        }
    }

    /* start: obtain max and min temperatures */
        $maxMagnitude = max($arrayData['magnitude']);
        $minMagnitude = min($arrayData['magnitude']);
        echo 'Temperatura máxima desde '.$from.' hasta '.$to.' : '.$maxMagnitude.'<br>';
        echo 'Temperatura mínima desde '.$from.' hasta '.$to.' : '.$minMagnitude.'<br>';

    /* end: obtain max and min temperatures */

    echo " La temperatura ingresada por el usuario es: ".$tempUser." <br>";
    echo $resultado." segs: la cantidad de segundos que en ese rango de fechas la temperatura estuvo por sobre la temperatura objetivo indicada por el usuario. <br>";

    /* echo json_encode($data); */
?>