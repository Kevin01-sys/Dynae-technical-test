<?php
    extract($_POST, EXTR_OVERWRITE);
    // static data used as an example
    //$from="2022-04-20T13:21:10";
    //$to="2022-04-20T13:25:16";
    //$tempUser=10.83341; // user-specified temperature

    // User-supplied data
    $from=$dateFrom.'T'.$hourFrom;
    $to=$dateTo.'T'.$hourTo;
    $tempUser=$temp;

	require_once "../api/endPoints.php";
	require_once "../models/ObjectApi.php";

    $data=json_decode(file_get_contents($endPointTwo)); /* obtain API data */
    /* print_r($data).'<br>'; */
    /* var_dump($data).'<br>'; */

    // The model for querying the database is instantiated.
	$objectApi = new ObjectApi();
    $arrayData = []; // Array in which API data will be manipulated
    $sumSecondTemp = 0; // sum of the seconds in which the temperature was higher than the one entered by the user

    /* start: Calculates the number of seconds between the date "from" and "to" */
        // The strtotime() function parses an English textual datetime into a Unix timestamp (the number of seconds since January 1 1970 00:00:00 GMT).
        $dateFrom=strtotime($from);
        $dateTo=strtotime($to);
        $betweenDates=$dateTo-$dateFrom;
    /* end: Calculates the number of seconds between the date "from" and "to" */

	//start: We search for all the objects brought by the API
    $arrayData = $objectApi->prepareTheData($data,$dateFrom);

    //start:  calculating range of seconds between dates
    $sumSecondTemp = $objectApi->calculeTemp($arrayData,$tempUser,$betweenDates,$to);

    //start: obtain max and min temperatures
    if ($arrayData){
        $maxMagnitude = max($arrayData['magnitude']);
        $minMagnitude = min($arrayData['magnitude']);
    } else {
        $maxMagnitude = 0;
        $minMagnitude = 0;
    }



    /* start: Print messages on the screen for the user */
        echo "La temperatura ingresada por el usuario es: ".$tempUser." <br>";
        echo 'La diferencia en segundos desde '.$from.' hasta '.$to.' es : '.$betweenDates.' Segundos <br>';
        echo 'Temperatura mínima desde '.$from.' hasta '.$to.' : '.$minMagnitude.'<br>';
        echo 'Temperatura máxima desde '.$from.' hasta '.$to.' : '.$maxMagnitude.'<br>';
        echo $sumSecondTemp." segs: la cantidad de segundos que en ese rango de fechas la temperatura estuvo por sobre la temperatura objetivo indicada por el usuario. <br>";
    /* end: Print messages on the screen for the user */

    /* var_dump($arrayData).'<br>'; */

    /* echo json_encode($data); */
?>