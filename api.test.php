<?php
	require_once "./api/end_points.php";
    /* obtain API data */
    $data=json_decode(file_get_contents($endPointTwo));

    /* user-specified temperature */
/*     $tempUser=10.83342; */
    $tempUser=10.83345;

    /* Array in which API data will be manipulated */
    $arrayData = [];

    /* print_r($data).'<br>'; */
    /* var_dump($data).'<br>'; */

	// all temperatures found in a range of dates are left in an array
	foreach($data as $object) {
        $magnitude=$object->magnitude;
        $timestamp=$object->timestamp;
        $arrayData['magnitude'][] = $object->magnitude;
        $segtimestamp=strtotime($timestamp);
            $finalSegundos=$segtimestamp-$dateFrom;
            $resuelto=$finalSegundos;
        $arrayData['over']['date'][] = $resuelto;

        if ($magnitude>$tempUser){
            /* $arrayData['over']['temp'][] = $magnitude; */
            /* $arrayData['over']['date'][] = $timestamp; */
            /* $segtimestamp=strtotime($timestamp);
            $finalSegundos=$segtimestamp-$dateFrom;
            $resuelto=$finalSegundos; */
            /* $finalSegundos=$dateTo-$segtimestamp; */
            /* $finalSegundos=$segtimestamp-$dateFrom; */
            /* $arrayData['over']['date'][] = $resuelto; */
        }
        if ($magnitude<$tempUser){
/*          $arrayData['under']['temp'][] = $magnitude;
            $arrayData['under']['date'][] = $timestamp; */
/*          $segtimestamp=strtotime($timestamp);
            $finalSegundos=$segtimestamp-$dateFrom;
            $resuelto=$finalSegundos;
            $arrayData['under']['date'][] = $resuelto; */
        }
	}

    /* start: obtain max and min temperatures */
        $maxMagnitude = max($arrayData['magnitude']);
        $minMagnitude = min($arrayData['magnitude']);
/*         echo 'Temperatura máxima entre esas fechas: '.$maxMagnitude.'<br>';
        echo 'Temperatura mínima entre esas fechas: '.$minMagnitude.'<br>'; */
        echo 'Temperatura máxima desde '.$from.' hasta '.$to.' : '.$maxMagnitude.'<br>';
        echo 'Temperatura mínima desde '.$from.' hasta '.$to.' : '.$minMagnitude.'<br>';
        /* print_r($arrayData).'<br>'; */
        var_dump($arrayData).'<br>';
        //echo $arrayData['magnitude'][0];
        /* echo array_sum($arrayData['over']['date']); */

    /* end: obtain max and min temperatures */

    /* echo json_encode($data); */
?>