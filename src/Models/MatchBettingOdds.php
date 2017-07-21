<?php namespace Stomas\Footballdataparser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Stomas\Footballdataparser\CSVToModelTrait;

class MatchBettingOdds extends Model
{
    use CSVToModelTrait;
    protected $fillable = [];

    function match(){
        return $this->belongsTo("Stomas\Footballdataparser\Models\Match");
    }

    function getOddsFromCSVRow(array $csvHeaderArray, array $csvRowArray){
        $this->addCSVToModelAttributes($csvHeaderArray, $csvRowArray);

        return $this;
    }
}
