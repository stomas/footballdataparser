<?php

namespace Stomas\Footballdataparser\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Team extends Model
{
    use Searchable;
    protected $fillable = ['team', 'division', 'elorating'];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'teams_index';
    }
}
