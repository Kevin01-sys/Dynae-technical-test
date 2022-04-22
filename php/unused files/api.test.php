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

	/* start: We search for all the objects brought by the API */

	/* foreach($data as $object) {
        $magnitude=$object->magnitude;
        $timestamp=$object->timestamp;
        $arrayData['magnitude'][] = $magnitude; */

        /* start: The number of seconds that have elapsed "from" to the "date in the object" is calculated. */
            /* $segtimestamp=strtotime($timestamp); // in seconds the date stored in the object
            $finalSegundos=$segtimestamp-$dateFrom; // "object date" minus "date from"
            $arrayData['date']['range'][] = $finalSegundos; //store in the Array to be handled later
            $arrayData['date']['timestamp'][] = $timestamp; //store in the Array to be handled later */
        /* end: The number of seconds that have elapsed "from" to the "date in the object" is calculated. */
	/* } */
    /* end: We search for all the objects brought by the API */

    /* start:  calculating range of seconds between dates */
        // Array starts at position 1, because it will always subtract the next position versus the previous one
/*         for ($i=1; $i < count($arrayData['date']['range']); $i++) {
            $previousRange=$arrayData['date']['range'][$i-1];
            $followingRange=$arrayData['date']['range'][$i];

            $previousTimestamp=$arrayData['date']['timestamp'][$i-1];
            $followingTimestamp=$arrayData['date']['timestamp'][$i];

            $previousMagnitude=$arrayData['magnitude'][$i-1];

            $secondsBetweenDate = abs($previousRange-$followingRange);
            // if the temperature of that day is higher than the one given by the user
            if ($previousMagnitude>$tempUser){
                //echo 'Segundos en que la temperatura era más alta que la ingresada por el usuario: '.$secondsBetweenDate. '<br>';
                echo 'Entre: '.$previousTimestamp.' to: '.$followingTimestamp.': la temperatura '.$previousMagnitude.' era más ALTA que la ingresada por el usuario. Fueron '.$secondsBetweenDate. ' segundos<br>';
                $sumSecondTemp += $secondsBetweenDate;
            } else{
                echo 'Entre: '.$previousTimestamp.' to: '.$followingTimestamp.': la temperatura '.$previousMagnitude.' era más BAJA que la ingresada por el usuario. Fueron '.$secondsBetweenDate. ' segundos<br>';
                //echo 'Segundos en que la temperatura era baja que la ingresada por el usuario: '.$secondsBetweenDate. '<br>';
            }
        } */
    /* end:  calculating range of seconds between dates */
?>