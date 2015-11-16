<?php

//calculating time spect on execution
$startTime = microtime(true);

class ArraySlicer {
    // Create a function to calculate the array
    private function solution($A, $N) {

            // Check the array size
            if ($N > 100000 || $N < 2 ) {
                return -1;
            } elseif ($N === 2) {
                return 0;
            }

            $bootCalc = array();
            $bootCalc[] = 0;

            $mavg = PHP_INT_MAX; // Checking the max size of the integers in the array

            $arrStartPos = 0;
            for ($i = 0; $i < $N; $i++) {                
                $bootCalc[$i+1] = $A[$i] + $bootCalc[$i];
            }

            for ($i = 0; $i < $N-2; $i++) {
                for ($j = $i+1; $j < $i + 3; $j++ ) {
                    $arrAverage = ($bootCalc[$j+1] - $bootCalc[$i]) / ($j - $i + 1);

                    if ($mavg > $arrAverage) {
                        $mavg = $arrAverage;
                        $arrStartPos = $i;
                    }
                }
            }
            $arrAverage = ($bootCalc[$N] - $bootCalc[$N-2]) / 2;
            if ($mavg > $arrAverage) {
                $arrStartPos = $N - 2;
            }

            return $arrStartPos;
    }

    public function slice($inputArr, $ArrNumb){
        return $this->solution($inputArr, $ArrNumb);
    }
}    
 
/* Returning the Output of the function */

$InitSplicer = new ArraySlicer(); // Initialize our class

// Input array values
$getArray = array(4,2,2,5,1,5,8);
$NumberofArr = '6';
$arrStartPos = $InitSplicer->slice($getArray, $NumberofArr);

//Output values
echo '
===========Output===========:<br>
Number of Array given: '.$NumberofArr.'<br>
The Starting position: '.$arrStartPos.'<br>';

echo '<br>Var dump Array<br>';
echo var_dump($getArray);

//Execution Time

$endTime = microtime(true);

$totalExecutionSeconds = ($endTime - $startTime);


echo '
<br>==========Execution Time=======:<br>
Total execution time(seconds): '.$totalExecutionSeconds.'seconds<br>';

?>

