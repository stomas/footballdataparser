<?php namespace Stomas\Footballdataparser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Stomas\Footballdataparser\CSVToModelTrait;

class Match extends Model
{

    use CSVToModelTrait;

    protected $fillable = ['Div', 'Date', 'HomeTeam', 'AwayTeam', 'FTHG', 'FTAG', 'FTR', 'HTHG', 'HTAG', 'HTR'];

    function __construct(){
        $this->id=0;
    }

    function statistics()
    {
        return $this->hasOne(MatchStatistics::class);
    }

    function bettingOdds()
    {
        return $this->hasOne(MatchBettingOdds::class);
    }

    function getMatchWithCSVRow(array $csvHeaderArray, array $csvRowArray){
        $this->addMatchFromCSVRow($csvHeaderArray, $csvRowArray);

        $this->addStatisticsFromCSVRow($csvHeaderArray, $csvRowArray);

        $this->addOddsFromCSVRow($csvHeaderArray, $csvRowArray);

        return $this;
    }

    function addMatchFromCSVRow(array $csvHeaderArray, array $csvRowArray){
        $this->addCSVToModelAttributes($csvHeaderArray, $csvRowArray);

        //Guards to not override matche
        if(!Match::where(['Date' => $this->Date, 'HomeTeam' => $this->HomeTeam, 'AwayTeam' => $this->AwayTeam])->first()){
            $this->save();
            return $this;
        }

        return Match::where(['Date' => $this->Date, 'HomeTeam' => $this->HomeTeam, 'AwayTeam' => $this->AwayTeam])->first();
    }

    function addStatisticsFromCSVRow(array $csvHeaderArray, array $csvRowArray){
        $statistics = (new MatchStatistics())->getStatisticsFromCSVRow($csvHeaderArray, $csvRowArray);

        return $this->statistics()->save($statistics);
    }

    function addOddsFromCSVRow(array $csvHeaderArray, array $csvRowArray){
        $bettingOdds = (new MatchBettingOdds())->getOddsFromCSVRow($csvHeaderArray, $csvRowArray);

        return $this->bettingOdds()->save($bettingOdds);
    }
}
