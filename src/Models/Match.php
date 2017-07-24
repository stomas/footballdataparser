<?php namespace Stomas\Footballdataparser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Stomas\Footballdataparser\CSVToModelTrait;

/**
 * Class Match
 *
 * @package Stomas\Footballdataparser\Models
 */
class Match extends Model
{

    use CSVToModelTrait;

    /**
     *
     */
    function __construct()
    {
        $this->id = 0;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    function statistics()
    {
        return $this->hasOne(MatchStatistics::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    function bettingOdds()
    {
        return $this->hasOne(MatchBettingOdds::class);
    }

    /**
     * Parses CSV from FilePath and wraps it to model
     * @param $filepath
     */
    function parseCSV($csvString)
    {
        $this->addCsvToModel($csvString);
    }

    /**
     * Getting match with statistics and bets from CSV row.
     * @param array $csvHeaderArray
     * @param array $csvRowArray
     *
     * @return $this
     */
    function getMatchWithCSVRow(array $csvHeaderArray, array $csvRowArray)
    {
        $this->addMatchFromCSVRow($csvHeaderArray, $csvRowArray);

        $this->addStatisticsFromCSVRow($csvHeaderArray, $csvRowArray);

        $this->addOddsFromCSVRow($csvHeaderArray, $csvRowArray);

        return $this;
    }

    /**
     *
     * @param array $csvHeaderArray
     * @param array $csvRowArray
     *
     * @return $this|mixed
     */
    function addMatchFromCSVRow(array $csvHeaderArray, array $csvRowArray)
    {
        $this->addCSVToModelAttributes($csvHeaderArray, $csvRowArray);

        $match = Match::where(['Date' => $this->Date, 'HomeTeam' => $this->HomeTeam, 'AwayTeam' => $this->AwayTeam])->first();
        //Guards to not override match
        if($match) {
            return $match;
        }

        $this->save();
        return $this;
    }

    /**
     * @param array $csvHeaderArray
     * @param array $csvRowArray
     *
     * @return false|Model
     */
    function addStatisticsFromCSVRow(array $csvHeaderArray, array $csvRowArray)
    {
        $statistics = (new MatchStatistics())->getStatisticsFromCSVRow($csvHeaderArray, $csvRowArray);

        return $this->statistics()->save($statistics);
    }

    /**
     * @param array $csvHeaderArray
     * @param array $csvRowArray
     *
     * @return false|Model
     */
    function addOddsFromCSVRow(array $csvHeaderArray, array $csvRowArray)
    {
        $bettingOdds = (new MatchBettingOdds())->getOddsFromCSVRow($csvHeaderArray, $csvRowArray);

        return $this->bettingOdds()->save($bettingOdds);
    }
}
