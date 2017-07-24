<?php

namespace Stomas\Footballdataparser\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Stomas\Footballdataparser\Models\Match;

/**
 * Class FootballDataController
 *
 * @package Stomas\Footballdataparser\Controllers
 */
class FootballDataController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('footballdata::form');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        if($request->file('csvfile')) {
            //Getting file
            $request->csvfile->storeAs('csv/', $request->csvfile->getClientOriginalName());
            $csvFile = Storage::get('csv/' . $request->csvfile->getClientOriginalName());

<<<<<<< HEAD
            foreach($matches as $match){

// Execute the query

                (new Match())->getMatchWithCSVRow($header, $match);

            }
=======
            (new Match())->parseCSV($csvFile);
>>>>>>> a41647427a528a2590de050aa6a326d1a9a0367d
        }

        Session::flash('message', 'Thank you, your file was uploaded');

        return redirect('/footballdata');
    }
}
