<?php namespace Stomas\Footballdataparser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Stomas\Footballdataparser\CSVToModelTrait;

class MatchStatistics extends Model
{
    use CSVToModelTrait;

    function match(){
        return $this->belongsTo("Stomas\Footballdataparser\Models\Match");
    }

    function getStatisticsFromCSVRow(array $csvHeaderArray, array $csvRowArray){
        $this->addCSVToModelAttributes($csvHeaderArray, $csvRowArray);

        return $this;
    }
}
