@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="card-header">
                    <h3 class="card-title">Showing Movie : {{ $localmovies->title }}</h3>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                        <div class="table">
                                                <table class="table table-striped">
                                                        <tr>
                                                                <td><strong>{{ $localmovies->title}}</strong>:
                                                                </td>
                                                                <td><img src='{{ $localmovies->poster_path}}'></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Vote Avarage : {{$localmovies->vote_average}}</td>
                                                        </tr> 

                                                        <tr>
                                                                <td>Release Date : {{$localmovies->release_date}}</td>
                                                        </tr>

                                                        <tr>
                                                                <td>Genres : {{$localmovies->genres}}</td>
                                                        </tr>

                                                        <tr>
                                                                <td>Overview : {{$localmovies->overview}}</td>
                                                        </tr>
                                                                
                                                </table>
                                            </div>
                                </div>
                    </div>

                    <a href="{{ route('localmovies.index') }}" class="btn btn-link">Back</a>

            </div>
        </div>
</div>
@endsection
