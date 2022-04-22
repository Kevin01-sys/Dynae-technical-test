<?php
    // Data to be entered by the user
    $from="2022-04-20T13:21:10";
    $to="2022-04-22T18:55:13";
    $tempUser=17.944587; // user-specified temperature

	require_once "./api/end_points.php";

    $data=json_decode(file_get_contents($endPointTwo)); /* obtain API data */
    /* print_r($data).'<br>'; */
    /* var_dump($data).'<br>'; */

    $arrayData = []; // Array in which API data will be manipulated
    $sumSecondTemp = 0; // sum of the seconds in which the temperature was higher than the one entered by the user

    /* start: Calculates the number of seconds between the date "from" and "to" */
        // The strtotime() function parses an English textual datetime into a Unix timestamp (the number of seconds since January 1 1970 00:00:00 GMT).
        $dateFrom=strtotime($from);
        $dateTo=strtotime($to);
        $betweenDates=$dateTo-$dateFrom;
    /* end: Calculates the number of seconds between the date "from" and "to" */

	/* start: We search for all the objects brought by the API */
	foreach($data as $object) {
        $magnitude=$object->magnitude;
        $timestamp=$object->timestamp;
        $arrayData['magnitude'][] = $magnitude;

        /* start: The number of seconds that have elapsed "from" to the "date in the object" is calculated. */
            $segtimestamp=strtotime($timestamp); // in seconds the date stored in the object
            $finalSegundos=$segtimestamp-$dateFrom; // "object date" minus "date from"
            $arrayData['date']['range'][] = $finalSegundos; //store in the Array to be handled later
            $arrayData['date']['timestamp'][] = $timestamp; //store in the Array to be handled later
        /* end: The number of seconds that have elapsed "from" to the "date in the object" is calculated. */
	}
    /* end: We search for all the objects brought by the API */

    /* start:  calculating range of seconds between dates */
        // Array starts at position 1, because it will always subtract the next position versus the previous one
        for ($i=1; $i < count($arrayData['date']['range']); $i++) {
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
        }
    /* end:  calculating range of seconds between dates */

    /* start: obtain max and min temperatures */
        $maxMagnitude = max($arrayData['magnitude']);
        $minMagnitude = min($arrayData['magnitude']);
    /* end: obtain max and min temperatures */

    /* start: Print messages on the screen for the user */
        echo "La temperatura ingresada por el usuario es: ".$tempUser." <br>";
        echo 'La diferencia en segundos desde '.$from.' hasta '.$to.' es : '.$betweenDates.' Segundos <br>';
        echo 'Temperatura máxima desde '.$from.' hasta '.$to.' : '.$maxMagnitude.'<br>';
        echo 'Temperatura mínima desde '.$from.' hasta '.$to.' : '.$minMagnitude.'<br>';
        echo $sumSecondTemp." segs: la cantidad de segundos que en ese rango de fechas la temperatura estuvo por sobre la temperatura objetivo indicada por el usuario. <br>";
    /* end: Print messages on the screen for the user */

    //var_dump($arrayData).'<br>';

    /* echo json_encode($data); */
?>