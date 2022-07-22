<?php

namespace App\Http\Controllers;

use App\Movies;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Redirect;

use App\ViewModels\MoviesViewModelTopRated;
use App\ViewModels\MoviesViewModelUpComing;

use App\ViewModels\MovieViewModel;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MoviesViewModelPopular;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

       /* $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        $topratedMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated')
            ->json()['results'];

        $upcomingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json()['results'];


        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
        */
        $viewModel = new MoviesViewModel(
            $nowPlayingMovies
            /*$popularMovies,
            $topratedMovies,
            $upcomingMovies,
            $genres*/
        );

        return view('movies.index', $viewModel);
    }


    public function popular()
    {

        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];


        $viewModel = new MoviesViewModelPopular(
            $popularMovies
        );

        return view('movies.popular', $viewModel);
    }

    public function toprated()
    {

        $topratedMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated')
            ->json()['results'];

        $viewModel = new MoviesViewModelTopRated(
            $topratedMovies
        );

        return view('movies.toprated', $viewModel);
    }

    public function upcoming()
    {

        $upcomingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json()['results'];


        $viewModel = new MoviesViewModelUpComing(
            $upcomingMovies
        );

        return view('movies.upcoming', $viewModel);
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
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        $viewModel = new MovieViewModel($movie);

        return view('movies.show', $viewModel);
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
        $request->validate([
            'imdb_id' => 'required',
            'poster_path' => 'required',
            'vote_average' => 'required',
            'release_date' => 'required',
            'genres' => 'required',
            'overview' => 'required'
        ]);

        //$client = new \GuzzleHttp\Client();
        $client = new Client();
        $response = $client->request('PUT', 'http://server.larav.student:8001/api/students/'. $id, [
            'form_params' => [
                'imdb_id' => $request->imdb_id,
                'poster_path' => $request->poster_path,
                'vote_average' => $request->vote_average,
                'release_date' => $request->release_date,
                'genres' => $request->genres,
                'overview' => $request->overview,
            ]
        ]);
        //return view('movies.index', $viewModel);
        return redirect()->route('movies.index')
            ->with('success', 'Movie Add/Update successfully.');
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
    }
}
