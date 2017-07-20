<?php

namespace Stomas\Footballdataparser\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FootballDataController extends Controller
{
    public function form(){
        return view('footballdata::form');
    }

    public function store(){
        return 'store';
    }
}
