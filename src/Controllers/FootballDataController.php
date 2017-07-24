<?php

namespace Stomas\Footballdataparser\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use Stomas\Footballdataparser\Models\Match;

class FootballDataController extends Controller
{
    public function form(){
        return view('footballdata::form');
    }

    public function store(Request $request){
        if($request->file('csvfile')){
            //Getting file
            $request->csvfile->storeAs('csv/', $request->csvfile->getClientOriginalName());
            $csvFile = Storage::get('csv/'.$request->csvfile->getClientOriginalName());
            $csv = Reader::createFromString($csvFile);

            //Writing to model
            $header = $csv->fetchOne();
            $matches = $csv->setOffset(1)->fetchAll();

            foreach($matches as $match){

// Execute the query

                (new Match())->getMatchWithCSVRow($header, $match);

            }
        }

        return back()->with('message', 'Thank you, your file was uploaded');
    }
}
