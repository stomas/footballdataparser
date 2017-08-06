<?php

namespace Stomas\Footballdataparser\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['team', 'division', 'elorating'];
}
