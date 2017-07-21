<?php

//TODO Make one array in parameters to write row like this: ['attribute'=>'value']
namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Orchestra\Testbench\TestCase;
use League\Csv\Reader;
use Stomas\Footballdataparser\Models\Match;

class MatchTest extends TestCase {
    use DatabaseTransactions;

    private $csv;
    private $csvHeader;
    private $csvRow;
    private $match;

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'football_data',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ]);
    }

    public function setUp() {
        parent::setUp();

        $this->match = new Match();

        $this->csv = Reader::createFromPath(__DIR__.'/E0.csv');
        $this->csvHeader = $this->csv->fetchOne();
        $this->csvRow = $this->csv->fetchOne(1);
    }

    /** @test */
    function it_creates_match_from_csv_data(){

        $this->match = $this->match->getMatchWithCSVRow($this->csvHeader, $this->csvRow);

        $this->assertEquals('E0', $this->match->Div);
        $this->assertEquals('10', $this->match->statistics->HS);
        $this->assertEquals('2.3', $this->match->bettingOdds->BbAvOver25);
    }

    /** @test */
    function it_adds_statistics_to_match(){
        $this->match->addStatisticsFromCSVRow($this->csvHeader, $this->csvRow);

        $this->assertEquals('10', $this->match->statistics->HS);
    }

    /** @test */
    function it_adds_odds_to_match(){
        $this->match->addOddsFromCSVRow($this->csvHeader, $this->csvRow);

        $this->assertEquals('2.3', $this->match->bettingOdds->BbAvOver25);
    }

    /** @test */
    function it_can_not_add_same_match(){
        //add one match
        $match1 = new Match();
        $match1->getMatchWithCSVRow($this->csvHeader, $this->csvRow);

        $this->assertCount(1, Match::all());

        //add same match again
        $match2 = new Match();
        $match2->getMatchWithCSVRow($this->csvHeader, $this->csvRow);

        //checks database if only one is
        $this->assertCount(1, Match::all());
    }
}
