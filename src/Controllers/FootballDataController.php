<?php

namespace Stomas\Footballdataparser\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use InvalidArgumentException;
use Stomas\Footballdataparser\Models\Match;
use Stomas\Footballdataparser\Models\Team;

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
     * Gets team and adds them to teams table.
     */
    public function getTeams(){
        $client = new \Goutte\Client();

        $crawler = $client->request('GET', 'http://www.soccer-rating.com/ranking.php');

        $arrayTeams = [];

        Team::truncate();

        for($i = 0; $i < 30; $i++){
            try{
                $crawler->filter('.bigtable tr')->each(function ($node) use(&$arrayTeams) {
                    $array = [];
                    $node->filter('td')->each(function ($node) use(&$array){
                        array_push($array, $node->text());
                    });

                    unset($array[0]);
                    unset($array[2]);
                    if(count($array) > 0){
                        Team::create([
                           'team' => $array[1],
                           'division' => $array[3],
                            'elorating' => $array[4]
                        ]);
                    }
                });

                $link = $crawler->selectLink('More...')->link();
                $crawler = $client->request('GET', $link->getUri());

            } catch(InvalidArgumentException $e){
                continue;
            }
        }

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
