<?php namespace Stomas\Footballdataparser;

use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Schema;

trait CSVToModelTrait {

    function addCSVToModelAttributes(array $csvHeaderArray, array $csvRowArray){
        for($i = 0; $i < count($csvHeaderArray); $i++) {
            //Modify attributes
            $csvHeaderArray[$i] = $this->modifyAttributeName($csvHeaderArray[$i]);

            $csvRowArray[$i] = $this->modifyValues($csvHeaderArray[$i], $csvRowArray[$i]);

            if(Schema::hasColumn($this->getTable(), $csvHeaderArray[$i])){
                $this->{$csvHeaderArray[$i]} = $csvRowArray[$i];
            }
        }
    }

    private function modifyAttributeName($attribute){
        //Change > - over and < - under
        $attribute = str_replace('>', 'Over', $attribute);
        $attribute = str_replace('<', 'Under', $attribute);

        //Replace dot with nothing
        $attribute = str_replace('.', '', $attribute);

        return $attribute;
    }

    private function modifyValues($csvHeader, $csvValue){
        if($this->modifyAttributeName($csvHeader) == 'Date'){
            $csvValue = $this->changeDateFormat($csvValue);
        }

        return $csvValue;
    }

    private function changeDateFormat($date){
        $carbonDate = Carbon::createFromFormat('d/m/y', $date);
        $carbonDate->format('Y-m-d');

        return $carbonDate->toDateString();
    }
}