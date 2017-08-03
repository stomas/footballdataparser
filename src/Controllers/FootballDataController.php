<?php

namespace Stomas\Footballdataparser\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Stomas\EloRanking\Elo;
use Stomas\Footballdataparser\Jobs\GetELORating;
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

            (new Match())->parseCSV($csvFile);
        }

        Session::flash('message', 'Thank you, your file was uploaded');

        return redirect('/footballdata');
    }

    /**
     * Dispatch jobs for getting elos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getElos(){
        foreach(Match::all() as $match){

            if(!$match->HomeTeamELO || !$match->AwayTeamELO){
                dispatch(new GetELORating($match));
            }
        }

        return view('footballdata::index');
    }
}
