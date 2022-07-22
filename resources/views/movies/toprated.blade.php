@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">

        <div class="top-rated-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($topRatedMovies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach

            </div>
        </div> <!-- end pouplar-movies -->

    </div>
@endsection
