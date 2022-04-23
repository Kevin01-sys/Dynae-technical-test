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

    //data is passed to an Array for later manipulation
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

    // calculates at what time the temperature was higher than the one delivered by the user
    public function calculeTemp($arrayData,$tempUser,$betweenDates,$to){
        // asks if there are records in the array
        if ($arrayData){
            // asks if there is specifically only 1 record
            if (count($arrayData['magnitude'])===1){
                $previousMagnitude=$arrayData['magnitude'][0];
                $previousTimestamp=$arrayData['date']['timestamp'][0];
                $secondsBetweenDate=$betweenDates-$arrayData['date']['range'][0];
                if ($previousMagnitude>$tempUser){
                    //echo 'Segundos en que la temperatura era más alta que la ingresada por el usuario: '.$secondsBetweenDate. '<br>';
                    echo 'Entre: '.$previousTimestamp.' to: '.$to.': la temperatura '.$previousMagnitude.' era más ALTA que la ingresada por el usuario. Fueron '.$secondsBetweenDate. ' segundos <br>';
                    $this->sumSecondTemp += $secondsBetweenDate;
                } else{
                    echo 'Entre: '.$previousTimestamp.' to: '.$to.': la temperatura '.$previousMagnitude.' era más BAJA que la ingresada por el usuario. Fueron '.$secondsBetweenDate. ' segundos <br>';
                    //echo 'Segundos en que la temperatura era baja que la ingresada por el usuario: '.$secondsBetweenDate. '<br>';
                }
            // Si hay más de un registro recorre el arreglo con normalidad
            } else{
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
                        echo 'Entre: '.$previousTimestamp.' to: '.$followingTimestamp.': la temperatura '.$previousMagnitude.' era más ALTA que la ingresada por el usuario. Fueron '.$secondsBetweenDate. ' segundos <br>';
                        $this->sumSecondTemp += $secondsBetweenDate;
                    } else{
                        echo 'Entre: '.$previousTimestamp.' to: '.$followingTimestamp.': la temperatura '.$previousMagnitude.' era más BAJA que la ingresada por el usuario. Fueron '.$secondsBetweenDate. ' segundos <br>';
                        //echo 'Segundos en que la temperatura era baja que la ingresada por el usuario: '.$secondsBetweenDate. '<br>';
                    }
                }
            }

        } else {
            echo "No se registro eventos durante estas fechas <br>";
        }

        return $this->sumSecondTemp;
    }
}
?>