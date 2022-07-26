@extends('layouts.app')


@section('content')
<div class="container">
    @if (session('message'))
    <div id="message" name="message" class="alert alert-icon alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"></button>
                <i class="fe fe-check mr-2" aria-hidden="true"></i> {{ session('message') }}
    </div>
    @endif
    
    <div class="row justify-content-center">
        

        <h1 class="page-title"> Movies CRUD </h1>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    {{ $localmovies->links() }}
                </div>
                <div class="col-md-6">
                    <div class="d-flex">
                        <a class="btn btn-primary ml-auto" href="{{ route('movies.index')}}">Add new Movie API</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
           
            <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>TMB Id </th>
                            <th>Title </th>
                            <th>Poster Movie </th>
                            <th>Vote Average </th>
                            <th>Release Date </th>
                            <th>Genres </th>
                            <th>Overview </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    @foreach($localmovies as $movie)
                        <tr>
                            <td>{{ $movie->imdb_id  }}</td>
                            <td>{{ $movie->title }}</td>
                            <td><img src='{{ $movie->poster_path }}' class="img-rounded" /></td>
                            <td>{{ $movie->vote_average }}</td>
                            <td>{{ $movie->release_date }}</td>
                            <td>{{ $movie->genres }}</td>
                            <td>{{ $movie->overview }}</td>
                            <td>
                                <a class="btn btn-sm" href="{{ route('localmovies.show',$movie->id)}}">View</a> |
                                <a class="btn btn-sm" href="{{ route('localmovies.edit',$movie->id)}}">Edit</a> |
                                <a class="btn btn-sm"><form method="POST" action="localmovies/{{ $movie->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">Delete</button>       
                                    </form>
                                </a>                                        
                                
                            </td>

                        </tr>
                    @endforeach
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection
