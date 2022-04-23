<?php

/**
* class Object API
*/

class ObjectApi {

    private $arrayObject;
    private $sumSecondTemp;

	public function __construct(){
		$this->arrayObject = array();
        $this->sumSecondTemp=0;
	}

    public function prepareTheData($objects, $startingDate){
        $this->arrayObject = [];
        foreach($objects as $object) {
            $magnitude=$object->magnitude;
            $timestamp=$object->timestamp;
            $this->arrayObject['magnitude'][] = $magnitude;

            /* start: The number of seconds that have elapsed "from" to the "date in the object" is calculated. */
                $segtimestamp=strtotime($timestamp); // in seconds the date stored in the object
                $finalSegundos=$segtimestamp-$startingDate; // "object date" minus "date from"
                $this->arrayObject['date']['range'][] = $finalSegundos; //store in the Array to be handled later
                $this->arrayObject['date']['timestamp'][] = $timestamp; //store in the Array to be handled later
            /* end: The number of seconds that have elapsed "from" to the "date in the object" is calculated. */
        }
        return $this->arrayObject;
    }

    public function calculeTemp($arrayData,$tempUser){
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
                $this->sumSecondTemp += $secondsBetweenDate;
            } else{
                echo 'Entre: '.$previousTimestamp.' to: '.$followingTimestamp.': la temperatura '.$previousMagnitude.' era más BAJA que la ingresada por el usuario. Fueron '.$secondsBetweenDate. ' segundos<br>';
                //echo 'Segundos en que la temperatura era baja que la ingresada por el usuario: '.$secondsBetweenDate. '<br>';
            }
        }
        return $this->sumSecondTemp;
    }
}
?>