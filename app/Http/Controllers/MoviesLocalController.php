<?php

namespace App\Http\Controllers;

use App\Movies;
use Illuminate\Http\Request;
use Carbon\Carbon;


use GuzzleHttp\Client;

use Illuminate\Support\Facades\Redirect;

use App\ViewModels\MoviesViewModelTopRated;
use App\ViewModels\MoviesViewModelUpComing;

use App\ViewModels\MovieViewModel;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MoviesViewModelPopular;
use Illuminate\Support\Facades\Http;

class MoviesLocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $movies = Movies::paginate(10);
        return view('localmovies.index', [ 'localmovies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        //return view('movies.create', [ 'casts' => $casts, 'genres'=>$genres,'ratings'=>$ratings,'crews'=>$crews]);

        //$client = new \GuzzleHttp\Client();
       /* $client = new Client();
        $url = "http://server.larav.student:8001/api/students";


        //dd($response);

        $params = [
            //If you have any Params Pass here
            'name',
            'course'

        ];

        $headers = [
            'api-key' => '/CkHoXPfdJ0dji+e/QJRNCPheONVVvtBwjXpu/Z99rk='
        ];

        $response = $client->request('GET', $url, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = $response;

        return view('projects.create', compact('responseBody'));
       */

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // $movie      = new MovieViewModel($request);
        $movie = new Movies();

        $imdb_id          = $request->id;
        $title          = $request->title;
        $poster_path  = $request->poster_path;
        $vote_average         = $request->vote_average;
        $release_date      = $request->release_date;
        $genres     = $request->genres;
        $overview          = $request->overview;

        $movie->imdb_id       = $imdb_id;
        $movie->title       = $title;
        $movie->poster_path          = $poster_path;
        $movie->vote_average  = $vote_average;
        $movie->release_date         = $release_date;
        $movie->genres      = $genres;
        $movie->overview     = $overview;

        $movie->save();

        return Redirect::to('/')->with('message', 'New Movie added!');

        /*$request->validate([
            'name' => 'required',
            'course' => 'required'
        ]);

        //$client = new \GuzzleHttp\Client();
        $client = new Client();
        $response = $client->request('POST', 'http://server.larav.student:8001/api/students', [
            'form_params' => [
                'imdb_id' => $request->imdb_id,
                'poster_path' => $request->poster_path,
                'vote_average' => $request->vote_average,
                'release_date' => $request->release_date,
                'genres' => $request->genres,
                'overview' => $request->overview,
            ]
        ]);
        // $responseBody = json_decode($response->getBody());

        return redirect()->route('movies.index')
            ->with('success', 'Movie created successfully.');

        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie  = Movies::find($id);
        return view('localmovies.show', ['localmovies' => $movie ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $movie    = Movies::find($id);
        //$casts    = User::whereIn('role_id', array('2','3'))->get();
        //$crews    = User::whereIn('role_id', array('7'))->get();
        //$genres   = Genre::all();
        //$ratings  = Ratings::all();

       // $viewMovie = new Movies;
        //return view('localmovies.edit', [ 'movie' => $movie , 'casts' => $casts, 'genres'=>$genres,'ratings'=>$ratings,'crews'=>$crews ]);
        return view('localmovies.edit', [ 'localmovies' => $movie]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $movie         = Movies::find($id);
       // $imdb_id    = Movies::firstOrNew(['imdb_id' => $movie->imdb_id]);
        $imdb_id    = $movie->imdb_id;
        $title          = $request->title;
        $poster_path  = $request->poster_path;
        $vote_average         = $request->vote_average;
        $release_date      = $request->release_date;
        $genres     = $request->genres;
        $overview          = $request->overview;

        if($imdb_id)
            $movie->imdb_id       = $imdb_id;

        if($poster_path)
            $movie->poster_path         = $poster_path;

        $movie->genres      = $genres;
        $movie->title     = $title;

        if($vote_average)
            $movie->vote_average       = $vote_average;

        if($release_date)
            $movie->release_date          = $release_date;

        if($overview)
            $movie->overview       = $overview;

        $movie->save();
/*
        $crews  =  explode(",",$request->crew_value);
        $casts  =  explode(",",$request->cast_value);

        if(count($crews)>0 && count($casts)>0 )
        {
            $cast_crews::where('movie_id',$movie->id)->delete();
        }

        if(isset($crews) && count($crews)>1)
        {
            foreach($crews as $crew)
            {
                $cast_crews->user_id = $crew;
                $cast_crews->movie_id = $movie->id;
                $cast_crews->insert([
                    'user_id' => $crew,
                    'movie_id' => $movie->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        if(count($casts)>0 && count($casts)>1)
        {
            foreach($casts as $cast)
            {
                $cast_crews->user_id  = $cast;
                $cast_crews->movie_id = $movie->id;
                $cast_crews->insert([
                    'user_id' => $cast,
                    'movie_id' => $movie->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
*/

        return Redirect::to('localmovies')->with('message', 'Local Movie updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Movies::find($id)->delete();
        return Redirect::to('localmovies')->with('message', 'Local Movie deleted!');
    }
}
