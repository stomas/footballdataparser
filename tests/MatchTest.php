<?php


namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Orchestra\Testbench\TestCase;
use League\Csv\Reader;
use Stomas\Footballdataparser\Models\Match;

class MatchTest extends TestCase {
    use DatabaseMigrations;
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql.database', 'football_data');
        $app['config']->set('database.connections.mysql.username', 'root');
        $app['config']->set('database.connections.mysql.password', '');
    }

    /** @test */
    function it_just_checks_if_ok(){
        $csv = Reader::createFromPath(__DIR__.'/E0.csv');

        $match = new Match();

        $this->assertTrue(true);
    }
}
