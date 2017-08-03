<?php

namespace Stomas\Footballdataparser\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Stomas\Footballdataparser\Models\Match;

class GetELORating implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $match;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Match $match)
    {
        $this->match = $match;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(!$this->match->HomeTeamELO || !$this->match->AwayTeamELO) {
            $this->match->HomeTeamELO = \Stomas\EloRanking\Elo::getElo($this->match->HomeTeam);
            $this->match->AwayTeamELO = \Stomas\EloRanking\Elo::getElo($this->match->AwayTeam);
            $this->match->save();
        }
    }
}
