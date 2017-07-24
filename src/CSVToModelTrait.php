<?php namespace Stomas\Footballdataparser;

use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait CSVToModelTrait {

    function addCSVToModelAttributes(array $csvHeaderArray, array $csvRowArray){
        $columns = $this->getAllColumnsNames();
        $start = microtime(true);
        for($i = 0; $i < count($csvHeaderArray); $i++) {
            //Modify attributes
            $csvHeaderArray[$i] = $this->modifyAttributeName($csvHeaderArray[$i]);

            $csvRowArray[$i] = $this->modifyValues($csvHeaderArray[$i], $csvRowArray[$i]);

            if(isset($columns[$csvHeaderArray[$i]])){
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

    public function getAllColumnsNames()
    {
        switch (DB::connection()->getConfig('driver')) {
            case 'pgsql':
                $query = "SELECT column_name FROM information_schema.columns WHERE table_name = '".$this->getTable()."'";
                $column_name = 'column_name';
                $reverse = true;
                break;

            case 'mysql':
                $query = 'SHOW COLUMNS FROM '.$this->getTable();
                $column_name = 'Field';
                $reverse = false;
                break;

            case 'sqlsrv':
                $parts = explode('.', $this->getTable());
                $num = (count($parts) - 1);
                $table = $parts[$num];
                $query = "SELECT column_name FROM ".DB::connection()->getConfig('database').".INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'".$table."'";
                $column_name = 'column_name';
                $reverse = false;
                break;

            default:
                $error = 'Database driver not supported: '.DB::connection()->getConfig('driver');
                throw new Exception($error);
                break;
        }

        $columns = [];

        foreach(DB::select($query) as $column)
        {
            $columns[$column->$column_name] = $column->$column_name; // setting the column name as key too
        }

        if($reverse)
        {
            $columns = array_reverse($columns);
        }

        return $columns;
    }
}