<?php
    //$test=0;

	// all temperatures found in a range of dates are left in an array
	/* foreach($data as $object) {
        $magnitude=$object->magnitude;
        $timestamp=$object->timestamp;
        $arrayData['magnitude'][] = $object->magnitude;

        $segtimestamp=strtotime($timestamp);
        $finalSegundos=$segtimestamp-$dateFrom;
        $resuelto=$finalSegundos;

        $arrayData['over']['date'][] = $resuelto;

        if ($magnitude>$tempUser){
            $arrayData['over']['temp'][] = $magnitude;
            $arrayData['over']['date'][] = $timestamp;
            $segtimestamp=strtotime($timestamp);
            $finalSegundos=$segtimestamp-$dateFrom;
            $resuelto=$finalSegundos;
            $finalSegundos=$dateTo-$segtimestamp;
            $finalSegundos=$segtimestamp-$dateFrom;
            $arrayData['over']['date'][] = $resuelto;
        }
        if ($magnitude<$tempUser){
            $arrayData['under']['temp'][] = $magnitude;
            $arrayData['under']['date'][] = $timestamp;
            $segtimestamp=strtotime($timestamp);
            $finalSegundos=$segtimestamp-$dateFrom;
            $resuelto=$finalSegundos;
            $arrayData['under']['date'][] = $resuelto;
        }
	} */

    /* for ($i=1; $i <count($arrayData['over']['date']) ; $i++) {

        //echo $arrayData['over']['date'][$i-1].'<br>';
        $float = abs($arrayData['over']['date'][$i-1]-$arrayData['over']['date'][$i]);
        //echo $arrayData['magnitude'][$i-1];
        //echo gettype($arrayData['magnitude'][$i-1]);
        //echo gettype($tempUser);
        //$test=$arrayData['magnitude'][$i-1];
        //echo $test;
        //echo '<br>';
        if ($arrayData['magnitude'][$i-1]>$tempUser){
            $resultado += $float;
            //echo "Va en la posicion ".($i-1)."y su tenperauta es ".$arrayData['magnitude'][$i-1];
            //echo $resultado;
            //echo '<br>';
        }
        //$resultado += $float;
        //echo "Va en la posicion ".($i-1)."y su tenperauta es ".$arrayData['magnitude'][$i-1];
        //echo $resultado;
        //echo '<br>';
    } */
    // First test: to obtain seconds between each date in the array
    /* for ($i=0; $i <count($arrayData['over']['date']) ; $i++) {

        //echo $arrayData['over']['date'][$i-1].'<br>';
        //$float = abs($arrayData['over']['date'][$i-1]-$arrayData['over']['date'][$i]);
        //$resultado += $float;
        echo "Va en la posicion ".($i)."y su tenperauta es ".$arrayData['magnitude'][$i];
        //echo $resultado;
        echo '<br>';
    } */

	// all temperatures found in a range of dates are left in an array
        /* foreach($data as $object) {
            $arrayData['magnitude'][] = $object->magnitude;
        } */

	//Print all objects fetched by the API
        /* 	foreach($data as $object) {
		echo 'Id: '.$object->id.'<br>';
        echo 'sensorElementId: '.$object->sensorElementId.'<br>';
        echo 'magnitude: '.$object->magnitude.'<br>';
        echo 'variation: '.$object->variation.'<br>';
        echo 'timestamp: '.$object->timestamp.'<br>';
	} */

    //Print 1 object obtained by the API
        /* 	foreach($data as $object) {
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
	} */

    /* start: obtain max and min temperatures */
        /* $maxMagnitude = max($arrayData['magnitude']);
        $minMagnitude = min($arrayData['magnitude']);
        //echo 'Temperatura máxima entre esas fechas: '.$maxMagnitude.'<br>';
        //echo 'Temperatura mínima entre esas fechas: '.$minMagnitude.'<br>';
        echo 'Temperatura máxima desde '.$from.' hasta '.$to.' : '.$maxMagnitude.'<br>';
        echo 'Temperatura mínima desde '.$from.' hasta '.$to.' : '.$minMagnitude.'<br>';
        //print_r($arrayData).'<br>';
        var_dump($arrayData).'<br>';
        //echo $arrayData['magnitude'][0];
        //echo array_sum($arrayData['over']['date']); */

    /* end: obtain max and min temperatures */

    /* start: working with dates */
        //$firstDate  = new DateTime("2019-01-01");
        //$secondDate = new DateTime("2020-03-04");
        /* $firstDate  = new DateTime("2022-04-20 13:21:10");
        $secondDate = new DateTime("2022-04-20 13:23:23");
        $intvl = $firstDate->diff($secondDate);
        echo gettype($intvl).' <br>';
        echo $intvl->y . " year, " . $intvl->m." months and ".$intvl->d." minutes".$intvl->i." ".$intvl->s." seconds"; */
    /* end: working with dates */
?>